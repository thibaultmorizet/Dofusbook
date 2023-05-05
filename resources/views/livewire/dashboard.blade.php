<div class="grid grid-cols-3 gap-4">
    @foreach($stuffList as $index=>$stuff)
        <div class="p-6 text-gray-900 dark:text-gray-100 dark:bg-gray-800 sm:rounded-lg cursor-pointer"
             wire:click="goToStuffEdit({{$stuff->id}})">
            <div class="flex text-center">
                <div><img src="/img/character/{{$stuff->class->slug}}-{{$stuff->gender}}.png"
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
                        @if(is_null($stuff['amulet']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/amulet.png"
                                        alt="amulet image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['amulet']->image}}"
                                        alt="amulet image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['ring_1']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['ring_1']->image}}"
                                        alt="ring 1 image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['ring_2']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/ring.png"
                                        alt="ring image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['ring_2']->image}}"
                                        alt="ring 2 image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['hat']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/hat.png"
                                        alt="hat image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['hat']->image}}"
                                        alt="hat image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['cape']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/cape.png"
                                        alt="cape image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['cape']->image}}"
                                        alt="cape image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['belt']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/belt.png"
                                        alt="belt image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['belt']->image}}"
                                        alt="belt image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['boots']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/boots.png"
                                        alt="boots image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['boots']->image}}"
                                        alt="boots image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['weapon']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/weapon.png"
                                        alt="weapon image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['weapon']->image}}"
                                        alt="weapon image"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_1']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_1']->image}}"
                                        alt="dofus 1 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_2']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_2']->image}}"
                                        alt="dofus 2 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_3']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_3']->image}}"
                                        alt="dofus 3 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_4']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_4']->image}}"
                                        alt="dofus 4 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_5']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_5']->image}}"
                                        alt="dofus 5 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(is_null($stuff['dofus_6']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/dofus.png"
                                        alt="dofus image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['dofus_6']->image}}"
                                        alt="dofus 6 image"
                                        width="60px"
                                >
                            </div>
                        @endif
                        @if(!is_null($stuff['animal']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['animal']->image}}"
                                        alt="animal image"
                                        width="60px"
                                >
                            </div>
                        @elseif(!is_null($stuff['mount']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="{{$stuff['mount']->image}}"
                                        alt="mount image"
                                        width="60px"
                                >
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/animal.png"
                                        alt="animal image"
                                        width="60px"
                                        class="stuff-base-img">
                            </div>
                        @endif
                        @if(is_null($stuff['shield']))
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">
                                <img
                                        src="/img/stuff/shield.png"
                                        alt="shield image"
                                        class="stuff-base-img">
                            </div>
                        @else
                            <div class="dark:bg-gray-700 rounded-lg mb-4 mt-4 p-1 cursor-pointer">

                                <img
                                        src="{{$stuff['shield']->image}}"
                                        alt="shield image"
                                >
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</div>
