@extends('layouts.my_center')

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

				  <!-- Tab panes -->
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
					    	<div class="g-pur-nulldata">					    		
					    		您暂时没有任何购买记录
					    	</div>
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