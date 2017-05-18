@extends('layouts.app')

@section('content')

<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
    form label {
        font-size: 12px;
    }
</style>
<div class="container">
    <div class="row">
        <div class=" col-xs-12 col-sm-6 col-md-6 col-md-offset-3">
            <form class="form-horizontal" id="form_register" method="POST" action="{{ route('register') }}">
                {{ csrf_field()}}
                <h3 class="text-center"> Đăng Ký Thành Viên</h3>
                <br>
                <br>
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-12 col-sm-6 col-md-7">
                            <div class="col-md-4">
                                <div class="main-container__column">        
                                    <div class="form-group materail-input-block materail-input-block_success materail-input_slide-li">
                                        <input type="text" required minlength="3" maxlength="100" name="user_name" id="user_name" class="form-control materail-input" placeholder="Tên đăng nhập"/>
                                        <span class="materail-input-block__line"></span>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 col-xs-offset-1">
                                <div class="main-container__column">        
                                    <div class="form-group  materail-input-block materail-input-block_success materail-input_slide-line">
                                        <input type="email" name="email" id="email" class="form-control materail-input" required placeholder="Email">
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
                                        <input type="password" required name="password" id="password" class="form-control materail-input" placeholder="Mật khẩu">
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
                        <label id="accept-rule-error" class="error"  for="accept_rule"></label>
                    </div>
                </div>
                <br><br><br>
                <div class ="col-md-4 col-xs-offset-4">
                    <div class="main-container__column">
                        <a id="submit_form" class="btn material-btn material-btn_primary">Đăng Ký Ngay</a>
                    </div>
                </div>
            </form>

        </div>   
    </div><!--//row-->
</div><!--//masonry-->



<script type="text/javascript">
   $(document).ready(function() {
        $("#accept_rule").change(function(event) {
            if ($('#accept_rule').is(":checked"))
            {
                 $('#accept-rule-error').html("");
            }
            else
            {
                 $('#accept-rule-error').html("Bạn chưa đồng ý với các điều khoản");
            }
        });
         

        $('#submit_form').click(function(event) {
           if ($('#accept_rule').is(":checked"))
            {
                 $('form').submit();
            }
            else
            {
                $('#accept-rule-error').html("Bạn chưa đồng ý với các điều khoản");
            }
           
         
        });



       $('form').validate(
        {
            rules: {
                user_name: {
                    required: true,
                    minlength: 3,
                    maxlength:100,
                    remote: 
                    {
                        url: "ajax/checkusername",
                        type: "post",
                         data: {
                           username: function() {
                           return $( "#user_name" ).val();
                                 }
                             }
                    }
                },
                
                email: {
                    required: true,
                    email: true,
                    remote: 
                    {
                        url: "ajax/checkemail",
                        type: "post",
                         data: {
                           email: function() {
                           return $( "#email" ).val();
                                 }
                             }
                    }
                },

                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 30
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                 name: {
                    required: true,
                    minlength:2,
                    maxlength:50,
                },
                phone:{
                    required:true,
                    minlength:10,
                    maxlength:11,
                    number:true,
                },

                 class:{
                    required:true,
                    maxlength:191,
                   
                },

                local:{
                    required:true,
                    maxlength:191,
                },
               
               
                
            },

             messages: {
                user_name: {
                    required: "Tên đăng nhập không được để trống!",
                    maxlength: "Tên đăng nhập không được quá 100 kí tự!",
                    minlength: "Tên đăng nhập phải trên 3 kí tự!",
                    remote:"Tên đăng nhập này đã được sử dụng ! "
                },

                email: {
                    required: "Email không được để trống!",
                    email: "Phải là email!",
                    remote:"Email này đã được sử dụng !"

                },

                 password: {
                    required: "Mật khẩu không được để trống!",
                    minlength: "Mật khẩu phải từ 6 đến 30 kí tự!",
                    maxlength: "Mật khẩu phải từ 6 đến 30 kí tự!",
                },

                password_confirmation: {
                    required: "Mật khẩu không được để trống!",
                    equalTo: "Mật khẩu không khớp !"
                },

                name: {
                    required: "Tên không được để trống !",
                    minlength:"Tên phải từ 2 đến 50 kí tự !",
                    maxlength:"Tên phải từ 2 đến 50 kí tự !",
                },

                 phone:{
                    required:"Số điện thoại không được để trống !",
                    minlength:"Không phải sô điện thoại !",
                    maxlength:"Không phải sô điện thoại !",
                    number:"Không phải sô điện thoại !",
                },

                class:{
                    required:"Lớp/chuyên môn Không được để trống!",
                },

                local:{
                    required:"Tỉnh thành phố không được để trống!",
                    
                },

                
            }


        });
   });
</script>

@endsection