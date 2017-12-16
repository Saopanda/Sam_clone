@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> Sam站点设置<span> Sam 站点设置</span></h2>   
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
    <h1><strong>Sam站点</strong>修改页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/samsite/{{$res->id}}" method="post">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">网页名字</label>
        <div class="col-sm-8">
          <input name="webname" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->webname}}">
          <label></label>
        </div>
      </div> 
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">版权</label>
        <div class="col-sm-8">
          <input name="copyright" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->copyright}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">在网时间</label>
        <div class="col-sm-8">
          <input name="time" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->time}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">备案号</label>
        <div class="col-sm-8">
          <input name="beianhao" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->beianhao}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">公网备案号</label>
        <div class="col-sm-8">
          <input name="gongwangbeian" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->gongwangbeian}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">页面类型</label>
        <div class="col-sm-8">
          <input name="weizhi" type="text"  disabled="" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$res->weizhi}}" style="color: #fff;">
          <label></label>
        </div>
      </div>

      <div class="form-group form-footer">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-default">设置</button>
          <button type="reset" class="btn btn-default">重写</button>
        </div>
      </div>

    </form>

  </div>
  <!-- /tile body -->
</section>
@stop