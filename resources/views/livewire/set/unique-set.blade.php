<div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
    <div>
        <div class="flex bg-gray-800 p-6 rounded-t-lg">
            <div class="flex-1">
                <p class="text-xl font-semibold">{{$set->name}}</p>
                <p> Niveau {{$set->level}}</p>
            </div>
        </div>
        <div class="grid grid-cols-5 p-6">
            @foreach($set->items as $anItem)
                <div class="flex flex-col text-center cursor-pointer"
                     wire:click="goToItem('{{$anItem->name}}','{{$anItem->type->name}}')"
                >
                    <span>{{$anItem->type->name}}</span>
                    <img
                            src="{{$anItem->image}}"
                            alt="item image"
                            width="60"
                            height="60"
                            class="mr-2 h-fit self-center"
                            loading="lazy"
                    >
                </div>
            @endforeach

        </div>
        <div class="bg-gray-800 rounded-lg font-semibold flex py-3 mx-5 flex items-center justify-center">
            <span>Bonus </span>
            @for($i = 2; $i <= $set->number_of_items; $i++)
                <button class="bg-gray-700 rounded-lg py-1 px-3 mx-2 {{$i === $effectsToView["set_number_items"] ? "bg-indigo-700" : ""}}"
                        wire:click="updateEffectsToView({{$i}})">
                    {{$i}}
                </button>
            @endfor
            <span> items</span>
        </div>
        <div class="flex flex-col px-10 py-5">
            @foreach($effectsToView["effects"] as $anEffect)
                @if($anEffect["set_number_items"] === $effectsToView["set_number_items"])
                    <div class="flex text-center">
                        <img
                                src="{{$anEffect["image"]}}"
                                alt="effect image"
                                width="24"
                                height="24"
                                class="mr-2 h-fit self-center">
                        <span class="{{str_starts_with($anEffect["formatted_name"],'-') ? 'text-red-600' : ''}}">
                                                    {{$anEffect["formatted_name"]}}
                                                </span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
