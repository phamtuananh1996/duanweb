 <div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                    <font face="Roboto Condensed" size="6" color="green"> Hoc2H </font>
                </a>
            </div> 
            <div class="collapse navbar-collapse" id="navbar-container">
                <ul class="nav nav-pills navbar-right">
                @if(Route::has('login'))
                @if(Auth::check())
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li role="presentation">
                            <a href="{{ route('logout') }}"
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
            <li role="presentation"><a href="{{ url('/login') }}">Đăng Nhập</a></li>
            <li role="presentation"><a href="{{ url('/register') }}">Đăng Ký</a></li>
            @endif
            @endif
        </ul>
    </div>
</div>
</nav>
</div>