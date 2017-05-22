{{-- created by nham on 22.05.2017 --}}

@extends('users.info')

@section('info_content')
<form class="form-horizontal role="form" method="POST" action="#" style="padding:30px; border:solid 1px green; margin-right: 30px; margin-top: 30px; background: white;">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group pmd-textfield">
				<label for="first-name" class="control-label">
					Ten dang nhap
				</label>
				<input type="text" disabled="" value="{{$user->user_name}}" id="disabled" class="mat-input form-control">
			</div>
		</div>
		<div class="col-md-5 col-md-offset-1">
			<div class="form-group pmd-textfield">
				<label for="first-name" class="control-label">
					Email
				</label>
				<input type="text" disabled="" value="{{$user->email}}" id="disabled" class="mat-input form-control">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group pmd-textfield">
				<label for="Small">Ho va ten</label>
				<input type="text" id="Small" class="form-control" value="{{$user->name}}">
			</div>
		</div>
		<div class="col-md-5 col-md-offset-1">
			<div class="form-group pmd-textfield pmd-textfield-floating-label" >       
				<label>Tỉnh/Thành Phố </label>
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
		<div class="col-md-5">
			<div class="form-group pmd-textfield">
				<label for="Small">Lớp/Chuyên ngành</label>
				<input type="text" id="Small" class="form-control" value="{{$user->class}}">
			</div>	
		</div>
		<div class="col-md-5 col-md-offset-1">
			<div class="form-group pmd-textfield pmd-textfield-floating-label">       
				<label>Năm sinh</label>
				<select class="select-simple form-control pmd-select2">
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
				</select>
			</div>
		</div>
		<div class="col-md-5 ">
			<div class="form-group pmd-textfield">
				<label for="Small">Số điện thoại</label>
				<input type="text" id="Small" class="form-control" value="{{$user->phone}}">
			</div>	
		</div>
		<div class="col-md-5 col-md-offset-1">
			<div class="form-group pmd-textfield">
				<label for="Small">ảnh đại diện</label>
				<input type="file" name="avatar" id="avatar" >
			</div>	
		</div>

		<div class="col-md-12">
			<div class="form-group pmd-textfield">
			  	<label class="control-label">Giới thiệu bản thân</label>
			  	<textarea required class="form-control" value"{{$user->desciption}}"></textarea>
			</div>
		</div>
		<div class="col-md-5" style="margin-top: 15px;">
			<div class="form-group pmd-textfield">
				<label style="color:#4B515D; margin-top: 15px; margin-right: 20px;" for="Small">Giới tính</label>
				<label class="radio-inline pmd-radio pmd-radio-ripple-effect">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
					<span for="inlineRadio1">Nam</span>
				</label>
				<label class="radio-inline pmd-radio pmd-radio-ripple-effect">
					<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
					<span for="inlineRadio2">Nữ</span>
				</label>
			</div>
		</div>
		<div class ="col-md-8 col-md-offset-4" style="margin-top: 20px; margin-bottom: 20px;align:center;">
                    <button type="submit" id="submit_form" class="btn btn-success">Lưu Lại</button >
                </div>
	</div>
</form>
@endsection