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
                @if (Auth::user() && Auth::user()->is_admin)
                    <form method="POST" action="{{ route('user.setLocale') }}">
                        @method('PUT')
                        @csrf

                        <select name="country_code" class="btn dropdown-toggle" onchange="this.form.submit()">
                            <a class="btn dropdown-toggle" href="#" role="button" id="dropDownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{  strtoupper(Auth::user()->country_code) }}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @foreach (App\Locale::all() as $locale)
                                    @if ($locale->country_code == Auth::user()->country_code)
                                        <option value="{{ $locale->country_code }}">{{ strtoupper($locale->country_code) }}</option>
                                    @endif
                                @endforeach
                                @foreach (App\Locale::all() as $locale)
                                    @if ($locale->country_code != Auth::user()->country_code)
                                        <option value="{{ $locale->country_code }}">{{ strtoupper($locale->country_code) }}</option>
                                    @endif
                                @endforeach
                            </div>
                        </select>
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link disabled">{{  strtoupper(Auth::user()->country_code) }}</a>
                    </li>
                @endif
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
