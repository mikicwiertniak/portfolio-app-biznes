<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CryptoCurrencyModel extends Model
{
    use HasFactory;

    protected $table = 'crypto_currency';
    protected $fillable = [
        'api_id',
        'name',
        'symbol',
        'time_added',
        'last_updated_api',
        'max_supply',
        'circulating_supply',
        'total',
        'infinite_supply',
        'platform',
        'cmc_rank',
        'num_market_pairs',
    ];

    public function cryptoPrices(): HasOne
    {
        return $this->hasOne(CryptoPricesModel::class, 'crypto_id', 'id');
    }
}
