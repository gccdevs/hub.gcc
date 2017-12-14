
<nav class="navbar is-black">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('home') }}">
            <img src="{{ asset('images/gcc-logo.png') }}" alt="Glory City Church of Melbourne" width="112" height="28">
        </a>
        {{--<div class="navbar-burger burger" data-target="nav-toggle">--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
            {{--<span></span>--}}
        {{--</div>--}}
    </div>

    <div id="nav" class="navbar-menu">
        {{--<div class="navbar-start">--}}
            {{--<span id="nav-toggle" class="nav-toggle">--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
                {{--<span></span>--}}
            {{--</span>--}}
        {{--</div>--}}

        <div class="navbar-end">
            <div class="navbar-item">
                <div id="nav-menu" class="field is-grouped">
                    @guest
                    {{--do something--}}
                    @else
                        <p class="control">
                            <a class="button is-info"
                               data-social-network="Twitter"
                               data-social-action="tweet"
                               data-social-target="http://localhost:4000"
                               target="_blank"
                               href="{{ route('dashboard') }}">
                            <span>
                {{ Auth::user()->name }}
              </span>
                            </a>
                        </p>
                        <p class="control">
                            <a class="bd-tw-button button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span>Logout</span>
                            </a>
                        </p>
                        <form id="logout-form" class="nav-link" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        @endguest
                </div>
            </div>
        </div>
    </div>
</nav>