<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class IpGeolocationService
{

    public function handle($ip = null)
    {
        if (!$ip) {
            $ip = (new Client())->get('https://api.ipify.org')->getBody()->getContents();
        }

        // Use Geoplugin to get IP geolocation data for the external IP
        $response = (new Client())->get("http://www.geoplugin.net/json.gp?ip={$ip}");
        $geolocationData = json_decode($response->getBody()->getContents(), true);
        return $geolocationData;
    }
}
