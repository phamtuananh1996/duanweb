@extends('users.info')
@section('info_content')	
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

	<div class="row">
		<div class="col-md-12 user-info-section" style=" margin-left:10px;background: #fff;">
			<h3 style="padding:10px; width:100%; background:#2bbbad; color:#f5f5f5;">{{$user->name}}</h3>
			<p style="padding: 10px; border-bottom:solid 3px #2bbbad;">{{$user->description}}</p>
		</div>
		<div class="col-md-12 user-info-section" style=" margin:20px 0 10px 10px; background: #fff;">
			<h3 style="padding:10px; width:100%; background:#2bbbad; color:#f5f5f5;">Thông tin chi tiết</h3>
			<div id="list-info">
				<ul class="list-group " style="color:#00695c">
				    <li class="list-group-item"> 
				       <i class="fa fa-graduation-cap " aria-hidden="true"></i>&#32;<span class="gray-text">Đang học</span>  <strong>{{$user->class}}</strong> 
				    </li>
				    <li class="list-group-item"> 
				       <i class="fa fa-map-marker fa-lg" aria-hidden="true"></i>&#32;<span class="gray-text"> Sống tại</span> <strong>{{$user->local}}</strong>
				    </li>
				    <li class="list-group-item"> 
				       <i class="fa fa-mars-stroke " aria-hidden="true"></i> &#32;<span class="gray-text">Giới tính</span> 
				       	<strong>@if($user->gender == 1) Nữ @else Nam @endif</strong>
				    </li>
				    <li class="list-group-item"> 
				       <i class="fa fa-birthday-cake" aria-hidden="true"></i>&#32; <span class="gray-text"> Ngày sinh</span> <strong>{{$user->birthday}}</strong>
				    </li>
				    <li class="list-group-item"> 
				       <i class="fa fa-envelope" aria-hidden="true"></i>&#32;<span class="gray-text">Email</span> <strong>{{$user->email}}</strong>
				    </li>
				    <li class="list-group-item">
				    	<i class="fa fa-mobile fa-lg" aria-hidden="true"></i>&#32; <span class="gray-text">Điện thoại</span>  <strong>{{$user->phone}}</strong>
				    </li>
				</ul>
				<button style="margin-bottom: 20px;" type="button" class="btn pmd-btn-outline pmd-ripple-effect btn-info col-md-4 col-md-offset-4" id="edit-info-btn"><i class="fa fa-cog" aria-hidden="true"></i> Sửa thông tin</button>
			</div>
			<div class="row" id="info-edit-group" style="display: none;">
				<h2 style="margin-top: 20px; margin-bottom: 20px;" class="text-center">Sửa thông tin cá nhân</h2>
				<div class="col-md-4 col-md-offset-1 form-group pmd-textfield">
				  	<label for="regular1" class="control-label">
				   Lớp/Chuyên ngành
				  	</label>
				  	<input type="text" id="regular1" class="form-control" value="{{$user->class}}">
				</div>
				<div class="col-md-4 col-md-offset-1 form-group pmd-textfield">
				  <label for="regular1" class="control-label">
				    Nơi ở
				  </label>
				  <input type="text" id="regular1" class="form-control" value="{{$user->local}}">
				</div>
				<div class="col-md-4 col-md-offset-1 form-group pmd-textfield">
				  <label for="regular1" class="control-label">
				   Email
				  </label>
				  <input type="text" id="regular1" class="form-control" value="{{$user->email}}">
				</div>
				<div class="col-md-4 col-md-offset-1 form-group pmd-textfield">
				  <label for="regular1" class="control-label">
				   Số điện thoại
				  </label>
				  <input type="text" id="regular1" class="form-control" value="{{$user->phone}}">
				</div>
				<div class="col-md-4 col-md-offset-1">
					<span style="margin-right:20px;">Giới tính:</span>
					<input type="radio" name="gender" id="" value="option1">
					<span for="inlineRadio1">Nam</span>
					<input style="margin-left: 20px;" type="radio" name="gender" id="mael" value="option1">
					<span for="inlineRadio1">Nữ</span>
				</div>
				<div class="col-md-4 col-md-offset-1">	
					<div class="input-group input-append date" id="datePicker">
						<input type="text" class="form-control" name="date" placeholder="Ngày sinh" value="{{$user->birthday}}" />
						<span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
				<div class="col-md-4 col-md-offset-4" style="margin-top:40px; margin-bottom: 20px;">
					<button id="edit-submit"  type="button" class="btn pmd-btn-outline pmd-ripple-effect btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu lại</button>
					<button id="edit-cancel" type="button" class="btn pmd-btn-outline pmd-ripple-effect btn-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> Huỷ bỏ</button>
				</div>
			</div>
		</div>
	</div>
	<script>
$(document).ready(function() {
	$('#edit-info-btn').on('click',function(event) {
		$('#list-info').hide();
		$('#info-edit-group').show();
	});

	$('#edit-cancel').on('click',function(event) {
		$('#list-info').show();
		$('#info-edit-group').hide();
	});

    $('#datePicker')
        .datepicker({
            format: 'mm/dd/yyyy'
        })
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
@endsection