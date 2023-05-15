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

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('PA',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('PA')">
                    <img
                            src="/img/icons/pa.png"
                            alt="pa image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>PA</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('PM',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('PM')">
                    <img
                            src="/img/icons/pm.png"
                            alt="pm image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>PM</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Portée',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Portée')">
                    <img
                            src="/img/icons/po.png"
                            alt="po image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>PO</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Puissance',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Puissance')">
                    <img
                            src="/img/icons/power.png"
                            alt="power image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Puissance</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Critique',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Critique')">
                    <img
                            src="/img/icons/critic.png"
                            alt="critic image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Critique</span>
                </div>

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Vitalité',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Vitalité')">
                    <img
                            src="/img/icons/vitality.png"
                            alt="vitality image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Vitalité</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Agilité',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Agilité')">
                    <img
                            src="/img/icons/agility.png"
                            alt="agility image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Agilité</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Chance',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Chance')">
                    <img
                            src="/img/icons/luck.png"
                            alt="luck image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Chance</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Force',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Force')">
                    <img
                            src="/img/icons/strength.png"
                            alt="strength image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Force</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Intelligence',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Intelligence')">
                    <img
                            src="/img/icons/intel.png"
                            alt="intel image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Intelligence</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Sagesse',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Sagesse')">
                    <img
                            src="/img/icons/wisdom.png"
                            alt="wisdom image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Sagesse</span>
                </div>
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

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Retrait PA',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Retrait PA')">
                    <img
                            src="/img/icons/avoid_pa.png"
                            alt="avoid_pa image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Retrait PA</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Esquive PA',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Esquive PA')">
                    <img
                            src="/img/icons/pa_recession.png"
                            alt="pa_recession image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Esquive PA</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Retrait PM',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Retrait PM')">
                    <img
                            src="/img/icons/avoid_pm.png"
                            alt="avoid_pm image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Retrait PM</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Esquive PM',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Esquive PM')">
                    <img
                            src="/img/icons/pm_recession.png"
                            alt="pm_recession image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Esquive PM</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Soins',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Soins')">
                    <img
                            src="/img/icons/health.png"
                            alt="health image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Soins</span>
                </div>


                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Tacle',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Tacle')">
                    <img
                            src="/img/icons/tackle.png"
                            alt="tackle image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Tacle</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Fuite',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Fuite')">
                    <img
                            src="/img/icons/leak.png"
                            alt="leak image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Fuite</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Initiative',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Initiative')">
                    <img
                            src="/img/icons/initiative.png"
                            alt="initiative image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Initiative</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Invocation',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Invocation')">
                    <img
                            src="/img/icons/invocation.png"
                            alt="invocation image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Invocation</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Prospection',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Prospection')">
                    <img
                            src="/img/icons/prospection.png"
                            alt="prospection image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Prospection</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Pods',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Pods')">
                    <img
                            src="/img/icons/pods.png"
                            alt="pods image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Pods</span>
                </div>
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

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages')">
                    <img
                            src="/img/icons/do.png"
                            alt="do image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Critiques',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Critiques')">
                    <img
                            src="/img/icons/do_critique.png"
                            alt="do_critique image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Critiques</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Renvoie dommages',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Renvoie dommages')">
                    <img
                            src="/img/icons/return_attack.png"
                            alt="return_attack image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Renvoie dommages</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Pièges',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Pièges')">
                    <img
                            src="/img/icons/do_tricks.png"
                            alt="do_tricks image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Pièges</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Puissance (pièges)',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Puissance (pièges)')">
                    <img
                            src="/img/icons/trick_power.png"
                            alt="trick_power image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Puissance (pièges)</span>
                </div>

                <div></div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Neutre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Neutre')">
                    <img
                            src="/img/icons/do_neutral.png"
                            alt="do_neutral image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Neutre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Terre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Terre')">
                    <img
                            src="/img/icons/do_earth.png"
                            alt="do_earth image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Terre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Feu',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Feu')">
                    <img
                            src="/img/icons/do_fire.png"
                            alt="do_fire image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Feu</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Eau',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Eau')">
                    <img
                            src="/img/icons/do_water.png"
                            alt="do_water image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Eau</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Air',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Air')">
                    <img
                            src="/img/icons/do_air.png"
                            alt="do_air image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Air</span>
                </div>


                <div></div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Dommages aux sorts',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Dommages aux sorts')">
                    <img
                            src="/img/icons/do_spell.png"
                            alt="do_spell image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Dommages sorts</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Dommages d\'armes',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Dommages d\'armes')">
                    <img
                            src="/img/icons/do_weapon.png"
                            alt="do_weapon image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Dommages d'armes</span>
                </div>

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Dommages Poussée',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Dommages Poussée')">
                    <img
                            src="/img/icons/do_push.png"
                            alt="do_push image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Dommages Poussée</span>
                </div>

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Dommages distance',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Dommages distance')">
                    <img
                            src="/img/icons/do_distance.png"
                            alt="do_distance image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Dommages distance</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Dommages mêlée',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Dommages mêlée')">
                    <img
                            src="/img/icons/do_melee.png"
                            alt="do_melee image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Dommages mêlée</span>
                </div>

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

                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Neutre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Neutre')">
                    <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Neutre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances Neutre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances Neutre')">
                    <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances Neutre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Terre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Terre')">
                    <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Terre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances Terre',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances Terre')">
                    <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances Terre</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Feu',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Feu')">
                    <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Feu</span>
                </div>

                <div></div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Eau',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Eau')">
                    <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Eau</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances Eau',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances Eau')">
                    <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances Eau</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Air',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Air')">
                    <img
                            src="/img/icons/air_res.png"
                            alt="air_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Air</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances Air',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances Air')">
                    <img
                            src="/img/icons/air_res.png"
                            alt="air_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances Air</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances Feu',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances Feu')">
                    <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances Feu</span>
                </div>


                <div></div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Critiques',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Critiques')">
                    <img
                            src="/img/icons/critique_res.png"
                            alt="critique_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Critiques</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('Résistances Poussée',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('Résistances Poussée')">
                    <img
                            src="/img/icons/push_res.png"
                            alt="push_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>Résistances Poussée</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances aux armes',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances aux armes')">
                    <img
                            src="/img/icons/weapon_res.png"
                            alt="weapon_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances aux armes</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances distance',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances distance')">
                    <img
                            src="/img/icons/distance_res.png"
                            alt="distance_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances distance</span>
                </div>
                <div class="flex bg-gray-700 text-white rounded-lg items-center justify-center py-1 cursor-pointer
                {{in_array('% Résistances mêlée',$characteristicsFilters)?'bg-indigo-500':''}}"
                     wire:click="updateCharacteristicsFilters('% Résistances mêlée')">
                    <img
                            src="/img/icons/melee_res.png"
                            alt="melee_res image"
                            width="24"
                            height="24"
                            class="mr-2 h-fit self-center">
                    <span>% Résistances mêlée</span>
                </div>

            </div>
        @endif
    </div>
</header>
