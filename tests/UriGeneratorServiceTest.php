<?php

use App\Services\UrlGeneratorService;

class UriGeneratorServiceTest extends TestCase
{
    /**
     * @var string API_URL
     */
    private const API_URL = 'https://randomuser.me/api?';

    /**
     * @var array QUERY_PARAMETERS
     */
    private const QUERY_PARAMETERS = [
        'results' => 100,
        'nat' => 'au',
        'inc' => 'name'
    ];

    /**
     * @return void
     */
    public function testGenerateUrlWithQueryParameters(): void
    {
        $this->assertEquals(
            UrlGeneratorService::generateUrl(self::API_URL, self::QUERY_PARAMETERS),
            'https://randomuser.me/api?results=100&nat=au&inc=name'
        );
    }

    /**
     * @return void
     */
    public function testGenerateUrlWithoutQueryParameters(): void
    {
        $this->assertEquals(
            UrlGeneratorService::generateUrl(self::API_URL, []), 'https://randomuser.me/api?'
        );
    }
}
