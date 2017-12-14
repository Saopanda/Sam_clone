@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 添加管理员 <span>sam  管理员添加页</span></h2>    
</div>
@stop
@section('nr')
<style>
	label{
		font-weight: normal;
	}
	.btn-default{
		opacity: 0.7
	}
	.has-error{
		color: #FF9999;
	}
	
</style>



<section class="col-md-7 col-md-offset-2 tile color transparent-black">	
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>Sam管理员</strong>添加页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/samsite" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">网页名字</label>
        <div class="col-sm-8">
          <input name="webname" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>      

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">版权</label>
        <div class="col-sm-8">
          <input name="copyright" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">在网时间</label>
        <div class="col-sm-8">
          <input name="time" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">备案号</label>
        <div class="col-sm-8">
          <input name="beianhao" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">公网备案号</label>
        <div class="col-sm-8">
          <input name="gongwangbeian" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">页面类型</label>
        <div class="col-sm-8">
          <input name="weizhi" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="">
          <label></label>
        </div>
      </div>


      <div class="form-group form-footer">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-default">添加</button>
          <button type="reset" class="btn btn-default">重写</button>
        </div>
      </div>

    </form>

  </div>
  <!-- /tile body -->
</section>
@stop