<?php

namespace App\Services;

use App\Services;

interface ApiInterface
{
    public function get(string $endpoint, array $params = []): ApiResponse;

}