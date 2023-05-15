<header class="bg-white dark:bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-3 flex justify-center items-end">
            <div class="flex flex-col w-3/4">
                <label for="stuffName" class="text-white ml-2">Recherche sur nom d'objet</label>
                <input type="text" name="stuffName"
                       class="text-white font-semibold rounded-lg dark:bg-gray-500 mr-3"
                       wire:change="updateStuffName($event.target.value)"
                       wire:model.defer="stuffName"
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
        <div class="grid grid-cols-13 gap-3">
            @foreach($itemFilters as $anItemFilter => $anItemFilterTranslated)
                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('{{$anItemFilter}}')">
                        <img
                                src="/img/stuff/{{$anItemFilterTranslated}}.png"
                                alt="{{$anItemFilterTranslated}} image"
                                width="40px"
                                class="{{$equipmentTypeName===$anItemFilter?'':'stuff-base-img'}} ">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="max-w-10xl mx-auto pb-6 px-4 sm:px-6 lg:px-8">
        <div class="separator"></div>
        @if(
               !$primaryFilterTabIsOpen
               && !$secondaryFilterTabIsOpen
               && !$dommagesFilterTabIsOpen
               && !$resistancesFilterTabIsOpen
           )
            <div class="grid grid-cols-4 gap-3">
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('primary')">
                    <span>Effets Principaux</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('secondary')">
                    <span>Effets Secondaires</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('dommages')">
                    <span>Dommages</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('resistances')">
                    <span>Résistances</span>
                </div>
            </div>
        @endif

        @if($primaryFilterTabIsOpen)
            <div class="grid grid-cols-6 gap-3">
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('primary')">
                    <x-heroicon-m-arrow-uturn-left
                            class="w-5 h-5 mx-3  text-white"/>
                    <span>Retour</span>
                </div>

                @foreach($primaryFilters as $aFilter)
                    <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array($aFilter['characteristicsFiltersName'],$characteristicsFilters)?'bg-indigo-500':''}}"
                         wire:click="updateCharacteristicsFilters('{{$aFilter['characteristicsFiltersName']}}')">
                        <img
                                src="{{$aFilter['imageName']}}"
                                alt="{{$aFilter['imageAlt']}}"
                                width="24"
                                height="24"
                                class="mr-2 h-fit self-center">
                        <span>{{$aFilter['span']}}</span>
                    </div>
                @endforeach
            </div>
        @endif
        @if($secondaryFilterTabIsOpen)
            <div class="grid grid-cols-6 gap-3">
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('secondary')">
                    <x-heroicon-m-arrow-uturn-left
                            class="w-5 h-5 mx-3  text-white"/>
                    <span>Retour</span>
                </div>

                @foreach($secondaryFilters as $aFilter)
                    <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array($aFilter['characteristicsFiltersName'],$characteristicsFilters)?'bg-indigo-500':''}}"
                         wire:click="updateCharacteristicsFilters('{{$aFilter['characteristicsFiltersName']}}')">
                        <img
                                src="{{$aFilter['imageName']}}"
                                alt="{{$aFilter['imageAlt']}}"
                                width="24"
                                height="24"
                                class="mr-2 h-fit self-center">
                        <span>{{$aFilter['span']}}</span>
                    </div>
                @endforeach
            </div>
        @endif
        @if($dommagesFilterTabIsOpen)
            <div class="grid grid-cols-6 gap-x-3 gap-y-5">

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('dommages')">
                    <x-heroicon-m-arrow-uturn-left
                            class="w-5 h-5 mx-3  text-white"/>
                    <span>Retour</span>
                </div>

                @foreach($dommagesFilters as $aFilter)
                    @if(count($aFilter)>0)
                        <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array($aFilter['characteristicsFiltersName'],$characteristicsFilters)?'bg-indigo-500':''}}"
                             wire:click="updateCharacteristicsFilters('{{$aFilter['characteristicsFiltersName']}}')">
                            <img
                                    src="{{$aFilter['imageName']}}"
                                    alt="{{$aFilter['imageAlt']}}"
                                    width="24"
                                    height="24"
                                    class="mr-2 h-fit self-center">
                            <span>{{$aFilter['span']}}</span>
                        </div>
                    @else
                        <div></div>
                    @endif
                @endforeach

            </div>
        @endif
        @if($resistancesFilterTabIsOpen)
            <div class="grid grid-cols-6 gap-x-3 gap-y-5">

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer"
                     wire:click="toggleFilterTab('resistances')">
                    <x-heroicon-m-arrow-uturn-left
                            class="w-5 h-5 mx-3  text-white"/>
                    <span>Retour</span>
                </div>
                @foreach($resistancesFilters as $aFilter)
                    @if(count($aFilter)>0)
                        <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array($aFilter['characteristicsFiltersName'],$characteristicsFilters)?'bg-indigo-500':''}}"
                             wire:click="updateCharacteristicsFilters('{{$aFilter['characteristicsFiltersName']}}')">
                            <img
                                    src="{{$aFilter['imageName']}}"
                                    alt="{{$aFilter['imageAlt']}}"
                                    width="24"
                                    height="24"
                                    class="mr-2 h-fit self-center">
                            <span>{{$aFilter['span']}}</span>
                        </div>
                    @else
                        <div></div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</header>