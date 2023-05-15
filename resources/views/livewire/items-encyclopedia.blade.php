<div>
    <livewire:item.header-item/>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="grid grid-cols-3 gap-4 mb-5">
                    @foreach($itemsToView as $item)
                        <livewire:item.unique-item :item="$item" :wire:key="$item->id"/>
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
