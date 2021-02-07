<?php

namespace App\Services;

/**
 * Class that handles Url Generator Services
 */
class UrlGeneratorService
{
    /**
     * @param string $url
     * @param array $queryParams
     *
     * @return string
     */
    public static function generateUrl(string $baseUrl, array $queryParams): string
    {
        return $baseUrl . http_build_query($queryParams);
    }
}
