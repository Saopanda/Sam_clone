@extends('layouts.my_center')
@section('style')
<style>
	#body .order{
		padding: 20px 0;
	}
	.order-kuang{
		background: #fff;
		margin-bottom: 14px;

		border:1px solid #e0e0e0;
	}
	.order-kuang >p{
		height: 36px;
		line-height: 36px;
		padding-left: 10px;
		padding-bottom: 10px;
		background: #ececec;
	}
	table{
		margin-bottom:0;
	}
	#body .order-in{
		height: 100px;
		padding:10px 10px;
	}
	#body .order-in td{
		line-height: 60px;
	}
	.good-tu{
		width: 80px;
		height: 80px;
	}
	#body td.good-title{
		width: 340px;
    	padding: 15px;
    	line-height: 17px;
	}
	.good-in{
		width: 100px;
	}

</style>
@stop
@section('right')
			<!-- 个人中心右侧内容开始 -->
			<div class="gr_Right">
				<div class="gr_bt">
					<span>我的购买记录</span>
				</div>

<!-- 选项卡 -->
				<div>
				  <!-- Nav tabs -->
				    <div class="container xxk">
					    <ul class="xxk-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">所有订单</a></li>
						    <div class="line-2"></div>
						    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">代付款(0)</a></li>
						    <div class="line-2"></div>
						    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">代发货(0)</a></li>
						    <div class="line-2"></div>
						    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">待收货(0)</a></li>
						    <div class="line-2"></div>
						    <li role="presentation"><a href="#zixun" aria-controls="zixun" role="tab" data-toggle="tab">待评价(0)</a></li>
					    </ul>
				   </div>

					<div class="tab-content gr_nr">
					    <div role="tabpanel" class="container tab-pane active" id="home">
					    	<div class="gr_ss">
				    			<form method="" action="">
				    				<input type="text" name="" placeholder="请输入商品名称或收件人姓名">
				    				<button><i class="glyphicon glyphicon-search"></i></button>
				    				<select>
				    					<option>网上购买记录</option>
				    					<option>线下购买记录</option>
				    				</select>
				    			</form>
					    	</div>
							@if(empty($data[0]))
							<div class="g-pur-nulldata">					    		
					    		您暂时没有任何购买记录
					    	</div>
							@else
		  					<div class="col-md-12 order" >
		  						@foreach($data as $k=>$v)
		  						<div class="col-md-12 order-kuang" >
		  							<p><span>订单日期：</span>{{$v->date}} &nbsp;&nbsp;&nbsp;<span>订单号：{{$v->orderid}}</span></p>
		  							<table class="table order-in">
		  								@foreach($v->goods as $ks=>$vs)
		  								<tr>
		  									<td class="good-tu">
			  									<img src="{{$vs->goodsimg}}" alt="">
			  								</td>
											<td class="good-title">
												<h5>{{$vs->goodstitle}}</h5>
												<p>{!!$vs->goodscontent!!}</p>
											</td>
											<td class="good-in">
												<span>{{$vs->price}}</span>
											</td>
											<td class="good-in">
												<span>{{$vs->num}}</span>
											</td>
											<td class="good-in">
												<span>{{$vs->price*$vs->num}}</span>
											</td>
											<td class="good-in">
												<span>@if($v->dd_status == 0)未支付@elseif($v->dd_status == 1)待发货@elseif($v->dd_status == 2)已发货@elseif($v->dd_status == 3)未评价@endif</span>
											</td>
		  								</tr>
		  								@endforeach
		  								
		  							</table>
	  								<a class="btn btn-info pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
		  						</div>
		  						@endforeach
		  					</div>
							@endif
					    	
					    </div>
	



					    <div role="tabpanel" class="container tab-pane" id="profile">
					    	<div class="gr_ss">
				    			<form method="" action="">
				    				<input type="text" name="" placeholder="请输入商品名称或收件人姓名">
				    				<button><i class="glyphicon glyphicon-search"></i></button>
				    				<select>
				    					<option>网上购买记录</option>
				    					<option>线下购买记录</option>
				    				</select>
				    			</form>
					    	</div>
					    	<div class="g-pur-nulldata">
					    		没有代付款信息
					    	</div>
					    </div>
					    <div role="tabpanel" class="container pinpai tab-pane" id="messages">
					    	<div class="gr_ss">
				    			<form method="" action="">
				    				<input type="text" name="" placeholder="请输入商品名称或收件人姓名">
				    				<button><i class="glyphicon glyphicon-search"></i></button>
				    				<select>
				    					<option>网上购买记录</option>
				    					<option>线下购买记录</option>
				    				</select>
				    			</form>
					    	</div>
					    	<div class="g-pur-nulldata">
					    		暂时没有您的发货信息
					    	</div>
					    </div>
					    <div role="tabpanel" class="container pinpai tab-pane" id="settings">
					    	<div class="gr_ss">
				    			<form method="" action="">
				    				<input type="text" name="" placeholder="请输入商品名称或收件人姓名">
				    				<button><i class="glyphicon glyphicon-search"></i></button>
				    				<select>
				    					<option>网上购买记录</option>
				    					<option>线下购买记录</option>
				    				</select>
				    			</form>
					    	</div>
					     	<div class="g-pur-nulldata">
					    		暂时没有您的收货信息
					    	</div>
					    </div>
					    <div role="tabpanel" class="container tab-pane" id="zixun">
					    	<div class="gr_ss">
				    			<form method="" action="">
				    				<input type="text" name="" placeholder="请输入商品名称或收件人姓名">
				    				<button><i class="glyphicon glyphicon-search"></i></button>
				    				<select>
				    					<option>网上购买记录</option>
				    					<option>线下购买记录</option>
				    				</select>
				    			</form>
					    	</div>
					    	<div class="g-pur-nulldata">
					    		您暂没有需要评价的商品
					    	</div>
					    </div>
  					</div>

  					
				</div>
			</div>
			<!-- 个人中心右侧结束 -->
@stop