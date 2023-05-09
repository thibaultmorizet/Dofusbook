<div class="space-y-6 sm:px-6 lg:px-0 lg:col-span-9 bg-gray-200">
    <div class="bg-gray-300 text-lg p-4 font-semibold text-gray-700 flex items-center justify-between">
        <span> ATTENTION </span>
        <x-heroicon-m-x-mark class="w-7 h-7 mx-2 my-1 cursor-pointer" wire:click="closeModal()"/>
    </div>
    <div class="text-center">
        <span class="font-semibold">Quel {{$itemType}} veux-tu remplacer ?</span>
            <div class="grid grid-cols-2 gap-3 p-3 mt-3">
                @foreach($items as $index=>$item)
                    <div class="bg-gray-100 rounded-lg flex flex-col items-center justify-center cursor-pointer"
                         wire:click="replaceItem('{{$index}}')">
                        <img
                                src="{{$item['image']}}"
                                alt="item image"
                                width="60"
                                height="60"
                        >
                        <span>{{$item['name']}}</span>
                    </div>
                @endforeach
            </div>
    </div>
</div>
