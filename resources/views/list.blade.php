<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>{{$a['yi']->flname}}</title>
		<link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">
		<script src="/bootstrap/js/jquery.js"></script>
		<script src="/bootstrap/js/bootstrap.js"></script>
		<script src="/bootstrap/js/holder.min.js"></script>
		<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/css/lists.css">
		<link rel="stylesheet" type="text/css" href="/css/css.css">
		<link rel="stylesheet" type="text/css" href="/css/main.css">
		<style type="text/css">
		ol,li{
			list-style: none;
		}
			#body .well{
			position: fixed;
			z-index: 10;   
			width: 400px;
			height: 80px;
		    line-height: 80px;
		    opacity: 0.7;
		    text-align: center;
		    padding: 0 25px;
		    top: 200px;
		    left: 550px;
		    display: none;
		    font-size: 15px;
		}
		</style>
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
			    <li class="pull-right you">共找到151项结果</li>
			  </ul>

  <!-- Tab panes -->
  <div class="well" id="cartok"></div>
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
					@foreach($goods as $key => $val)
					@if(in_array($val->flid,$shop) && $val->ztid == 1)
				    <div class="goods_1">
							<div class="proImg">
								<a href="/{{$val->id}}.html" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/{{$val->id}}.html" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus" id="jian{{$key}}">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text" name="num{{$key}}" id="num{{$key}}"></li>
									<li buynumflag="add" class="add" id="jia{{$key}}">+</li>
								</ul>
								<input type="hidden" name="id{{$key}}" value="{{$val->id}}">
								<!--查看详情 -->
								<a href="#/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="" id="addCart{{$key}}">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>							
					</div>
					<script type="text/javascript">
						$('#jia{{$key}}').click(function(){
							var num='';
							num=$('#num{{$key}}').val();
							var	a=parseInt(num);
							a+=1;
							$('#num{{$key}}').val(a);
						})
						$('#jian{{$key}}').click(function(){

							var num='';
							num=$('#num{{$key}}').val();
							var	a=parseInt(num);
							if (a>1) {
								a-=1;
								$('#num{{$key}}').val(a);
							}
						})

						$('#addCart{{$key}}').click(function() {			
							var id = $('input[name=id{{$key}}]').val()
							var num = $('input[name=num{{$key}}]').val()
							$.ajax({
								type:'get',
								url:'/home/cart/create',
								data:{goodsid:id,num:num},
								success:function(mes){
									if (mes == 'ok') {
										if(mes == 'ok'){
										$('#cartok').html('<b>已成功加入购物车~!</b>').fadeIn().delay(2000).fadeOut();
										setInterval(function(){
											window.location.reload();
										},2000);
										
										}
									}
								}
							})
						})
					</script>
					@endif
				    @endforeach
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
					@foreach($goods as $key => $val)
					@if($val->huodong == 1 && in_array($val->flid,$shop) && $val->ztid == 1)
				   	<div class="goods_1">
							<div class="proImg">
								<a href="/{{$val->id}}.html" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/{{$val->id}}.html" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus" id="jian1{{$key}}">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text" name="num1{{$key}}" id="num1{{$key}}"></li>
									<li buynumflag="add" class="add" id="jia1{{$key}}">+</li>
								</ul>
								<input type="hidden" name="id1{{$key}}" value="{{$val->id}}">
								<!--查看详情 -->
								<a href="#/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="" id="addCart1{{$key}}">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					<script type="text/javascript">
						$('#jia1{{$key}}').click(function(){
							var num='';
							num=$('#num1{{$key}}').val();
							var	a=parseInt(num);
							a+=1;
							$('#num1{{$key}}').val(a);
						})
						$('#jian1{{$key}}').click(function(){

							var num='';
							num=$('#num1{{$key}}').val();
							var	a=parseInt(num);
							if (a>1) {
								a-=1;
								$('#num1{{$key}}').val(a);
							}
						})

						$('#addCart{{$key}}').click(function() {			
							var id = $('input[name=id1{{$key}}]').val()
							var num = $('input[name=num1{{$key}}]').val()
							$.ajax({
								type:'get',
								url:'/home/cart/create',
								data:{goodsid:id,num:num},
								success:function(mes){
									if (mes == 'ok') {
										if(mes == 'ok'){
										$('#cartok').html('<b>已成功加入购物车~!</b>').fadeIn().delay(2000).fadeOut();
										setInterval(function(){
											window.location.reload();
										},2000);
										}
									}
								}
							})
						})
					</script>
					@endif
				    @endforeach
			    </div>
			    <div role="tabpanel" class="tab-pane" id="messages">
			    	@foreach($goods as $key => $val)
			    	@if($val->huodong == 2 && in_array($val->flid,$shop) && $val->ztid == 1)	
				    <div class="goods_1">
							<div class="proImg">
								<a href="/{{$val->id}}.html" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/{{$val->id}}.html" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus" id="jian2{{$key}}">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text" name="num2{{$key}}" id="num2{{$key}}"></li>
									<li buynumflag="add" class="add" id="jia2{{$key}}">+</li>
								</ul>
								<input type="hidden" name="id2{{$key}}" value="{{$val->id}}">
								<!--查看详情 -->
								<a class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="" id="addCart2{{$key}}">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					<script type="text/javascript">
						$('#jia2{{$key}}').click(function(){
							var num='';
							num=$('#num2{{$key}}').val();
							var	a=parseInt(num);
							a+=1;
							$('#num2{{$key}}').val(a);
						})
						$('#jian2{{$key}}').click(function(){

							var num='';
							num=$('#num2{{$key}}').val();
							var	a=parseInt(num);
							if (a>1) {
								a-=1;
								$('#num2{{$key}}').val(a);
							}
						})

						$('#addCart2{{$key}}').click(function() {			
							var id = $('input[name=id2{{$key}}]').val()
							var num = $('input[name=num2{{$key}}]').val()
							$.ajax({
								type:'get',
								url:'/home/cart/create',
								data:{goodsid:id,num:num},
								success:function(mes){
									if (mes == 'ok') {
										if(mes == 'ok'){											
										$('#cartok').html('<b>已成功加入购物车~!</b>').fadeIn().delay(2000).fadeOut();
										setInterval(function(){
											window.location.reload();
										},2000);
										}
									}
								}
							})
						})
					</script>
					@endif
				    @endforeach
			    </div>			    
			    <div role="tabpanel" class="tab-pane" id="settings">
				    @foreach($goods as $key => $val)
			    	@if($val->huodong == 3 && in_array($val->flid,$shop) && $val->ztid == 1)	
			    	<div class="goods_1">
							<div class="proImg">
								<a href="/{{$val->id}}.html" target="_blank">
								<img src="{{$val->pic}}" alt="" />
								</a>
								<div class="tagBox">
								<img src="/file/img/liebiao/yuanyu1.gif" />
								</div>
							</div>
							<p class="proName">
							<a href="/{{$val->id}}.html" target="_blank">{{$val->title}}</a>
							</p>
							<p class="proName2">
							{!! $val->content !!}</p>
							<p class="proPrice">
								<em><b class="b1">¥ </b>{{$val->price}}</em>
							</p>
							<div class="shoppingAct">
								<ul class="num">
									<li class="no" buynumflag="minus" id="jian3{{$key}}">–</li>
									<li class="m"><input pattern="[0-9]" value="1" maxperorder="999" minperorder="500" maxlength="3" type="text" name="num3{{$key}}" id="num3{{$key}}"></li>
									<li buynumflag="add" class="add" id="jia3{{$key}}">+</li>
								</ul>
								<input type="hidden" name="id3{{$key}}" value="{{$val->id}}">
								<!--查看详情 -->
								<a href="#/" class="shopCar" showprice="29.8" shoppingcount="0" limitnumberperuser="" id="addCart3{{$key}}">
								<i class="glyphicon glyphicon-shopping-cart"></i><span>加入购物车</span>
								</a>
							</div>
							<div class="proBorder"></div>
					</div>
					<script type="text/javascript">
						$('#jia3{{$key}}').click(function(){
							var num='';
							num=$('#num3{{$key}}').val();
							var	a=parseInt(num);
							a+=1;
							$('#num3{{$key}}').val(a);
						})
						$('#jian3{{$key}}').click(function(){

							var num='';
							num=$('#num3{{$key}}').val();
							var	a=parseInt(num);
							if (a>1) {
								a-=1;
								$('#num3{{$key}}').val(a);
							}
						})

						$('#addCart3{{$key}}').click(function() {			
							var id = $('input[name=id3{{$key}}]').val()
							var num = $('input[name=num3{{$key}}]').val()
							$.ajax({
								type:'get',
								url:'/home/cart/create',
								data:{goodsid:id,num:num},
								success:function(mes){
									if (mes == 'ok') {
										if(mes == 'ok'){
											$('#cartok').html('<b>已成功加入购物车~!</b>').fadeIn().delay(2000).fadeOut();
											setInterval(function(){
											window.location.reload();
											},2000);
										}
									}
								}
							})
						})
					</script>
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

