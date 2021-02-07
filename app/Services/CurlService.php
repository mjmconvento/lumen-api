<?php

namespace App\Services;

/**
 * Class that handles Curl Services
 */
class CurlService
{
    /**
     * @param string $url
     *
     * @return \stdClass
     */
    public static function getResponse(string $url): \stdClass
    {
        $curlConnection = curl_init();

        curl_setopt($curlConnection, CURLOPT_URL, $url);
        curl_setopt($curlConnection, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curlConnection);

        curl_close($curlConnection);

        return json_decode($response);
    }
}
