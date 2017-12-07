<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
		<script src="/bootstrap/js/jquery.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<script src="/bootstrap/js/holder.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/css/denglu.css">
</head>
<body>
	<div class="big">
		<div class="big_1">
			<div class="big_2">
				<a href="index.html"><img src="/file/img/logo-3.png"></a>
			</div>
			<h3 class="hb"><span>登录</span></h3>
		</div>
	</div>
	<div class="form-wrap">
		<h4>已开通山姆网购账户，请登录</h4>
		<div class="form_box">
			<form>
			  <div class="form-group">
			    <input type="text" class="form-control buts" id="exampleInputEmail1" placeholder="用户名/邮箱/17位卡号" name="">
			  </div>
			  <div class="form-group">
			    <input type="password" class="form-control buts" id="exampleInputPassword1" placeholder="密码" name="">
			  </div>
			  <div class="form-group cols">
			  	  <a href="#" class="pull-left col">忘记密码</a>
			  	  <a href="#" class="pull-right">注册</a>
			  </div>
			  <div class="clearfix"></div>
  			  <button type="submit" class="btn btn-default col-md-12 input-lg sub" id="tijiao">登录</button>
            </form>
		</div>
	</div>
	<script type="text/javascript">
	$(function(){
		//alert($);
		var yhm = $('#exampleInputEmail1');
		var mima = $('#exampleInputPassword1');
		var box =$('.clearfix');
		$('#tijiao').click(function(){
			//alert(123);
			if (yhm.val()=='') {
				yhm.parent('div').addClass('has-error');
				var e_n=box.html('请填写用户名');
				return false;
			}else{
				yhm.parent('div').removeClass('has-error');
				var e_n=box.html('');
			}
			if(mima.val() == ''){
				mima.parent('div').addClass('has-error');
				var e_p=box.html('请填写密码');
				return false;
			}else{
				mima.parent('div').removeClass('has-error');
				var e_p=box.html('');
			}
			if (e_n.html() == '' && e_p.html() == '') {
			}else{
				return false;
			}
		})
	})
		
	</script>
</body>
</html>