@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
            <form class="form-horizontal role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field()}}
                <h3 class ="text-center"> Đăng Nhập</h3>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-8 col-sm-6 col-md-4 col-md-offset-1">
                            <div class="main-container__column">        
                                <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-li">
                                    <input type="text" name="email" id="email" class="form-control materail-input" placeholder="Email đăng nhập">
                                    <span class="materail-input-block__line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-8 col-sm-6 col-md-4 col-md-offset-1">
                            <div class="main-container__column">        
                                <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-li">
                                    <input type="password" name="password" id="password" class="form-control materail-input" placeholder="Mật khẩu">
                                    <span class="materail-input-block__line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                <br>
                <div class ="col-md-6 col-xs-offset-4">
                    <div style="margin-left: 42px;" class="main-container__column material-checkbox-group material-checkbox-group_success">
                        <input type="checkbox" id="accept_rule" name="accept_rule" class="material-checkbox">
                        <label class="material-checkbox-group__label" for="accept_rule">Ghi nhớ đăng nhập</label>
                    </div>
                </div>
                <br>
                 <div class ="col-md-6 col-xs-offset-4">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
                <br><br><br>
                <div class ="col-md-6 col-md-offset-3">
                    <div style="margin-left: 90px;" class="main-container__column">
                        <button class="btn material-btn material-btn_primary">Đăng nhập</button>
                    </div>
                </div>
            </form>
        </div>   
    </div><!--//row-->
</div><!--//masonry-->
@endsection

{{-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}