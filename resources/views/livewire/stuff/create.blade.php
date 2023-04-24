<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-2 flex justify-between items-center">

        <div>
            <input type="text" name="title" wire:change="updateTitle($event.target.value)"
                   wire:model.defer="stuff_title"
                   class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent mr-2"
                   placeholder="Nom de l'équipement"
            >

            <input type="text" name="character_level" wire:change="updateLevel($event.target.value)"
                   wire:model.defer="character_level"
                   class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center font-semibold"
                   size="5" placeholder="niveau"
            >

        </div>
        <div>
            <button class="rounded-lg text-white bg-[#d9534f] p-1 mx-2"
                    wire:click="$emit('openModal', 'delete-stuff-modal',{{ json_encode(["stuff_id" => $stuff_id]) }})">
                Supprimer
            </button>
            <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2"
                    wire:click="$emit('openModal', 'create-stuff-modal',{{ json_encode([
    "character_level" => $character_level,
    "stuff_title" => $stuff_title,
    "stuff_id" => $stuff_id,
    "selectedClass" => $class_id,
    "gender" => $character_gender,
    "is_private_stuff" => $is_private_stuff,
    "is_updating_stuff" => true
    ]) }})">
                Modifier
            </button>
        </div>
    </div>
    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-5 pl-5 pr-20">
        <div class="flex">
            <div class="flex-1">
                <div class="flex w-full">
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_vitality}} </span> <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> PdV</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_prospection}} </span> <img
                                    src="/img/icons/prospection.png"
                                    alt="prospection image"
                                    class="ml-2"
                                    width="28px">
                            <span> PP</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_pa}} </span> <img src="/img/icons/pa.png"
                                                                                     alt="pa image"
                                                                                     class="ml-2"
                                                                                     width="28px">
                            <span class="w-5"> PA</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPa({{$is_exo_pa===0?1:0}})">+ {{$is_exo_pa}}</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_pm}} </span> <img src="/img/icons/pm.png"
                                                                                     alt="pm image"
                                                                                     class="ml-2"
                                                                                     width="28px">
                            <span class="w-5"> PM</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPm({{$is_exo_pm===0?1:0}})">+ {{$is_exo_pm}}</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_po}} </span> <img src="/img/icons/po.png"
                                                                                     alt="po image"
                                                                                     class="ml-2"
                                                                                     width="28px">
                            <span class="w-5"> PO</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPo({{$is_exo_po===0?1:0}})">+ {{$is_exo_po}}</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_initiative}} </span> <img
                                    src="/img/icons/initiative.png"
                                    alt="initiative image"
                                    class="ml-2"
                                    width="28px">

                            <span> Initiative</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_critique}} </span> <img
                                    src="/img/icons/critic.png"
                                    alt="critic image"
                                    class="ml-2"
                                    width="28px">
                            <span> Critique</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_invocation}} </span> <img
                                    src="/img/icons/invocation.png"
                                    alt="invocation image"
                                    class="ml-2"
                                    width="28px">
                            <span> Invocation</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_soin}} </span> <img
                                    src="/img/icons/health.png"
                                    alt="health image"
                                    class="ml-2"
                                    width="28px">
                            <span> Soin</span>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="flex w-full">
                    <div class="flex-1" style="padding-top: 28px">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_vitality}} </span> <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> Vitalité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_wisdom}} </span> <img
                                    src="/img/icons/wisdom.png"
                                    alt="wisdom image"
                                    class="ml-2"
                                    width="28px">
                            <span> Sagesse</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_strength}} </span> <img
                                    src="/img/icons/strength.png"
                                    alt="strength image"
                                    class="ml-2"
                                    width="28px">

                            <span> Force</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_intel}} </span> <img
                                    src="/img/icons/intel.png"
                                    alt="intel image"
                                    class="ml-2"
                                    width="28px">
                            <span> Intelligence</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_luck}} </span> <img
                                    src="/img/icons/luck.png"
                                    alt="luck image"
                                    class="ml-2"
                                    width="28px">

                            <span> Chance</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_agility}} </span> <img
                                    src="/img/icons/agility.png"
                                    alt="agility image"
                                    class="ml-2"
                                    width="28px">
                            <span> Agilité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$subtotal_power}} </span> <img
                                    src="/img/icons/power.png"
                                    alt="power image"
                                    class="ml-2"
                                    width="28px">
                            <span> Puissance</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center justify-center">
                            <div class="flex flex-col mr-5 text-center justify-center">
                                <span>Base</span>
                                <input type="text" name="vitality_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_vitality}}"
                                       wire:change="updateBoostVitality($event.target.value)"
                                       wire:model.defer="boost_vitality">
                                <input type="text" name="wisdom_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_wisdom}}" wire:change="updateBoostWisdom($event.target.value)"
                                       wire:model.defer="boost_wisdom">
                                <input type="text" name="strength_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_strength}}"
                                       wire:change="updateBoostStrength($event.target.value)"
                                       wire:model.defer="boost_strength">
                                <input type="text" name="intel_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_intel}}" wire:change="updateBoostIntel($event.target.value)"
                                       wire:model.defer="boost_intel">
                                <input type="text" name="luck_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_luck}}" wire:change="updateBoostLuck($event.target.value)"
                                       wire:model.defer="boost_luck">
                                <input type="text" name="agility_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$boost_agility}}" wire:change="updateBoostAgility($event.target.value)"
                                       wire:model.defer="boost_agility">
                                <span>{{$boost_available}}</span>
                            </div>
                            <div class="flex flex-col ml-5 text-center justify-center">
                                <span>Parcho</span>
                                <input type="text" name="vitality_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_vitality}}"
                                       wire:change="updateParchmentVitality($event.target.value)"
                                       wire:model.defer="parchment_vitality">
                                <input type="text" name="wisdom_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_wisdom}}"
                                       wire:change="updateParchmentWisdom($event.target.value)"
                                       wire:model.defer="parchment_wisdom">
                                <input type="text" name="strength_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_strength}}"
                                       wire:change="updateParchmentStrength($event.target.value)"
                                       wire:model.defer="parchment_strength">
                                <input type="text" name="intel_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_intel}}"
                                       wire:change="updateParchmentIntel($event.target.value)"
                                       wire:model.defer="parchment_intel">
                                <input type="text" name="luck_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_luck}}"
                                       wire:change="updateParchmentLuck($event.target.value)"
                                       wire:model.defer="parchment_luck">
                                <input type="text" name="agility_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$parchment_agility}}"
                                       wire:change="updateParchmentAgility($event.target.value)"
                                       wire:model.defer="parchment_agility">
                                <div>
                                    <span class="dark:bg-gray-700 px-1 sm:rounded-lg cursor-pointer"
                                          wire:click="updateParchmentsToZero()">0</span>
                                    <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer"
                                          wire:click="updateParchmentsToHundred()">100</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="flex w-full">
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$leak}} </span> <img src="/img/icons/leak.png"
                                                                                 alt="leak image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                            <span> Fuite</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$avoid_pa}} </span> <img
                                    src="/img/icons/avoid_pa.png"
                                    alt="avoid_pa image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$avoid_pm}} </span> <img
                                    src="/img/icons/avoid_pm.png"
                                    alt="avoid_pm image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$pods}} </span> <img src="/img/icons/pods.png"
                                                                                 alt="pods image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                            <span> Pods</span>

                        </div>

                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$tackle}} </span> <img src="/img/icons/tackle.png"
                                                                                   alt="tackle image"
                                                                                   class="ml-2"
                                                                                   width="28px">

                            <span> Tacle</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$pa_recession}} </span> <img
                                    src="/img/icons/pa_recession.png"
                                    alt="pa_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$pm_recession}} </span> <img
                                    src="/img/icons/pm_recession.png"
                                    alt="pm_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff_level}} </span> <img
                                    src="/img/icons/stuff_lvl.png"
                                    alt="stuff_lvl image"
                                    class="ml-2"
                                    width="28px">
                            <span> Niv. Stuff</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="flex-1">
                <div class="flex justify-center">
                    <div>



                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Amulette',{{$character_level}})">
                            @if(is_null($stuffDetail['amulet']))
                                <img
                                        src="/img/stuff/amulet.png"
                                        alt="amulet image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['amulet']['image_urls']['hd']}}"
                                        alt="amulet image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Bouclier',{{$character_level}})">
                            @if(is_null($stuffDetail['shield']))
                                <img
                                        src="/img/stuff/shield.png"
                                        alt="shield image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['shield']['image_urls']['hd']}}"
                                        alt="shield image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Anneau',{{$character_level}})">
                            @if(is_null($stuffDetail['ring_1']))
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['ring_1']['image_urls']['hd']}}"
                                        alt="ring 1 image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Ceinture',{{$character_level}})">
                            @if(is_null($stuffDetail['belt']))
                                <img
                                        src="/img/stuff/belt.png"
                                        alt="belt image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['belt']['image_urls']['hd']}}"
                                        alt="belt image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Bottes',{{$character_level}})">
                            @if(is_null($stuffDetail['boots']))
                                <img
                                        src="/img/stuff/boots.png"
                                        alt="boots image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['boots']['image_urls']['hd']}}"
                                        alt="boots image"
                                        width="60px"
                                >
                            @endif
                        </div>
                    </div>
                    <img src="/img/character/{{$class_slug}}-{{$character_gender}}.png"
                         class="character-img"
                         alt="character image">
                    <div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Chapeau',{{$character_level}})">
                            @if(is_null($stuffDetail['hat']))
                                <img
                                        src="/img/stuff/hat.png"
                                        alt="hat image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['hat']['image_urls']['hd']}}"
                                        alt="hat image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Arc',{{$character_level}})">
                            @if(is_null($stuffDetail['weapon']))
                                <img
                                        src="/img/stuff/weapon.png"
                                        alt="weapon image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['weapon']['image_urls']['hd']}}"
                                        alt="weapon image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Anneau',{{$character_level}})">
                            @if(is_null($stuffDetail['ring_2']))
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['ring_2']['image_urls']['hd']}}"
                                        alt="ring 2 image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('items/equipment','Cape',{{$character_level}})">
                            @if(is_null($stuffDetail['cape']))
                                <img
                                        src="/img/stuff/cape.png"
                                        alt="cape image"
                                        width="60px"
                                        class="stuff-base-img">
                            @else
                                <img
                                        src="{{$stuffDetail['cape']['image_urls']['hd']}}"
                                        alt="cape image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer"
                             wire:click="openEncyclopediaWithFilters('mounts','Dragodinde',{{$character_level}})">
                            @if(!is_null($stuffDetail['animal']))
                                <img
                                        src="{{$stuffDetail['animal']['image_urls']['hd']}}"
                                        alt="animal image"
                                        width="60px"
                                >
                            @elseif(!is_null($stuffDetail['mount']))
                                <img
                                        src="{{$stuffDetail['mount']['image_urls']['hd']}}"
                                        alt="mount image"
                                        width="60px"
                                >
                            @else
                                <img
                                        src="/img/stuff/animal.png"
                                        alt="animal image"
                                        width="60px"
                                        class="stuff-base-img">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_1']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_1']['image_urls']['hd']}}"
                                    alt="dofus 1 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mx-4 p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_2']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_2']['image_urls']['hd']}}"
                                    alt="dofus 2 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_3']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_3']['image_urls']['hd']}}"
                                    alt="dofus 3 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-4 p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_4']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_4']['image_urls']['hd']}}"
                                    alt="dofus 4 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mx-4 p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_5']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_5']['image_urls']['hd']}}"
                                    alt="dofus 5 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                    <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg  p-1 cursor-pointer"
                         wire:click="openEncyclopediaWithFilters('items/equipment','Dofus',{{$character_level}})">
                        @if(is_null($stuffDetail['dofus_6']))
                            <img
                                    src="/img/stuff/dofus.png"
                                    alt="dofus image"
                                    width="60px"
                                    class="stuff-base-img">
                        @else
                            <img
                                    src="{{$stuffDetail['dofus_6']['image_urls']['hd']}}"
                                    alt="dofus 6 image"
                                    width="60px"
                            >
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="flex">
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_neutral}} </span> <img src="/img/icons/do_neutral.png"
                                                                               alt="do_neutral image"
                                                                               class="ml-2"
                                                                               width="28px">

                    <span> Do Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_earth}} </span> <img src="/img/icons/do_earth.png"
                                                                             alt="do_earth image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> Do Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_fire}} </span> <img src="/img/icons/do_fire.png"
                                                                            alt="do_fire image"
                                                                            class="ml-2"
                                                                            width="28px">
                    <span> Do Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_water}} </span> <img src="/img/icons/do_water.png"
                                                                             alt="do_water image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> Do Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_air}} </span> <img src="/img/icons/do_air.png"
                                                                           alt="do_air image"
                                                                           class="ml-2"
                                                                           width="28px">
                    <span> Do Air</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_critique}} </span> <img src="/img/icons/do_critique.png"
                                                                                alt="do_critique image"
                                                                                class="ml-2"
                                                                                width="28px">

                    <span> Do Critique</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_push}} </span> <img src="/img/icons/do_push.png"
                                                                            alt="do_push image"
                                                                            class="ml-2"
                                                                            width="28px">
                    <span> Do Poussée</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_weapon}} </span> <img src="/img/icons/do_weapon.png"
                                                                              alt="do_weapon image"
                                                                              class="ml-2"
                                                                              width="28px">
                    <span> % Do Armes</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_spell}} </span> <img src="/img/icons/do_spell.png"
                                                                             alt="do_spell image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> % Do Sorts</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_melee}} </span> <img src="/img/icons/do_melee.png"
                                                                             alt="do_melee image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> % Do Mélée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$do_distance}} </span> <img src="/img/icons/do_distance.png"
                                                                                alt="do_distance image"
                                                                                class="ml-2"
                                                                                width="28px">
                    <span> % Do Distance</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$neutral_res}} </span> <img src="/img/icons/neutral_res.png"
                                                                                alt="neutral_res image"
                                                                                class="ml-2"
                                                                                width="28px">

                    <span> Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$earth_res}} </span> <img src="/img/icons/earth_res.png"
                                                                              alt="earth_res image"
                                                                              class="ml-2"
                                                                              width="28px">
                    <span> Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$fire_res}} </span> <img src="/img/icons/fire_res.png"
                                                                             alt="fire_res image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$water_res}} </span> <img src="/img/icons/water_res.png"
                                                                              alt="water_res image"
                                                                              class="ml-2"
                                                                              width="28px">
                    <span> Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$air_res}} </span> <img src="/img/icons/air_res.png"
                                                                            alt="air_res image"
                                                                            class="ml-2"
                                                                            width="28px">
                    <span> Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$critique_res}} </span> <img
                            src="/img/icons/critique_res.png"
                            alt="critique_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Critique</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$melee_res}} </span> <img src="/img/icons/melee_res.png"
                                                                              alt="melee_res image"
                                                                              class="ml-2"
                                                                              width="28px">
                    <span> % Ré Mélée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$weapon_res}} </span> <img src="/img/icons/weapon_res.png"
                                                                               alt="weapon_res image"
                                                                               class="ml-2"
                                                                               width="28px">
                    <span> % Ré Armes</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_neutral_res}} </span> <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> % Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_earth_res}} </span> <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_fire_res}} </span> <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_water_res}} </span> <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_air_res}} </span> <img src="/img/icons/air_res.png"
                                                                                    alt="air_res image"
                                                                                    class="ml-2"
                                                                                    width="28px">
                    <span> % Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$push_res}} </span> <img src="/img/icons/push_res.png"
                                                                             alt="push_res image"
                                                                             class="ml-2"
                                                                             width="28px">
                    <span> Ré Poussée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$distance_res}} </span> <img
                            src="/img/icons/distance_res.png"
                            alt="distance_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Dist</span>

                </div>

            </div>
        </div>
    </div>
</div>

