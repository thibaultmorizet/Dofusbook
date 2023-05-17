<div class="bg-gray-700 rounded-lg">
    <div class="bg-gray-900 font-semibold text-xl text-white p-3 rounded-t-lg flex items-center justify-between">
        <span>{{$spell->name}}</span>
        <div class="flex items-center">
            @for($i = 1; $i <= count($spell->spellCharacteristics); $i++)
                <div class="rounded-lg {{$i === $effectsToView["spell_level"] ? "bg-indigo-500" : "bg-gray-600"}} text-white text-sm px-2 py-1 mx-1 w-6 flex items-center justify-center">
                    {{$i}}
                </div>
                <button class="rounded-lg py-1 px-3 mx-2 {{$i === $effectsToView["spell_level"] ? "bg-indigo-500" : "bg-gray-600"}}"
                        wire:click="updateEffectsToView({{$i}})">
                    {{$i}}
                </button>

            @endfor
        </div>
    </div>
    <div class="p-3">

    </div>
</div>