<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
            <script>
            window.addEventListener('toast', event => {
                var type = event.detail.type
                var title = 'Error'
                var icon =   `<x-heroicon-o-x-circle class="w-5 h-5 text-red-500" />`;

                if (type === 'success') {
                    title = 'Success'
                    icon = `<x-heroicon-o-check-circle class="w-5 h-5 text-green-500" />`;
                }

                Swal.fire({
                    position: 'top-end',
                    html: '<div class="w-full flex flex-col items-center space-y-4 sm:items-end">'+
                        '    <div class="max-w-sm w-full bg-white rounded-lg pointer-events-auto overflow-hidden">'+
                        '        <div>'+
                        '            <div class="flex items-start">'+
                        '                <div class="flex-shrink-0">'+
                        '                       '+icon+
                        '                </div>'+
                        '                <div class="ml-3 w-0 flex-1 pt-0.5">'+
                        '                    <p class="text-sm font-medium text-gray-900">'+
                        '                        '+title+
                        '                    </p>'+
                        '                    <p class="mt-1 text-sm text-gray-500">'+
                        '                        '+ event.detail.message +
                        '                    </p>'+
                        '                </div>'+
                        '            </div>'+
                        '        </div>'+
                        '    </div>'+
                        '</div>',
                    icon: false,
                    padding: '0rem',
                    showConfirmButton: false,
                    showCloseButton: true,
                    toast: true,
                    timer: 10000
                })
            })
        </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>
@livewireScripts

</body>
</html>
