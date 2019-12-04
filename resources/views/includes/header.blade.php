<div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" class="img-fluid" style="max-height: 45px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse align-baseline" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto align-items-end">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link disabled">{{  strtoupper(Auth::user()->country_code) }}</a>
                </li>
                <span class="nav-link disabled">|</span>
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() === '/' ? 'active' : '' }}"
                        href="{{ route('home') }}">
                        Dashboard
                    </a>
                </li>
                <span class="nav-link disabled">|</span>
                @if (Auth::user() && Auth::user()->is_admin)
                    <li class="nav-item">
                        {{-- TODO add settings route --}}
                        <a class="nav-link {{ Request::path() === 'settings' ? 'active' : '' }}"
                            href="#">
                            Settings
                        </a>
                    </li>
                    <span class="nav-link disabled">|</span>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() === 'locales' ? 'active' : '' }}"
                            href="{{ route('locale.index') }}">
                            Locales
                        </a>
                    </li>
                    <span class="nav-link disabled">|</span>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() === 'users' ? 'active' : '' }}"
                            href="{{ route('user.index') }}">
                            Translators
                        </a>
                    </li>
                    <span class="nav-link disabled">|</span>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Request::path() === 'products' ? 'active' : '' }}"
                        href="{{ route('product.index') }}">
                        Products
                    </a>
                </li>
                <span class="nav-link disabled">|</span>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</div>
