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
	<link rel="stylesheet" href="/css/jiesuan.css">

	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<title>sam_index</title>
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
				<span class="title">新增地址</span><span class="tips">（您最多可保存20个收货地址，如不清楚配送区域的划分，请通过<a href="">在线客服</a>解决）</span>
			</div>
			<div class="biaodan">
				<form action="post" method="">
					<div class="bd_a">
						<div class="address">
							<span class="title"><i>*</i>收件人：</span>
							<div class="content">
								<input type="text" class="form-control" name="" placeholder="收件人姓名">
							</div>
						</div>
						<div class="address">
							<span class="title"><i>*</i>收件人：</span>
							<div class="content">
								<div class="sheng">
									<select name="" id="" class=" form-control sheng_a">
										<option value="1">请选择省</option>
										<option value="1">上海</option>
										<option value="1">上海</option>
									</select>
								</div>
								<div class="sheng" id="shi" style="display: none;">
									<select name="" id="" class=" form-control sheng_a">
										<option value="1">请选择市</option>
										<option value="1">上海</option>
										<option value="1">上海</option>
									</select>
								</div>
								<div class="sheng" style="display: none;">
									<select name="" id="" class=" form-control sheng_a">
										<option value="1">请选择县</option>
										<option value="1">上海</option>
										<option value="1">上海</option>
									</select>
								</div>
							</div>
						</div>
						<div class="address">
							<span class="title"><i>*</i>详细地址：</span>
							<div class="content">
								<input type="text" class="form-control" name="" placeholder="详细地址" />
							</div>
						</div>
						<div class="address">
							<span class="title"><i>*</i>手机号码：</span>
							<div class="content">
								<input type="text" class="form-control" name="" placeholder="手机号码" />
							</div>
						</div>
						<div class="address">
							<span class="title"></span>
							<div class="content">
								<input type="checkbox" name=""/> 设置为默认地址
							</div>
						</div>
						<div class="baocun">
							<button class="tj">保存</button>
						</div>

					</div>
				</form>
			</div>

			<div class="address-title">
				<span class="title">订单备注</span><span class="tips">（收货人、配送、支付和发票等以上述选定值为准，再次备注无效）</span>
			</div>
			<input type="text" class="form-control" name="" placeholder="如果您对订单有什么要求，欢迎备注">

			<div class="heji">
				<div class="address-title">
					<span class="title">合计</span>
				</div>
					<div class="bottom">
						<div class="total-tips" id="order_mark_notes">
							<span class="chk cur">
							<input type="checkbox" name=""/>
							由于山姆网购采用从实体店面拣货的模式，会存在订单生产备货时店内的其他会员已经在店面把货取空的情况，因此可能出现您所订购的商品缺货，我们将以短信及邮件形式通知您。更多关于网站的使用说明，详见
							</span>
							<a href="">使用条款</a>
						</div>
						<div class="list">
							<span class="sp-content">¥0</span>
							<span class="e-title">商品金额：</span>
						</div>
						<div class="list">
							<span class="sp-content">¥0</span>
							<span class="e-title">运费：</span>
						</div>
						<div class="list">
							<span class="sp-content cc">¥652</span>
							<span class="e-title pp">应付金额：</span>
						</div>
						<div class="clearfix"></div>
						<div class="total-btn">
							<a href="" class="tjdd">提交订单</a>
						</div>
					</div>
				
			</div>
		</div>
	</section>
</body>
</html>