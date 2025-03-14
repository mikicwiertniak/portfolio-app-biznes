<?php

namespace App\Services;

use App\Exception\ApiRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use JsonException;

class ApiConnectionService implements ApiInterface
{
    protected string $url;
    protected string $token;
    protected array $headers;
    protected bool $debug = false;
    protected Client $client;

    public function __construct()
    {
        $this->url     = config('api.url');
        $this->token   = config('api.token');
        $this->headers = [
            'X-CMC_PRO_API_KEY' => $this->token,
            'accept' => 'application/json',
        ];
        $this->client  = new Client(['base_uri' => $this->url]);
    }

    /**
     * @throws JsonException
     * @throws ApiRequestException
     */
    public function get(string $endpoint, array $params = []): ApiResponse
    {
        return $this->request('get', $endpoint, [
            RequestOptions::HEADERS => $this->headers,
            RequestOptions::QUERY => $params,
        ]);
    }

    private function request(string $type, string $url, array $parameters): ApiResponse
    {
        try {
            $response = $this->client->request($type, $url, $parameters);

            return new ApiResponse($response);
        } catch (GuzzleException $e) {
            throw new ApiRequestException("Błąd API: {$url}: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
}


