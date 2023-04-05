<div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9 dark:bg-gray-700">
    <form wire:submit.prevent="create">
        <div class="py-6 px-4 space-y-6 sm:p-6">
            <div>
                <h3 class="font-custom-title text-lg leading-6 font-semibold text-white">
                    {{ __('Créer un équipement') }}
                </h3>
            </div>
            <div class="grid grid-cols-10 gap-2">
                <div wire:click="updateSelectedClass(0)">
                    <img
                            src="/img/avatar/no-class.png"
                            alt="no-class image"
                    >
                </div>
                @foreach($classes as $class)
                    <div wire:click="updateSelectedClass({{$class->id}})">
                        <img
                                id="class-{{$class->id}}"
                                src="/img/avatar/{{$class->slug}}-{{$gender}}.png"
                                alt="{{$class->slug}}-{{$gender}} image"
                        >
                    </div>
                @endforeach
            </div>
            <div class="flex">
                <div class="w-3/4 flex flex-col">
                    <label for="title" class="text-white text-center">Nom de l'équipement</label>
                    <input type="text" name="title"
                           class="text-white rounded-lg dark:bg-gray-500 mr-2 "
                           wire:change="updateTitle($event.target.value)"
                           wire:model.defer="title"
                    >
                </div>

                <div class="flex flex-col">
                    <label for="character_level" class="text-white text-center">Niveau</label>
                    <input type="text" name="character_level"
                           class="text-white rounded-lg dark:bg-gray-500 text-center font-semibold"
                           size="5"
                           wire:change="updateLevel($event.target.value)"
                           wire:model.defer="character_level"

                    >
                </div>
            </div>
            <div class="flex">

            </div>
        </div>
        <div class="dark:bg-gray-600 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button
                    type="submit"
                    class="px-4 py-2 text-sm inline-flex items-center font-medium rounded-md shadow-sm text-white text-white bg-indigo-500 hover:bg-indigo-600"
            >
                {{ __('Créer') }}
            </button>
            <button
                    type="button"
                    class="mr-2 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 bg-gray-500 text-base font-medium text-white hover:bg-gray-400 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    wire:click="$emit('closeModal')"
            >
                {{ __('Annuler') }}
            </button>
        </div>
    </form>
</div>
