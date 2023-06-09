<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-2 flex justify-between items-center">

        <div>
            <input type="text" name="title" id="title"
                   wire:change="updateTitle($event.target.value)"
                   class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent mr-2"
                   placeholder="Nom de l'équipement"
                   value="{{$stuff->title}}"
            >

            <input type="text" name="character_level"
                   wire:change="updateLevel($event.target.value)"
                   class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center font-semibold"
                   size="5" placeholder="niveau"
                   value="{{$stuff->character_level}}"
            >

        </div>
        <div>
            <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2 px-2"
                    wire:click="goToSpellsPage()">
                Sorts
            </button>
            <button class="rounded-lg text-white bg-[#d9534f] p-1 mx-2 px-2"
                    wire:click="$emit('openModal', 'delete-stuff-modal',{{ json_encode(["stuff_id" => $stuff->id]) }})">
                Supprimer
            </button>
            <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2 px-2"
                    wire:click="$emit('openModal', 'create-stuff-modal',{{ json_encode([
                        "stuff_id" => $stuff->id,
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
                            <span class="w-10 text-right">{{max($stuff->total_vitality,0)}} </span>
                            <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> PdV</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max($stuff->total_prospection,0)}} </span>
                            <img
                                    src="/img/icons/prospection.png"
                                    alt="prospection image"
                                    class="ml-2"
                                    width="28px">
                            <span> PP</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max(min($stuff->total_pa,12),0)}} </span>
                            <img
                                    src="/img/icons/pa.png"
                                    alt="pa image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PA</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPa({{$stuff->is_exo_pa===0?1:0}})">+ {{$stuff->is_exo_pa}}</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max(min($stuff->total_pm,6),0)}} </span>
                            <img
                                    src="/img/icons/pm.png"
                                    alt="pm image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PM</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPm({{$stuff->is_exo_pm===0?1:0}})">+ {{$stuff->is_exo_pm}}</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max(min($stuff->total_po,6),0)}} </span>
                            <img
                                    src="/img/icons/po.png"
                                    alt="po image"
                                    class="ml-2"
                                    width="28px">
                            <span class="w-5"> PO</span>
                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer w-9"
                                  wire:click="updateExoPo({{$stuff->is_exo_po===0?1:0}})">+ {{$stuff->is_exo_po}}</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max($stuff->total_initiative,0)}} </span>
                            <img
                                    src="/img/icons/initiative.png"
                                    alt="initiative image"
                                    class="ml-2"
                                    width="28px">

                            <span> Initiative</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->stuff_critic}} </span>
                            <img
                                    src="/img/icons/critic.png"
                                    alt="critic image"
                                    class="ml-2"
                                    width="28px">
                            <span> Critique</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max($stuff->stuff_invocation,0)}} </span>
                            <img
                                    src="/img/icons/invocation.png"
                                    alt="invocation image"
                                    class="ml-2"
                                    width="28px">
                            <span> Invocation</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{max($stuff->stuff_health,0)}} </span>
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
                            <span class="w-10 text-right">{{$stuff->subtotal_vitality}} </span> <img
                                    src="/img/icons/vitality.png"
                                    alt="vitality image"
                                    class="ml-2"
                                    width="28px">

                            <span> Vitalité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->subtotal_wisdom}} </span> <img
                                    src="/img/icons/wisdom.png"
                                    alt="wisdom image"
                                    class="ml-2"
                                    width="28px">
                            <span> Sagesse</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->subtotal_strength}} </span> <img
                                    src="/img/icons/strength.png"
                                    alt="strength image"
                                    class="ml-2"
                                    width="28px">

                            <span> Force</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->subtotal_intel}} </span> <img
                                    src="/img/icons/intel.png"
                                    alt="intel image"
                                    class="ml-2"
                                    width="28px">
                            <span> Intelligence</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->subtotal_luck}} </span> <img
                                    src="/img/icons/luck.png"
                                    alt="luck image"
                                    class="ml-2"
                                    width="28px">

                            <span> Chance</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->subtotal_agility}} </span> <img
                                    src="/img/icons/agility.png"
                                    alt="agility image"
                                    class="ml-2"
                                    width="28px">
                            <span> Agilité</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->stuff_power}} </span> <img
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
                                       value="{{$stuff->vitality_boost}}"
                                       wire:change="updateBoostVitality($event.target.value)"

                                >
                                <input type="text" name="wisdom_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->wisdom_boost}}"
                                       wire:change="updateBoostWisdom($event.target.value)"
                                >
                                <input type="text" name="strength_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->strength_boost}}"
                                       wire:change="updateBoostStrength($event.target.value)"
                                >
                                <input type="text" name="intel_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->intel_boost}}"
                                       wire:change="updateBoostIntel($event.target.value)"
                                >
                                <input type="text" name="luck_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->luck_boost}}" wire:change="updateBoostLuck($event.target.value)"
                                >
                                <input type="text" name="agility_boost"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->agility_boost}}"
                                       wire:change="updateBoostAgility($event.target.value)"
                                >
                                <span>{{$stuff->boost_available}}</span>
                            </div>
                            <div class="flex flex-col ml-5 text-center justify-center">
                                <span>Parcho</span>
                                <input type="text" name="vitality_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->vitality_parchment}}"
                                       wire:change="updateParchmentVitality($event.target.value)"
                                >
                                <input type="text" name="wisdom_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->wisdom_parchment}}"
                                       wire:change="updateParchmentWisdom($event.target.value)"
                                >
                                <input type="text" name="strength_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->strength_parchment}}"
                                       wire:change="updateParchmentStrength($event.target.value)"
                                >
                                <input type="text" name="intel_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->intel_parchment}}"
                                       wire:change="updateParchmentIntel($event.target.value)"
                                >
                                <input type="text" name="luck_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->luck_parchment}}"
                                       wire:change="updateParchmentLuck($event.target.value)"
                                >
                                <input type="text" name="agility_parchment"
                                       class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                       size="5"
                                       value="{{$stuff->agility_parchment}}"
                                       wire:change="updateParchmentAgility($event.target.value)"
                                >
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
                            <span class="w-10 text-right">{{$stuff->leak}} </span> <img
                                    src="/img/icons/leak.png"
                                    alt="leak image"
                                    class="ml-2"
                                    width="28px">

                            <span> Fuite</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->avoid_pa}} </span> <img
                                    src="/img/icons/avoid_pa.png"
                                    alt="avoid_pa image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->avoid_pm}} </span> <img
                                    src="/img/icons/avoid_pm.png"
                                    alt="avoid_pm image"
                                    class="ml-2"
                                    width="28px">
                            <span> Esq. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->pods}} </span> <img
                                    src="/img/icons/pods.png"
                                    alt="pods image"
                                    class="ml-2"
                                    width="28px">
                            <span> Pods</span>

                        </div>

                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->tackle}} </span> <img
                                    src="/img/icons/tackle.png"
                                    alt="tackle image"
                                    class="ml-2"
                                    width="28px">

                            <span> Tacle</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->pa_recession}} </span> <img
                                    src="/img/icons/pa_recession.png"
                                    alt="pa_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PA</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->pm_recession}} </span> <img
                                    src="/img/icons/pm_recession.png"
                                    alt="pm_recession image"
                                    class="ml-2"
                                    width="28px">
                            <span> Ret. PM</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">{{$stuff->stuff_level}} </span> <img
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Amulette',{{$stuff->character_level}})"
                            >

                                @if(is_null(Arr::get($stuffDetail,"amulet")))
                                    <img
                                            src="/img/stuff/amulet.png"
                                            alt="amulet image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"amulet.image")}}"
                                            alt="amulet image"
                                            width="60px"
                                    >
                                @endif

                            </div>
                            <div id="popover-amulet" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"amulet")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"amulet.name")}}</p>
                                    <p>Amulette - Niveau
                                        {{Arr::get($stuffDetail,"amulet.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"amulet.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"amulet.set.name")}}')">{{Arr::get($stuffDetail,"amulet.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"amulet.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"amulet.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"amulet.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"amulet.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('amulet')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>

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
                            <div wire:click="openItemsEncyclopediaWithFilters('Bouclier',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"shield")))
                                    <img
                                            src="/img/stuff/shield.png"
                                            alt="shield image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"shield.image")}}"
                                            alt="shield image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-shield" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"shield")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"shield.name")}}</p>
                                    <p>Bouclier - Niveau
                                        {{Arr::get($stuffDetail,"shield.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"shield.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"shield.set.name")}}')">{{Arr::get($stuffDetail,"shield.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"shield.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"shield.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"shield.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"shield.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('shield')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Anneau',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"ring_1")))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"ring_1.image")}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-1" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"ring_1")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"ring_1.name")}}</p>
                                    <p>Anneau - Niveau
                                        {{Arr::get($stuffDetail,"ring_1.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"ring_1.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"ring_1.set.name")}}')">{{Arr::get($stuffDetail,"ring_1.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"ring_1.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"ring_1.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"ring_1.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"ring_1.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('ring_1')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Ceinture',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"belt")))
                                    <img
                                            src="/img/stuff/belt.png"
                                            alt="belt image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"belt.image")}}"
                                            alt="belt image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-belt" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"belt")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"belt.name")}}</p>
                                    <p>Ceinture - Niveau
                                        {{Arr::get($stuffDetail,"belt.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"belt.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"belt.set.name")}}')">{{Arr::get($stuffDetail,"belt.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"belt.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"belt.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"belt.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"belt.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('belt')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Bottes',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"boots")))
                                    <img
                                            src="/img/stuff/boots.png"
                                            alt="boots image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"boots.image")}}"
                                            alt="boots image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-boots" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"boots")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"boots.name")}}</p>
                                    <p>Bottes - Niveau
                                        {{Arr::get($stuffDetail,"boots.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"boots.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"boots.set.name")}}')">{{Arr::get($stuffDetail,"boots.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"boots.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"boots.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"boots.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"boots.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('boots')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
                                    </div>
                                @else
                                    Ajouter des bottes

                                @endif
                                <div class="tooltip-arrow" data-popper-arrow></div>

                            </div>
                        </div>
                    </div>
                    <img src="/img/character/{{$stuff->class->slug}}-{{$stuff->gender}}.png"
                         class="character-img"
                         alt="character image">
                    <div>
                        <div
                                class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer border border-2 border-gray-700 hover:border-gray-600"
                                data-popover-target="popover-hat"
                                data-popover-placement="left"
                        >
                            <div wire:click="openItemsEncyclopediaWithFilters('Chapeau',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"hat")))
                                    <img
                                            src="/img/stuff/hat.png"
                                            alt="hat image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"hat.image")}}"
                                            alt="hat image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-hat" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"hat")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"hat.name")}}</p>
                                    <p>Chapeau - Niveau
                                        {{Arr::get($stuffDetail,"hat.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"hat.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"hat.set.name")}}')">{{Arr::get($stuffDetail,"hat.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"hat.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"hat.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"hat.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"hat.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('hat')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Arc',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"weapon")))
                                    <img
                                            src="/img/stuff/weapon.png"
                                            alt="weapon image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"weapon.image")}}"
                                            alt="weapon image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-weapon" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"weapon")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"weapon.name")}}</p>
                                    <p>{{Arr::get($stuffDetail,"weapon.type.name")}} -
                                        Niveau
                                        {{Arr::get($stuffDetail,"weapon.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"weapon.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"weapon.set.name")}}')">{{Arr::get($stuffDetail,"weapon.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"weapon.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"weapon.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"weapon.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"weapon.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('weapon')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Anneau',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"ring_2")))
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"ring_2.image")}}"
                                            alt="ring image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-ring-2" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"ring_2")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"ring_2.name")}}</p>
                                    <p>Anneau - Niveau
                                        {{Arr::get($stuffDetail,"ring_2.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"ring_2.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"ring_2.set.name")}}')">{{Arr::get($stuffDetail,"ring_2.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"ring_2.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"ring_2.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"ring_2.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"ring_2.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('ring_2')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Cape',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"cape")))
                                    <img
                                            src="/img/stuff/cape.png"
                                            alt="cape image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"cape.image")}}"
                                            alt="cape image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-cape" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"cape")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"cape.name")}}</p>
                                    <p>Cape - Niveau
                                        {{Arr::get($stuffDetail,"cape.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"cape.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"cape.set.name")}}')">{{Arr::get($stuffDetail,"cape.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"cape.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"cape.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"cape.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"cape.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('cape')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                            <div wire:click="openItemsEncyclopediaWithFilters('Familier',{{$stuff->character_level}})"
                            >
                                @if(is_null(Arr::get($stuffDetail,"animal")))
                                    <img
                                            src="/img/stuff/animal.png"
                                            alt="animal image"
                                            width="60px"
                                            class="stuff-base-img"
                                    >

                                @else
                                    <img
                                            src="{{Arr::get($stuffDetail,"animal.image")}}"
                                            alt="animal image"
                                            width="60px"
                                    >
                                @endif
                            </div>
                            <div id="popover-animal" role="tooltip"
                                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                                @if(!is_null(Arr::get($stuffDetail,"animal")))
                                    <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"animal.name")}}</p>
                                    <p>{{Arr::get($stuffDetail,"animal.type.name")}} -
                                        Niveau
                                        {{Arr::get($stuffDetail,"animal.level")}}</p>
                                    @if(is_null(Arr::get($stuffDetail,"animal.set"))===false)
                                        <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                           wire:click="goToSet('{{Arr::get($stuffDetail,"animal.set.name")}}')">{{Arr::get($stuffDetail,"animal.set.name")}}</p>
                                    @endif
                                    <div class="separator"></div>
                                    @if($viewEffects==="Voir la recette")
                                        @foreach(Arr::get($stuffDetail,"animal.effects") as $itemEffects)
                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemEffects,"image")}}"
                                                        alt="effect image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                            </div>
                                        @endforeach
                                    @elseif($viewEffects==="Voir les effets")
                                        @foreach(Arr::get($stuffDetail,"animal.ressources") as $itemRessources)

                                            <div class="flex">
                                                <img
                                                        src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                        alt="ressource image"
                                                        width="24"
                                                        height="24"
                                                        class="mr-2 h-fit self-center">
                                                <span
                                                        class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                            </div>
                                        @endforeach
                                    @endif

                                    <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                        @if(count(Arr::get($stuffDetail,"animal.conditions")??[])>0)
                                            <div class="flex items-center justify-center mb-4">
                                                @foreach(Arr::get($stuffDetail,"animal.conditions") as $condition)
                                                    <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="flex items-center justify-center">
                                            <button
                                                    class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                    wire:click="updateViewEffects('{{$viewEffects}}')"
                                            >
                                                {{$viewEffects}}
                                            </button>
                                            <button
                                                    class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                    wire:click="deleteItemToStuff('animal')"
                                            >
                                                <x-heroicon-m-trash
                                                        class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                            </button>
                                        </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_1")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_1.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-1" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_1")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_1.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_1.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_1.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_1.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_1.set.name")}}')">{{Arr::get($stuffDetail,"dofus_1.set.name")}}</p>
                                @endif
                                <div class="separator"></div>
                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_1.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_1.ressources") as $itemRessources)

                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_1.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_1.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_1')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_2")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_2.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-2" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_2")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_2.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_2.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_2.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_2.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_2.set.name")}}')">{{Arr::get($stuffDetail,"dofus_2.set.name")}}</p>
                                @endif
                                <div class="separator"></div>
                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_2.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_2.ressources") as $itemRessources)

                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_2.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_2.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_2')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_3")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_3.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-3" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_3")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_3.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_3.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_3.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_3.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_3.set.name")}}')">{{Arr::get($stuffDetail,"dofus_3.set.name")}}</p>
                                @endif
                                <div class="separator"></div>
                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_3.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_3.ressources") as $itemRessources)

                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_3.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_3.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_3')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_4")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_4.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-4" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_4")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_4.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_4.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_4.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_4.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_4.set.name")}}')">{{Arr::get($stuffDetail,"dofus_4.set.name")}}</p>
                                @endif
                                <div class="separator"></div>
                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_4.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_4.ressources") as $itemRessources)

                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_4.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_4.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_4')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_5")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_5.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-5" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_5")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_5.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_5.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_5.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_5.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_5.set.name")}}')">{{Arr::get($stuffDetail,"dofus_5.set.name")}}</p>
                                @endif
                                <div class="separator"></div>
                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_5.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_5.ressources") as $itemRessources)

                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_5.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_5.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_5')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                        <div wire:click="openItemsEncyclopediaWithFilters('Dofus',{{$stuff->character_level}})"
                        >
                            @if(is_null(Arr::get($stuffDetail,"dofus_6")))
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img"
                                >

                            @else
                                <img
                                        src="{{Arr::get($stuffDetail,"dofus_6.image")}}"
                                        alt="dofus image"
                                        width="60px"
                                >
                            @endif
                        </div>
                        <div id="popover-dofus-6" role="tooltip"
                             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700 border border-gray-600 border-2">
                            @if(!is_null(Arr::get($stuffDetail,"dofus_6")))
                                <p class="text-xl font-semibold">{{Arr::get($stuffDetail,"dofus_6.name")}}</p>
                                <p>{{Arr::get($stuffDetail,"dofus_6.type.name")}} -
                                    Niveau
                                    {{Arr::get($stuffDetail,"dofus_6.level")}}</p>
                                @if(is_null(Arr::get($stuffDetail,"dofus_6.set"))===false)
                                    <p class="cursor-pointer text-indigo-500 hover:text-indigo-400"
                                       wire:click="goToSet('{{Arr::get($stuffDetail,"dofus_6.set.name")}}')">{{Arr::get($stuffDetail,"dofus_6.set.name")}}</p>
                                @endif
                                <div class="separator"></div>

                                @if($viewEffects==="Voir la recette")
                                    @foreach(Arr::get($stuffDetail,"dofus_6.effects") as $itemEffects)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemEffects,"image")}}"
                                                    alt="effect image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr(Arr::get($itemEffects,"formatted_name"),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemEffects,"formatted_name")}}</span>
                                        </div>
                                    @endforeach
                                @elseif($viewEffects==="Voir les effets")
                                    @foreach(Arr::get($stuffDetail,"dofus_6.ressources") as $itemRessources)
                                        <div class="flex">
                                            <img
                                                    src="{{Arr::get($itemRessources,"ressource.image") ?? Arr::get($itemRessources,"item_ressource.image")}}"
                                                    alt="ressource image"
                                                    width="24"
                                                    height="24"
                                                    class="mr-2 h-fit self-center">
                                            <span
                                                    class="{{(substr((Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name")),0,1))=='-'?'text-red-600':''}} max-w-xl">{{Arr::get($itemRessources,"quantity")}} {{(Arr::get($itemRessources,"ressource.name") ?? Arr::get($itemRessources,"item_ressource.name"))}}</span>
                                        </div>
                                    @endforeach
                                @endif

                                <div class="flex flex-col items-center justify-center pb-4 mt-4">
                                    @if(count(Arr::get($stuffDetail,"dofus_6.conditions")??[])>0)
                                        <div class="flex items-center justify-center mb-4">
                                            @foreach(Arr::get($stuffDetail,"dofus_6.conditions") as $condition)
                                                <span class="bg-gray-800 rounded-lg p-2 mx-1">{{$condition->name}} {{$condition->operator}} {{$condition->int_value}}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex items-center justify-center">
                                        <button
                                                class="group rounded-lg text-white border border-1  border-white p-1 mx-2 hover:border-gray-300 hover:text-gray-300"
                                                wire:click="updateViewEffects('{{$viewEffects}}')"
                                        >
                                            {{$viewEffects}}
                                        </button>
                                        <button
                                                class="group rounded-lg text-[#d9534f] border border-1  border-[#d9534f] p-1 mx-2 hover:bg-[#d9534f]"
                                                wire:click="deleteItemToStuff('dofus_6')"
                                        >
                                            <x-heroicon-m-trash
                                                    class="w-5 h-5 m-1 text-[#d9534f] group-hover:text-white"/>
                                        </button>
                                    </div>
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
                    <span class="w-10 text-right">{{$stuff->stuff_do_neutral}} </span> <img
                            src="/img/icons/do_neutral.png"
                            alt="do_neutral image"
                            class="ml-2"
                            width="28px">

                    <span> Do Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_strength}} </span> <img
                            src="/img/icons/do_strength.png"
                            alt="do_strength image"
                            class="ml-2"
                            width="28px">
                    <span> Do Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_intel}} </span> <img
                            src="/img/icons/do_intel.png"
                            alt="do_intel image"
                            class="ml-2"
                            width="28px">
                    <span> Do Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_luck}} </span> <img
                            src="/img/icons/do_luck.png"
                            alt="do_luck image"
                            class="ml-2"
                            width="28px">
                    <span> Do Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_agility}} </span> <img
                            src="/img/icons/do_agility.png"
                            alt="do_agility image"
                            class="ml-2"
                            width="28px">
                    <span> Do Air</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_critique}} </span> <img
                            src="/img/icons/do_critique.png"
                            alt="do_critique image"
                            class="ml-2"
                            width="28px">

                    <span> Do Critique</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_push}} </span> <img
                            src="/img/icons/do_push.png"
                            alt="do_push image"
                            class="ml-2"
                            width="28px">
                    <span> Do Poussée</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_weapon}} </span> <img
                            src="/img/icons/do_weapon.png"
                            alt="do_weapon image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Armes</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_spell}} </span> <img
                            src="/img/icons/do_spell.png"
                            alt="do_spell image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Sorts</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_melee}} </span> <img
                            src="/img/icons/do_melee.png"
                            alt="do_melee image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Mêlée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_do_distance}} </span> <img
                            src="/img/icons/do_distance.png"
                            alt="do_distance image"
                            class="ml-2"
                            width="28px">
                    <span> % Do Distance</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_neutral_res}} </span> <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_strength_res}} </span> <img
                            src="/img/icons/strength_res.png"
                            alt="strength_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_intel_res}} </span> <img
                            src="/img/icons/intel_res.png"
                            alt="intel_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_luck_res}} </span> <img
                            src="/img/icons/luck_res.png"
                            alt="luck_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_agility_res}} </span> <img
                            src="/img/icons/agility_res.png"
                            alt="agility_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_critique_res}} </span> <img
                            src="/img/icons/critique_res.png"
                            alt="critique_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Critique</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_melee_res}} </span> <img
                            src="/img/icons/melee_res.png"
                            alt="melee_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Mêlée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_weapon_res}} </span> <img
                            src="/img/icons/weapon_res.png"
                            alt="weapon_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Armes</span>

                </div>
            </div>
            <div class="flex-1">
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{max(min($stuff->stuff_percent_neutral_res,50),-50)}} </span>
                    <img
                            src="/img/icons/neutral_res.png"
                            alt="neutral_res image"
                            class="ml-2"
                            width="28px">

                    <span> % Ré Neutre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{max(min($stuff->stuff_percent_strength_res,50),-50)}} </span>
                    <img
                            src="/img/icons/strength_res.png"
                            alt="strength_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Terre</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{max(min($stuff->stuff_percent_intel_res,50),-50)}} </span>
                    <img
                            src="/img/icons/intel_res.png"
                            alt="intel_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Feu</span>
                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{max(min($stuff->stuff_percent_luck_res,50),-50)}} </span>
                    <img
                            src="/img/icons/luck_res.png"
                            alt="luck_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Eau</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{max(min($stuff->stuff_percent_agility_res,50),-50)}} </span>
                    <img src="/img/icons/agility_res.png"
                         alt="agility_res image"
                         class="ml-2"
                         width="28px">
                    <span> % Ré Air</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_push_res}} </span> <img
                            src="/img/icons/push_res.png"
                            alt="push_res image"
                            class="ml-2"
                            width="28px">
                    <span> Ré Poussée</span>

                </div>
                <div class="text-white flex items-center">
                    <span class="w-10 text-right">{{$stuff->stuff_distance_res}} </span> <img
                            src="/img/icons/distance_res.png"
                            alt="distance_res image"
                            class="ml-2"
                            width="28px">
                    <span> % Ré Dist</span>

                </div>

            </div>
        </div>
        @if(count($setLinks)>=1)
            <div class="separator"></div>
        @endif
        <div class="grid grid-cols-2 gap-3">
            @foreach($setLinks as $set)
                <div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 rounded-lg flex flex-col">
                    <div>
                        <div class="flex bg-gray-900 p-6 rounded-t-lg">
                            <div class="flex-1">
                                <p class="text-xl font-semibold">
                                    {{Arr::get($set,"0.set.name")}}
                                </p>
                                <p> Niveau {{Arr::get($set,"0.level")}}</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-5 p-6">
                            @foreach($set as $anItem)
                                <div class="flex flex-col text-center">
                                    <span>{{Arr::get($anItem,"type.name")}}</span>
                                    <img
                                            src="{{Arr::get($anItem,"image")}}"
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
                                @foreach(Arr::get($set,"0.set.effects") ?? [] as $anEffects)
                                    @if(Arr::get($anEffects,"set_number_items")===count($set))
                                        @php($setEffects[]=$anEffects)
                                    @endif
                                @endforeach
                                @foreach($setEffects as $index=>$anEffects)
                                    <div class="flex mb-1">
                                        <img
                                                src="{{Arr::get($anEffects,"image")}}"
                                                alt="effect image"
                                                width="24"
                                                height="24"
                                                class="mr-2 h-fit self-center">
                                        <span
                                                class="{{(str_starts_with(Arr::get($anEffects,"formatted_name"),'-')?'text-red-600':'')}}">{{Arr::get($anEffects,"formatted_name")}}</span>
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

