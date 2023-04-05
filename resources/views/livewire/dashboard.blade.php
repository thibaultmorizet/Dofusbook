<div class="grid grid-cols-3 gap-4">
    @foreach($stuffList as $index=>$stuff)
        <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg cursor-pointer"
             wire:click="goToStuffEdit({{$stuff->stuff_id}})">
            <div class="flex text-center">
                <div><img src="/img/character/{{$stuff->slug}}-{{$stuff->gender}}.png"
                          class="character-img-dashboard"
                          alt="character image">
                </div>
                <div class="flex-1">
                    <div class="flex justify-between">
                        <div class="flex">
                            <img
                                    src="/img/icons/{{$stuff->gender}}.png"
                                    class="gender-img ml-5"
                                    alt="gender image"
                                    width="28px">
                            <span class="ml-5 font-semibold"> {{$stuff->title}}</span>
                        </div>
                        <span class="font-semibold">Niveau : {{$stuff->character_level}}</span>
                    </div>
                    <div class="grid grid-cols-8 gap-2">
                        @if(is_null($stuff->amulet_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/amulet.png"
                                        alt="amulet image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->ring_1_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->ring_2_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->helmet_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/helmet.png"
                                        alt="helmet image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->cape_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/cape.png"
                                        alt="cape image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->belt_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/belt.png"
                                        alt="belt image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->boots_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/boots.png"
                                        alt="boots image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->weapon_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/weapon.png"
                                        alt="weapon image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_1_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_2_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_3_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_4_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_5_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->dofus_6_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->animal_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/animal.png"
                                        alt="animal image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff->shield_id))
                            <div class="dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/shield.png"
                                        alt="shield image"
                                        class="stuff-base-img">
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
