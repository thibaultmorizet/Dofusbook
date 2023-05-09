<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-center items-end">
                <div class="flex flex-col w-3/4">
                    <label for="setName" class="text-white ml-2">Recherche sur nom de panoplie</label>
                    <input type="text" name="setName"
                           class="text-white font-semibold rounded-lg dark:bg-gray-500 mr-3"
                           wire:change="updateSetName($event.target.value)"
                           wire:model.defer="setName"
                    >
                </div>

                <div class="flex flex-col">
                    <label for="minLvl" class="text-white ml-2">Min</label>
                    <input type="text" name="minLvl"
                           class="text-white rounded-lg dark:bg-gray-500 text-center font-semibold mr-3"
                           size="5"
                           wire:change="updateMinLvl($event.target.value)"
                           wire:model.defer="minLvl"
                    >
                </div>

                <div class="flex flex-col">
                    <label for="maxLvl" class="text-white ml-2">Max</label>
                    <input type="text" name="maxLvl"
                           class="text-white rounded-lg dark:bg-gray-500 text-center font-semibold mr-3"
                           size="5"
                           wire:change="updateMaxLvl($event.target.value)"
                           wire:model.defer="maxLvl"
                    >
                </div>

                <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit h-fit"
                     wire:click="deleteFilters()">
                    <x-heroicon-m-trash class="w-7 h-7 mx-2 my-1 text-white"/>
                </div>

            </div>
        </div>
    </header>


    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="grid grid-cols-2 gap-4 mb-5">
                    @foreach($setsToView as $index=>$set)
                        {{--                        @dd($set->items)--}}
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
                                             data-popover-target="popover-{{$anItem->id}}"
                                             data-popover-placement="bottom"
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
                                        <div id="popover-{{$anItem->id}}" role="tooltip"
                                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-800 border border-gray-600 border-2">
                                            <p class="text-xl font-semibold">{{$anItem->name}}</p>
                                            <p>{{$anItem->type->name}} - Niveau
                                                {{$anItem->level}}</p>
                                            <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                               wire:click="goToSet('{{$anItem->set->name}}')">{{$anItem->set->name}}</p>
                                            <div class="separator"></div>
                                            @foreach($anItem->effects as $itemEffects)
                                                <div class="flex">
                                                    <img
                                                            src="{{$itemEffects->image}}"
                                                            alt="effect image"
                                                            width="24"
                                                            height="24"
                                                            class="mr-2 h-fit self-center">
                                                    <span
                                                            class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                                </div>
                                            @endforeach


                                            <div class="tooltip-arrow" data-popper-arrow></div>

                                        </div>
                                    @endforeach

                                </div>
                                <div class="bg-gray-800 rounded-lg font-semibold flex py-3 mx-5 flex items-center justify-center">
                                    <span>Bonus </span>
                                    @for($i=2;$i<=$set->number_of_items;$i++)
                                        <button class="bg-gray-700 rounded-lg py-1 px-3 mx-2 {{$i==$effectsToView[$set->id]?"bg-indigo-700":""}}"
                                                wire:click="updateEffectsToView({{$set->id}},{{$i}})">
                                            {{$i}}
                                        </button>
                                    @endfor
                                    <span> items</span>
                                </div>
                                <div class="flex flex-col px-10 py-5">
                                    @foreach($set->effects as $anEffects)
                                        @if($anEffects->set_number_items===$effectsToView[$set->id])
                                            <div class="flex text-center">
                                                <img
                                                        src="{{$anEffects->image}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{substr($anEffects->formatted_name,0,1)=='-'?'text-red-600':''}}">{{$anEffects->formatted_name}}</span>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($totalSetsNumber>$setsLoaded)
                    <div class="flex items-center justify-center">
                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                wire:click="updateSetsToLoad()"
                                wire:poll.visible="updateSetsToLoad()"
                        >
                            Voir plus
                        </button>
                    </div>
                @endif


                @if(count($setsToView)===0)
                    <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg p-2 py-5 text-xl text-white text-center font-semibold">
                        <span>Aucun équipement avec ces filtres</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
