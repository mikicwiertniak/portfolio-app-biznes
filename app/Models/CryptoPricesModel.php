<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CryptoPricesModel extends Model
{
    protected $table = 'crypto_prices';

    protected $fillable = [
        'crypto_id',
        'currency',
        'price',
        'volume_24h',
        'volume_change_24h',
        'percent_change_1h',
        'percent_change_24h',
        'percent_change_7d',
        'percent_change_30d',
        'percent_change_60d',
        'percent_change_90d',
        'market_cap',
        'market_cap_dominance',
        'fully_diluted_market_cap',
        'last_api_update',
    ];
}
