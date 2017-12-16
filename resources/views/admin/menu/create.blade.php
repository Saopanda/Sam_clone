@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 菜单权限添加<span> Sam 后台菜单权限添加</span></h2>   
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
	select[name="roles"]{
	height: 40px;
 	background-color: rgba(0, 0, 0, 0.3);
 	border:0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
  }
</style>



<section class="col-md-7 col-md-offset-2 tile color transparent-black">	
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>Sam栏目权限</strong>添加页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/menuroles" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">请输入管理员ID</label>
        <div class="col-sm-8">
          <input name="adminid" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" onafterpaste="this.value=this.value.replace(/[^\d]/g,'') ">
          <label></label>
        </div>
      </div>      
      
	  <div class="form-group">
            <label class="col-sm-4 control-label">添加权限</label>
            <div class="col-sm-8">           	 
	              <div class="checkbox check-transparent">
		                <input type="checkbox" name="menuid[]" value="1" id="opt01">
		                <label for="opt01">站点管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="2" name="menuid[]" id="opt02">
		                <label for="opt02">用户管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="3" name="menuid[]" id="opt03">
		                <label for="opt03">广告管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="4" name="menuid[]" id="opt04">
		                <label for="opt04">分类管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="5" name="menuid[]" id="opt05">
		                <label for="opt05">商品管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="6" name="menuid[]" id="opt06">
		                <label for="opt06">评论管理</label>
	              </div>
	              <div class="checkbox check-transparent">
		                <input type="checkbox" value="7" name="menuid[]" id="opt07">
		                <label for="opt07">订单管理</label>
	              </div>
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