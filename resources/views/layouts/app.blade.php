<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @include('includes.header')
        </nav>

        <main class="py-4">
            <div class="container">
                    <div class="page-header">
                    <h1>@yield('title')</h1>
                </div>
                @yield('content')
            </div>
        </main>

        <footer>
            @include('includes.footer')
        </footer>
    </div>
</body>
</html>
