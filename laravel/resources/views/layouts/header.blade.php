<style type="text/css"> 
#main-nav {background: #00695c; color: #fff; padding:5px;}
.menu-item { padding: 10px; display: inline-block; }
.menu-item-link{color: #fafafa; white-space:nowrap;}
.menu-item-link:hover {color: #bdbdbd ;}
.menu-item:hover {background:#3F729B;}
.sub-nav {background:#3F729B; padding: 0px; }
.sub-menu-item {padding: 10px; width: 100% }
#logo { font-size: 20px; text-align: center;background:#3F729B; margin:5px 20px 0 20px; }
#nav { display: none; position: absolute; top:53px; list-style-type: none;background:#3F729B; padding: 0px;margin-left: -10px; }
#nav ul {display:none; position: absolute;top: 0px; list-style-type: none; left: 100%;}
.menu-item:hover > #nav{display:block;visibility:visible}
#user-action {display: none; position: absolute; top:53px; list-style-type: none; background:#3F729B; padding:10px;margin-left: -10px;}
#user-info:hover >#user-action{display: block;visibility: visible;}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class ="navbar navbar-fixed-top" id="main-nav">
                <div class="pull-left">
                    <li class="menu-item" id="logo"><a class="menu-item-link" href="{{url('/')}}">Hoc2H</a></li>
                    <li class="menu-item"><a class="menu-item-link" href="#nothong">Lớp</a></li>
                    <li class="menu-item"><a class="menu-item-link" href="{{url('/tests')}}">Đề Thi</a></li>
                    <li class="menu-item"><a class="menu-item-link" href="{{url('/qa')}}">Hỏi Đáp</a></li>
                    <li class="menu-item"><a class="menu-item-link" href="#nothong">Tài Liệu</a></li>
                    <li class="menu-item" id="category-nav">
                        <a class="menu-item-link" href="#nothong">Danh Mục <span class="caret"></span></a>
                        <ul id="nav">
                             @foreach($superCategories as $superCategory)
                                 @include('layouts.recursive_menu', $superCategory)
                            @endforeach
                        </ul>
                    </li>
                </div>
                <div class="pull-right" style="margin-right: 20px;">
                    @if(Route::has('login'))
                        @if(Auth::check())
                            <li class="menu-item" id="user-info">
                                <img class="img-avt" src="{{ asset('') }}/images/users/{{Auth::user()->avatar}}">
                                <a href="#nothing" class="menu-item-link">
                                    {{Auth::user()->user_name}}
                                </a>
                                <ul id="user-action">
                                    <li><a class="menu-item-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Đăng xuất</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>
                                   </li>
                                   <li><a class="menu-item-link" href="{{ url('users/infodetail/'.Auth::user()->id) }}">Thông tin chi tiết</a></li>
                               </ul>
                            </li>
                        @else
                            <li class="menu-item"><a class="menu-item-link" href="{{url('/login')}}">Đăng nhập</a></li>
                            <li class="menu-item"><a class="menu-item-link" href="{{ url('/register') }}">Đăng ký</a></li>
                        @endif
                    @endif
                </div>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
    $("#nav li").hover(
    function(){
        $(this).children('ul').hide();
        $(this).children('ul').slideDown('normal');
    },
    function () {
        $('ul', this).slideUp('normal');            
    });
});

</script> 