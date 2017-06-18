<style type="text/css">
    .navbar-material-blue{background:#20B2AA;}
    li.h-menu-item:hover{background:#20B2AA;}
    .nav-link {color: #000;}
    .main-nav {background:#20B2AA; box-shadow:none; border:none; border-radius:0;}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
             <nav class="navbar navbar-material-blue navbar-fixed-top" role="navigation">
                 <div class="container">
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand nav-link">Hoc2H</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-animations" data-hover="dropdown" data-animations="fadeInDownNew fadeInRightNew fadeInUpNew fadeInLeftNew">
                        <ul class="nav navbar-nav">
                            <li class="h-menu-item"><a class="nav-link" href="#nothong">Lớp</a></li>
                            <li class="h-menu-item"><a class="nav-link" href="{{url('/tests')}}">Đề Thi</a></li>
                            <li class="h-menu-item"><a class="nav-link" href="{{url('/qa')}}">Hỏi Đáp</a></li>
                            <li class="h-menu-item"><a class="nav-link" href="#nothong">Tài Liệu</a></li>
                            <li class="dropdown">
                               <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">Danh Mục <span class="caret"></span></a>
                                <ul class="dropdown-menu main-nav" role="menu" >
                                  @foreach($superCategories as $superCategory)
                                    @include('layouts.recursive_menu', $superCategory)
                                  @endforeach
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if(Route::has('login'))
                                @if(Auth::check())
                                    <li class="dropdown">
                                      {{--   <img src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="20" height="20"> --}}
                                        <a href="#nothing" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <img src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}" width="30" height="30">  {{Auth::user()->user_name}}
                                        </a>
                                        <ul class="dropdown-menu main-nav" role="menu">
                                            <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                   {{ csrf_field() }}
                                               </form>
                                           </li>
                                           <li><a class="nav-link" href="{{ url('users/infodetail/'.Auth::user()->id) }}"> <span class="glyphicon glyphicon-info-sign"></span> Thông tin chi tiết</a></li>
                                       </ul>
                                    </li>
                                @else
                                    <li class="h-menu-item"><a class="nav-link" href="{{url('/login')}}"><span class="glyphicon glyphicon-log-in"></span>  Đăng nhập</a></li>
                                    <li class="h-menu-item"><a class="nav-link" href="{{ url('/register') }}">
                                    <span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>