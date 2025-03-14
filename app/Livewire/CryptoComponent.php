<?php

namespace App\Livewire;

use App\Services\CryptoService;
use Livewire\Component;

class CryptoComponent extends Component
{

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.crypto-component');
    }

    public function getCryptoList(): void
    {
        (new CryptoService())->getAndStoreLatestCryptoData();
    }
}
