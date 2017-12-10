@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 商品添加页<span> Sam 商品添加页</span></h2>   
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
	
  select[name="flid"]{
  background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
  }
</style>



<section class="col-md-7 col-md-offset-2 tile color transparent-black">	
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>Sam商品</strong>添加页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/goods" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">商品标题</label>
        <div class="col-sm-8">
          <input name="title" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">商品分类</label>
        <div class="col-sm-8">
          <select name="flid" class="form-control parsley-validated">
            <option value="0">顶级分类</option>
          </select>
        </div>
      </div>
      
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">库存</label>
        <div class="col-sm-8">
          <input name="num" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">价格</label>
        <div class="col-sm-8">
          <input name="price" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">描述</label>
        <div class="col-sm-8">
          <input name="content" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
            <label class="col-sm-4 control-label">状态</label>
            <div class="col-sm-8">
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios1" value="1" checked="">
                    <label for="optionsRadios1">上架</label>
                </div>
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios2" value="2">
                    <label for="optionsRadios2">下架</label>
                </div>
            </div>
        </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">商品图片</label>
        <div class="col-sm-8">
          <input name="imgs[]" type="file" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" multiple="" accept="image/png,image/jpeg">
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
