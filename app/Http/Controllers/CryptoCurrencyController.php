<?php

namespace App\Http\Controllers;

use App\Models\CryptoCurrencyModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CryptoCurrencyController extends Controller
{
    public function StoreCryptoCurrency(array $crypto): void
    {
        DB::beginTransaction();
        try {
            $cryptoModel = CryptoCurrencyModel::query()
                                              ->updateOrCreate(['api_id' => $crypto['id']], [
                                                  'name' => $crypto['name'],
                                                  'symbol' => $crypto['symbol'],
                                                  'time_added' => Carbon::parse($crypto['date_added'])
                                                                        ->format('Y-m-d H:i:s'),
                                                  'last_updated_api' => Carbon::parse($crypto['last_updated'])
                                                                              ->format('Y-m-d H:i:s'),
                                                  'max_supply' => $crypto['max_supply'] ?? 0,
                                                  'circulating_supply' => $crypto['circulating_supply'] ?? 0,
                                                  'total' => $crypto['total_supply'] ?? 0,
                                                  'infinite_supply' => (int)$crypto['infinite_supply'],
                                                  'platform' => is_array($crypto['platform'])
                                                      ? $crypto['platform']['name'] : null,
                                                  'cmc_rank' => $crypto['cmc_rank'],
                                                  'num_market_pairs' => $crypto['num_market_pairs'],
                                              ]);
            $cryptoModel->cryptoPrices()
                        ->updateOrCreate(['crypto_id' => $cryptoModel->id], [
                            'currency' => 'USD',
                            'price' => $crypto['quote']['USD']['price'],
                            'volume_24h' => $crypto['quote']['USD']['volume_24h'],
                            'volume_change_24h' => $crypto['quote']['USD']['volume_change_24h'],
                            'percent_change_1h' => $crypto['quote']['USD']['percent_change_1h'],
                            'percent_change_24h' => $crypto['quote']['USD']['percent_change_24h'],
                            'percent_change_7d' => $crypto['quote']['USD']['percent_change_7d'],
                            'percent_change_30d' => $crypto['quote']['USD']['percent_change_30d'],
                            'percent_change_60d' => $crypto['quote']['USD']['percent_change_60d'],
                            'percent_change_90d' => $crypto['quote']['USD']['percent_change_90d'],
                            'market_cap' => $crypto['quote']['USD']['market_cap'],
                            'market_cap_dominance' => $crypto['quote']['USD']['market_cap_dominance'],
                            'fully_diluted_market_cap' => $crypto['quote']['USD']['fully_diluted_market_cap'],
                            'last_api_update' => Carbon::parse($crypto['quote']['USD']['last_updated'])
                                                       ->format('Y-m-d H:i:s'),
                        ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
    }

    public function RetriveBestAndWortsCrypto(): array
    {
        $crypto      = CryptoCurrencyModel::query()
                                          ->whereHas('cryptoPrices', function ($query) {
                                              $query->where('price', '>', 0);
                                          })
                                          ->join('crypto_prices', 'crypto_currency.id', '=', 'crypto_prices.crypto_id')
                                          ->orderBy('crypto_prices.percent_change_24h', 'desc')
                                          ->get()
                                          ->select('id')
                                          ->toArray();
        $bestCrypto  = array_slice($crypto, 0, 5);
        $worstCrypto = array_slice($crypto, -5);

        return array_merge($bestCrypto, $worstCrypto);
    }

    public function findCryptoModel(int $id)
    {
        return CryptoCurrencyModel::with('cryptoPrices')
                                  ->find($id)
                                  ->first();
    }
}
