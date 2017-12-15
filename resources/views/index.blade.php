<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--引入核心css文件-->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--引入jQuery文件-->
	<script src="/bootstrap/js/jquery.js"></script>
	<!--最后引入bootstrap文件-->
	<script src="/bootstrap/js/bootstrap.js"></script>
	<!-- 引入字体 -->
	<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="/css/css.css">
	<link rel="stylesheet" href="/css/indexb.css">
	<link rel="stylesheet" type="text/css" href="/css/indexa.css">
	<link rel="stylesheet" href="/css/main.css">

	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<title>{{$site->webname}}</title>
</head>
<body id="body">
 @include('layouts.header')
<section class="container-fulid banner">
	<div class="container">
		@foreach($ad as $k => $v)
		@if($v->show_order == 1 && $v->is_show == 1 && $k == 0)		
		<div class="container banner-in banner-active" name="{{$v->bgcolor}}">
			<a href="">
				<img src="{{$v->img_url}}">
			</a>
		</div>
		@elseif($v->show_order == 1 && $v->is_show == 1)
		<div class="container banner-in" name="{{$v->bgcolor}}">
			<a href="">
				<img src="{{$v->img_url}}">
			</a>
		</div>
		@endif
		@endforeach
		<ul>
			@foreach($ad as $k => $v)
			@if($v->show_order == 1 && $v->is_show == 1 && $k == 0)		
			<li name="{{$k+1}}" class="li-active">{{$v->title}}</li>
			@elseif($v->show_order == 1 && $v->is_show == 1)
			<li name="{{$k+1}}">{{$v->title}}</li>
			@endif
			@endforeach
		</ul>
	</div>
</section>

<!-- 为你推荐 -->
<section class="container-fulid nr">
	<div class="container text-center">
		<h4><b>为您推荐 Only For You</b></h4>
		<div class="container nr-in">
			<div class="col-md-3 nr-1">
				<div class="sam_vip">
					<div class="sam_logo">
						<img src="/file/img/index/sam_logo.png" alt="">
					</div>
					<div class="sam_quan">
						<img src="/file/img/index/quan.png" alt="">
					</div>
				</div>
				<h5><b>山姆会员尊享会员权益</b></h5>
				<br>
				<p>全球门店</p>
				<p>山姆网购通用会籍</p>
				<div class="center-block btn btn-sm btn-info">
					开通会员 >
				</div>
			</div>
			<div class="col-md-9 nr-goods">
				@foreach($goods as $key =>$val)
				@if($key < 4 )
				<div class="col-md-3">
					<a href="">
						<div class="nr-1-img">
							<img src="{{$val->pic}}" width="220" height="230" alt="">
						</div>
						<p>{{$val->title}}</p>
						<span>￥<b>{{$val->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>

<!-- 大叔推荐 -->
<section class="container-fulid">
	<div class="container biaoti">
		<h2>山姆大叔推荐 Sam's Recommends</h2>
	</div>
	<div class="container">
		<div class="one_1 container">
			@foreach($goods as $k => $v)
			@if($k < 10)
			<div class="item">
				<a href="//item.samsclub.cn/63618484" title="{{$v->title}}" target="_blank">
					<div class="i-size-box">
					<img class="img-agent lazyload" id="lunbo_1" alt="{{$v->title}}" data-original="" src="{{$v->pic}}">
					</div>
					<p>{{$v->title}}</p>
					<span data-pmid="63618484" data-productid=""><em>¥</em> {{$v->price}}</span>
				</a>
				<div class="marking save">
					<div class="box">
						<p>已省</p>
						<p><em>¥</em>9.2</p>
					</div>
				</div>
				<div class="outline">
					<p class="item-info">{!!$v->content!!}</p>
				</div>
			</div>
			@endif
			@endforeach
		</div>
		<div class="home-wrap container" style="background-color:">
			<div class="booth global-center container " style="margin:0 auto;">
				<a href="/" target="_blank">
					@foreach($ad as $k => $v)
					@if($v->show_order == 2 && $v->is_show == 1 && $v->title == '山姆真奇妙')
					<img class="img-agent lazyload" src="{{$v->img_url}}">
					@endif
					@endforeach
				</a>
			</div>
		</div>
	</div>
</section>



<!-- AD -->


<!-- 会员热购 -->
<section class="container-fulid nr">
	<div class="container">
		<h4 class="text-center"><b>会员热购 Best Buy</b></h4>
		<div class="container nr-in">
			<div class="col-md-3 nr-2">
				<h3><b>生鲜食品</b></h3>
				<h4>Fresh Food</h4>
				<ul>
					<li>肉蛋水产</li>
					<li>新鲜水果</li>
					<li>面食点心</li>
					<li>面包糕点</li>
				</ul>
			</div>
			<div class="col-md-9 nr-goods text-center">
				@foreach($goods as $key => $v)
				@if($v->id > 0 && $v->id < 5)
				<div class="col-md-3">
					<a href="">
						<div class="nr-img">
							<img src="{{$v->pic}}" alt="">
						</div>
						<p>{{$v->title}}</p>
						<span>￥<b>{{$v->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="container-fulid nr">
	<div class="container">
		<div class="container nr-in">
			<div class="col-md-3 nr-3">
				<h3><b>食品饮料</b></h3>
				<h4>Food&Drink</h4>
				<ul>
					<li>肉蛋水产</li>
					<li>新鲜水果</li>
					<li>面食点心</li>
					<li>面包糕点</li>
				</ul>
			</div>
			<div class="col-md-9 nr-goods text-center">
				@foreach($goods as $key => $v)
				@if($v->id > 16 && $v->id < 21)
				<div class="col-md-3">
					<a href="">
						<div class="nr-img">
							<img src="{{$v->pic}}" alt="">
						</div>
						<p>{{$v->title}}</p>
						<span>￥<b>{{$v->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="container-fulid nr">
	<div class="container">
		<div class="container nr-in">
			<div class="col-md-3 nr-4">
				<h3><b>母婴玩具</b></h3>
				<h4>Baby Center</h4>
				<ul>
					<li>肉蛋水产</li>
					<li>新鲜水果</li>
					<li>面食点心</li>
					<li>面包糕点</li>
				</ul>
			</div>
			<div class="col-md-9 nr-goods text-center">
				@foreach($goods as $key => $v)
				@if($v->id > 33 && $v->id < 38)
				<div class="col-md-3">
					<a href="">
						<div class="nr-img">
							<img src="{{$v->pic}}" alt="">
						</div>
						<p>{{$v->title}}</p>
						<span>￥<b>{{$v->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="container-fulid nr">
	<div class="container">
		<div class="container nr-in">
			<div class="col-md-3 nr-5">
				<h3><b>清洁个护</b></h3>
				<h4>Cleaning&Personal</h4>
				<ul>
					<li>肉蛋水产</li>
					<li>新鲜水果</li>
					<li>面食点心</li>
					<li>面包糕点</li>
				</ul>
			</div>
			<div class="col-md-9 nr-goods text-center">
				@foreach($goods as $key => $v)
				@if($v->id > 64 && $v->id < 69)
				<div class="col-md-3">
					<a href="">
						<div class="nr-img">
							<img src="{{$v->pic}}" alt="">
						</div>
						<p>{{$v->title}}</p>
						<span>￥<b>{{$v->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>
<section class="container-fulid nr">
	<div class="container">
		<div class="container nr-in">
			<div class="col-md-3 nr-6">
				<h3><b>数码家电</b></h3>
				<h4>Cleaning&Personal</h4>
				<ul>
					<li>肉蛋水产</li>
					<li>新鲜水果</li>
					<li>面食点心</li>
					<li>面包糕点</li>
				</ul>
			</div>
			<div class="col-md-9 nr-goods text-center">
				@foreach($goods as $key => $v)
				@if($v->id > 48 && $v->id < 53)
				<div class="col-md-3">
					<a href="">
						<div class="nr-img">
							<img src="{{$v->pic}}" alt="">
						</div>
						<p>{{$v->title}}</p>
						<span>￥<b>{{$v->price}}</b></span>
					</a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>

<!-- 菜谱 -->
<div class="kitchen" style="background: url('./file/img/index/bj.jpg') no-repeat;">
	<div class="container">
		<div class="kitchen-box">
			<div class="show-pic">
				<a href="/" target="_blank">
					<div class="i-size-box">
						@foreach($ad as $k => $v)
						@if($v->is_show == 1 && $v->show_order == 2 && $v->title == '山姆家厨房')
						<img class="img-agent lazyload" data-original="" src="{{$v->img_url}}">
						@endif
						@endforeach
					</div>
				</a>
			</div>
			<div class="content">
				<h1>山姆家厨房<span>Sam's Kitchen</span></h1>
				<h3>今日推荐菜谱</h3>
				<div class="menus-box">
					<div class="menus">
						<ul class="clear">
							<li class="item" style="width: 223px;">
								<div class="i-size-box">								
								<img class="img-agent lazyload" data-original="" src="/file/img/index/caipu2.jpg">								
								</div>
								<p class="name">蚝油焖烧清远鸡</p>
								<p class="text">肉质鲜美的清远鸡搭配清甜蔬菜和鲜香菌菇，色香味俱全的味蕾大满足！</p>
								<a class="btn-study" href="//cms.samsclub.cn/cook/479" target="_blank">学起来</a>
							</li>
							<li class="item"  style="width: 223px;">
								<div class="i-size-box">
								<img class="img-agent lazyload" data-original="" src="/file/img/index/caipu2.jpg">
								</div>
								<p class="name">蚝油焖烧清远鸡</p>
								<p class="text">肉质鲜美的清远鸡搭配清甜蔬菜和鲜香菌菇，色香味俱全的味蕾大满足！</p>
								<a class="btn-study" href="//cms.samsclub.cn/cook/479" target="_blank">学起来</a>
							</li>
							<li class="item"  style="width: 223px;">
								<div class="i-size-box">
								<img class="img-agent lazyload" data-original="" src="/file/img/index/caipu2.jpg">
								</div>
								<p class="name">蚝油焖烧清远鸡</p>
								<p class="text">肉质鲜美的清远鸡搭配清甜蔬菜和鲜香菌菇，色香味俱全的味蕾大满足！</p>
								<a class="btn-study" href="//cms.samsclub.cn/cook/479" target="_blank">学起来</a>
							</li>
						</ul>
					</div>
					<a class="btn prev" href="javascript:;" style="opacity: 0;">prev</a>
					<a class="btn next" href="javascript:;" style="opacity: 0;">next</a>
					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 一起了解 -->
<div class="container nr">
	<div class="ljsanmu"><h4><b>一起了解山姆 Different Sam's Club</b></h4></div>
	<div class="ljnr">
		<div class="lj_Left pull-left">
			<div class="L_Top">
				<a href="#">
					@foreach($ad as $k => $v)
					@if($v->show_order == 3 && $v->title == '了解山姆' && $v->is_show == 1)
					<img src="{{$v->img_url}}" alt="">
					@endif
					@endforeach
				</a>
			</div>
			<div class="L_Bottom"> 
				<ul>
					<li>
						<img src="/file/img/index/app.jpg" width="85" height="85" alt="">
						<span><a href="#">山姆手机客户端</a></span>
					</li>
					<li>
						<img src="/file/img/index/weixin.jpg" width="85" height="85" alt="">
						<span><a href="#">山姆微信服务</a></span>
					</li>
				</ul>
			</div>				
		</div>
		<div class="lj_Right pull-right" id="abc">
			<div class="gdt">
				@foreach($pl as $key => $val)
				<div class="comment">
					<div class="info">
						<a href="#"><img class="touxiang" width="40" height="40" src="{{$val->tx}}"></a>
						<p class="name">{{$val->username}}</p>
						<a class="des" href="#">@山姆会员商店</a>
					</div>
					<div class="comment-text">
						{{$val->content}}
					</div>
					<div class="show-time">
						<div class="tabs">
							<ul class="clear">
								@if(isset($val->plt))
									@foreach($val->plt as $a=>$b)
									<li class="show-time-item">
										<img class="tpfd" src="{{$b}}">
									</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@include('layouts.footer')
</body>
<script>
	// 轮播图
	var timer
	var num = $('.banner-in').length;
	var a = 1
	$(this)
	function banner(b) {
		if(a == b){a=0}
		$('.banner-in').eq(a).fadeIn('slow').siblings('div').fadeOut('slow')
		var color = $('.banner-in').eq(a).attr('name');
		$('.banner').css('background', color);
		$('.banner li').eq(a).addClass('li-active').siblings('li').removeClass('li-active')
		a++
	}
	$('.banner li').click(function() {
		a = $(this).attr('name')-1
		banner(num)
	});
	$('.banner').mouseover(function() {
		clearInterval(timer)
		timer = 0
	}).mouseleave(function() {
		if (timer == 0) {
			timer = setInterval('banner(num)',3000)
		}
	});
	timer = setInterval('banner(num)',3000)
	// 轮播图结束
</script>
</html>