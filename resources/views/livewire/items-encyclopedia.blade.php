<div>
    @component('livewire.item.header-item',[
        "equipmentTypeName"=>$equipmentTypeName,
        "primaryFilterTabIsOpen"=>$primaryFilterTabIsOpen,
        "secondaryFilterTabIsOpen"=>$secondaryFilterTabIsOpen,
        "dommagesFilterTabIsOpen"=>$dommagesFilterTabIsOpen,
        "resistancesFilterTabIsOpen"=>$resistancesFilterTabIsOpen,
        "characteristicsFilters"=>$characteristicsFilters,
        "itemFilters"=>$itemFilters,
        "primaryFilters"=>$primaryFilters,
        "secondaryFilters"=>$secondaryFilters,
        "dommagesFilters"=>$dommagesFilters,
        "resistancesFilters"=>$resistancesFilters
        ])
    @endcomponent

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div id="toast-back-to-stuff"
                 class="w-full p-4 bg-gray-800 text-gray-400 fixed bottom-0 right-0 opacity-95 {{!$isOpenNotification?"hidden":""}}"
                 role="alert">
                <div class="flex">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                  clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="ml-3 flex flex-1 justify-between items-center">
                        <span class="font-semibold  text-white">L'équipement {{$lastItemAdded?->name}} a été ajouté au stuff {{isset($stuff)?'"'.$stuff->title.'"':''}}</span>
                        <div class="flex items-center">
                            @if(isset($stuff))
                                <a wire:click="goToStuff({{$stuff->id}})"
                                   class="mr-3 py-1 px-2 flex text-center text-white rounded-lg hover:bg-indigo-400 bg-indigo-500 cursor-pointer">Aller
                                    à l'équipement</a>
                            @endif
                            <button type="button"
                                    class="rounded-lg p-1.5 h-8 w-8 text-gray-500 hover:text-white bg-gray-800 hover:bg-gray-700"
                                    data-dismiss-target="#toast-back-to-stuff" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div>
                <div class="grid grid-cols-3 gap-4 mb-5">
                    @foreach($itemsToView as $item)

                        @component('livewire.item.unique-item',[
                            "stuff"=>$stuff,
                            "item"=>$item,
                            "returnReplacementModal"=>$returnReplacementModal,
                            "itemsToReplace"=>$itemsToReplace,

                            ])
                        @endcomponent
                    @endforeach
                </div>

                @if($totalItemsNumber>$itemsLoaded)
                    <div class="flex items-center justify-center">
                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                wire:click="updateItemsToLoad()"
                                wire:poll.visible="updateItemsToLoad()"
                        >
                            Voir plus
                        </button>
                    </div>
                @endif

                @if(count($itemsToView)===0)
                    <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg p-2 py-5 text-white text-center font-semibold text-xl">
                        <span>Aucun équipement avec ces filtres</span>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
