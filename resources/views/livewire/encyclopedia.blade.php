<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Liste des équipements') }}
    </h2>
</x-slot>
<div
        x-data="{ loading: false }"
        x-show="loading"
        @loading.window="loading = $event.detail.loading"
>
    <style>
        .loader {
            border-top-color: #6366F1;
            -webkit-animation: spinner 1.5s linear infinite;
            animation: spinner 1.5s linear infinite;
        }

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <div
            class="fixed top-0 left-0 right-0 bottom-0 w-full h-screen z-50 overflow-hidden bg-gray-700 opacity-75 flex flex-col items-center justify-center">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 mb-4"></div>
        <h2 class="text-center text-white dark:text-indigo-500 text-xl font-semibold">Chargement ...</h2>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        this.livewire.hook('message.sent', () => {
            window.dispatchEvent(
                new CustomEvent('loading', {detail: {loading: true}})
            );
        })
        this.livewire.hook('message.processed', (message, component) => {
            window.dispatchEvent(
                new CustomEvent('loading', {detail: {loading: false}})
            );
        })
    });
</script>

<div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($items as $index=>$item)
                    <div class="text-gray-900 dark:text-gray-100 dark:bg-gray-700 sm:rounded-lg flex flex-col">
                        <div>
                            <div class="flex bg-gray-800 p-6 rounded-t-lg">
                                <div class="flex-1">
                                    <p class="text-xl font-semibold cursor-pointer">{{$item['name']}}</p>
                                    <p>{{$item['type']['name']}} - Niveau {{$item['level']}}</p>
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
                                    @foreach($item['effects'] as $item_effects)
                                        <div class="flex">
                                            <img
                                                    src="{{'/img/icons/'.$equipment_trad[$item_effects['type']['name']].'.png'}}"
                                                    alt="effect image"
                                                    width="24"
                                                    class="mr-2">
                                            <span class="{{substr($item_effects['formatted'],0,1)=='-'?'text-red-600':''}}">{{$item_effects['formatted']}}</span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 flex flex-col justify-end">
                            <div class="equipment-separator"></div>
                            <div class="flex items-center justify-center pb-4">
                                <button class="rounded-lg text-white bg-indigo-500 px-3 py-1 mx-2">
                                    +
                                </button>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-3 flex items-center justify-between border-t border-gray-300 px-4">
                <div class="-mt-px flex w-0 flex-1">
                    <button wire:click="previousPage"
                            class="inline-flex items-center border-t-2 border-transparent pt-4 pr-1 text-sm font-medium text-gray-500 hover:text-gray-400">
                        <x-heroicon-m-arrow-long-left class="mr-3 w-5 h-5 text-gray-400"/>
                        Previous
                    </button>
                </div>
                <div class="hidden md:-mt-px md:flex">
                    @for($i = 1; $i <= $last_page; $i++)
                        @if($i <= 1)
                            <button wire:click="gotoPage({{$i}})" @class(["inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium",
                                                              "border-transparent text-gray-500 hover:text-gray-400"  => $page!==$i,
                                                              "border-indigo-500 text-indigo-600" => $page===$i]) {{($page===$i ? 'aria-current="page"' : '')}}>{{$i}}</button>
                            @if($page > 3)
                                <span class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span>
                            @endif
                        @elseif($i >= $page-2 && $i <= $page+2)
                            <button wire:click="gotoPage({{$i}})" @class(["inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium",
                                                          "border-transparent text-gray-500 hover:text-gray-400"  => $page!==$i,
                                                          "border-indigo-500 text-indigo-600" => $page===$i]) {{($page===$i ? 'aria-current="page"' : '')}}>{{$i}}</button>
                        @endif

                        @if($i >= $last_page && $page <= $last_page-3)
                            @if($page < $last_page-3)
                                <span class="inline-flex items-center border-t-2 border-transparent px-4 pt-4 text-sm font-medium text-gray-500">...</span>
                            @endif
                            <button wire:click="gotoPage({{$i}})" @class(["inline-flex items-center border-t-2 px-4 pt-4 text-sm font-medium",
                                                  "border-transparent text-gray-500 hover:text-gray-400"  => $page!==$i,
                                                  "border-indigo-500 text-indigo-600" => $page===$i]) {{($page===$i ? 'aria-current="page"' : '')}}>{{$i}}</button>
                        @endif
                    @endfor
                </div>
                <div class="-mt-px flex w-0 flex-1 justify-end">
                    <button wire:click="nextPage"
                            class="inline-flex items-center border-t-2 border-transparent pt-4 pl-1 text-sm font-medium text-gray-500 hover:text-gray-400">
                        Next
                        <x-heroicon-m-arrow-long-right class="ml-3 w-5 h-5 text-gray-400"/>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>