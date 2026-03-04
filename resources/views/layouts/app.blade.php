<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main>
        @if (session('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div>
                {{ session('error') }}
            </div>
        @endif

        @if (auth()->user())
            @include('layouts.components.sidebar')
        @endif

        @yield('content')
    </main>
    @livewireScripts
</body>
</html>