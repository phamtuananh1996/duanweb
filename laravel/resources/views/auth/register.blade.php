@extends('layouts.app')
@section('extend_header')
<link href="{{asset('pmd/components/textfield/css/textfield.css')}}" type="text/css" rel="stylesheet"/>
<link href="{{asset('pmd/components/checkbox/css/checkbox.css')}}" type="text/css" rel="stylesheet"/>
<link href="{{asset('pmd/components/select2/css/select2.min.css')}}" type="text/css" rel="stylesheet"/>
<link href="{{asset('pmd/components/select2/css/select2-bootstrap.css')}}" type="text/css" rel="stylesheet"/>
<link href="{{asset('pmd/components/select2/css/pmd-select2.css')}}" type="text/css" rel="stylesheet"/>
@endsection

@section('content')
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
    form label {
        font-size: 12px;
    }
</style>
<div class="container" style="margin-top: 100px;">
    <div class="row ">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 30px; border: solid 1px #c8e6c9; background: white;"> 
            <form style="padding-bottom:30px;" class="form-horizontal role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field()}}
                <h3 style="padding-top:10px;">Đăng Ký Thành Viên</h3><hr style="border: 2px solid  #00C851;"><br>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group pmd-textfield">
                            <label for="user_name" class="control-label">Tên đăng nhập</label>
                            <input type="text" id="user_name" name="user_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="form-group pmd-textfield">
                            <label for="email" class="control-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group pmd-textfield">
                            <label for="password" class="control-label">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="form-group pmd-textfield">
                            <label for="password_confirmation" class="control-label">Nhập lại mật khẩu</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group pmd-textfield">
                        <label for="name" class="control-label">Họ và Tên</label>
                        <input type="text" id="name" name="name" class="form-control" type="password">
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="form-group pmd-textfield">
                            <label for="phone" class="control-label">Số điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form-control" type="password">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group pmd-textfield">
                        <label for="class" class="control-label">Lớp/Chuyên ngành</label>
                        <input type="text" id="class" name="class" class="form-control" type="password">
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-2">
                        <div class="form-group pmd-textfield pmd-textfield-floating-label">       
                            <label>Tỉnh/Thành Phố</label>
                            <select class="select-simple form-control pmd-select2">
                                <option>Hà Nội</option>
                                <option>Hải Phòng</option>
                                <option>TP Hồ Chí Minh</option>
                                <option>Hải Dương</option>
                                <option>Hưng Yên</option>
                                <option>Nam Định</option>
                                <option>Quảng Ninh</option>
                                <option>Đà Nẵng</option>
                                <option>Ninh Bình</option>
                                <option>Thanh Hoá</option>
                                <option>Quảng Bình</option>
                                <option>Phú Yên</option>
                                <option>Hà Giang</option>
                                <option>Bắc Giang</option>
                                <option>Sơn La</option>
                                <option>Điện Biên</option>
                                <option>Lào Cai</option>
                                <option>Yên Bái</option>
                                <option>Quy Nhơn</option>
                                <option>Bến Tre</option>
                                <option>Quảng Nam</option>
                                <option>Nghệ An</option>
                                <option>Thái Bình</option>
                                <option>Khánh Hoà</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-offset-4" style="padding-top: 20px;">
                    <div class="checkbox pmd-default-theme">
                        <label class="pmd-checkbox pmd-checkbox-ripple-effect">
                            <input type="checkbox" value="" id="accept_rule" checked>
                            <span>Tôi đồng ý với điều khoản</span>
                        </label>
                    </div>
                </div>
                <div class ="col-md-8 col-md-offset-4" style="margin-top: 20px; margin-bottom: 20px;">
                    <button type="submit" id="submit_form" class="btn btn-success"> Đăng Ký Ngay </button >
                </div>
            </div>
            
        </div>
    </form>
</div>   
</div>
</div>
<!-- Propeller textfield js -->

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
<script type="text/javascript" src="{{asset('pmd/components/textfield/js/textfield.js')}}"></script>
<!-- Propeller checkbox js -->
<script type="text/javascript" src="http://propeller.in/components/checkbox/js/checkbox.js"></script>
<!-- Select2 js-->
<script type="text/javascript" src="http://propeller.in/components/select2/js/select2.full.js"></script>
<!-- Propeller Select2 -->
<script type="text/javascript">
    $(document).ready(function() {

        <!-- Simple Selectbox -->
        $(".select-simple").select2({
            theme: "bootstrap",
            minimumResultsForSearch: Infinity,
        });
        
    });
</script>

<!-- Propeller Select2 -->
<script type="text/javascript" src="http://propeller.in/components/select2/js/pmd-select2.js"></script>

@endsection