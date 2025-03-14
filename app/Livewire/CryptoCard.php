<?php

namespace App\Livewire;

use App\Http\Controllers\CryptoCurrencyController;
use App\Models\CryptoCurrencyModel;
use Livewire\Component;

class CryptoCard extends Component
{
    public CryptoCurrencyModel $cryptoModel;

    public function mount(int $cryptoId): void
    {

    }

    public function render()
    {
        return view('livewire.crypto-card');
    }
}
