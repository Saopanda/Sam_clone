<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>shopcar</title>
	<!-- 引入购物车css文件 -->
	<link rel="stylesheet" href="/css/shopcar.css">
	<!--引入核心css文件-->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--引入jQuery文件-->
	<script src="/bootstrap/js/jquery.js"></script>
	<!--最后引入bootstrap文件-->
	<script src="/bootstrap/js/bootstrap.js"></script>
	<!-- 引入字体 -->
	<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="/css/css.css">
	<link rel="stylesheet" href="/css/main.css">
	<!-- 引入holder.js -->
	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<style>
		body{
			background: #fff;
		}
		.table{
			margin-bottom: 0px;
		}
		.table > tbody > tr > td{
			padding: 0;
			line-height: 50px;
		}
		p {
		    line-height: 24px;
		}
	</style>
</head>
<body id="body">
	<!-- 头部 -->
@include('layouts.header')
<!-- 头部结束 -->
<!-- 购物车 -->

<section>
	<div class="container">
		<div class="shopcar">
			<div class="car_T">
				<div class="t_Left">
					<span class="c_kuai c_wz">我的购物车</span>
				</div>
				<div class="t_Right">
					<div class="tishikuang">
						<span style="display: block;margin-top: 15px;margin-left: 15px;">
						购物车升级咯～不同品类的商品可以分步结算啦！
						<br>
						想加什加什么，结算的事儿购物车都会帮您打理好，就等您一键下单～
						</span>
					</div>
					<div id="tishi"><a href="#" class="glyphicon glyphicon-hand-left" aria-hidden="true"></a></div>
				</div>
				<div></div>
			</div>
			
			@if(isset($rs))
			@if(count($rs) > 0)
			<div class="car_D1">

				<form action="" method="" style="background: #f8f8f8">					
					<div class="bg_Top">
						<span class="glyphicon glyphicon-apple ys" aria-hidden="true"></span>
				     	<span class="bg_T_wz">普通商品</span>
				     	<span class="bg_T_sq"><span id="shouqi">收起</span>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-menu-down jiantou"></i></span>
				     	<span class="jiezhan_top">
				     		<span>合计</span>&nbsp;&nbsp;
				     		<span style="color: #0069aa;font-weight: bold;font-size: 18px;">¥3596.00</span>&nbsp;&nbsp;
				     		<span>(1件)</span>&nbsp;&nbsp;
				     		<button class="btn btn-success">去结算</button>
				     	</span>
					</div>
					<div id="hidden_a">
						<table class="table text-center" style="background: #fff">						
							<tr style="height: 50px;line-height: 50px">
								<td style="width: 50px">
								</td>
								<td>商品信息</td>
								<td style="width: 160px;">单价(元)</td>
								<td style="width: 160px;">数量</td>
								<td style="width: 160px;">小计(元)</td>
								<td style="width: 160px;">操作</td>								
							</tr>
								<!-- 商品开始循环 -->
								@foreach($rs as $k=>$v)
								<tr name="tr{{$v->id}}">
									<td>
									</td>
										<input type="hidden" name="goodsid{{$v->id}}" value="{{$v->goodsid}}">
										<input type="hidden" name="ids" value="{{$v->id}}">
									<td>
										<div class="car_shop pull-left">
											<a href="#"><img src="{{$v->goods_pic->imgs}}" alt="" style="float: left;"></a>
	                    				</div>
	                    				<div class="goods_title pull-left">
	                    					<p><a href="#">{{$v->goods->title}}</a><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></p>
	                    					<p>{!!$v->goods->content!!}</p>
	                    				</div>
									</td>

									<td id="danjia{{$v->id}}" style="line-height: 107px;">{{$v->goods->price}}</td>

									<td>
										<div class="num" name="{{$v->id}}">
											<a onclick="jian({{$v->id}})" class="a a_block" style="font-size: 20px;font-weight: bolder;">-</a>
											<input type="text" name="num" id="num{{$v->id}}" value="{{$v->num}}">

											<a onclick="jia({{$v->id}})" class="a a_block1" style="font-size: 20px;font-weight: bolder;">+</a>
										</div>
									</td>

									<td id="xiaoji{{$v->id}}" name="xiaoji" style="line-height: 107px;color: #0069aa;font-weight: bold;">
									</td>
									<td style="line-height: 107px;">
										<button type="button" class="btn btn-default" onclick="cartdelete({{$v->id}})"><i class="glyphicon glyphicon-trash"></i> 删除</botton>
									</td>
								</tr>
								@endforeach
								<!-- 商品开始循环 -->
						</table>
						<div class="bg_Down">
							<table class="d_table">							
								<tr>
									<td style="width:50px;height: 40px;line-height: 40px;"></td>
									<td><a href="#">批量删除</a></td>
								</tr>
								<div class="jiesuan">
									<p style="padding: 10px;width: 115px;float: left;">
										<span>合计</span>
										<br>
										<span id="zongjia" style="color: #0069aa;font-size: 18px;font-weight: bold;"> </span>
									</p>
									<button class="btn_a">去结算</button>
								</div>
							</table>
						</div>
					</div>
				</form>
			</div>
			@else
			<div class="car_D">
				<p class="car_D_wz">购物车还是空的哦~</p>
				<p class="anniu"><a href="/" style="font-size: 20px">去逛逛</a></p>
			</div>
			@endif
			@else
			<div class="car_D">
				<p class="car_D_wz">登录后才可以看到购物车哦~</p>
				<p class="anniu"><a href="/login" style="font-size: 20px">去登陆</a></p>
			</div>
			@endif
		</div>
	</div>
</section>	

<!-- 购物车 -->
	<!-- 尾部 -->
@include('layouts.footer')
<!--  -->
</body>
@if(isset($rs))
<script type="text/javascript">
	$(function(){
		$('input[name=ids]').each(function() {
			var id = $(this).val()
			xiaojis(id);
		});
		zongjias()
	})
	function zongjias(){
		var zj = 0;
		$('td[name=xiaoji]').each(function(){
			zj += parseInt($(this).html())
		})
		$('#zongjia').html('￥'+zj)
	}
	

	function xiaojis(a) {
		var xiaoji = parseInt($('#num'+a).val())*parseInt($('#danjia'+a).html())
		$('#xiaoji'+a).html(xiaoji)
	}
	function cartdelete(a) {
		var rs = confirm('你确定要删除吗?')
		if(rs){
			$.ajax({
				type:'get',
				url:'/home/cart/'+a,
				data:{},
				success:function (mes) {
					if(mes == 'ok'){
						$('tr[name=tr'+a+']').remove()
					}
				}
			})
		}else{
			return false;
		}
	}
	$('#shouqi').click(function(){
		$('#hidden_a').slideToggle();
		if($(this).html() == '收起'){
			$(this).html('放下')
			$(this).siblings('i').addClass('jiantou-up')
			$('.jiezhan_top').show()
		}else{
			$(this).html('收起')
			$(this).siblings('i').removeClass('jiantou-up')
			$('.jiezhan_top').hide()				
		}
	})
	$('#tishi').click(function(){			
		$('.tishikuang').toggleClass('active');		
	})

	
	function jia(a){
		var num='';
		num=$('#num'+a).val();
		var	b=parseInt(num);
		b+=1;
		$('#num'+a).val(b);
		xiaojis(a)
		zongjias()
		var goodsid = $('input[name=goodsid'+a+']').val()
		$.ajax({
			type:'get',
			url:'/home/cart/num',
			data:{num:b,goodsid:goodsid},
			success:function(mes){
			}
		})
	}
	function jian(a){
		var num='';
		num=$('#num'+a).val();
		var	b=parseInt(num);
		if (b>1) {
			b-=1;
			$('#num'+a).val(b);
		}
		xiaojis(a)
		zongjias()
		var goodsid = $('input[name=goodsid'+a+']').val()
		$.ajax({
			type:'get',
			url:'/home/cart/num',
			data:{num:b,goodsid:goodsid},
			success:function(mes){
			}
		})
	}
	
</script>
@endif

</html>

