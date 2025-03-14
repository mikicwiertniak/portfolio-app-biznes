<?php

namespace App\Services;

use Psr\Http\Message\ResponseInterface;

class ApiResponse
{

    private string $message = '';

    public function __construct(private readonly ResponseInterface $response)
    {
        $this->parseResponse();
    }

    public function parseResponse()
    {
        $responseObject = json_decode($this->response->getBody(), true);
        if ($responseObject['status']['error_code'] === 0) {
            return $responseObject;
        } else {
            $this->message =
                $responseObject['status']['error_code'] . ' : ' . $responseObject['status']['error_message'];
        }
    }

    public function getMessage(): string
    {
        return $this->message;
    }

}