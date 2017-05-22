<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
            <span class="sr-only">Toggle navigation</span>
          </button>
          <a style="color:white;" href="{{url('/')}}" class="navbar-brand navbar-brand-custome">Hoc2H</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
            <div class="dropdown pmd-dropdown pmd-user-info pull-right">
                @if(Route::has('login'))
                    @if(Auth::check())
                        <a href="javascript:void(0);" class="btn-user dropdown-toggle media" data-toggle="dropdown" data-sidebar="true" aria-expanded="false">
                            <div class="media-left">
                                <img src="http://propeller.in/assets/images/avatar-icon-40x40.png" width="40" height="40" alt="avatar">
                            </div>
                            <div class="media-body media-middle">
                                {{Auth::user()->user_name}}
                            </div>
                            <div class="media-right media-middle">
                                <i class="material-icons md-light pmd-sm">more_vert</i>
                            </div>
                        </a>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Đăng xuất</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   {{ csrf_field() }}
                                </form>
                            </li>
                            <li><a href="{{ url('users/infodetail/'.Auth::user()->id) }}">Thông tin chi tiết</a></li>
                        </ul>
                    @else
                        <ul class="nav navbar-nav navbar-right">
                            <li><a style="color:white; class="pmd-ripple-effect" href="{{url('/login')}}">Đăng nhập</a></li>
                            <li><a style="color:white; class="pmd-ripple-effect" href="{{ url('/register') }}">Đăng ký</a></li>
                        </ul>
                    @endif
                @endif
            </div> 
          <ul class="nav navbar-nav">
            <li><a style="color:white;" class="pmd-ripple-effect" href="javascript:void(0);">Home <span class="sr-only">(current)</span></a></li>
            <li><a style="color:white;" class="pmd-ripple-effect" href="{{url('/tests')}}">Đề Thi</a></li>
            <li><a style="color:white;" class="pmd-ripple-effect" href="#">Hỏi Đáp</a></li>
            <li class="dropdown pmd-dropdown">
                <a style="color:white;" data-toggle="dropdown" class="pmd-ripple-effect dropdown-toggle" data-sidebar="true" href="#">More <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a class="pmd-ripple-effect" href="#">Bài Giảng</a></li>
                    <li><a class="pmd-ripple-effect" href="javascript:void(0);">Tài Liệu</a></li>
                    <li><a class="pmd-ripple-effect" href="javascript:void(0);">Gia sư online</a></li>
                    <li class="divider"></li>
                    <li><a class="pmd-ripple-effect" href="javascript:void(0);">Tìm Kiếm</a></li>
                    <li class="divider"></li>
                    <li><a class="pmd-ripple-effect" href="javascript:void(0);">Hoc2H</a></li>
                </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</div>