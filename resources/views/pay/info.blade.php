<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>支付成功</title>
	<link rel="stylesheet" href="/css/zuce.css">
	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
	<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
	<style>
		.btn-hehe{
			background: #57ba47;
			font-size: 22px;
			font-weight: bold;
		}
		.btn-hehe:hover{
			color: #fff;
		}
	</style>
</head>
<body>	
	<header>
		<!-- logo start -->
		<div class="logo">
			<div class="logo_top">
				<div class="tp">
					<img src="/file/img/logo-3.png" alt="logo" title="">				
				</div>						
			</div>
			<div class="logo_down">
				<span class="xian"></span>
				<span class="kuai">支付成功</span>
			</div>
		</div>
		<!-- logo end -->
	</header>
	<!-- 注册表单 -->
	<section class="container text-center">
		<div style="height: 40px"></div>
		@if($zt == 1)
		<div class="er-codePic">
	        <a href="javascript:;">
	            <img src="/images/dui.jpg" alt="" width="130" height="130">
	        </a>
	    </div>
		<br>
	    <h4>恭喜您支付成功</h4>
	    <small><a href="/home/order">点击跳转到订单中心</a></small>
	    @elseif($zt == 0)
	    <div class="er-codePic">
	        <a href="javascript:;">
	            <img src="/images/cuo.jpg" alt="" width="130" height="130">
	        </a>
	    </div>
		<br>
	    <h4>支付遇到了一点问题</h4>
	    <p>可能是网络延迟,您可以先去<a href="/home/order">订单中心</a>看看,或者<a href="">联系客服</a></p>
	    @endif
	    <div style="height: 20px"></div>
	    <a href="/" class="btn btn-lg btn-hehe">进入首页</a>
	</section>
	</body>
</html>
