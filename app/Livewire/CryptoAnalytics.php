<?php

namespace App\Livewire;

use App\Http\Controllers\CryptoCurrencyController;
use Livewire\Component;

class CryptoAnalytics extends Component
{
    public array $cryptoForAnalytics;

    public function mount(): void
    {
        $this->cryptoForAnalytics = (new CryptoCurrencyController())->RetriveBestAndWortsCrypto();
    }

    public function render()
    {
        return view('livewire.crypto-analytics', ['cryptoList' => $this->cryptoForAnalytics]);
    }
}
