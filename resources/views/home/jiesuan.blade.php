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
	<link rel="stylesheet" type="text/css" href="/css/login.css">

	<link rel="stylesheet" href="/css/css.css">
	<link rel="stylesheet" href="/css/indexb.css">
	<link rel="stylesheet" href="/css/jiesuan.css">
	<link rel="stylesheet" href="/css/shopcar.css">
	<link rel="stylesheet" href="/css/address.css">
	<link rel="stylesheet" type="text/css" href="/css/login.css">

	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<title>sam_index</title>
	<style>
		ul{
			overflow: hidden;
			height: 205px;
		}
		.address{
			cursor: pointer;
		}
		#body .actives{
			border: 2px solid #0069aa;
		}
	</style>
	
</head>
<body id="body">
<!-- 头部开始 -->
	<div class="container-fulid header-middle" style="background: #0069aa;">
		<div class="container">
			<a href="/">
				<div class="pull-left logo">
					<img src="/file/img/logo.png" alt="">
				</div>
			</a>
			<span class="hd">核对订单</span>
			<div class="pull-right search">
				<a href="/cart">
					<div class="cart" style="top: 18px;">
						<i class="fa fa-shopping-cart"></i>
					</div>
				</a>
			</div>
		</div>
	</div>
<!-- 头部结束 -->
	<section class="container">
		<div class="add_address">
			<div class="address-title">
				<div class="top" >
					<h4 class="gpl-bread-title">地址管理
					<span class="ads-tips">（最多保存20个有效地址，已保存
					<b id="addressNumId">{{$num}}</b>个）</span></h4>
					<a href="javascript:;" class="you theme-login" id='add'>+新增收货地址</a>
				</div>
			</div>
			<!-- 弹出窗开始 -->
			<div class="theme-popover">
		     	<h3 class="title_a">新增地址</h3>
		     	<div class="theme-popbod dform add_address">
			        <div class="biaodan">
						<form action="/home/address" method="post">
							<div class="bd_a">
								<div class="address">
									<span class="title"><i>*</i>收件人：</span>
									<div class="content">
										<input type="text" class="form-control" name="name" placeholder="收件人姓名">
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>地址：</span>
									<div class="content">
										<div class="sheng">
											<select name="pro" id="" class="form-control sheng_a">
												<option value="">请选择省</option>
											</select>
										</div>
										<div class="sheng" id="shi">
											<select name="city" id="" class=" form-control sheng_a">
												
											</select>
										</div>
										<div class="sheng">
											<select name="county" id="" class=" form-control sheng_a">
												
											</select>
										</div>
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>详细地址：</span>
									<div class="content">
										<input type="text" class="form-control" name="content" placeholder="街道名称/编号，楼宇名称，单位，房号" />
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>手机号码：</span>
									<div class="content">
										<input type="text" class="form-control" name="phone" placeholder="手机号码" maxlength="11" />
									</div>
								</div>
								{{csrf_field()}}
								<div class="address">
									<span class="title"></span>
									<div class="content">
										<input type="checkbox" name=""/> 设置为默认地址
									</div>
								</div>
								<div class="baocun">
									<input type="submit" name="" value="保存" class="tj">
									<button type="button" class="btn-cancel" href="#">取消</button>
								</div>

							</div>
						</form>
					</div>
		     	</div>
			</div>
			<div class="theme-popover-mask"></div>
			<!-- 弹出窗结束 -->
			<!-- 显示列表开始 -->
			<form action="/zhifu" method="post">
				<input type="hidden" name="addressid" value="">
				<div class="ads_list">
					<ul>
					@foreach($addresses as $k=>$v)
						<li class="address address{{$v->id}}" onclick="dizhi({{$v->id}})">
							<div class="ads-name"><b>{{$v->name}}</b></div>
							<div class="ads-phone">{{$v->phone}}</div>
							<div class="ads-address">{{$v->pname}} {{$v->cname}} {{$v->xname}} {{$v->content}} </div>
							<div class="ads-option" id="138666421">
								<a href="/home/address" style="border:0;background: none;" class=" ads-delete"><span>管理</span></a>
							</div>
						</li>
					@endforeach
						
					</ul>
				</div>
			<!-- 显示列表结束 -->
				<div class="container">
					<!-- 商品开始循环 -->
					<table class="text-center table" style="margin: 23px auto;">
						<tr style="height: 35px;line-height: 50px;" class="bg-primary">
							<td style="width: 50px">
							</td>
							<td>图片</td>
							<td>商品信息</td>
							<td style="width: 160px;">单价(元)</td>
							<td style="width: 160px;">数量</td>
							<td style="width: 160px;">小计(元)</td>
						</tr>
					@foreach($datas as $k=>$v)
					<tr >
						<td>
						</td>
						<td>
							<div class="car_shop pull-left">
								<input type="hidden" name="goods[{{$k}}][goodsid]" value="{{$v['goodsid']}}">
								<a href="#"><img src="{{$v['goods_pic']->imgs}}" alt="" style="float: left;"></a>
	        				</div>
	        			</td>
	        			<td>
	        				<div class="goods_title pull-left" style="width: 450px">
	        					<p><a href="#">{{$v['goods']->title}}</a><span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></p>
	        					<p>{!!$v['goods']->content!!}</p>
	        				</div>
						</td>

						<td style="line-height: 107px;">{{$v['goods']->price}}</td>

						<td >
							<input disabled="disabled" type="text" style="float: none;margin-top: 38px" class="num" value="{{$v['num']}}">
							<input type="hidden" name="goods[{{$k}}][num]" value="{{$v['num']}}">
						</td>

						<td id="xiaoji" name="xiaoji" style="line-height: 107px;color: #0069aa;font-weight: bold;"><span>￥ </span> <b>{{$v['xiaoji']}}</b>
						</td>
						</td>
					</tr>
					@endforeach
					</table>
					<!-- 商品开始循环 -->
				</div>
				<div class="address-title">
					<span class="title">订单备注</span><span class="tips">（收货人、配送、支付和发票等以上述选定值为准，再次备注无效）</span>
				</div>
				<input type="text" class="form-control" name="liuyan" placeholder="如果您对订单有什么要求，欢迎备注">

				<div class="heji">
					<div class="address-title">
						<span class="title">合计</span>
					</div>
					<div class="bottom">
						<div class="total-tips" id="order_mark_notes">
							<span class="chk cur">
							<input type="checkbox" checked="checked" name=""/>
							由于山姆网购采用从实体店面拣货的模式，会存在订单生产备货时店内的其他会员已经在店面把货取空的情况，因此可能出现您所订购的商品缺货，我们将以短信及邮件形式通知您。更多关于网站的使用说明，详见
							</span>
							<a href="">使用条款</a>
						</div>
						<div class="list">
							<span class="sp-content">¥0</span>
							<span class="e-title">运费：</span>
						</div>
						<div class="list">
							<span class="sp-content cc">￥ {{$zongji}}</span>
							<span class="e-title pp">应付金额：</span>
						</div>
						<div class="clearfix"></div>
						<div class="total-btn">
							<button class="tjdd">提交订单</button>
						</div>
					</div>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</section>

</body>
<script>
	function dizhi(a){
		$('input[name=addressid]').val(a)
		$('.address'+a).addClass('actives').siblings('li').removeClass('actives')

	}


	$(function(){
		var id=0;
		$('#add').click(function(){
	        $.ajax({
	        type:'get',
	        url: '/home/address/getarea',
	        data: 'pid='+id,
	        success: function(data){
	        	//alert(data);
	        	for(var i=0;i<data.length;i++){
	                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
	                //将option插入到省的select中
	                $('select[name=pro]').append(option);
	            }
	        }
	    	})
		})
		$('.theme-login').click(function(){
			$('.theme-popover-mask').fadeIn(100);
			$('.theme-popover').slideDown(200);
		})
		$('.theme-poptit .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})
		$('.btn-cancel').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})
		$('select[name=pro]').change(function(){
		    $('select[name=city]').html('<option value="">请选择</option>')
		    //获取当前省的id
		    var id = $(this).val();
		    //alert(id);
		    //发送ajax获取当前省所对应的市的信息
		    $.ajax({
		        type:'get',
		        url: '/home/address/getarea',
		        data: {pid:id},
		        success: function(data){
		            for(var i=0;i<data.length;i++){
		                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
		                //将option插入到省的select中
		                $('select[name=city]').append(option);
		            }
		        }
		    })
		});
		$('select[name=city]').change(function(){
		    $('select[name=county]').html('<option value="">请选择</option>')
		    //获取当前省的id
		    var id = $(this).val();
		    //发送ajax获取当前省所对应的市的信息
		    $.ajax({
		        type:'get',
		        url: '/home/address/getarea',
		        data: {pid:id},
		        success: function(data){
		            for(var i=0;i<data.length;i++){
		                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
		                //将option插入到省的select中
		                $('select[name=county]').append(option);
		            }
		        }
		    })
		});
	})
</script>
</html>