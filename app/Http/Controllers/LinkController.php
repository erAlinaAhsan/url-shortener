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
            // $ip_service = new IpGeolocationService;
            // $geolocationData = $ip_service->handle();
            if ($previousShortLink = Link::latest()->first()) {
                $previousShortLink->delete();
            }

            Link::create($input);

            return redirect('generate-shorten-link')->with('status', 'Shortened URL generated successfully');
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect('generate-shorten-link')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function urlShortener($code)
    {
        $link = Link::where('code', $code)->firstOrFail();
        $ip = request()->ip();
        try {
            $ip_service = new IpGeolocationService($ip);
            $geolocationData = $ip_service->handle();

            $visit['ip'] = $geolocationData['geoplugin_request'];
            $visit['city'] = $geolocationData['geoplugin_city'];
            $visit['country'] = $geolocationData['geoplugin_countryName'];
            $visit['latitude'] = $geolocationData['geoplugin_latitude'];
            $visit['longitude'] = $geolocationData['geoplugin_longitude'];
            $visit['timezone'] = $geolocationData['geoplugin_timezone'];
            $visit['currency_code'] = $geolocationData['geoplugin_currencyCode'];
            $visit['currency_symbol'] = $geolocationData['geoplugin_currencySymbol'];
        } catch (\Exception $e) {
            // Handle other exceptions
            return redirect('generate-shorten-link')->with('error', 'An error occurred: ' . $e->getMessage());
        }

        $link->linkVisits()->create($visit);
        return redirect()->away($link->link);
    }
    public function destroy($id)
    {
        $shortLink = Link::findOrFail($id);
        $shortLink->delete();

        return redirect()->back();
    }
}
