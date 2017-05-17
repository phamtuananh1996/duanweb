@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
            <form class="form-horizontal role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field()}}
                <h3 class="text-center"> Đăng Ký Thành Viên</h3>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 col-sm-6 col-md-7">
                            <div class="col-md-4">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-li">
                                        <input type="text" name="user_name" id="user_name" class="form-control materail-input" placeholder="Tên đăng nhập">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-offset-1">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="email" name="email" id="email" class="form-control materail-input" placeholder="Email">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 col-sm-6 col-md-7">
                            <div class="col-md-4">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-li">
                                        <input type="password" name="password" id="password" class="form-control materail-input" placeholder="Mật khẩu">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-offset-1">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control materail-input" placeholder="Nhập lại mật khẩu">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 col-sm-6 col-md-7">
                            <div class="col-md-4">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-li">
                                        <input type="text" name="name" id="name" class="form-control materail-input" placeholder="Họ và tên">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-offset-1">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="text" name="phone" id="phone" class="form-control materail-input" placeholder="Số điện thoại">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 col-sm-6 col-md-7">
                            <div class="col-md-4" >
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="text" name="class" id="class" class="form-control materail-input" placeholder="Lớp/Chuyên môn">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-offset-1">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="text" name="local" id="local" class="form-control materail-input" placeholder="Tỉnh/Thành phố">
                                        <span class="materail-input-block__line"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{--form container --}}
                 <br><br>
                <div class ="col-md-6 col-xs-offset-4">
                    <div class="main-container__column material-checkbox-group material-checkbox-group_success">
                        <input type="checkbox" id="accept_rule" name="accept_rule" class="material-checkbox">
                        <label class="material-checkbox-group__label" for="accept_rule">Tôi đồng ý với các điều khoản</label>
                    </div>
                </div>
                <br><br><br>
                <div class ="col-md-4 col-xs-offset-4">
                    <div class="main-container__column">
                        <button type="submit" class="btn material-btn material-btn_primary">Đăng Ký Ngay</button>
                    </div>
                </div>
            </form>
        </div>   
    </div><!--//row-->
</div><!--//masonry-->
@endsection