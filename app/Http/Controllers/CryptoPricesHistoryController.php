<?php

namespace App\Http\Controllers;

use App\Models\CryptoPricesHistory;
use Carbon\Carbon;

class CryptoPricesHistoryController extends Controller
{
    public function savePriceHistory(int $price, int $cryptoId): void
    {
        $existingHistory = CryptoPricesHistory::query()
                                              ->where('crypto_id', $cryptoId)
                                              ->first();

        if (empty($existingHistory)) {
            $this->saveHistoryToDb($price, $cryptoId);
        } else {
            $timeDiff = Carbon::now()
                              ->diffInHours($existingHistory->created_at);
            if ($timeDiff > 2) {
                $this->saveHistoryToDb($price, $cryptoId);
            }
        }
    }

    private function saveHistoryToDb(int $price, int $cryptoId): void
    {
        CryptoPricesHistory::query()
                           ->create([
                               'crypto_id' => $cryptoId,
                               'price' => $price,
                           ]);
    }
}
