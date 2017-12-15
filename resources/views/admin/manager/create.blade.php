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
    <h1><strong>Sam管理员</strong>添加页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/manager" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">管理员帐号</label>
        <div class="col-sm-8">
          <input name="name" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>      
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">管理员权限</label>
        <div class="col-sm-8">
        	<select name="roles" class="col-sm-12">
        		<option value="1">超级管理员</option>
        		<option value="2" selected="">普通管理员</option>
        	</select>          
          <label></label>
        </div>
      </div> 
      <div class="form-group">
        <label for="password" class="col-sm-4 control-label">密码</label>
        <div class="col-sm-8">
          <input name="pwd" type="password" class="form-control parsley-validated" id="password" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="passwordconfirm" class="col-sm-4 control-label">确认密码</label>
        <div class="col-sm-8">
          <input name="repwd" type="password" class="form-control parsley-validated" id="passwordconfirm" parsley-trigger="change" parsley-required="true" parsley-minlength="6" parsley-type="alphanum" parsley-validation-minlength="1" parsley-equalto="#password">
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


@section('js')
<script>

function errors(a,b){
	a.siblings('label').addClass('has-error').html(b)
}
function oks(a) {
	a.siblings('label').removeClass('has-error').html('')
}

	$(function(){
		var name = $('input[name=name]')
		var pwd = $('input[name=pwd]')
		var repwd = $('input[name=repwd]')
		var btn = $('button[type=submit]')

		btn.click(function() {
			if(name.val() == ''){
				errors(name,'请输入帐号!'); 
				var ea = 1;
			}else{
				oks(name) 
				var ea = ''
			}
			if(pwd.val() == ''){
				errors(pwd,'请输入密码');
				var eb = 1;
			}else{
				oks(pwd) 
				eb = ''
			}
			if(repwd.val() != '' && repwd.val() != pwd.val()){
				errors(repwd,'俩次密码不一样!');
				var ec = 1;
			}else if(repwd.val() == ''){
				errors(repwd,'请重复密码!');
				var ec = 2;
			}else{
				oks(repwd);ec = ''
				ec = ''
			}			
			if(!ea && !eb && !ec && !ed && !ef){

			}else{
				return false;
			}
		});
	})

</script>
@stop