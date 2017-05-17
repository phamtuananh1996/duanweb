 <div class="container">
    <nav class="navbar material-navbar navbar-fixed-top material-navbar_success">
        <div class="container-fluid">
            <div class="navbar-header material-navbar__header">
                <button class="navbar-toggle materail-navbar__toogle collapsed" data-toggle="collapse" data-target="#navbar-navbar_success">
                    <span class="icon-bar materail-navbar__icon-bar"></span>
                    <span class="icon-bar materail-navbar__icon-bar"></span>
                    <span class="icon-bar materail-navbar__icon-bar"></span>
                </button>
                <a class="navbar-brand material-navbar__brand" href="#0">Hoc2H</a>
            </div>
            <div class="collapse navbar-collapse materil-navbar__collapse" id="navbar-navbar_success">
                <ul class="nav navbar-nav navbar-right material-navbar__nav">
                    @if(Route::has('login'))
                        @if(Auth::check())
                        <li class="dropdown">
                            <a class ="material-navbar__link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation">
                                    <a class ="material-navbar__link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        </li>
                        @else
                        <li><a class ="material-navbar__link" href="{{ url('/login') }}">Đăng Nhập</a></li>
                        <li><a class ="material-navbar__link" href="{{ url('/register') }}">Đăng Ký</a></li>
                        @endif
                    @endif
                </ul>       
            </div>
        </div>
    </nav>
</div>