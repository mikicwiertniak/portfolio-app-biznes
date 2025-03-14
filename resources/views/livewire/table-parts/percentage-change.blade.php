@php
    $colName=$column->getFrom();
    $value = $row->$colName
@endphp

<div class="font-bold text-xl">
    <div @class([
       'text-green-600' => $value > 0,
       'text-red-600' => $value < 0,])
    >
        {{$value}}%
    </div>
</div>