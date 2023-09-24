<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\UrlShortener;
use Illuminate\Support\Str;

class UrlShortenerController extends Controller
{
    public function index()
    {
        $shortLinks = UrlShortener::orderBy('id', 'asc')->get();
        return view('urlShortener', compact('shortLinks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        // Get the user's external IP address using ipify
        $externalIp = (new Client())->get('https://api.ipify.org')->getBody()->getContents();

        // Use Geoplugin to get IP geolocation data for the external IP
        $response = Http::get("http://www.geoplugin.net/json.gp?ip={$externalIp}");
        $geolocationData = $response->json();

        // Dump the Geoplugin response for debugging

        $input['link'] = $request->link;
        $input['code'] = Str::random(6);

        // Store the IP geolocation data in the database
        $input['ip'] = $geolocationData['geoplugin_request'];
        $input['city'] = $geolocationData['geoplugin_city'];
        $input['country'] = $geolocationData['geoplugin_countryName'];
        $input['latitude'] = $geolocationData['geoplugin_latitude'];
        $input['longitude'] = $geolocationData['geoplugin_longitude'];
        $input['timezone'] = $geolocationData['geoplugin_timezone'];
        $input['currency_code'] = $geolocationData['geoplugin_currencyCode'];
        $input['currency_symbol'] = $geolocationData['geoplugin_currencySymbol'];

        UrlShortener::create($input);
        return redirect('generate-shorten-link')->withSuccess('Shortened URL generated successfully!');
    }
    public function urlShortener($code)
    {
        $find = UrlShortener::where('code', $code)->first();
        return redirect($find->link);
    }
    public function destroy($id)
    {
        $shortLink = UrlShortener::findOrFail($id);
        $shortLink->delete();

        return redirect()->back()->with('success', 'Short URL deleted successfully');
    }
}
