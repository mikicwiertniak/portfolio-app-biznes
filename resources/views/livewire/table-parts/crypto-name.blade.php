<div>
    <div class="flex flex-row ">
        <div class="pr-2">
            <x-dynamic-component :component="$this->getIconClass($row->symbol)" class="w-10 h-10 text-gray-200"/>
        </div>
        <div class="pl-2 text-2xl">
            {{$row->name}}
        </div>
    </div>
</div>