<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CryptoPricesHistory extends Model
{
    protected $table = 'crypto_prices_history';
    protected $fillable = ['crypto_id', 'price'];

    public function cryptoCurrency(): BelongsTo
    {
        return $this->belongsTo('App\Models\CryptoCurrency', 'id', 'crypto_id');
    }
}
