@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="row">
                <div class="col-sm-10 offset-md-1">
                   <form style="margin-top:30px;" class="form-horizontal role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field()}}
                        <h3 style="padding-top:50px;">Đăng Nhập</h3>

                         @if (session('errorr'))
                                <h6 style="color: red">{{session('errorr')}}</h6>
                        @endif
                       

                        <hr style="border: 2px solid  #00C851;"><br>
                           
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form form-sm">
                                    <input type="email" id="email" name="email" class="form-control">
                                    <label for="email" class="">Email đăng nhập</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form form-sm">
                                    <input type="password" id="password" name="password" class="form-control">
                                    <label for="password" class="">Mật khẩu</label>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-left:30px;">
                                <div class="main-container__column material-checkbox-group material-checkbox-group_success">
                                    <input type="checkbox" id="accept_rule" name="accept_rule" class="material-checkbox">
                                    <label class="material-checkbox-group__label" for="accept_rule">Ghi nhớ đăng nhập</label>
                                    <label id="accept-rule-error" class="error"  for="accept_rule"></label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <a style="font-size:14px;" href="#"><u>Quên mật khẩu</u></a>
                            </div>
                        </div>
                        <div class ="col-md-8 offset-md-4">
                            <button type="submit" id="submit_form" class="btn btn-success">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
