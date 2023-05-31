<div class="bg-gray-700 rounded-lg">
    <div class="bg-gray-900 font-semibold text-xl text-white p-3 rounded-t-lg flex items-center justify-between">
        <span>{{$spell->name}}</span>
        <div class="flex items-center">
            @for($i = 1; $i <= count($spell->spellCharacteristics); $i++)
                <button class="rounded-lg {{$i === Arr::get($spellInfo,'spell_level') ? "bg-indigo-500" : "bg-gray-600"}}
                 text-white text-sm px-2 py-1 mx-1 w-6 flex items-center justify-center"
                        wire:click="updateEffectsToView({{$i}})">
                    {{$i}}
                </button>
            @endfor
        </div>
    </div>
    <div class="p-3">
        <div class="flex">
            <div>
                <img
                        src="{{$spell->image}}"
                        alt="spell image"
                        width="50px"
                >
            </div>
            <div>
                <div class="flex items-center mx-3">
                    <img
                            src="/img/icons/stuff_lvl.png"
                            alt="spell level image"
                            width="20px"
                    >
                    <span class="text-white font-medium ml-2">Niveau {{Arr::get($spellInfo,'selected_level')}}</span>
                </div>
                <div class="flex items-center mx-3">
                    <img
                            src="/img/icons/title.png"
                            alt="summary image"
                            width="20px"
                    >
                    <span class="text-white font-medium ml-2" data-tooltip-target="tooltip-summary-{{$spell->id}}">Description</span>
                    <div id="tooltip-summary-{{$spell->id}}" role="tooltip"
                         class="absolute z-10 invisible inline-block px-3 py-2 font-normal text-white transition-opacity duration-300 rounded-lg opacity-0 tooltip bg-gray-800 max-w-md text-base">
                        {{$spell->summary}}
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <div class="ml-2">
                <label class="text-white font-medium flex items-center mx-2"> <input type="radio"
                                                                                     wire:click="updateMeleeOrDistance('melee')"
                                                                                     {{$meleeOrDistance==="melee"?"checked":""}}>
                    <span class="mx-2 flex-1">Mêlée</span>
                    <img
                            src="/img/icons/do_melee.png"
                            alt="melee image"
                            width="25"
                    >
                </label>
                <label class="text-white font-medium flex items-center mx-2"> <input type="radio"
                                                                                     wire:click="updateMeleeOrDistance('distance')"
                                                                                     {{$meleeOrDistance==="distance"?"checked":""}}>

                    <span class="mx-2 flex-1">Distance</span>
                    <img
                            src="/img/icons/do_distance.png"
                            alt="distance image"
                            width="25"
                    >
                </label>
            </div>
        </div>
        <div>
            @foreach(Arr::get($spellInfo,'dommage_groups') ?? [] as $dommageGroup)
                <div class="mt-4">
                    <div class="rounded-lg bg-gray-600 text-white px-2 py-1 my-2 w-fit">{{Arr::get($dommageGroup,'title')}}</div>
                </div>
                <div class="flex items-center">
                    @foreach(Arr::get($dommageGroup,'effects') ?? [] as $effect)
                        @if(Arr::get($effect,'level')===Arr::get($spellInfo,'spell_level'))
                            @if(Arr::get($effect,'cc')===0)
                </div>
                <div class="flex items-center">

                    @endif
                    <div class="flex flex-1 ml-2 items-center">
                        <img
                                src="/img/icons/{{Arr::get($effect,'effect')}}.png"
                                alt="{{Arr::get($effect,'effect')}} image"
                                class="img-20-by-20"
                        >
                        @if($dommageEffectType==="baseEffects")
                            <span class="text-white font-semibold">{{Arr::get($effect,'min')}} - {{Arr::get($effect,'max')}}  {{Arr::get($effect,'cc')===1? 'CC':''}}
                                <span> {{(Arr::get($effect,'duration')>0)?("(".Arr::get($effect,'duration')." tour".(Arr::get($effect,'duration')>1?"s)":")")):""}} </span>
                            </span>
                        @endif
                        @if($dommageEffectType==="calculatedEffects")
                            @if($meleeOrDistance==="melee")
                                <span class="text-white font-semibold">{{Arr::get($effect,'min_melee')}} - {{Arr::get($effect,'max_melee')}}  {{Arr::get($effect,'cc')===1? 'CC':''}}
                                <span> {{(Arr::get($effect,'duration')>0)?("(".Arr::get($effect,'duration')." tour".(Arr::get($effect,'duration')>1?"s)":")")):""}} </span>
                            </span>
                            @endif
                            @if($meleeOrDistance==="distance")
                                <span class="text-white font-semibold">{{Arr::get($effect,'min_distance')}} - {{Arr::get($effect,'max_distance')}}  {{Arr::get($effect,'cc')===1? 'CC':''}}
                                <span> {{(Arr::get($effect,'duration')>0)?("(".Arr::get($effect,'duration')." tour".(Arr::get($effect,'duration')>1?"s)":")")):""}} </span>
                            </span>
                            @endif
                        @endif
                    </div>

                    @endif
                    @endforeach

                </div>

            @endforeach
        </div>
        <div class="separator"></div>
        <div class="text-white flex flex-wrap">

            @foreach(Arr::get(Arr::get($spellInfo,'characteristics') ?? [],Arr::get($spellInfo,'spell_level'))??[] as $title=>$characteristic)
                @if(!is_null($characteristic))
                    @if($title!=="zone_img")
                        <span class="mx-1">
                            {{($title !== 'PA' && !str_contains($title,'case')) ? '•' : ''}}
                        </span>
                        <span>
                            {{$characteristic !== 'oui'&&$characteristic !== 'non' ? $characteristic : ''}} {{$title}}
                        </span>
                    @else
                        <span class="mx-1">
                            •
                        </span>

                        <span class="flex items-center">
                            <img
                                    src="/img/icons/{{$characteristic}}.png"
                                    alt="{{$characteristic}} image"
                                    class="img-15-by-30"
                            >
                        </span>
                    @endif
                @endif
            @endforeach
        </div>
    </div>
</div>