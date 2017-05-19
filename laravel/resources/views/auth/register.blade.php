@extends('layouts.app')

@section('content')

<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
    form label {
        font-size: 12px;
    }
</style>
<div class="container" style="margin-top: 30px;">
        <div class="row ">
        <div class="col-md-6 offset-md-3"> 
            <form style="margin-top:30px;" class="form-horizontal role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field()}}
                <h3 style="padding-top:50px;">Đăng Ký Thành Viên</h3><hr style="border: 2px solid  #00C851;"><br>
                <div class="row">
                    <div class="col-md-5">
                        <div class="md-form form-sm">
                            <input type="text" id="user_name" name="user_name" class="form-control"/>
                            <label for="user_name" class="">Tên đăng nhập</label>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1">
                        <div class="md-form form-sm">
                            <input type="email" id="email" name="email" class="form-control"/>

                            <label for="email" class="">Email</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="md-form form-sm">
                            <input type="password" id="password" name="password" class="form-control"/>
                            <label for="password" class="">Mật khẩu</label>
                        </div>
                    </div>
                     <div class="col-md-6 offset-md-1">
                        <div class="md-form form-sm">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"/>
                            <label for="password_confirmation" class="">Nhập lại mật khẩu</label>
                        </div>
                    </div>
                     <div class="col-md-5">
                        <div class="md-form form-sm">
                            <input type="text" id="name" name="name" class="form-control"/>

                            <label for="name" class="">Họ và tên</label>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1"> 
                        <div class="md-form form-sm">
                            <input type="number" id="phone" name="phone" class="form-control"/>
                            <label for="phone" class="">Số điện thoại</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="md-form form-sm">
                            <input type="text" id="class" name="class" class="form-control"/>
                            <label for="class" class="">Lớp/Chuyên ngành</label>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1"> 
                        <div class="md-form form-sm">
                            <input type="text" id="local" name="local" class="form-control"/>
                            <label for="local" class="">Tỉnh/Thành Phố</label>
                        </div>
                    </div>
                    <div class="col-sm-8 offset-md-4" style="padding-top: 20px;">
                        <div class="main-container__column material-checkbox-group material-checkbox-group_success">
                            <input type="checkbox" id="accept_rule" name="accept_rule" class="material-checkbox"/>
                            <label class="material-checkbox-group__label" for="accept_rule">Tôi đồng ý với các <a href="#">điều khoản</a></label>
                            <label id="accept-rule-error" style="color: red" class="error"  for="accept_rule"></label>
                        </div>
                    </div>
                </div>
                <div class ="col-md-8 offset-md-4">
                    <a id="submit_form" class="btn btn-success">Đăng Ký Ngay</a>
                </div>
                </div>
            </form>
        </div>   
    </div>
</div>

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

               

                
            }


        });
   });
</script>
@endsection