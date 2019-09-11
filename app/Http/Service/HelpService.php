<?php


namespace App\Http\Service;


use GuzzleHttp\Client;

class HelpService
{
    function apiCurl($url, $params = [], $method = 'get')
    {
        try {
            $client = new Client();
            $response = $client->request($method,$url,['query'=>$params]);
            $response = $response->getBody()->getContents();
            $response = json_decode($response, true);
        } catch (\Exception $e) {
            \Log::info($e->getMessage());
            $response = '';
        }
        return $response['data'][0]['url'] ?? '';
    }
}
