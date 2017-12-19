<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!--引入核心css文件-->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--引入jQuery文件-->
	<script src="/bootstrap/js/jquery.js"></script>
	<!--最后引入bootstrap文件-->
	<script src="/bootstrap/js/bootstrap.js"></script>
	<!-- 引入字体 -->
	<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
	<!-- 主页css -->
	<!-- 引入留言css -->
	<link rel="stylesheet" href="/css/indexb.css">

	<link rel="stylesheet" href="/css/css.css">
	<!-- 引入holder.js -->
	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<!-- 引入个人中心样式 -->
	<link rel="stylesheet" type="text/css" href="/css/geren.css">
	@section('style')
	@show
</head>
<body id="body">

<!-- 头部 -->
 @include('layouts.header')
<!-- 头部结束 -->

<!-- 身体开始 -->
	<section>
		<div class="container">
			<!-- 个人中心左导航 -->
			<div class="g-person-nav">

				<!-- 头像 -->
				<?php 
				 $sion = session('user_name');
		        $sioninfo=DB::table('user')->where('name',$sion)->select('id','name','email','phone','ztid')->first();
		        $sioninfo->phone = substr_replace($sioninfo->phone, '****', 3,4);
		        $info=DB::table('userinfo')->where('id',$sioninfo->id)->first();
				?>
				<div class="gp-user-infors">
                   <div class="sam_vip">
						<div class="sam_logo">						
							<img src="{{$info->touimg}}" alt="" width="100%" height="100%" style="border-radius: 100%;"/>
						</div>
						<div class="sam_quan">						
							<img src="/file/img/index/quan.png" alt="">
						</div>
					</div>
				</div>
				
				<!-- 头像 -->
				<div class="gp-user-menu">
					<dl>
						<dt><i></i>订单管理</dt>
						<dd class="cur"><a href="/home/order">我的购买记录</a></dd>
						<dd class="cur"><a href="">退换货</a></dd>
					</dl>
					<div style="width:164px;height: 1px;background: black;margin: auto;"></div>
					<dl>
						<dt><i></i>个人信息管理</dt>
						<dd class="cur"><a href="/home">编辑个人信息</a></dd>
						<dd class="cur"><a href="">会籍管理</a></dd>
						<dd class="cur"><a href="">修改密码</a></dd>
						<dd class="cur"><a href="/home/address">地址管理</a></dd>
					</dl>
					<div style="width:164px;height: 1px;background: black;margin: auto;"></div>
					<dl>
						<dt><i></i>我的专区</dt>
						<dd class="cur"><a href="">我的优惠券</a></dd>
						<dd class="cur"><a href="">常购清单</a></dd>
						<dd class="cur"><a href="/pinglun">商品点评</a></dd>
						<dd class="cur"><a href="">购物咨询</a></dd>
					</dl>
					<div style="width:164px;height: 1px;background: black;margin: auto;"></div>
					<dl>
						<dt><i></i>服务中心</dt><dd class="cur"><a href="">到货通知</a></dd>
						<dd class="cur"><a href="">降价通知</a></dd>
						<dd class="cur"><a href="">我的购物卡</a></dd>
						<dd class="cur"><a href="" target="_blank">山姆实体店</a></dd>
						<dd class="cur"><a href="">山姆线上店</a></dd>
					</dl>
				</div>
			</div>
			<script>
    			var path = location.pathname;
				$('.cur').each(function() {
			      if(path != '/admin'){
			        if($(this).find('a').attr('href') == path){
			          $(this).addClass('gr-active')
			        }
			      }
			    });
				
			</script>
			<!-- 个人中心左侧结束 -->
			<!-- 个人中心右侧导航开始 -->
			@section('right')
				
			@show
			<!-- 个人中心右侧导航结束 -->
		</div>
	</section>	
<!-- 身体结束 -->


<!-- 尾部 -->
@include('layouts.footer')
@section('js')
				
@show
</body>
</html>