<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-800 rounded-lg mb-6 p-2 flex flex-wrap justify-center">
        @foreach($spellsGroups as $index=>$spellsGroup)
            <div class="dark:bg-gray-700 rounded-lg mb-4 p-2 mx-2 grid grid-cols-{{count($spellsGroup)}} gap-2">
                @foreach($spellsGroup as $spell)
                    <div class="flex items-center justify-center cursor-pointer outline-2 outline-offset-0 outline-white rounded-lg
                    {{$selectedSpellsGroup === Arr::get($spell,'spell_group') ? 'outline' : ''}}"
                         data-tooltip-target="tooltip-spell-{{Arr::get($spell,"id")}}"
                         wire:click="updateSelectedSpellsgroup({{Arr::get($spell,'spell_group')}})">
                        @if(file_exists("C:\laragon\www\Dofusbook/public".Arr::get($spell,'image')))
                            <img
                                    src="{{Arr::get($spell,'image')}}"
                                    alt="spell image"
                                    width="45px"
                            >
                        @else
                            <x-heroicon-m-exclamation-triangle class="w-7 h-7 mx-2 my-1 text-white"/>
                        @endif
                    </div>
                    <div id="tooltip-spell-{{Arr::get($spell,"id")}}" role="tooltip"
                         class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-500 rounded-lg opacity-0 tooltip">
                        {{Arr::get($spell,"name")}}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                @endforeach

            </div>
        @endforeach

    </div>


    <div class="bg-gray-800 rounded-lg py-5 px-7 grid grid-cols-3 gap-2">
        <div class="bg-gray-700 rounded-lg">
            <div class="bg-gray-900 font-semibold text-xl text-white p-3 rounded-t-lg">
                OPTIONS DE SORTS
            </div>
            <div class="p-3">
                <img
                        id="class-{{$stuff->class->id}}"
                        src="/img/avatar/{{$stuff->class->slug}}-{{$stuff->gender}}.png"
                        alt="{{$stuff->class->slug}}-{{$stuff->gender}} image"
                        width="40"
                >
                <div class="separator"></div>
                <div class="flex">
                    <label class="text-white font-medium flex items-center mx-2"> <input type="radio"
                                                                                         wire:model="dommageEffectType"
                                                                                         value="calculatedEffects">
                        <span class="ml-2">Effets calculés</span>
                    </label>
                    <label class="text-white font-medium flex items-center mx-2"> <input type="radio"
                                                                                         wire:model="dommageEffectType"
                                                                                         value="baseEffects">
                        <span class="ml-2">Effets de base</span>
                    </label>
                </div>
            </div>
        </div>

        @foreach($spellsToView as $spell)
            <livewire:spell.unique-spell :spell="$spell" :stuff="$stuff" :dommageEffectType="$dommageEffectType" :wire:key="$spell->id"/>
        @endforeach
    </div>
</div>

