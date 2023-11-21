@php
$paginaLogin = Route::is('login');
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Gerência Convênios </title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    @vite(['resources/js/app.js','resources/sass/app.scss','resources/css/app.css'])
    @if (!$paginaLogin)
        @routes
        @inertiaHead
    @endif
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">

        <div class="wrapper">
                    @if (!$paginaLogin)
                          @include('layouts.nav')
                    @endif
            <div class="main">

                @if (!$paginaLogin)
                    @include('layouts.sidebar')
                @endif

                <main class="content">
                    @if (!$paginaLogin)
                        @inertia
                    @else
                       @yield('content')
                    @endif
                </main>
                @if (!$paginaLogin)
                     @include('layouts.footer')
                @endif
            </div>
        </div>

    @stack('modals')
    @stack('scripts')
 <script>
</script>
</body>

</html>
