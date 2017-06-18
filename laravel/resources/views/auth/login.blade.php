@extends('layouts.app')
@section('extend_header')
<link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
<link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
@endsection
@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top: 30px; border: solid 1px #c8e6c9; background: white;">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">
                   <form style="margin-top:30px;" class="form-horizontal role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field()}}
                        <h3 class="text-center" style="padding-top:50px;">Đăng Nhập</h3>

                         @if (session('errorr'))
                                <h6 style="color: red">{{session('errorr')}}</h6>
                        @endif
                       

                        <hr style="border: 2px solid  #00C851;"><br>
                           
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pmd-textfield">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group pmd-textfield">
                                    <label for="password" class="control-label">Mật khẩu</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-left:30px;">
                                <div class="checkbox pmd-default-theme">
                                    <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                                        <input type="checkbox" value="" id="accept_rule" checked>
                                        <span>Ghi nhớ đăng nhập</span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="back_url" value="{{session('url_back')}}">
                            <div class="col-md-5">
                                <a style="font-size:14px;" href="#"><u>Quên mật khẩu</u></a>
                            </div>
                            <div class ="col-md-8 col-md-offset-4" style="margin-top: 20px; margin-bottom: 20px;">
                            <button type="submit" id="submit_form" class="btn btn-success">Đăng Nhập</button>
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{asset('pmd/components/textfield/js/textfield.js')}}"></script>
<!-- Propeller checkbox js -->
<script type="text/javascript" src="{{asset('pmd/components/checkbox/js/checkbox.js')}}"></script>
<!-- Select2 js-->
@endsection 
