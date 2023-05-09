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
                            <span class="w-10 text-right">{{$total_vitality>=0?$total_vitality:0}} </span> <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> PdV</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_prospection>=0?$total_prospection:0}} </span> <img
                                    src="/img/icons/prospection.png"
                                    alt="prospection image"
                                    class="ml-2"
                                    width="28px">
                            <span> PP</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($total_pa>=0)?($total_pa<=12?$total_pa:12):0}} </span> <img
                                    src="/img/icons/pa.png"
                                    alt="pa image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PA</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPa({{$is_exo_pa===0?1:0}})">+ {{$is_exo_pa}}</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($total_pm>=0)?($total_pm<=6?$total_pm:6):0}} </span> <img
                                    src="/img/icons/pm.png"
                                    alt="pm image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PM</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPm({{$is_exo_pm===0?1:0}})">+ {{$is_exo_pm}}</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($total_po>=0)?($total_po<=6?$total_po:6):0}} </span> <img
                                    src="/img/icons/po.png"
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
                            <span class="w-10 text-right">{{$total_initiative>=0?$total_initiative:0}} </span> <img
                                    src="/img/icons/initiative.png"
                                    alt="initiative image"
                                    class="ml-2"
                                    width="28px">

                            <span> Initiative</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_critique>=0?$total_critique:0}} </span> <img
                                    src="/img/icons/critic.png"
                                    alt="critic image"
                                    class="ml-2"
                                    width="28px">
                            <span> Critique</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_invocation>=0?$total_invocation:0}} </span> <img
                                    src="/img/icons/invocation.png"
                                    alt="invocation image"
                                    class="ml-2"
                                    width="28px">
                            <span> Invocation</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$total_health>=0?$total_health:0}} </span> <img
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
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-amulet"
                                data-popover-placement="right"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Amulette',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['amulet']))
                                    <img
                                            src="/img/stuff/amulet.png"
                                            alt="amulet image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['amulet']->image}}"
                                            alt="amulet image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-amulet" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['amulet']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['amulet']->name}}</p>
                                    <p>{{$stuffDetail['amulet']->type->name}} - Niveau
                                        {{$stuffDetail['amulet']->level}}</p>
                                    @if(is_null($stuffDetail['amulet']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['amulet']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['amulet']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('amulet')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter une amulette

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-shield"
                                data-popover-placement="right"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Bouclier',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['shield']))
                                    <img
                                            src="/img/stuff/shield.png"
                                            alt="shield image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['shield']->image}}"
                                            alt="shield image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-shield" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['shield']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['shield']->name}}</p>
                                    <p>{{$stuffDetail['shield']->type->name}} - Niveau
                                        {{$stuffDetail['shield']->level}}</p>
                                    @if(is_null($stuffDetail['shield']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['shield']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['shield']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('shield')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter un bouclier

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-ring-1"
                                data-popover-placement="right"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Anneau',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['ring_1']))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['ring_1']->image}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-1" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['ring_1']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['ring_1']->name}}</p>
                                    <p>{{$stuffDetail['ring_1']->type->name}} - Niveau
                                        {{$stuffDetail['ring_1']->level}}</p>
                                    @if(is_null($stuffDetail['ring_1']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['ring_1']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['ring_1']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('ring_1')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter un anneau

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>

                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-belt"
                                data-popover-placement="right"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Ceinture',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['belt']))
                                    <img
                                            src="/img/stuff/belt.png"
                                            alt="belt image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['belt']->image}}"
                                            alt="belt image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-belt" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['belt']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['belt']->name}}</p>
                                    <p>{{$stuffDetail['belt']->type->name}} - Niveau
                                        {{$stuffDetail['belt']->level}}</p>
                                    @if(is_null($stuffDetail['belt']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['belt']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['belt']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('belt')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter une ceinture

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-boots"
                                data-popover-placement="right"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Bottes',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['boots']))
                                    <img
                                            src="/img/stuff/boots.png"
                                            alt="boots image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['boots']->image}}"
                                            alt="boots image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-boots" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['boots']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['boots']->name}}</p>
                                    <p>{{$stuffDetail['boots']->type->name}} - Niveau
                                        {{$stuffDetail['boots']->level}}</p>
                                    @if(is_null($stuffDetail['boots']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['boots']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['boots']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('boots')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter des bottes

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                    </div>
                    <img src="/img/character/{{$class_slug}}-{{$character_gender}}.png"
                         class="character-img"
                         alt="character image">
                    <div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-hat"
                                data-popover-placement="left"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Chapeau',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['hat']))
                                    <img
                                            src="/img/stuff/hat.png"
                                            alt="hat image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['hat']->image}}"
                                            alt="hat image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-hat" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['hat']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['hat']->name}}</p>
                                    <p>{{$stuffDetail['hat']->type->name}} - Niveau
                                        {{$stuffDetail['hat']->level}}</p>
                                    @if(is_null($stuffDetail['hat']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['hat']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['hat']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('hat')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter un chapeau

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-weapon"
                                data-popover-placement="left"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Arc',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['weapon']))
                                    <img
                                            src="/img/stuff/weapon.png"
                                            alt="weapon image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['weapon']->image}}"
                                            alt="weapon image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-weapon" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['weapon']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['weapon']->name}}</p>
                                    <p>{{$stuffDetail['weapon']->type->name}} - Niveau
                                        {{$stuffDetail['weapon']->level}}</p>
                                    @if(is_null($stuffDetail['weapon']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['weapon']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['weapon']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('weapon')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter une arme

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-ring-2"
                                data-popover-placement="left"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Anneau',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['ring_2']))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['ring_2']->image}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-2" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['ring_2']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['ring_2']->name}}</p>
                                    <p>{{$stuffDetail['ring_2']->type->name}} - Niveau
                                        {{$stuffDetail['ring_2']->level}}</p>
                                    @if(is_null($stuffDetail['ring_2']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['ring_2']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['ring_2']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('ring_2')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter un anneau

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>

                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-cape"
                                data-popover-placement="left"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Cape',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['cape']))
                                    <img
                                            src="/img/stuff/cape.png"
                                            alt="cape image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['cape']->image}}"
                                            alt="cape image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-cape" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['cape']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['cape']->name}}</p>
                                    <p>{{$stuffDetail['cape']->type->name}} - Niveau
                                        {{$stuffDetail['cape']->level}}</p>
                                    @if(is_null($stuffDetail['cape']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['cape']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['cape']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('cape')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter une cape

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-animal"
                                data-popover-placement="left"
                        >
                            <div wire:click="openEncyclopediaWithFilters('Familier',{{$character_level}})"
                            >
                                @if(is_null($stuffDetail['animal']))
                                    <img
                                            src="/img/stuff/animal.png"
                                            alt="animal image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$stuffDetail['animal']->image}}"
                                            alt="animal image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-animal" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($stuffDetail['animal']))
                                    <p class="text-xl font-semibold">{{$stuffDetail['animal']->name}}</p>
                                    <p>{{$stuffDetail['animal']->type->name}} - Niveau
                                        {{$stuffDetail['animal']->level}}</p>
                                    @if(is_null($stuffDetail['animal']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['animal']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($stuffDetail['animal']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex items-center justify-center pb-4 mt-4">
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('animal')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
                                @else
                                    Ajouter un familier ou une monture

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">

                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-1"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_1']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_1']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-1" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_1']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_1']->name}}</p>
                                <p>{{$stuffDetail['dofus_1']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_1']->level}}</p>
                                @if(is_null($stuffDetail['dofus_1']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_1']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_1']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_1')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

                    </div>
                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-3 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-2"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_2']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_2']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-2" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_2']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_2']->name}}</p>
                                <p>{{$stuffDetail['dofus_2']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_2']->level}}</p>
                                @if(is_null($stuffDetail['dofus_2']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_2']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_2']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_2')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

                    </div>
                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-3 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-3"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_3']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_3']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-3" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_3']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_3']->name}}</p>
                                <p>{{$stuffDetail['dofus_3']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_3']->level}}</p>
                                @if(is_null($stuffDetail['dofus_3']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_3']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_3']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_3')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

                    </div>
                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-3 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-4"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_4']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_4']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-4" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_4']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_4']->name}}</p>
                                <p>{{$stuffDetail['dofus_4']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_4']->level}}</p>
                                @if(is_null($stuffDetail['dofus_4']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_4']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_4']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_4')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

                    </div>
                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-3 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-5"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_5']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_5']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-5" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_5']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_5']->name}}</p>
                                <p>{{$stuffDetail['dofus_5']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_5']->level}}</p>
                                @if(is_null($stuffDetail['dofus_5']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_5']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_5']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_5')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

                    </div>
                    <div
                            class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-3 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                            data-popover-target="popover-dofus-6"
                            data-popover-placement="top"
                    >
                        <div wire:click="openEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($stuffDetail['dofus_6']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$stuffDetail['dofus_6']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-6" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($stuffDetail['dofus_6']))
                                <p class="text-xl font-semibold">{{$stuffDetail['dofus_6']->name}}</p>
                                <p>{{$stuffDetail['dofus_6']->type->name}} - Niveau
                                    {{$stuffDetail['dofus_6']->level}}</p>
                                @if(is_null($stuffDetail['dofus_6']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400">{{$stuffDetail['dofus_6']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($stuffDetail['dofus_6']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{substr($itemEffects->formatted_name,0,1)=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex items-center justify-center pb-4 mt-4">
                                    <button
                                            class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                            wire:click="deleteItemToStuff('dofus_6')"
                                    >
                                        <x-heroicon-m-trash
                                                class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                    </button>
                                </div>
                            @else
                                Ajouter un dofus ou un trophée

                            @endif
                            <div class="tooltip-arrow" data-popper-arrow></div>

                        </div>

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
                    <span class="w-10 text-right">{{$percent_neutral_res>=-50?($percent_neutral_res<=50?$percent_neutral_res:50):-50}} </span> <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> % Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_earth_res>=-50?($percent_earth_res<=50?$percent_earth_res:50):-50}} </span> <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_fire_res>=-50?($percent_fire_res<=50?$percent_fire_res:50):-50}} </span> <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_water_res>=-50?($percent_water_res<=50?$percent_water_res:50):-50}} </span> <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$percent_air_res>=-50?($percent_air_res<=50?$percent_air_res:50):-50}} </span> <img src="/img/icons/air_res.png"
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

