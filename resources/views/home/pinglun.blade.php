@extends('layouts.my_center')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/zhongxin.css">
@stop

@section('right')
	<section class="right">
		<h4 class="gec-bread-title">商品点评</h4>
		<div>
				  <!-- Nav tabs -->
		    <div class="container xxk">
			    <ul class="xxk-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">待评价</a></li>
				    <div class="line-2"></div>
				    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">已评价</a></li>
				    
			    </ul>
		    </div>

		  <!-- Tab panes -->
		    <div class="tab-content gr_nr">
			    <div role="tabpanel" class="container tab-pane active" id="home">
			    	<div class="gr_ss">
			    	</div>
			    	<div class="g-pur-nulldata">
			    		暂无待评论商品					    
			    	</div>
			    </div>
			    <div role="tabpanel" class="container tab-pane" id="profile">
			    	<div class="gr_ss">
			    	</div>
			    	<div class="g-pur-nulldata">
			    		暂无评论
			    	</div>
			    </div>
			    
		</div>
	</section>
@stop