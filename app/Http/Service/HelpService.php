<?php


namespace App\Http\Service;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class HelpService
{
    function apiCurl($url, $param = [], $method = 'get')
    {
        $response = [];
        try {
            $client = new Client(['timeout' => 10]);
            if ($method == 'get') {
                $request = new Request($method, $url);
                $response = $client->send($request);
            } elseif ($method == 'post') {
                $params = [
                    'form_params' => $param
                ];
                $response = $client->request($method, $url, $params);
            }
            $response = $response->getBody()->getContents();
            $response = json_decode($response, true);
        } catch (\Exception $e) {
            \Log::info($url);
            \Log::info($e->getMessage());
            $response =  [];
        }
        return $response;
    }
}
