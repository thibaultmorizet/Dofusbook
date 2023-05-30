<div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
    <div>
        <div class="flex bg-gray-800 p-6 rounded-t-lg">
            <div class="flex-1">
                <p class="text-xl font-semibold">{{$item->name}}</p>
                <p>{{$item->type->name}} -
                    Niveau {{$item->level}}</p>
                @if(is_null($item->set)===false)
                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                       wire:click="goToSet('{{$item->set->name}}')">{{$item->set->name}}</p>
                @endif
            </div>
            <img
                    src="{{$item->image}}"
                    alt="equipment image"
                    width="90"
                    loading="lazy"
            >
        </div>
        <div class="flex flex-col p-6">
            @foreach($item->effects as $anEffects)
                <div class="flex">
                    <img
                            src="{{$anEffects->image}}"
                            alt="effect image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span
                            class="{{str_starts_with($anEffects->formatted_name,'-')?'text-red-600':''}}">{{$anEffects->formatted_name}}</span>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex-1 flex flex-col justify-end px-4">
        @if(count($item->conditions)>0)
            <div class="equipment-separator"></div>
            <div class="grid grid-cols-3 gap-3 mb-2">
                @foreach($item->conditions as $condition)
                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                @endforeach
            </div>
        @endif
        @if(isset($stuff))
            <div class="equipment-separator"></div>
            <div class="flex items-center justify-center pb-4">
                @if($returnReplacementModal)
                    <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                            wire:click="$emit('openModal', 'open-replacement-modal',{{ json_encode([
                                    "itemType" => $item->type->name,
                                    "items" => $itemsToReplace,
                                    "newItemId" => $item->id,
                                    ]) }})"
                    >
                        +
                    </button>
                @else
                    <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                            wire:click="addItemToStuff({{$item->id}})">
                        +
                    </button>
                @endif
            </div>
        @endif

    </div>
</div>
