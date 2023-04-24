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
                         wire:click="updateEquipmentType('items/equipment','Amulette')">
                        <img
                                src="/img/stuff/amulet.png"
                                alt="amulet image"
                                width="40px"
                                class="{{$equipmentType==="Amulette"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Anneau')">

                        <img
                                src="/img/stuff/ring.png"
                                alt="ring image"
                                width="40px"
                                class="{{$equipmentType==="Anneau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Bottes')">

                        <img
                                src="/img/stuff/boots.png"
                                alt="boots image"
                                width="40px"
                                class="{{$equipmentType==="Bottes"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Bouclier')">

                        <img
                                src="/img/stuff/shield.png"
                                alt="shield image"
                                width="40px"
                                class="{{$equipmentType==="Bouclier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Cape')">

                        <img
                                src="/img/stuff/cape.png"
                                alt="cape image"
                                width="40px"
                                class="{{$equipmentType==="Cape"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Ceinture')">

                        <img
                                src="/img/stuff/belt.png"
                                alt="belt image"
                                width="40px"
                                class="{{$equipmentType==="Ceinture"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Chapeau')">

                        <img
                                src="/img/stuff/hat.png"
                                alt="hat image"
                                width="40px"
                                class="{{$equipmentType==="Chapeau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Dofus')">

                        <img
                                src="/img/stuff/dofus.png"
                                alt="dofus image"
                                width="40px"
                                class="{{$equipmentType==="Dofus"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Familier')">

                        <img
                                src="/img/stuff/animal.png"
                                alt="animal image"
                                width="40px"
                                class="{{$equipmentType==="Familier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Montilier')">

                        <img
                                src="/img/stuff/mount.png"
                                alt="mount image"
                                width="40px"
                                class="{{$equipmentType==="Montilier"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('mounts','Dragodinde')">

                        <img
                                src="/img/stuff/dragodinde.png"
                                alt="dragodinde image"
                                width="40px"
                                class="{{$equipmentType==="Dragodinde"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('mounts','Muldo')">

                        <img
                                src="/img/stuff/muldo.png"
                                alt="muldo image"
                                width="40px"
                                class="{{$equipmentType==="Muldo"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('mounts','Volkorne')">

                        <img
                                src="/img/stuff/volkorne.png"
                                alt="volkorne image"
                                width="40px"
                                class="{{$equipmentType==="Volkorne"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Arc')">

                        <img
                                src="/img/stuff/bow.png"
                                alt="bow image"
                                width="40px"
                                class="{{$equipmentType==="Arc"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Baguette')">

                        <img
                                src="/img/stuff/rod.png"
                                alt="rod image"
                                width="40px"
                                class="{{$equipmentType==="Baguette"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Bâton')">

                        <img
                                src="/img/stuff/stick.png"
                                alt="stick image"
                                width="40px"
                                class="{{$equipmentType==="Bâton"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Épée')">

                        <img
                                src="/img/stuff/sword.png"
                                alt="sword image"
                                width="40px"
                                class="{{$equipmentType==="Épée"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Faux')">

                        <img
                                src="/img/stuff/scythe.png"
                                alt="scythe image"
                                width="40px"
                                class="{{$equipmentType==="Faux"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Hache')">

                        <img
                                src="/img/stuff/axe.png"
                                alt="axe image"
                                width="40px"
                                class="{{$equipmentType==="Hache"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Lance')">

                        <img
                                src="/img/stuff/spear.png"
                                alt="spear image"
                                width="40px"
                                class="{{$equipmentType==="Lance"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Marteau')">

                        <img
                                src="/img/stuff/hammer.png"
                                alt="hammer image"
                                width="40px"
                                class="{{$equipmentType==="Marteau"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Pelle')">

                        <img
                                src="/img/stuff/shovel.png"
                                alt="shovel image"
                                width="40px"
                                class="{{$equipmentType==="Pelle"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Pioche')">
                        <img
                                src="/img/stuff/pickaxe.png"
                                alt="pickaxe image"
                                width="40px"
                                class="{{$equipmentType==="Pioche"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Trophée')">

                        <img
                                src="/img/stuff/trophy.png"
                                alt="trophy image"
                                width="40px"
                                class="{{$equipmentType==="Trophée"?'':'stuff-base-img'}} ">
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 rounded-lg mx-1 p-1 cursor-pointer w-fit"
                         wire:click="updateEquipmentType('items/equipment','Prysmaradite')">

                        <img
                                src="/img/stuff/prysmaradite.png"
                                alt="prysmaradite image"
                                width="40px"
                                class="{{$equipmentType==="Prysmaradite"?'':'stuff-base-img'}} ">
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
                                        <p class="text-xl font-semibold cursor-pointer">{{$item['name']}}</p>
                                        <p>{{array_key_exists("type",$item)?$item['type']['name']:$item['name']}} -
                                            Niveau {{(array_key_exists('level',$item)? $item['level']:"60")}}</p>
                                        @if(array_key_exists('parent_set',$item))
                                            <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$item['parent_set']['name']}}</p>
                                        @endif
                                    </div>
                                    <img
                                            src="{{$item['image_urls']['sd']}}"
                                            alt="equipment image"
                                            width="90">
                                </div>
                                <div class="flex flex-col p-6">
                                    @if(array_key_exists("effects",$item))
                                        @foreach($item['effects'] as $itemEffects)
                                            @if(array_key_exists($itemEffects['type']['name'],$characteristicsTranslate))
                                                <div class="flex">
                                                    <img
                                                            src="{{'/img/icons/'.$characteristicsTranslate[$itemEffects['type']['name']].'.png'}}"
                                                            alt="effect image"
                                                            width="24"
                                                            height="24"
                                                            class="mr-2 h-fit self-center">
                                                    <span class="{{substr($itemEffects['formatted'],0,1)=='-'?'text-red-600':''}}">{{$itemEffects['formatted']}}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1 flex flex-col justify-end">
                                <div class="equipment-separator"></div>
                                <div class="flex items-center justify-center pb-4">
                                    <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                            wire:click="addItemToStuff({{$item['ankama_id']}})">
                                        +
                                    </button>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>

                @if(count($items)>count($itemsToView))
                    <div class="flex items-center justify-center">
                        <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2"
                                wire:click="updateItemsToLoad()" wire:poll.visible="updateItemsToLoad()">
                            Voir plus
                        </button>
                    </div>
                @endif

                @if(count($itemsToView)===0)
                    <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg p-2 text-white text-center font-semibold">
                        <span>Aucun équipement avec ces filtres</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>