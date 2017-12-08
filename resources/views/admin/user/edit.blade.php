@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 会员编辑<span> 编辑</span></h2>
</div>
@stop
@section('nr')
<!-- 主题表单 -->
<section class="col-md-7 col-md-offset-2 tile color transparent-black">
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>Sam会员</strong>基本信息</h1>
    <div class="controls">
      <a href="#" class="remove"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <!-- /tile header -->
  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/user/{{$rs->id}}" method="post">
      {{csrf_field()}}
	  {{method_field('PUT')}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">用户名</label>
        <div class="col-sm-8">
          <input disabled="disabled" name="name" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$rs->name}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-4 control-label">邮箱</label>
        <div class="col-sm-8">
          <input name="email" type="email" class="form-control parsley-validated" id="email" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1" value="{{$rs->email}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="website" class="col-sm-4 control-label">手机号</label>
        <div class="col-sm-8">
          <input name="phone" type="text" class="form-control parsley-validated" id="website" parsley-trigger="change" parsley-minlength="4" parsley-type="url" parsley-validation-minlength="1" value="{{$rs->phone}}">
          <label></label>
        </div>
      </div>

      <div class="form-group form-footer">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-default">修改</button>
          <button type="reset" class="btn btn-default">重写</button>
        </div>
      </div>

    </form>

  </div>
  <!-- /tile body -->
</section>
<!-- 详细信息 -->


@stop