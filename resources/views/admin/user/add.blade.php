@extends('layouts.admin_index')
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
<!-- 头 -->
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 会员添加<span> Sam 会员添加页</span></h2>
</div>
<div style="height: 20px"></div>
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
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/user" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">用户名</label>
        <div class="col-sm-8">
          <input name="name" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="email" class="col-sm-4 control-label">邮箱</label>
        <div class="col-sm-8">
          <input name="email" type="email" class="form-control parsley-validated" id="email" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1">
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

      <div class="form-group">
        <label for="website" class="col-sm-4 control-label">手机号</label>
        <div class="col-sm-8">
          <input name="phone" type="text" class="form-control parsley-validated" id="website" parsley-trigger="change" parsley-minlength="4" parsley-type="url" parsley-validation-minlength="1">
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
<!-- 详细信息 -->

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
		var email = $('input[name=email]')
		var phone = $('input[name=phone]')
		var btn = $('button[type=submit]')

		btn.click(function() {
			if(name.val() == ''){
				errors(name,'请输入内容!'); 
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
			if(email.val() == ''){
				errors(email,'请输入正确的邮件地址!')
				var ed = 1
			}else{
				oks(email)
				ed = ''
			}
			if(phone.val() == ''){
				errors(phone,'请输入手机号!')
				var ef = 1
			}else{
				oks(phone)
				ef = ''
			}
			if(!ea && !eb && !ec && !ed && !ef){

			}else{
				return false;
			}
		});
	})

</script>
@stop