<nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            SMKN 1 Kedawung
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>

            <form class="navbar-form navbar-left" methode="GET" action="/">
                <div class="input-group">
                    <input name="search" type="text" value="" class="form-control" placeholder="Search">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                </div>
            </form>

            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('storage/avatars/' . auth()->user()->id . '/avatar.png')}}" class="img-circle" alt="Avatar">
                            <span>{{auth()->user()->name}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>

                        <ul class="dropdown-menu" >
                            <li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
                            <li><a href="{{ route('logout') }}" class="lnr lnr-exit"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
