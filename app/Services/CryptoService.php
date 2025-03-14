<?php

namespace App\Services;

use App\Http\Controllers\CryptoCurrencyController;
use App\Models\CryptoCurrencyModel;
use Carbon\Carbon;

class CryptoService extends ApiConnectionService
{
    public const ENDPOINTS = [
        'gainersAndLosers' => '/v1/cryptocurrency/trending/gainers-losers',
        'latest' => '/v1/cryptocurrency/listings/latest',
    ];

    public function getAndStoreLatestCryptoData()
    {
        $latestData = $this->getLatest();
        $this->storeLatestCrypto($latestData['data']);
    }

    private function getLatest(): array
    {
        return $this->get(self::ENDPOINTS['latest'])
                    ->parseResponse();
    }

    private function storeLatestCrypto(array $latestData): void
    {
        foreach ($latestData as $crypto) {
            (new CryptoCurrencyController())->StoreCryptoCurrency($crypto);
        }
    }
}


