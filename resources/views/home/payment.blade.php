<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>支付</title>
	<link rel="stylesheet" href="/css/zuce.css">
	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
	<script src="/bootstrap/js/jquery.js"></script>
	<script src="/bootstrap/js/bootstrap.js"></script>
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
				<span class="kuai">订单创建成功</span>
			</div>
		</div>
		<!-- logo end -->
	</header>
	<!-- 注册表单 -->
	<section class="container text-center">
		<div style="height: 40px"></div>
		<div class="er-codePic">
	        <h3>订单创建成功</h3>
	    </div>
		<br>
	    <h4>您可以选择以下支付方式进行支付</h4>
	    <div style="height: 20px"></div>
	    <a href="/pay/weixin/{{$bm}}" ><img src="/file/img/wx.jpg" alt=""></a>
	    <a href="/pay/zhifubao/{{$bm}}" ><img src="/file/img/zfb.jpg" alt=""></a>
	</section>
	</body>
</html>