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
            <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2 px-2"
                    wire:click="goToSpellsPage()">
                Sorts
            </button>
            <button class="rounded-lg text-white bg-[#d9534f] p-1 mx-2 px-2"
                    wire:click="$emit('openModal', 'delete-stuff-modal',{{ json_encode(["stuff_id" => $createVariable->stuff_id]) }})">
                Supprimer
            </button>
            <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2 px-2"
                    wire:click="$emit('openModal', 'create-stuff-modal',{{ json_encode([
                        "character_level" => $character_level,
                        "stuff_title" => $stuff_title,
                        "stuff_id" => $createVariable->stuff_id,
                        "selectedClass" => $createVariable->class_id,
                        "gender" => $createVariable->character_gender,
                        "is_private_stuff" => $createVariable->is_private_stuff,
                        "is_updating_stuff" => true
                        ]) }})">
                Modifier
            </button>
        </div>
    </div>
    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-5 px-7">
        <div class="flex">
            <div class="flex-1">
                <div class="flex w-full">
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->total_vitality>=0?$createVariable->total_vitality:0}} </span>
                            <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> PdV</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->total_prospection>=0?$createVariable->total_prospection:0}} </span>
                            <img
                                    src="/img/icons/prospection.png"
                                    alt="prospection image"
                                    class="ml-2"
                                    width="28px">
                            <span> PP</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($createVariable->total_pa>=0)?($createVariable->total_pa<=12?$createVariable->total_pa:12):0}} </span>
                            <img
                                    src="/img/icons/pa.png"
                                    alt="pa image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PA</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPa({{$createVariable->is_exo_pa===0?1:0}})">+ {{$createVariable->is_exo_pa}}</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($createVariable->total_pm>=0)?($createVariable->total_pm<=6?$createVariable->total_pm:6):0}} </span>
                            <img
                                    src="/img/icons/pm.png"
                                    alt="pm image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PM</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPm({{$createVariable->is_exo_pm===0?1:0}})">+ {{$createVariable->is_exo_pm}}</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{($createVariable->total_po>=0)?($createVariable->total_po<=6?$createVariable->total_po:6):0}} </span>
                            <img
                                    src="/img/icons/po.png"
                                    alt="po image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PO</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPo({{$createVariable->is_exo_po===0?1:0}})">+ {{$createVariable->is_exo_po}}</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->total_initiative>=0?$createVariable->total_initiative:0}} </span>
                            <img
                                    src="/img/icons/initiative.png"
                                    alt="initiative image"
                                    class="ml-2"
                                    width="28px">

                            <span> Initiative</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->stuff_critic>=0?$createVariable->stuff_critic:0}} </span>
                            <img
                                    src="/img/icons/critic.png"
                                    alt="critic image"
                                    class="ml-2"
                                    width="28px">
                            <span> Critique</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->stuff_invocation>=0?$createVariable->stuff_invocation:0}} </span>
                            <img
                                    src="/img/icons/invocation.png"
                                    alt="invocation image"
                                    class="ml-2"
                                    width="28px">
                            <span> Invocation</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->stuff_health>=0?$createVariable->stuff_health:0}} </span>
                            <img
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
                            <span class="w-10 text-right">{{$createVariable->subtotal_vitality}} </span> <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> Vitalité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->subtotal_wisdom}} </span> <img
                                    src="/img/icons/wisdom.png"
                                    alt="wisdom image"
                                    class="ml-2"
                                    width="28px">
                            <span> Sagesse</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->subtotal_strength}} </span> <img
                                    src="/img/icons/strength.png"
                                    alt="strength image"
                                    class="ml-2"
                                    width="28px">

                            <span> Force</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->subtotal_intel}} </span> <img
                                    src="/img/icons/intel.png"
                                    alt="intel image"
                                    class="ml-2"
                                    width="28px">
                            <span> Intelligence</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->subtotal_luck}} </span> <img
                                    src="/img/icons/luck.png"
                                    alt="luck image"
                                    class="ml-2"
                                    width="28px">

                            <span> Chance</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->subtotal_agility}} </span> <img
                                    src="/img/icons/agility.png"
                                    alt="agility image"
                                    class="ml-2"
                                    width="28px">
                            <span> Agilité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->stuff_power}} </span> <img
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
                            <span class="w-10 text-right">{{$createVariable->leak}} </span> <img
                                    src="/img/icons/leak.png"
                                    alt="leak image"
                                    class="ml-2"
                                    width="28px">

                            <span> Fuite</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->avoid_pa}} </span> <img
                                    src="/img/icons/avoid_pa.png"
                                    alt="avoid_pa image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->avoid_pm}} </span> <img
                                    src="/img/icons/avoid_pm.png"
                                    alt="avoid_pm image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->pods}} </span> <img
                                    src="/img/icons/pods.png"
                                    alt="pods image"
                                    class="ml-2"
                                    width="28px">
                            <span> Pods</span>

                        </div>

                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->tackle}} </span> <img
                                    src="/img/icons/tackle.png"
                                    alt="tackle image"
                                    class="ml-2"
                                    width="28px">

                            <span> Tacle</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->pa_recession}} </span> <img
                                    src="/img/icons/pa_recession.png"
                                    alt="pa_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->pm_recession}} </span> <img
                                    src="/img/icons/pm_recession.png"
                                    alt="pm_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$createVariable->stuff_level}} </span> <img
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Amulette',{{$character_level}})"
                            >

                                @if(is_null($createVariable->stuffDetail['amulet']))
                                    <img
                                            src="/img/stuff/amulet.png"
                                            alt="amulet image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['amulet']->image}}"
                                            alt="amulet image"
                                            width="60px"
                                    >
                                @endif

                            </div>
                            <div id="popover-amulet" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['amulet']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['amulet']->name}}</p>
                                    <p>Amulette - Niveau
                                        {{$createVariable->stuffDetail['amulet']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['amulet']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['amulet']->set->name}}')">{{$createVariable->stuffDetail['amulet']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['amulet']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr($itemEffects->formatted_name,0,1))=='-'?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['amulet']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['amulet']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Bouclier',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['shield']))
                                    <img
                                            src="/img/stuff/shield.png"
                                            alt="shield image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['shield']->image}}"
                                            alt="shield image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-shield" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['shield']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['shield']->name}}</p>
                                    <p>Bouclier - Niveau
                                        {{$createVariable->stuffDetail['shield']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['shield']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['shield']->set->name}}')">{{$createVariable->stuffDetail['shield']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['shield']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['shield']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['shield']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Anneau',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['ring_1']))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['ring_1']->image}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-1" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['ring_1']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['ring_1']->name}}</p>
                                    <p>Anneau - Niveau
                                        {{$createVariable->stuffDetail['ring_1']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['ring_1']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['ring_1']->set->name}}')">{{$createVariable->stuffDetail['ring_1']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['ring_1']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['ring_1']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['ring_1']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Ceinture',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['belt']))
                                    <img
                                            src="/img/stuff/belt.png"
                                            alt="belt image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['belt']->image}}"
                                            alt="belt image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-belt" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['belt']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['belt']->name}}</p>
                                    <p>Ceinture - Niveau
                                        {{$createVariable->stuffDetail['belt']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['belt']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['belt']->set->name}}')">{{$createVariable->stuffDetail['belt']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['belt']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['belt']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['belt']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Bottes',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['boots']))
                                    <img
                                            src="/img/stuff/boots.png"
                                            alt="boots image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['boots']->image}}"
                                            alt="boots image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-boots" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['boots']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['boots']->name}}</p>
                                    <p>Bottes - Niveau
                                        {{$createVariable->stuffDetail['boots']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['boots']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['boots']->set->name}}')">{{$createVariable->stuffDetail['boots']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['boots']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['boots']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['boots']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                    <img src="/img/character/{{$createVariable->class_slug}}-{{$createVariable->character_gender}}.png"
                         class="character-img"
                         alt="character image">
                    <div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-hat"
                                data-popover-placement="left"
                        >
                            <div wire:click="openItemsEncyclopediaWithFilters('Chapeau',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['hat']))
                                    <img
                                            src="/img/stuff/hat.png"
                                            alt="hat image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['hat']->image}}"
                                            alt="hat image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-hat" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['hat']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['hat']->name}}</p>
                                    <p>Chapeau - Niveau
                                        {{$createVariable->stuffDetail['hat']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['hat']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['hat']->set->name}}')">{{$createVariable->stuffDetail['hat']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['hat']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['hat']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['hat']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Arc',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['weapon']))
                                    <img
                                            src="/img/stuff/weapon.png"
                                            alt="weapon image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['weapon']->image}}"
                                            alt="weapon image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-weapon" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['weapon']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['weapon']->name}}</p>
                                    <p>{{$createVariable->stuffDetail['weapon']->type->name}} - Niveau
                                        {{$createVariable->stuffDetail['weapon']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['weapon']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['weapon']->set->name}}')">{{$createVariable->stuffDetail['weapon']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['weapon']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['weapon']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['weapon']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Anneau',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['ring_2']))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['ring_2']->image}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-2" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['ring_2']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['ring_2']->name}}</p>
                                    <p>Anneau - Niveau
                                        {{$createVariable->stuffDetail['ring_2']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['ring_2']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['ring_2']->set->name}}')">{{$createVariable->stuffDetail['ring_2']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['ring_2']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['ring_2']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['ring_2']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Cape',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['cape']))
                                    <img
                                            src="/img/stuff/cape.png"
                                            alt="cape image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['cape']->image}}"
                                            alt="cape image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-cape" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['cape']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['cape']->name}}</p>
                                    <p>Cape - Niveau
                                        {{$createVariable->stuffDetail['cape']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['cape']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['cape']->set->name}}')">{{$createVariable->stuffDetail['cape']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['cape']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['cape']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['cape']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Familier',{{$character_level}})"
                            >
                                @if(is_null($createVariable->stuffDetail['animal']))
                                    <img
                                            src="/img/stuff/animal.png"
                                            alt="animal image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{$createVariable->stuffDetail['animal']->image}}"
                                            alt="animal image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-animal" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null($createVariable->stuffDetail['animal']))
                                    <p class="text-xl font-semibold">{{$createVariable->stuffDetail['animal']->name}}</p>
                                    <p>{{$createVariable->stuffDetail['animal']->type->name}} - Niveau
                                        {{$createVariable->stuffDetail['animal']->level}}</p>
                                    @if(is_null($createVariable->stuffDetail['animal']->set)===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{$createVariable->stuffDetail['animal']->set->name}}')">{{$createVariable->stuffDetail['animal']->set->name}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @foreach($createVariable->stuffDetail['animal']->effects as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{$itemEffects->image}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                        </div>
                                    @endforeach

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count($createVariable->stuffDetail['animal']->conditions)>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach($createVariable->stuffDetail['animal']->conditions as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_1']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_1']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-1" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_1']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_1']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_1']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_1']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_1']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_1']->set->name}}')">{{$createVariable->stuffDetail['dofus_1']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_1']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_1']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_1']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_2']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_2']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-2" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_2']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_2']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_2']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_2']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_2']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_2']->set->name}}')">{{$createVariable->stuffDetail['dofus_2']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_2']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_2']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_2']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_3']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_3']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-3" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_3']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_3']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_3']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_3']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_3']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_3']->set->name}}')">{{$createVariable->stuffDetail['dofus_3']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_3']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_3']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_3']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_4']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_4']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-4" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_4']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_4']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_4']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_4']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_4']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_4']->set->name}}')">{{$createVariable->stuffDetail['dofus_4']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_4']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_4']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_4']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_5']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_5']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-5" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_5']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_5']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_5']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_5']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_5']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_5']->set->name}}')">{{$createVariable->stuffDetail['dofus_5']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_5']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_5']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_5']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$character_level}})"
                        >
                            @if(is_null($createVariable->stuffDetail['dofus_6']))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{$createVariable->stuffDetail['dofus_6']->image}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-6" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null($createVariable->stuffDetail['dofus_6']))
                                <p class="text-xl font-semibold">{{$createVariable->stuffDetail['dofus_6']->name}}</p>
                                <p>{{$createVariable->stuffDetail['dofus_6']->type->name}} - Niveau
                                    {{$createVariable->stuffDetail['dofus_6']->level}}</p>
                                @if(is_null($createVariable->stuffDetail['dofus_6']->set)===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{$createVariable->stuffDetail['dofus_6']->set->name}}')">{{$createVariable->stuffDetail['dofus_6']->set->name}}</p>
                                @endif
                                <div class="separator"></div>
                                @foreach($createVariable->stuffDetail['dofus_6']->effects as $itemEffects)
                                    <div class="flex">
                                        <img
                                                src="{{$itemEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{str_starts_with($itemEffects->formatted_name,'-')?'text-red-600':''}} max-w-xl">{{$itemEffects->formatted_name}}</span>
                                    </div>
                                @endforeach

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count($createVariable->stuffDetail['dofus_6']->conditions)>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach($createVariable->stuffDetail['dofus_6']->conditions as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
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
                    <span class="w-10 text-right">{{$createVariable->stuff_do_neutral}} </span> <img
                            src="/img/icons/do_neutral.png"
                            alt="do_neutral image"
                            class="ml-2"
                            width="28px">

                    <span> Do Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_earth}} </span> <img
                            src="/img/icons/do_earth.png"
                            alt="do_earth image"
                            class="ml-2"
                            width="28px">
                    <span> Do Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_fire}} </span> <img
                            src="/img/icons/do_fire.png"
                            alt="do_fire image"
                            class="ml-2"
                            width="28px">
                    <span> Do Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_water}} </span> <img
                            src="/img/icons/do_water.png"
                            alt="do_water image"
                            class="ml-2"
                            width="28px">
                    <span> Do Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_air}} </span> <img
                            src="/img/icons/do_air.png"
                            alt="do_air image"
                            class="ml-2"
                            width="28px">
                    <span> Do Air</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_critique}} </span> <img
                            src="/img/icons/do_critique.png"
                            alt="do_critique image"
                            class="ml-2"
                            width="28px">

                    <span> Do Critique</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_push}} </span> <img
                            src="/img/icons/do_push.png"
                            alt="do_push image"
                            class="ml-2"
                            width="28px">
                    <span> Do Poussée</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_weapon}} </span> <img
                            src="/img/icons/do_weapon.png"
                            alt="do_weapon image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Armes</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_spell}} </span> <img
                            src="/img/icons/do_spell.png"
                            alt="do_spell image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Sorts</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_melee}} </span> <img
                            src="/img/icons/do_melee.png"
                            alt="do_melee image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Mêlée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_do_distance}} </span> <img
                            src="/img/icons/do_distance.png"
                            alt="do_distance image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Distance</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_neutral_res}} </span> <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_earth_res}} </span> <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_fire_res}} </span> <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_water_res}} </span> <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_air_res}} </span> <img
                            src="/img/icons/air_res.png"
                            alt="air_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_critique_res}} </span> <img
                            src="/img/icons/critique_res.png"
                            alt="critique_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Critique</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_melee_res}} </span> <img
                            src="/img/icons/melee_res.png"
                            alt="melee_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Mêlée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_weapon_res}} </span> <img
                            src="/img/icons/weapon_res.png"
                            alt="weapon_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Armes</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_percent_neutral_res>=-50?($createVariable->stuff_percent_neutral_res<=50?$createVariable->stuff_percent_neutral_res:50):-50}} </span>
                    <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> % Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_percent_earth_res>=-50?($createVariable->stuff_percent_earth_res<=50?$createVariable->stuff_percent_earth_res:50):-50}} </span>
                    <img
                            src="/img/icons/earth_res.png"
                            alt="earth_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_percent_fire_res>=-50?($createVariable->stuff_percent_fire_res<=50?$createVariable->stuff_percent_fire_res:50):-50}} </span>
                    <img
                            src="/img/icons/fire_res.png"
                            alt="fire_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_percent_water_res>=-50?($createVariable->stuff_percent_water_res<=50?$createVariable->stuff_percent_water_res:50):-50}} </span>
                    <img
                            src="/img/icons/water_res.png"
                            alt="water_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_percent_air_res>=-50?($createVariable->stuff_percent_air_res<=50?$createVariable->stuff_percent_air_res:50):-50}} </span>
                    <img src="/img/icons/air_res.png"
                         alt="air_res image"
                         class="ml-2"
                         width="28px">
                    <span> % Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_push_res}} </span> <img
                            src="/img/icons/push_res.png"
                            alt="push_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Poussée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$createVariable->stuff_distance_res}} </span> <img
                            src="/img/icons/distance_res.png"
                            alt="distance_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Dist</span>

                </div>

            </div>
        </div>
        @if(count($createVariable->setLinks)>=1)
            <div class="separator"></div>
        @endif
        <div class="grid grid-cols-2 gap-3">
            @foreach($createVariable->setLinks as $set)
                <div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
                    <div>
                        <div class="flex bg-gray-900 p-6 rounded-t-lg">
                            <div class="flex-1">
                                <p class="text-xl font-semibold">{{$set[0]->set->name}}</p>
                                <p> Niveau {{$set[0]->set->level}}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 p-6">
                            @foreach($set as $anItem)
                                <div class="flex flex-col text-center">
                                    <span>{{$anItem->type->name}}</span>
                                    <img
                                            src="{{$anItem->image}}"
                                            alt="item image"
                                            width="60"
                                            height="60"
                                            class="mr-2 h-fit self-center"
                                            loading="lazy"
                                    >
                                </div>
                            @endforeach

                        </div>
                        <div class="bg-gray-800 rounded-lg font-semibold flex py-3 mx-5 flex items-center justify-center">
                            <span>Bonus </span>
                            <button class="bg-gray-700 rounded-lg py-1 px-3 mx-2 bg-indigo-700">
                                {{count($set)}}
                            </button>
                            <span> items</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex flex-auto flex-col pl-10 py-5">
                                @php($setEffects=[])
                                @foreach($set[0]->set->effects as $anEffects)
                                    @if($anEffects->set_number_items===count($set))
                                        @php($setEffects[]=$anEffects)
                                    @endif
                                @endforeach
                                @foreach($setEffects as $index=>$anEffects)
                                    <div class="flex mb-1">
                                        <img
                                                src="{{$anEffects->image}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{(str_starts_with($anEffects->formatted_name,'-')?'text-red-600':'')}}">{{$anEffects->formatted_name}}</span>
                                    </div>
                                    @if(ceil(count($setEffects)/2)==($index+1))
                            </div>
                            <div class="flex flex-auto flex-col pr-10 py-5">
                                @endif

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

