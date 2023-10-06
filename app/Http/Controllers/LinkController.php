<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\LinkVisit;
use App\Services\IpGeolocationService;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function showDetails($id)
    {
        $shortLink = Link::findOrFail($id);

        $linkVisit = $shortLink->linkVisits->last();
        return view('urlShortener.details', compact('shortLink', 'linkVisit'));
    }
    public function index()
    {
        $shortLinks = Link::select('id', 'code', 'link')->orderBy('id', 'asc')->get();
        return view('urlShortener', compact('shortLinks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|string',
        ]);

        $url = $request->link;

        if (!parse_url($url, PHP_URL_SCHEME)) {
            $url = "http://" . $url;
        }

        $latestLink = Link::latest()->first();
        $input['link'] = $url;
        $input['code'] = $latestLink ? hash('crc32', $latestLink->id + 1) : hash('crc32', 1);

        try {
            $ip_service = new IpGeolocationService;
            $geolocationData = $ip_service->handle();
            if ($previousShortLink = Link::latest()->first()) {
                $previousShortLink->delete();
            }
            $input['ip'] = $geolocationData['geoplugin_request'];
            $input['city'] = $geolocationData['geoplugin_city'];
            $input['country'] = $geolocationData['geoplugin_countryName'];
            $input['latitude'] = $geolocationData['geoplugin_latitude'];
            $input['longitude'] = $geolocationData['geoplugin_longitude'];
            $input['timezone'] = $geolocationData['geoplugin_timezone'];
            $input['currency_code'] = $geolocationData['geoplugin_currencyCode'];
            $input['currency_symbol'] = $geolocationData['geoplugin_currencySymbol'];

            LinkVisit::create($input);

            return redirect('generate-shorten-link')->with('status', 'Shortened URL generated successfully');
        } catch (ConnectException $e) {
            // Handle connection errors
            return redirect('generate-shorten-link')->with('error', 'Connection error: ' . $e->getMessage());
        } catch (RequestException $e) {
            // Handle request errors
            return redirect('generate-shorten-link')->with('error', 'Request error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect('generate-shorten-link')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }




    public function urlShortener($code)
    {
        $find = Link::where('code', $code)->first();
        return redirect()->away($find->link);
    }
    public function destroy($id)
    {
        $shortLink = Link::findOrFail($id);
        $shortLink->delete();

        return redirect()->back();
    }
}
