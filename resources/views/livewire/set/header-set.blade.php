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
