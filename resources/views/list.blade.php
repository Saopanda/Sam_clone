<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>列表</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
		<script src="/bootstrap/js/jquery.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<script src="/bootstrap/js/holder.min.js"></script>
		<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/lists.css">
		<link rel="stylesheet" type="text/css" href="/css/gong.css">
		<link rel="stylesheet" type="text/css" href="/css/css.css">
		<link rel="stylesheet" type="text/css" href="/css/main.css">
</head>
<body id="body">
<!-- 头部 -->
@include('layouts.header')
<!-- 头部结束 -->
	<div class="mianbaox container">
		<ol class="lis">
		  <li><a href="/">首页</a><span class="iconfont">></span></li>
		  @foreach($a as $key => $v)
		  <li><a href="#">{{$v->flname}}</a><span class="iconfont"></span></li>
		  @endforeach
		</ol>
	</div>
<section class="container content">
		<nav class="">
			@foreach($a as $key => $v)
			<h2 class="title"><span>{{$v->flname}}</span></h2>
			@endforeach
		<div class="panel-group gao_a" id="accordion" role="tablist" aria-multiselectable="true">
		@foreach($a as $s => $one)
			@foreach($one->er as $t =>$two)		
				<div class="panel panel-default gao">
				    <div class="panel-heading" role="tab" id="headingTwo{{$t}}">
				        <h4 class="panel-title clear">
				        	<span class=" glyphicon glyphicon-triangle-bottom d1"></span>
				       		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo{{$t}}" aria-expanded="false" aria-controls="collapseTwo{{$t}}">
				         	<span class="">{{$two->flname}}</span>
						 	<span class="a2">{{$two->id}}</span>
				        	</a>
				      	</h4>
				    </div>
				    <div id="collapseTwo{{$t}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo{{$t}}">
				        <div class="panel-body">
				            <dl class="dl_a">
								<dd class="list_a">
								@foreach($two->san as $sa => $there)
								<ul class="a_hover">
									<li>
										<span class="a1">{{$there->flname}}</span>
										<span class="a2">{{$there->id}}</span>
									</li>
								</ul>
								@endforeach
								</dd>
					  		</dl>
				      </div>
				    </div>
				</div>
			@endforeach
		@endforeach
		<!-- 分类 -->
		<!-- <div class="panel panel-default gao">
		    <div class="panel-heading" role="tab" id="headingTwo">
		      <h4 class="panel-title clear">
		        <span class=" glyphicon glyphicon-triangle-bottom d1"></span>
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
		         <span class="">肉蛋水产</span>
				 <span class="a2">152</span>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
		      <div class="panel-body">
		      <dl class="dl_a">
						<dd class="list_a">
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">牛/羊肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">禽类</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">鱼/肉类制品</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>

						</dd>
			  </dl>
		      </div>
		    </div>
		</div>
		<div class="panel panel-default gao">
		    <div class="panel-heading" role="tab" id="headingThree">
		      <h4 class="panel-title clear">
		        <span class=" glyphicon glyphicon-triangle-bottom d1"></span>
		        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseTwo">
		         <span class="">肉蛋水产</span>
				 <span class="a2">152</span>
		        </a>
		      </h4>
		    </div>
		    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
		      <div class="panel-body">
		        <dl class="dl_a">
						<dd class="list_a">
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">牛/羊肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">禽类</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">鱼/肉类制品</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>
							<ul class="a_hover">
								<li>
									<span class="a1">猪肉</span>
									<span class="a2">12</span>
								</li>
							</ul>

						</dd>
			    </dl>
		      </div>
		    </div>
		</div>
		</div> -->
		<!-- 分类 -->
		</nav>
		<div class="list_right">
			<div class="fl_1">
				<div class="fl_1_a">
					<div class="title"><h2>品牌</h2></div>
					<div  class="zuo">
						<a href="">Member's Mark(51)</a>
						<a href="">泰森(14)</a>
						<a  href="">澳洲牛肉(10)</a>
						<a  href="">四海/SH(7)</a>
						<a  href="">獐子岛/ZONECO(6)</a>
						<a  href="">潮庭(5)</a>
						<a  href="">海名威(5)</a>
						<a  href="">大湖(4)</a>
						<a href="">福成/FUCHENG(4)</a>
						<a  href="">盐池(3)</a>
						<a  href="">德青源/DQY ECOLOGICAL(3)</a>
						<a href="">BoBo(3)</a>
						<a  href="">光阳/GOOSUN(3)</a>
						<a href="">尊乐(3)</a>
						<a  href="">王家渡/Wong's(3)</a>
						<div class="toggle-hide">
							<a  href="">荷美尔/Hormel(2)</a>
							<a href="">海霸王(2)</a>
							<a  href="">圣迪乐村(2)</a>
							<a  href="">仁达(2)</a>
							<a  href="">民维大牧汗(2)</a>
							<a  href="">哈肉联(2)</a>
							<a  href="">科尔沁/KERCHIN(2)</a>
							<a href="">金海洋(1)</a>
							<a  href="">信泽(1)</a>
							<a  href="">棒棰岛(1)</a>
							<a  href="">联合冷冻(1)</a>
							<a href="">山姆/Sam's(1)</a>
							<a  href="">壹号土猪(1)</a>
							<a  href="">家佳康(1)</a>
						</div>
					</div>
					<div class="dd_a">
						<span>更多</span>
						<i class="glyphicon glyphicon-menu-down jiantuo"></i>
					</div>
				</div>
				<div class="fl_1_a">
					<div class="title"><h2>品牌</h2></div>
					<div  class="zuo">
						<a href="">Member's Mark(51)</a>
						<a href="">泰森(14)</a>
						<a  href="">澳洲牛肉(10)</a>
						<a  href="">四海/SH(7)</a>
						<a  href="">獐子岛/ZONECO(6)</a>
						<a  href="">潮庭(5)</a>
						<a  href="">海名威(5)</a>
						<a  href="">大湖(4)</a>
						<a href="">福成/FUCHENG(4)</a>
						<a  href="">盐池(3)</a>
						<a  href="">德青源/DQY ECOLOGICAL(3)</a>
						<a href="">BoBo(3)</a>
						<a  href="">光阳/GOOSUN(3)</a>
						<a href="">尊乐(3)</a>
						<a  href="">王家渡/Wong's(3)</a>
						<div class="toggle-hide">
							<a  href="">荷美尔/Hormel(2)</a>
							<a href="">海霸王(2)</a>
							<a  href="">圣迪乐村(2)</a>
							<a  href="">仁达(2)</a>
							<a  href="">民维大牧汗(2)</a>
							<a  href="">哈肉联(2)</a>
							<a  href="">科尔沁/KERCHIN(2)</a>
							<a href="">金海洋(1)</a>
							<a  href="">信泽(1)</a>
							<a  href="">棒棰岛(1)</a>
							<a  href="">联合冷冻(1)</a>
							<a href="">山姆/Sam's(1)</a>
							<a  href="">壹号土猪(1)</a>
							<a  href="">家佳康(1)</a>
						</div>
					</div>
					<div class="dd_a">
						<span>更多</span>
						<i class="glyphicon glyphicon-menu-down jiantuo"></i>
					</div>
				</div>
				
			
			</div>
		<div class="xuanxiang">
  <!-- Nav tabs -->
			  <ul class="nav nav-tabs biaoqian" role="tablist">
			    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">默认</a></li>
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">销量</a></li>
			    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">最新</a></li>
			    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">优惠</a></li>
			    <!-- <li class="pull-right you">共找到151项结果</li> -->
			  </ul>

  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
					@foreach($goods as $key => $val)
					@if(in_array($val->flid,$shop))
				    <div class="goods_1">
							<div class="proImg">
								<a href="" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text"></li>
									<li buynumflag="add" class="add">+</li>
								</ul>
								<!--查看详情 -->
								<a href="/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					@endif
				    @endforeach
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
					@foreach($goods as $key => $val)
					@if($val->huodong == 1 && in_array($val->flid,$shop))


				    <div class="goods_1">
							<div class="proImg">
								<a href="" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text"></li>
									<li buynumflag="add" class="add">+</li>
								</ul>
								<!--查看详情 -->
								<a href="/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					@endif
				    @endforeach
			    </div>
			    <div role="tabpanel" class="tab-pane" id="messages">
			    	@foreach($goods as $key => $val)
			    	@if($val->huodong == 2)	
				    <div class="goods_1">
							<div class="proImg">
								<a href="" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text"></li>
									<li buynumflag="add" class="add">+</li>
								</ul>
								<!--查看详情 -->
								<a href="/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					@endif
				    @endforeach
			    </div>			    
			    <div role="tabpanel" class="tab-pane" id="settings">
				    @foreach($goods as $key => $val)
			    	@if($val->huodong == 3)	
			    	<div class="goods_1">
						<div class="proImg">
							<a href="" target="_blank">
							<img src="{{$val->pic}}" alt="" />
							</a>
							<div class="tagBox">
							<img src="/file/img/liebiao/yuanyu1.gif" />
							</div>
						</div>
						<p class="proName">
						<a href="/" target="_blank">{{$val->title}}</a>
						</p>
						<p class="proName2">
						{!! $val->content !!}</p>
						<p class="proPrice">
							<em><b class="b1">¥ </b>{{$val->price}}</em>
						</p>
						<div class="shoppingAct">
							<ul class="num">
								<li class="no" buynumflag="minus">–</li>
								<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text"></li>
								<li buynumflag="add" class="add">+</li>
							</ul>
							<!--查看详情 -->
							<a href="/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="">
							<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
							</a>
						</div>
						<div class="proBorder"></div>
					</div>
					@endif
				    @endforeach

			    </div>
			  </div>
		</div>
		</div>
</section>
<!-- 尾部 -->
@include('layouts.footer')
<!--  -->
</body>
<script type="text/javascript">
$('.dd_a').click(function(){

	$(this).siblings('.zuo').find('.toggle-hide').slideToggle('slow');

})
</script>
</html>