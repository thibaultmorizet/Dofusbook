<div>
    <livewire:set.header-set/>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="grid grid-cols-2 gap-4 mb-5">
                    @foreach($setsToView as $set)
                        <livewire:set.unique-set :set="$set" :wire:key="$set->id"/>
                    @endforeach
                </div>

                @if($totalSetsNumber > $setsLoaded)
                    <div class="flex items-center justify-center">
                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                wire:click="updateSetsToLoad()"
                                wire:poll.visible="updateSetsToLoad()"
                        >
                            Voir plus
                        </button>
                    </div>
                @endif


                @if(count($setsToView) === 0)
                    <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg p-2 py-5 text-xl text-white text-center font-semibold">
                        <span>Aucun équipement avec ces filtres</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>