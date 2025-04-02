<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ $page->language ?? 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="referrer" content="always">
        <title>Nexum Press</title>

        
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="bg-gray-200 font-roboto">
        <div x-data="{ sidebarOpen: false }" class="flex h-screen">
            @include('layouts.sidebar')

            <div class="flex-1 flex flex-col overflow-hidden">
                @include('layouts.header')

                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
                    <div class="container mx-auto px-6 py-8">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    </body>
</html>
