@extends('admin.layouts.master')
@section('content')
<section class="content-header">
  <h1>
    User 
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">User create</li>
  </ol>
</section>
<section class="content">
 <div class="row">
  <div class="col-sm-12">
    <div class="box">
      <div class="panel-body">
        <div class="form">
          <form class="form-validate form-horizontal" action="{{ route('showUser',$user->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group ">
              <label class="control-label col-lg-2">Role *</label>
              <div class="col-lg-8">
                <select name="role" class="form-control">
                  <option value="" selected="selected">Role</option>
                  @foreach($role as $value)
                  <option 
                  @if($value->id == $user->role_id) {{"selected"}} @endif value="{{$value->id}}">{{$value->title}}</option>
                  @endforeach
                </select>
                @if($errors->has('role'))<p style="color: red;">{{$errors->first('role')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Name *</label>
              <div class="col-lg-8">
                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Tên">
                @if($errors->has('name'))<p style="color: red;">{{$errors->first('name')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">User name *</label>
              <div class="col-lg-8">
                <input type="text" name="user_name" class="form-control" value="{{$user->user_name}}" placeholder="Tên đăng nhập">
                @if($errors->has('user_name'))<p style="color: red;">{{$errors->first('user_name')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Email *</label>
              <div class="col-lg-8">
                <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Email">
                @if($errors->has('email'))<p style="color: red;">{{$errors->first('email')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Phone/Class *</label>
              <div class="col-lg-4">
                <input type="text" name="phone" class="form-control" value="{{$user->phone}}" placeholder="Điện thoại">
                @if($errors->has('phone'))<p style="color: red;">{{$errors->first('phone')}}</p>@endif
              </div>
              <div class="col-lg-4">
                <input type="text" name="class" class="form-control" value="{{$user->class}}" placeholder="Lớp">
                @if($errors->has('class'))<p style="color: red;">{{$errors->first('class')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Gender/Birthday </label>
              <div class="col-lg-3">
                <select class="form-control" name="gender">
                  <option value="">Giới tính</option>
                  <option value="1" @if($user->gender=='1') selected="selected" @endif>Nam</option>
                  <option value="0" @if($user->gender=='0') selected="selected" @endif>Nữ</option>
                  <option value="2" @if($user->gender=='2') selected="selected" @endif>KXD</option>
                </select>
                @if($errors->has('gender'))<p style="color: red;">{!!$errors->first('gender')!!}</p>@endif
              </div>
              <div class="col-lg-2 date">
                <input type="text" name="birthday" class="form-control pull-right" value="{{$user->birthday}}" id="datepicker1" placeholder="Ngày sinh" >
                @if($errors->has('birthday'))<p style="color: red;">{!!$errors->first('birthday')!!}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Avatar </label>
              <div class="col-lg-8">
                <p><img width="200px" height="100px" src="{{asset('images/users/'.$user->avatar)}}"></p>
                <input type="file" name="avatar" class="form-control">
                @if($errors->has('avatar'))<p style="color: red;">{{$errors->first('avatar')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Local *</label>
              <div class="col-lg-8">
                <input type="text" name="local" class="form-control" value="{{$user->local}}" placeholder="">
                @if($errors->has('local'))<p style="color: red;">{{$errors->first('local')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Coin *</label>
              <div class="col-lg-8">
                <input type="text" name="coin" class="form-control" value="{{$user->coin}}" placeholder="">
                @if($errors->has('coin'))<p style="color: red;">{{$errors->first('coin')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Password *</label>
              <div class="col-lg-8">
                <input type="password" name="password" class="form-control" value="{{$user->password}}" readonly="" placeholder="Mật khẩu">
                @if($errors->has('password'))<p style="color: red;">{!!$errors->first('password')!!}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Description </label>
              <div class="col-lg-8">
                <input type="text" name="description" class="form-control" value="{{$user->description}}" placeholder="Mô tả">
                @if($errors->has('description'))<p style="color: red;">{{$errors->first('description')}}</p>@endif
              </div>
            </div>
            <div class="form-group ">
              <label class="control-label col-lg-2">Status *</label>
              <div class="col-lg-4">
                <select class="form-control" name="status">
                  <option value="1">Trạng thái tài khoản</option>
                  <option value="1" @if($user->status=='1') selected="selected" @endif>Kích hoạt</option>
                  <option value="0" @if($user->status=='0') selected="selected" @endif>Không kích hoạt</option>
                </select>
                @if($errors->has('status'))<p style="color: red;">{!!$errors->first('status')!!}</p>@endif
              </div>
              <div class="col-lg-4">
                <input type="text" name="code" class="form-control" value="{{$user->code}}" placeholder="">
                @if($errors->has('code'))<p style="color: red;">{{$errors->first('code')}}</p>@endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-8">
                <button type="submit" class="btn btn-default">Lưu</button>
                <button type="reset" class="btn btn-default">Thoát</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@stop
@section('script')
<script src='{{asset("/template/plugins/colorpicker/bootstrap-colorpicker.min.js")}}'></script>
<script src='{{asset("/template/plugins/datepicker/bootstrap-datepicker.js")}}'></script>

<script>
  $(document).ready(function(){
    $('#datepicker1').datepicker({ dateFormat: 'dd-mm-yy' }).val();
  });
</script>
@stop