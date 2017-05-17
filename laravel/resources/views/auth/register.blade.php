@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
            <form class="form-horizontal role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field()}}
                <h3 class="text-center"> Đăng Ký Thành Viên</h3>
                <hr>
                <div class="form-group {{ $errors->has('user_name') ? ' has-error' : '' }}"> 
                    <div class="col-md-5 col-md-offset-4 col-sm-3 col-xs-6">
                        <input id="user_name" name="user_name" placeholder="Tên đăng nhập*" class="form-control input-md" required="" type="text" value="{{ old('user_name') }}" required autofocus>
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-5 col-md-offset-4 col-sm-3 col-xs-6">
                        <input id="email" name="email" placeholder="Email*" class="form-control input-md" required="" type="text" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-4 col-md-offset-4 col-sm-2 col-xs-4">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="Mật khẩu">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4 col-sm-2 col-xs-4">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-4 col-md-offset-4 ">
                        <input id="name" name="name" placeholder="Họ và tên" class="form-control input-md" required="" type="text" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                    <div class="col-md-4 col-md-offset-4">
                        <input id="phone" name="phone" placeholder="Số điện thoại" class="form-control input-md" required="" type="text" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('class') ? ' has-error' : '' }}">
                    <div class="col-md-4 col-md-offset-4 ">
                        <input id="class" name="class" placeholder="Lớp" class="form-control input-md" required="" type="text" value="{{ old('class') }}">
                    </div>
                </div>
                <div class="form-group {{ $errors->has('local') ? ' has-error' : '' }}">
                    <div class="col-md-4 col-md-offset-4">
                        <input id="local" name="local" placeholder="Nơi ở" class="form-control input-md" required="" type="text" value="{{ old('local') }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Đăng Ký
                        </button>
                    </div>
                </div>
            </form>
        </div>   
    </div><!--//row-->
</div><!--//masonry-->
@endsection
