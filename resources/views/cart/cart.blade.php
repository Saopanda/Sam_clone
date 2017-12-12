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
			<div class="car_D1">

				<form action="" method="">					
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
						<table class="table text-center">						
							<tr>
								<td style="width: 50px;height: 50px;">
									<input type="checkbox" name="box[]" id="box">
								</td>
								<td style="line-height: 50px;">商品信息</td>
								<td style="width: 160px;line-height: 50px;">单价(元)</td>
								<td style="width: 160px;line-height: 50px;">数量</td>
								<td style="width: 160px;line-height: 50px;">小计(元)</td>
								<td style="width: 160px;line-height: 50px;">操作</td>								
							</tr>
								<!-- 商品开始循环 -->
							

								<tr>
									<td>
										<input type="checkbox" name="box[]" id="">
									</td>
									<td>
										<div class="car_shop">
											<a href="#"><img src="holder.js/90x90" alt="" style="float: left;"></a>
											<p><a href="#">安耐特 吉普18英寸少年车吉普181A-1</a></p>
											<p><a href="#">Item#:501834</a></p>
											<p style="margin-top: 25px;">
				                    			<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
		                    				</p>
	                    				</div>
									</td>
									<td style="line-height: 107px;">899</td>
									<td>
										<div class="num">
											<a id="jian" class="a a_block" style="font-size: 20px;line-height: 30px;font-weight: bolder;">-</a>

											<input type="text" name="" id="num" value="1">

											<a id="jia" class="a a_block1" style="font-size: 20px;font-weight: bolder;">+</a>
										</div>
									</td>
									<td style="line-height: 107px;color: #0069aa;font-weight: bold;">¥3596.00</td>
									<td style="line-height: 107px;">
										<a class="btn btn-default"><i class="glyphicon glyphicon-trash"></i> 删除</a>
									</td>
								</tr>





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
										<span style="color: #0069aa;font-size: 18px;font-weight: bold;"> ¥79.80 </span>
										<span>(1件)</span>
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

	
	$('#jia').click(function(){
		var num='';
		num=$('#num').val();
		var	a=parseInt(num);
		a+=1;
		$('#num').val(a);
	})
	$('#jian').click(function(){

		var num='';
		num=$('#num').val();
		var	a=parseInt(num);
		if (a>1) {
			a-=1;
			$('#num').val(a);
		}
		
	})
	window.onload=function(){
		var a=document.getElementById('box');
		var box=document.getElementsByName("box[]");
		var len=box.length;
		var flag=true;
		a.onclick=function(){
			if(flag){
       	 	   flag=false;
       	  	    for(var i=0;i<len;i++){
               	box[i].checked=true;
         		}
			}else{
	           	flag=true;
	            for(var i=0;i<len;i++){
	          		box[i].checked=false;
          		}	
			}
		}	
	}
</script>
@endif

</html>

