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
	#body table{
		margin-bottom:0;
	}
	#body .order-in{
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
	tr{
		border-bottom:1px solid #ececec;
	}
	a.btn.pull-right {
	    margin: 10px;
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
						    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">待付款(0)</a></li>
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

												<span>单价：{{$vs->price}}</span>
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
		  							@if($v->dd_status == 0)
		  							<form action="/home/"></form>
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
	  								@elseif($v->dd_status == 1)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">提醒商家</a>
	  								@elseif($v->dd_status == 2)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">查看物流</a>
	  								@elseif($v->dd_status == 3)
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="">去评价</a>
									@endif
		  						</div>
		  						@endforeach
		  					</div>
							@endif
					    	
					    </div>
	



					    <div role="tabpanel" class="container tab-pane" id="profile">
					    	@if(empty($data[0]))
							<div class="g-pur-nulldata xianshi1" style="display: none;">					    		
					    		您暂时没有待付款信息
					    	</div>
							@else
		  					<div class="col-md-12 order xianshi2" >
		  						@foreach($data as $k=>$v)
								@if($v->dd_status == 0)
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

												<span>单价：{{$vs->price}}</span>
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
		  							@if($v->dd_status == 0)
		  							<form action="/home/"></form>
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
	  								@elseif($v->dd_status == 1)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">提醒商家</a>
	  								@elseif($v->dd_status == 2)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">查看物流</a>
	  								@elseif($v->dd_status == 3)
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="">去评价</a>
									@endif
		  						</div>
								@endif
		  						@endforeach
		  					</div>
							@endif
					    	
					    </div>
					    <div role="tabpanel" class="container pinpai tab-pane" id="messages">
					    	@if(empty($data[0]))
							<div class="g-pur-nulldata">					    		
					    		您暂时没有待发货信息
					    	</div>
							@else
		  					<div class="col-md-12 order" >
		  						@foreach($data as $k=>$v)
								@if($v->dd_status == 1)
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

												<span>单价：{{$vs->price}}</span>
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
		  							@if($v->dd_status == 0)
		  							<form action="/home/"></form>
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
	  								@elseif($v->dd_status == 1)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">提醒商家</a>
	  								@elseif($v->dd_status == 2)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">查看物流</a>
	  								@elseif($v->dd_status == 3)
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="">去评价</a>
									@endif
		  						</div>
								@endif
		  						@endforeach
		  					</div>
							@endif
					    </div>
					    <div role="tabpanel" class="container pinpai tab-pane" id="settings">
							<div class="g-pur-nulldata xianshi1" style="display: none;">					    		
					    		您暂时没有待收货信息
					    	</div>
		  					<div class="col-md-12 order xianshi2" >
		  						@foreach($data as $k=>$v)
								@if($v->dd_status == 2)
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

												<span>单价：{{$vs->price}}</span>
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
		  							@if($v->dd_status == 0)
		  							<form action="/home/"></form>
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
	  								@elseif($v->dd_status == 1)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">提醒商家</a>
	  								@elseif($v->dd_status == 2)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">查看物流</a>
	  								@elseif($v->dd_status == 3)
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="">去评价</a>
									@endif
		  						</div>
								@endif
		  						@endforeach
		  					</div>
					    </div>
					    <div role="tabpanel" class="container tab-pane" id="zixun">
					    	@if(empty($data[0]))
							<div class="g-pur-nulldata">					    		
					    		您暂时没有待评价商品
					    	</div>
							@else
		  					<div class="col-md-12 order" >
		  						@foreach($data as $k=>$v)
								@if($v->dd_status == 2)
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

												<span>单价：{{$vs->price}}</span>
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
		  							@if($v->dd_status == 0)
		  							<form action="/home/"></form>
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="/pay/zhifubao/{{$v->orderid}}">去支付</a>
	  								@elseif($v->dd_status == 1)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">提醒商家</a>
	  								@elseif($v->dd_status == 2)
	  								<a class="btn btn-default pull-right" href="">查看订单</a>
	  								<a class="btn btn-default pull-right" href="">查看物流</a>
	  								@elseif($v->dd_status == 3)
	  								<a class="btn btn-danger pull-right" href="/pay/zhifubao/{{$v->orderid}}">删除订单</a>
	  								<a class="btn btn-default pull-right" href="">去评价</a>
									@endif
		  						</div>
								@endif
		  						@endforeach
		  					</div>
							@endif
					    </div>
  					</div>

  					
				</div>
			</div>
			<!-- 个人中心右侧结束 -->
@stop

@section('js')
<script>
	$(function(){
		var xs2 = $('.xianshi2')
		xs2.each(function() {
			if($(this).html() == ''){
				alert(1)
				$(this).siblings('.xianshi1').css('display', 'block');
			}
		});
		
	})
</script>
	
@stop