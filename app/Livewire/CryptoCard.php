<?php

namespace App\Livewire;

use App\Http\Controllers\CryptoCurrencyController;
use App\Models\CryptoCurrencyModel;
use Livewire\Component;

class CryptoCard extends Component
{
    public int $cryptoId;
    public CryptoCurrencyController $cryptoController;
    public CryptoCurrencyModel $cryptoModel;

    public function mount(): void
    {
        $this->cryptoController = new CryptoCurrencyController();
        // $this->cryptoModel      = $this->cryptoController->findCryptoModel($this->cryptoId);
    }

    public function render()
    {
        return view('livewire.crypto-card');
    }
}
