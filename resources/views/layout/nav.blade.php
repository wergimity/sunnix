<nav class="navbar navbar-default navbar-static-top">

    <div class="container">

        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ auth()->check() ? url('home') : url() }}">{{ trans('front.name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">

            @if(auth()->check())

                <ul class="nav navbar-nav">

                    <li><a href="{{ url('home') }}">Events</a></li>

                    <li><a href="{{ url('stats') }}">Stats</a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }}</a>

                        <ul class="dropdown-menu">

                            <li><a href="{{ url('profile') }}"> <i class="fa fa-fw fa-user"></i>Profile</a></li>

                            <li class="divider hidden-xs"></li>

                            <li><a href="{{ route('auth.logout') }}"><i class="fa fa-fw fa-sign-out"></i> Logout</a></li>

                        </ul>

                    </li>

                </ul>

            @endif

        </div>
        
    </div>

</nav>