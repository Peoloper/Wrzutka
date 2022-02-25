<div class="container" id="container-nav">
    <a class="navbar-brand" href="{{route('home')}}">Strona Główna</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav ">

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Najnowsze</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('waiting')}}">Oczekujące</a>
            </li>
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('top.index')}}">Top</a>
                </li>

                <div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Wyloguj') }}
                    </a>
                </div>
            @endguest
        </ul>
    </div>
</div>
