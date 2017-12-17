<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('images/gcc-logo.png') }}" alt="Glory City Church of Melbourne" width="112" height="28">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto">
            @guest
            {{--do something--}}
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span>Logout</span>
                    </a>
                </li>
                <form id="logout-form" class="nav-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endguest
        </ul>
        {{--<span class="navbar-text">--}}
      {{--Navbar text with an inline element--}}
    {{--</span>--}}
    </div>
</nav>