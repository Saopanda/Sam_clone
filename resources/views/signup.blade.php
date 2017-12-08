<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="./css/zuce.css">
	<script type="text/javascript" src="./bootstrap/js/holder.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.css">
	<script src="./bootstrap/js/jquery.js"></script>
	<script src="./bootstrap/js/bootstrap.js"></script>
	<style type="text/css">
	.error{
		border: 1px solid red;
	}
	#tishi{
		color: red;
	}
	</style>
</head>
<body>	
	<header>
		<!-- logo start -->
		<div class="logo">
			<div class="logo_top">
				<div class="tp">
					<img src="./file/img/logo-3.png" alt="logo" title="">				
				</div>						
			</div>
			<div class="logo_down">
				<span class="xian"></span>
				<span class="kuai">欢迎注册</span>
			</div>
		</div>
		<!-- logo end -->
	</header>
	<!-- 注册表单 -->
	<div class="biaodan">
		<div class="bd">
			<form action="" method="">
				<table cellspacing="0" cellpadding="0">
					<tr><td style="height: 10px;"></td></tr>
					<tr>
						<td><input type="text" placeholder="用户名" name="" class="bq " id="yhm"></td>
					</tr>
					<tr>
						<td><p>4-20位字符，可由中文、英文、数字或符号</p></td>
					</tr>
					<tr>
						<td><input type="email" placeholder="邮箱地址" name="" class="bq" id="email"></td>
					</tr>
					<tr>
						<td><p>请输入常用邮箱，可用作登录账户，接受订单通知和找回密码之用</p></td>
					</tr>
					<tr>
						<td><input type="password" placeholder="设置密码" name="" class="bq" id="password"></td>
					</tr>
					<tr>
						<td><p>6-20位字符，可由大小写英文、数字或符号“-”“_”组成密码</p></td>
					</tr>					
					<tr>
						<td><input type="password" placeholder="确认密码" class="bq" id="apassword"></td>
					</tr>
					<tr>
						<td><p></p></td>
					</tr>
					<tr>
						<td><input type="text" placeholder="你的手机号" name="" class="bq" id="shouji"></td>
					</tr>
					<tr>
						<td><p></p></td>
					</tr>
					<tr>
						<td>
							<input type="text" placeholder="验证码" name="" class="yzm" style="float: left; " id="yzm">
							<div style="float: left;margin-left: 4px;background: red;height: 38px;">
								<img src="holder.js/142x38" alt="">
							</div>							
						</td>
					</tr>
					<tr>
						<td><p id='tishi'></p></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="" checked /><span class="wz">订阅优惠信息</span></td>
					</tr>
					<tr>
						<td><input type="checkbox" name=""  checked/><span class="wz">我已阅读并同意<a href="#">《山姆网站使用条款》</a></span></td>
					</tr>
					<tr>
						<td><p id="tishi"></p></td>
					</tr>
					<tr>
						<td style="width: 442px;"><div class="btn_1"><button class="btn" id="btns">提&nbsp;&nbsp;交</button></div></td>
					</tr>
				</table>
			</form>
		</div>		
	</div>
	<!-- 注册表单 -->
	<script type="text/javascript">
		$(function(){
		var yhm = $('#yhm')
		var email = $('#email')
		var password = $('#password')
		var apassword = $('#apassword')
		var shouji = $('#shouji')
		var yzm =$('#yzm')
		var tishi=$('#tishi')
		var tijiao=$('#btns')
		var zea=/^\w{4,20}$/
		var zeb=/^\w{6,20}$/
		var zec=/^1[3|4|5|8][0-9]\d{4,8}$/

		tijiao.click(function() {

			if(yhm.val() == ''){
				yhm.addClass('error')
				var e_n = tishi.html('请输入用户名!')
				
			}else if(!(zea.test(yhm.val()))){
				yhm.removeClass('error')
				var e_n = tishi.html('用户名格式不正确')
				//alert(12);
				
			}else{
				yhm.removeClass('error')
				var e_n = tishi.html('')
			}
			if(email.val() == ''){
				email.addClass('error')
				var e_m = tishi.html('请输入邮箱!')
				
			}else{
				email.removeClass('error')
				var e_m = tishi.html('')
			}
			if(password.val() == ''){
				password.addClass('error')
				var e_p = tishi.html('请输入密码!')
				
			}else if(!(zeb.test(password.val()))){

				password.addClass('error')
				var e_p = tishi.html('密码格式不正确!')
				
			}else{
				password.removeClass('error')
				var e_p = tishi.html('')
			}
			if(apassword.val() == ''){
				apassword.addClass('error')
				var e_pa = tishi.html('请输入重复密码!')
				
			}else if(apassword.val() != password.val()){

				apassword.removeClass('error')
				var e_pa = tishi.html('两次密码不一致!')
			
			}else{
				apassword.removeClass('error')
				var e_pa = tishi.html('')
			}
			if(shouji.val() == ''){
				shouji.addClass('error')
				var e_sj = tishi.html('请输入手机号码!')
				
			}else if(!(zec.test(shouji.val()))){

				shouji.addClass('error')
				var e_sj = tishi.html('手机号码格式不正确')
			
			}else{
				shouji.removeClass('error')
				var e_sj = tishi.html('')
			}
			if(yzm.val() == ''){
				yzm.addClass('error')
				var e_yzm = tishi.html('请输入验证码!')
				
			}else{
				yzm.removeClass('error')
				var e_yzm = tishi.html('')
			}
			
			if (e_n.html() == '' && e_i.html() == '' && e_p.html() == '' && e_sj.html() == '' && e_yzm.html() == '') {
				alert(123);
			}else{
				tishi.html('请输入信息!')
				return false;
			}
		});
	})

	</script>
</body>
</html>