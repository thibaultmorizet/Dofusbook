<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nouvel Équipement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-2 flex justify-between items-center">

                <div><input type="text" name="title"
                            class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent mr-2"
                            placeholder="Nom de l'équipement">
                    <input type="text" name="stuff_level"
                           class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center font-semibold"
                           size="5" placeholder="niveau"></div>
                <div>
                    <button class="rounded-lg text-white bg-[#d9534f] p-1 mx-2">Supprimer</button>
                    <button class="rounded-lg text-white bg-[#675d51] p-1 mx-2">Modifier</button>
                    <button class="rounded-lg text-white bg-[#75b96d] p-1 mx-2">Sauvegarder</button>
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-5 pl-5 pr-20">
                <div class="flex">
                    <div class="flex-1">
                        <div class="flex w-full">
                            <div class="flex-1">
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/vitality.png"
                                                                                 alt="vitality image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> PdV</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/prospection.png"
                                                                                 alt="prospection image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> PP</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/pa.png"
                                                                                 alt="pa image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span class="w-5"> PA</span>
                                    <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer">+ 0</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/pm.png"
                                                                                 alt="pm image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span class="w-5"> PM</span>
                                    <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer">+ 0</span>

                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/po.png"
                                                                                 alt="po image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span class="w-5"> PO</span>
                                    <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer">+ 0</span>

                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/initiative.png"
                                                                                 alt="initiative image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Initiative</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/critic.png"
                                                                                 alt="critic image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Critique</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/invocation.png"
                                                                                 alt="invocation image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Invocation</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/health.png"
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
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/vitality.png"
                                                                                 alt="vitality image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Vitalité</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/wisdom.png"
                                                                                 alt="wisdom image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Sagesse</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/strength.png"
                                                                                 alt="strength image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Force</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/intel.png"
                                                                                 alt="intel image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Intelligence</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/luck.png"
                                                                                 alt="luck image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Chance</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/agility.png"
                                                                                 alt="agility image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Agilité</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/power.png"
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
                                               size="5">
                                        <input type="text" name="wisdom_boost"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="strength_boost"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="intel_boost"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="luck_boost"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="agility_boost"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <span>995</span>
                                    </div>
                                    <div class="flex flex-col ml-5 text-center justify-center">
                                        <span>Parcho</span>
                                        <input type="text" name="vitality_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="wisdom_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="strength_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="intel_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="luck_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <input type="text" name="agility_parchment"
                                               class="text-white sm:rounded-lg dark:bg-gray-700 border-transparent text-center py-0 h-5 mb-2"
                                               size="5">
                                        <div>
                                            <span class="dark:bg-gray-700 px-1 sm:rounded-lg cursor-pointer">0</span>
                                            <span class="dark:bg-gray-700 ml-3 px-1 sm:rounded-lg cursor-pointer">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="separator"></div>
                        <div class="flex w-full">
                            <div class="flex-1">
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/leak.png"
                                                                                 alt="leak image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Fuite</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/avoid_pa.png"
                                                                                 alt="avoid_pa image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Esq. PA</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/avoid_pm.png"
                                                                                 alt="avoid_pm image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Esq. PM</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/pods.png"
                                                                                 alt="pods image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Pods</span>

                                </div>

                            </div>
                            <div class="flex-1">
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/tackle.png"
                                                                                 alt="tackle image"
                                                                                 class="ml-2"
                                                                                 width="28px">

                                    <span> Tacle</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/pa_recession.png"
                                                                                 alt="pa_recession image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Ret. PA</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/pm_recession.png"
                                                                                 alt="pm_recession image"
                                                                                 class="ml-2"
                                                                                 width="28px">
                                    <span> Ret. PM</span>
                                </div>
                                <div class="text-white flex items-center">
                                    <span class="w-10 text-right">0 </span> <img src="/img/icons/stuff_lvl.png"
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
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/amulet.png"
                                            alt="amulet image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/shield.png"
                                            alt="shield image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/belt.png"
                                            alt="belt image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/boots.png"
                                            alt="boots image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                            </div>
                            <img src="/img/character/feca-male.png"
                                 class="character-img"
                                 alt="character image">
                            <div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/helmet.png"
                                            alt="helmet image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/weapon.png"
                                            alt="weapon image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/ring.png"
                                            alt="ring image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/cape.png"
                                            alt="cape image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                                <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                    <img
                                            src="/img/stuff/animal.png"
                                            alt="animal image"
                                            width="60px"
                                            class="stuff-base-img">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mx-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg ml-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mx-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg  p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="flex">
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_neutral.png"
                                                                         alt="do_neutral image"
                                                                         class="ml-2"
                                                                         width="28px">

                            <span> Do Neutre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_earth.png"
                                                                         alt="do_earth image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Do Terre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_fire.png"
                                                                         alt="do_fire image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Do Feu</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_water.png"
                                                                         alt="do_water image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Do Eau</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_air.png"
                                                                         alt="do_air image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Do Air</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_critique.png"
                                                                         alt="do_critique image"
                                                                         class="ml-2"
                                                                         width="28px">

                            <span> Do Critique</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_push.png"
                                                                         alt="do_push image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Do Poussée</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_weapon.png"
                                                                         alt="do_weapon image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Do Armes</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_spell.png"
                                                                         alt="do_spell image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Do Sorts</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_melee.png"
                                                                         alt="do_melee image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Do Mélée</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/do_distance.png"
                                                                         alt="do_distance image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Do Distance</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/neutral_res.png"
                                                                         alt="neutral_res image"
                                                                         class="ml-2"
                                                                         width="28px">

                            <span> Ré Neutre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/earth_res.png"
                                                                         alt="earth_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Terre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/fire_res.png"
                                                                         alt="fire_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Feu</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/water_res.png"
                                                                         alt="water_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Eau</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/air_res.png"
                                                                         alt="air_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Air</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/critique_res.png"
                                                                         alt="critique_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Critique</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/melee_res.png"
                                                                         alt="melee_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Mélée</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/weapon_res.png"
                                                                         alt="weapon_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Armes</span>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/neutral_res.png"
                                                                         alt="neutral_res image"
                                                                         class="ml-2"
                                                                         width="28px">

                            <span> % Ré Neutre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/earth_res.png"
                                                                         alt="earth_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Terre</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/fire_res.png"
                                                                         alt="fire_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Feu</span>
                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/water_res.png"
                                                                         alt="water_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Eau</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/air_res.png"
                                                                         alt="air_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Air</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/push_res.png"
                                                                         alt="push_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> Ré Poussée</span>

                        </div>
                        <div class="text-white flex items-center">
                            <span class="w-10 text-right">0 </span> <img src="/img/icons/distance_res.png"
                                                                         alt="distance_res image"
                                                                         class="ml-2"
                                                                         width="28px">
                            <span> % Ré Dist</span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
