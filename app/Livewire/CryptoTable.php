<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\CryptoCurrencyModel;

class CryptoTable extends DataTableComponent
{
    protected $model = CryptoCurrencyModel::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {
        return CryptoCurrencyModel::query()
                                  ->with('cryptoPrices')
                                  ->select(['cryptoPrices.*', 'name', 'symbol', 'last_updated_api']);
    }

    public function getIconClass($value): string
    {
        return 'cri-' . strtolower($value);
    }

    public function columns(): array
    {
        return [
            Column::make("id", "id")
                  ->sortable()
                  ->searchable(),
            Column::make("Name", "name")
                  ->sortable()
                  ->searchable()
                  ->view('livewire.table-parts.crypto-name'),
            Column::make("Price", "cryptoPrices.price")
                  ->sortable()
                  ->view('livewire.table-parts.currency-format'),
            Column::make("Market cap", "cryptoPrices.market_cap")
                  ->sortable()
                  ->view('livewire.table-parts.currency-format'),
            Column::make("24h volume", "cryptoPrices.volume_24h")
                  ->sortable()
                  ->view('livewire.table-parts.currency-format'),
            Column::make("24h change", "cryptoPrices.percent_change_24h")
                  ->sortable()
                  ->view('livewire.table-parts.percentage-change'),
            Column::make("7d change", "cryptoPrices.percent_change_7d")
                  ->sortable()
                  ->view('livewire.table-parts.percentage-change'),
        ];
    }
}
