<!-- 头部 -->
<header class="container-fulid">
	<div class="container-fulid header-top">
		<div class="container">
			<div class="pull-left">
				<span>下午好，山姆欢迎您！</span>
				<a href="">登陆 </a>|
				<a href=""> 注册</a>
			</div>
			<div class="pull-right">
				<dl>
					<dt><a href="">我的山姆</a><i class="glyphicon glyphicon-menu-down"></i></dt>
					<dd class="xiala-my">
						<ul>
							<li><a href="">个人资料</a></li>
							<li><a href="">我的订单</a></li>
							<li><a href="">我的优惠券</a></li>
							<li><a href="">服务中心</a></li>
							<li><a href="">商品点评</a></li>
							<li><a href="">购物咨询</a></li>
						</ul>
					</dd>
				</dl>
				<div class="line-1"></div>
				<dl>
					<dt><a href="">帮助中心</a><i class="glyphicon glyphicon-menu-down"></i></dt>
					<dd class="xiala-help">
						<ul>
							<li><a href="">常见问题</a></li>
							<li><a href="">忘记密码</a></li>
							<li><a href="">联系我们</a></li>
							<li><a href="">增值服务</a></li>
						</ul>
					</dd>
				</dl>
				<div class="line-1"></div>
				<dl>
					<dt><a href="">快购工具</a><i class="glyphicon glyphicon-menu-down"></i></dt>
					<dd class="xiala-kuai">
						<ul>
							<li><a href="">常购清单</a></li>
							<li><a href="">一页购齐</a></li>
						</ul>
					</dd>
				</dl>
				<div class="line-1"></div>
				<dl>
					<dt><a href="">会籍介绍</a></dt>
				</dl>
				<div class="line-1"></div>
				<dl>
					<dt><a href="">掌上山姆</a><i class="glyphicon glyphicon-menu-down"></i></dt>
					<dd class="xiala-phone">
						<ul>
							<li><img src="" alt="山姆微信"><p>山姆微信服务</p></li>
							<li><img src="" alt="客户端"><p>山姆手机客户端</p></li>
						</ul>
					</dd>
				</dl>
			</div>
		</div>
	</div>
	<div class="container-fulid header-middle">
		<div class="container">
			<div class="pull-left logo">
				<img src="/file/img/logo.png" alt="">
			</div>
			<a href="">
			<div class="location pull-left">
				<i class="fa fa-location-arrow"></i>
				北京
			</div>
			</a>
			<div class="news pull-left">
				<p class="pull-left">山姆头条 1/1 </p>&nbsp;<span>年终感恩回馈</span>
			</div>
			<div class="pull-right search">
				<form action="" >
					<input class="form-control" type="text" name="">
					<button><i class="glyphicon glyphicon-search"></i></button>
				</form>
				<div class="cart">
					<span>0</span><i class="fa fa-shopping-cart"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fulid nav">
		<div class="container">
		@foreach($data as $key => $v)
			<dl class="nav-x-1">
				<dt><a href="">{{$v->flname}}</a></dt>
				<dd @if($v->style == '1')
			style = "right:0;" @endif>
				@foreach($v->two as $va)
					<div class="nav-two">
						<h5>{{$va->flname}}</h5>
						<ul>
						@foreach($va->there as $vas)
							<li><a href="">{{$vas->flname}}</a></li>
						@endforeach		
						</ul>
					</div>
				@endforeach	
				</dd>
			</dl>
		@endforeach	
		</div>
	</div>
</header>
<!-- 头部结束 -->