<div>
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
                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Amulette')">
                        <img
                                src="/img/stuff/amulet.png"
                                alt="amulet image"
                                width="40px"
                                class="{{$equipmentTypeName==="Amulette"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Anneau')">

                        <img
                                src="/img/stuff/ring.png"
                                alt="ring image"
                                width="40px"
                                class="{{$equipmentTypeName==="Anneau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Bottes')">

                        <img
                                src="/img/stuff/boots.png"
                                alt="boots image"
                                width="40px"
                                class="{{$equipmentTypeName==="Bottes"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Bouclier')">

                        <img
                                src="/img/stuff/shield.png"
                                alt="shield image"
                                width="40px"
                                class="{{$equipmentTypeName==="Bouclier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Cape')">

                        <img
                                src="/img/stuff/cape.png"
                                alt="cape image"
                                width="40px"
                                class="{{$equipmentTypeName==="Cape"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Ceinture')">

                        <img
                                src="/img/stuff/belt.png"
                                alt="belt image"
                                width="40px"
                                class="{{$equipmentTypeName==="Ceinture"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Chapeau')">

                        <img
                                src="/img/stuff/hat.png"
                                alt="hat image"
                                width="40px"
                                class="{{$equipmentTypeName==="Chapeau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Dofus')">

                        <img
                                src="/img/stuff/dofus.png"
                                alt="dofus image"
                                width="40px"
                                class="{{$equipmentTypeName==="Dofus"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Familier')">

                        <img
                                src="/img/stuff/animal.png"
                                alt="animal image"
                                width="40px"
                                class="{{$equipmentTypeName==="Familier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Montilier')">

                        <img
                                src="/img/stuff/mount.png"
                                alt="mount image"
                                width="40px"
                                class="{{$equipmentTypeName==="Montilier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Dragodinde')">

                        <img
                                src="/img/stuff/dragodinde.png"
                                alt="dragodinde image"
                                width="40px"
                                class="{{$equipmentTypeName==="Dragodinde"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Muldo')">

                        <img
                                src="/img/stuff/muldo.png"
                                alt="muldo image"
                                width="40px"
                                class="{{$equipmentTypeName==="Muldo"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Volkorne')">

                        <img
                                src="/img/stuff/volkorne.png"
                                alt="volkorne image"
                                width="40px"
                                class="{{$equipmentTypeName==="Volkorne"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Arc')">

                        <img
                                src="/img/stuff/bow.png"
                                alt="bow image"
                                width="40px"
                                class="{{$equipmentTypeName==="Arc"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Baguette')">

                        <img
                                src="/img/stuff/rod.png"
                                alt="rod image"
                                width="40px"
                                class="{{$equipmentTypeName==="Baguette"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Bâton')">

                        <img
                                src="/img/stuff/stick.png"
                                alt="stick image"
                                width="40px"
                                class="{{$equipmentTypeName==="Bâton"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Épée')">

                        <img
                                src="/img/stuff/sword.png"
                                alt="sword image"
                                width="40px"
                                class="{{$equipmentTypeName==="Épée"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Faux')">

                        <img
                                src="/img/stuff/scythe.png"
                                alt="scythe image"
                                width="40px"
                                class="{{$equipmentTypeName==="Faux"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Hache')">

                        <img
                                src="/img/stuff/axe.png"
                                alt="axe image"
                                width="40px"
                                class="{{$equipmentTypeName==="Hache"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Lance')">

                        <img
                                src="/img/stuff/spear.png"
                                alt="spear image"
                                width="40px"
                                class="{{$equipmentTypeName==="Lance"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Marteau')">

                        <img
                                src="/img/stuff/hammer.png"
                                alt="hammer image"
                                width="40px"
                                class="{{$equipmentTypeName==="Marteau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Pelle')">

                        <img
                                src="/img/stuff/shovel.png"
                                alt="shovel image"
                                width="40px"
                                class="{{$equipmentTypeName==="Pelle"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Pioche')">
                        <img
                                src="/img/stuff/pickaxe.png"
                                alt="pickaxe image"
                                width="40px"
                                class="{{$equipmentTypeName==="Pioche"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Trophée')">

                        <img
                                src="/img/stuff/trophy.png"
                                alt="trophy image"
                                width="40px"
                                class="{{$equipmentTypeName==="Trophée"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('Prysmaradite')">

                        <img
                                src="/img/stuff/prysmaradite.png"
                                alt="prysmaradite image"
                                width="40px"
                                class="{{$equipmentTypeName==="Prysmaradite"?'':'stuff-base-img'}} ">
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="grid grid-cols-3 gap-4 mb-5">
                    @foreach($itemsToView as $index=>$item)
                        <div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
                            <div>
                                <div class="flex bg-gray-800 p-6 rounded-t-lg">
                                    <div class="flex-1">
                                        <p class="text-xl font-semibold">{{$item->name}}</p>
                                        <p>{{$item->type->name}} -
                                            Niveau {{$item->level}}</p>
                                        @if(is_null($item->set)===false)
                                            <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                               wire:click="goToSet('{{$item->set->name}}')">{{$item->set->name}}</p>
                                        @endif
                                    </div>
                                    <img
                                            src="{{$item->image}}"
                                            alt="equipment image"
                                            width="90"
                                            loading="lazy"
                                    >
                                </div>
                                <div class="flex flex-col p-6">
                                    @foreach($item->effects as $anEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$anEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($anEffects->formatted_name,0,1)=='-'?'text-red-600':''}}">{{$anEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-end">
                                @if(count($item->conditions)>0)
                                    <div class="equipment-separator"></div>
                                    <div class="flex items-center justify-center mb-2">
                                        @foreach($item->conditions as $condition)
                                            <span class="bg-gray-800 rounded-lg p-2">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="equipment-separator"></div>
                                <div class="flex items-center justify-center pb-4">
                                    @if($returnReplacementModal)
                                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                                wire:click="$emit('openModal', 'open-replacement-modal',{{ json_encode([
    "itemType" => $item->type->name,
    "items" => $itemsToReplace,
    "newItemId" => $item->id,
    ]) }})"
                                        >
                                            +
                                        </button>
                                    @else
                                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                                wire:click="addItemToStuff({{$item->id}})">
                                            +
                                        </button>
                                    @endif
                                </div>

                            </div>
                        </div>
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
