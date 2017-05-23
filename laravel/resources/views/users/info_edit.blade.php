{{-- created by nham on 22.05.2017 --}}

@extends('users.info')

@section('info_content')
<script src="{{ asset('plugins/jquery.validate.js') }}"></script>
<style type="text/css">
   .error{
        font-size: 13px !important;
        color: red !important;
    }
    
</style>
<form class="form-horizontal role="form" method="POST" action="{{url('/users/infoEdit')}}" enctype="multipart/form-data" id="form_edit" style="padding:30px; border:solid 1px #bdbdbd; margin-right: 15px; margin-top: 30px; background: white;">
	{{csrf_field()}}
	<div class="row">
		<div class="col-md-6">
			<div class="form-group pmd-textfield">
				<label for="first-name" class="control-label">
					Tên đăng nhập
				</label>
				<input type="text" disabled="" value="{{$user->user_name}}" id="disabled" class="mat-input form-control">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group pmd-textfield">
				<label for="first-name" class="control-label">
					Email
				</label>
				<input type="text" disabled="" value="{{$user->email}}" id="disabled" class="mat-input form-control">
			</div>
		</div>
		

		<div class="col-md-6">
			<div class="form-group pmd-textfield">
				<label for="Small">Họ và Tên</label>
				<input type="text" id="Small" name="name" required minlength="2" maxlength="50" class="form-control" value="{{$user->name}}">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group pmd-textfield pmd-textfield-floating-label" >       
				<label>Tỉnh/Thành Phố </label>
				<select class="select-simple form-control pmd-select2" name="local">
					<option>{{$user->local}}</option>
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
		<div class="col-md-6">
			<div class="form-group pmd-textfield">
				<label for="Small">Lớp/Chuyên ngành</label>
				<input type="text" id="Small" class="form-control" name="class" value="{{$user->class}}">
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group pmd-textfield pmd-textfield-floating-label">       
				<label">Năm sinh</label>
				<select class="select-simple form-control pmd-select2" name="birthday">
					@if ($user->birthday)
						<option>{{$user->birthday}}</option>
					@endif
					<option>1970</option>
					<option>1971</option>
					<option>1972</option>
					<option>1973</option>
					<option>1974</option>
					<option>1975</option>
					<option>1976</option>
					<option>1977</option>
					<option>1978</option>
					<option>1979</option>
					<option>1980</option>
					<option>1981</option>
					<option>1982</option>
					<option>1983</option>
					<option>1984</option>
					<option>1985</option>
					<option>1986</option>
					<option>1987</option>
					<option>1988</option>
					<option>1989</option>
					<option>1990</option>
					<option>1991</option>
					<option>1992</option>
					<option>1993</option>
					<option>1994</option>
					<option>1995</option>
					<option>1996</option>
					<option>1997</option>
					<option>1998</option>
					<option>1999</option>
					<option>2000</option>
					<option>2001</option>
					<option>2002</option>
					<option>2003</option>
					<option>2004</option>
				</select>
			</div>
		</div>
		<div class="col-md-6 ">
			<div class="form-group pmd-textfield">
				<label for="Small">Số điện thoại</label>
				<input type="text" id="Small" name="phone" class="form-control" value="{{$user->phone}}">
			</div>	
		</div>
		<div class="col-md-6">
			<div class="form-group pmd-textfield">
				<label for="Small">ảnh đại diện</label>
				<input type="file" accept="image/*" max="" name="avatar" id="avatar" >
			</div>	
		</div>
		<div class="col-md-12" style="margin-top: 15px;">
			<div class="form-group pmd-textfield">
				<label style="color:#4B515D; margin-top: 15px; margin-right: 20px;" for="Small">Giới tính</label>
				<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 13px;">
					<input type="radio" checked name="gender" id="inlineRadio1" value="1">
					<span for="inlineRadio1">Nam</span>
				</label>
				<label class="radio-inline pmd-radio pmd-radio-ripple-effect" style="margin-bottom: 13px;">
					<input type="radio" name="gender" id="inlineRadio2" value="0">
					<span for="inlineRadio2">Nữ</span>
				</label>
			</div>
		</div>
		<div class="col-md-12">
			<div class="form-group pmd-textfield">
			  	<label class="control-label">Giới thiệu bản thân</label>
			  	<textarea  class="form-control" id="description" name="description" >{{$user->description}}</textarea>
			  	<script>
    				CKEDITOR.replace( 'description' );
				</script>
			</div>
		</div>
		
		<div class ="col-md-12" style="margin-top: 20px; margin-bottom: 20px;">
                    <button type="submit" id="submit_form" class="btn btn-success">Lưu Lại</button >
                </div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {

		$.validator.addMethod('filesize', function(value, element, param) {
    
    		return this.optional(element) || (element.files[0].size <= param) 
		});

		$('#form_edit').validate({
			rules:{
				avatar:
				{
					filesize:2097152 
				}
			},
			messages:{
				name:{
					required:'Không được để trống trường này!',
				},
				avatar:{
					filesize:'Kích thước ảnh phải nhỏ hơn 2MB!',
				}
			}
			});
		
	});
</script>
@endsection