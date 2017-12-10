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
	<style>
		.form-control,#yzm{
			border-radius: 0;
		}
		.form-group {
			margin-bottom: 0;
		}
		button.btn.btn-default {
		    height: 34px;
		    width: 140px;
		}
		.form-group label{
			margin-top: 4px;
			color: red;
		}
		p{
			margin-bottom: 0;
		}
		#btn{
			width: 220px;
			height: 50px;
			font-size: 20px;
			font-weight: bold;
		}
		.input-group.input-group-md {
		    width: 100%;
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
			<form action="/signup" method="post">
				<div class="form-group">
					<label class="pull-right">&nbsp;&nbsp;</label>
					<input class="form-control" type="text" placeholder="用户名" name="name">
					<p class="text-mute">4-20位字符，可由中文、英文、数字或符号</p>
				</div>
				{{csrf_field()}}
				<div class="form-group">
					<label class="pull-right"> &nbsp;</label>
					<input class="form-control" type="email" placeholder="邮箱地址" name="email">
					<p>请输入常用邮箱,可用作登陆账户,接受订单通知</p>
				</div>
				<div class="form-group">
					<label class="pull-right"> &nbsp;</label>
					<input class="form-control" type="password" placeholder="设置密码" name="pwd">
					<p>6-20位字符，可由大小写英文、数字或符号“-”“_”组成密码</p>
				</div>
				<div class="form-group ">
					<label class="pull-right"> &nbsp;</label>
					<input class="form-control" type="password" placeholder="重复密码" name="repwd">
				</div>
				<div class="form-group ">
					<label class="pull-right"> &nbsp;</label>
					<input class="form-control" type="text" maxlength="11" placeholder="手机号" name="phone">
				</div>
				<div class="form-group">
					<label class="pull-right">&nbsp;&nbsp;</label><br>
					<div class="input-group input-group-md ">
	                  <input type="text" name="yzm" class="form-control">
	                  <span class="input-group-btn">
	                    <button class="btn btn-default" style="outline: none;" id="yzm" type="button">点击获取验证码</button>
	                  </span>
	                </div>
				</div>
				<div style="height: 23px"></div>
				<div class="agreement tiaokuan">
                    <input type="checkbox" id="check" checked="checked">
                    <label for="agreement-checkbox">我已阅读并同意<a href="http://cms.samsclub.cn/sale/ZkHwwpxxTDO" class="blue-link" target="_blank">《山姆网站使用条款》</a></label>
                </div>
                <div style="height: 10px"></div>
                <div class="form-group text-center">
                	<label for="">&nbsp;</label>
                	<button id="btn" class="btn btn-primary form-control">注册</button>
				</div>
			</form>
			<div class="clearfix"></div>
		</div>		
	</div>
	<!-- 注册表单 -->
<script type="text/javascript">

	function errors(a,b){
		a.siblings('label').html(b)
		a.parents('.form-group').addClass('has-error')
	}
	function oks(a) {
		a.siblings('label').html('&nbsp;')
		a.parents('div').removeClass('has-error')
	}
	var b = 60
	var timer
	function yzms(a) {
		b--
		a.html('请'+b+'秒后重新获取')
		if (b < 1) {
			a.html('点击获取验证码')
			clearInterval('timer')
			a.removeAttr('disabled')
		}
	}
	$(function(){
		var name = $('input[name=name]')
		var email = $('input[name=email]')
		var pwd = $('input[name=pwd]')
		var repwd = $('input[name=repwd]')
		var phone = $('input[name=phone]')
		var yzm_input =$('input[name=yzm]')
		var checks = $('#check')
		var btn=$('#btn')
		var y_name=/^\w{4,20}$/
		var y_pwd=/^\w{6,20}$/
		var y_phone=/^1[3|4|5|8][0-9]\d{4,8}$/

		$('#yzm').click(function () {
			b = 60
			//点击禁用标签
			$(this).attr('disabled', 'disabled');
			//启动计时器
			clearInterval(timer)
			timer = setInterval(function () {
				yzms($('#yzm'))
			},1000)
			//请求发送验证码
			$.ajax({
				type:'get',
				url:'/signup/sms_create',
				data:{phone:phone.val()},
				success:function (mes) {
					console.log(mes)
				}
			})
		})
		name.blur(function() {
			if(name.val() != ''){
				$.ajax({
					type:'get',
					url:'/signup/name',
					data:{name:name.val()},
					success:function (mes) {
						if(mes == 'ok'){
							oks(name)
						}else{
							errors(name,'用户名已存在!'); 
						}
					}
				})
			}
		});
		yzm_input.blur(function() {
			if(yzm_input.val() != ''){
				$.ajax({
					type:'get',
					data:{yzm:yzm_input.val(),phone:phone.val()},
					url:'/signup/sms',
					success:function (mes) {
						if(mes == 'ok'){
							oks(yzm_input)
							yzm_input.parents('.form-group').find('label').html('&nbsp;')
						}else{
							errors(yzm_input,'')
							yzm_input.parents('.form-group').find('label').html('验证码错误!')
						}
					}
				})
			}
		});
		btn.click(function() {
			if(name.val() == ''){
				errors(name,'请输入用户名!'); 
			}else{
				if(!y_name.test(name.val())){
					errors(name,'用户名格式有误!'); 
				}else{}
			}
			if(pwd.val() == ''){
				errors(pwd,'请输入密码');
			}else{
				if(!y_pwd.test(pwd.val())){
					errors(pwd,'密码格式错误!'); 
				}else{
					oks(pwd) 
				}
			}
			if(repwd.val() != '' && repwd.val() != pwd.val()){
				errors(repwd,'俩次密码不一样!');
			}else if(repwd.val() == ''){
				errors(repwd,'请重复密码!');
			}else{
				oks(repwd);
			}
			if(email.val() == ''){
				errors(email,'请输入正确的邮件地址!')
			}else{
				oks(email)
			}
			if(phone.val() == ''){
				errors(phone,'请输入手机号!')
			}else{
				if(!y_phone.test(phone.val())){
					errors(phone,'请输入正确的手机号!'); 
				}else{
					oks(phone) 
				}
			}
			if(yzm_input.val() == ''){
				errors(yzm_input,'')
				yzm_input.parents('.form-group').find('label').html('请输入验证码')
			}else{
			}
			if(checks.is(':checked')){
				$('.tiaokuan').css('color', '#333');
				var eh = ''
			}else{
				$('.tiaokuan').css('color', 'red');
				var eh = 1
			}
			var ha = $('label').eq(0).html()
			var hb = $('label').eq(1).html()
			var hc = $('label').eq(2).html()
			var hd = $('label').eq(3).html()
			var he = $('label').eq(4).html()
			var hf = $('label').eq(5).html()
			if(ha == '&nbsp;' && hb == '&nbsp;' && hc == '&nbsp;' && hd == '&nbsp;' && he == '&nbsp;' && hf == '&nbsp;' && !eh){

			}else{
				return false;
			}
		});
	});
</script>
</body>
</html>