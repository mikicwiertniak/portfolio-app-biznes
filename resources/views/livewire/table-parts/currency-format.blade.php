@php
    $colName=$column->getFrom()
@endphp
<div class="text-2xl">
    {{\App\Helpers\CurrencyHelper::format($row->$colName)}} USD
</div>