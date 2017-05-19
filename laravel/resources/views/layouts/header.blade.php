<div class="container">       
<!--Navbar-->
<nav class="navbar fixed-top navbar-toggleable-md navbar-dark green">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{url('/')}}">
            <strong style="font-size: 18;">Hoc2H</strong>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/tests')}}">Đề Thi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Hỏi Đáp</a>
                </li>
                <li class="nav-item dropdown btn-group">
                    <a class="nav-link dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Khác</a>
                    <div class="dropdown-menu dropdown" aria-labelledby="dropdownMenu1">
                        <a class="dropdown-item ">Tài Liệu</a>
                        <a class="dropdown-item ">Bài Giảng</a>
                        <a class="dropdown-item">Gia sư online</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto nav-flex-icons">
                @if(Route::has('login'))
                        @if(Auth::check())
                        <li class="nav-item dropdown btn-group">
                            <a class ="nav-link dropdown-toggle" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown" aria-labelledby="logoutDropMenu" role="menu">
                                <a class ="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Đăng xuất
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <a class ="dropdown-item" href="{{ url('users/info/'.Auth::user()->id) }}">
                                   Trang cá nhân
                                </a>
                            </div>
                        </ul>
                        </li>
                        @else
                            <li><a class="nav-link wawet" href="{{ url('/login') }}">Đăng Nhập</a><li>
                            <li><a class="nav-link wawet" href="{{ url('/register') }}">Đăng Ký</a><li>
                        @endif
                    @endif
            </ul>
        </div>
    </div>
</nav>
</div> 