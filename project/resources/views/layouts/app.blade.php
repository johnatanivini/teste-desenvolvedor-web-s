<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        
        @include('layouts.header')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        @include('layouts.footer')
    </footer>
     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
