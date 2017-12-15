@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--订单列表</title>
@endsection
@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 订单列表<span> Sam 订单列表页</span></h2>
</div>
@stop
@section('nr')
@foreach($data as $k=>$v)
	<section class="tile color transparent-black">
	<!-- tile header -->
		<div class="tile-header">
			<!-- 标题 -->
			<h1><strong>订单编号</strong>&nbsp;&nbsp;<h2>{{$v->orderid}}</h2></h1>
			<div class="controls">
		      <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
		      <a href="#" class="remove"><i class="fa fa-times"></i></a>
		    </div>
		</div>
	<!-- /tile header -->

	<!-- tile body -->
		<div class="tile-body nopadding">
			<table class="table table-bordered table-sortable">
				<thead>
					<tr>					
						<th class="text-center">会员名</th>
						<th class="text-center">付款时间</th>
						<th class="text-center">订单金额</th>
						<th class="text-center">订单状态</th>
						<th class="text-center" style="width: 140px;">操作</th>
					</tr>
				</thead>
				<tbody>
				
					<tr>
						<td class="text-center">{{$v->username}}</td>	
						<td class="text-center">{{$v->date}}</td>
						<td class="text-center">￥{{$v->sum_price}}</td>
						@if( $v->dd_status == '0')
						<td class="text-center">未支付</td>
						@elseif($v->dd_status == '1')
						<td class="text-center">代发货</td>
						@elseif($v->dd_status == '2')
						<td class="text-center">已发货</td>
						@elseif($v->dd_status == '3')
						<td class="text-center">已收货</td>
						@else
						<td class="text-center">待评论</td>
						@endif
						<td class="text-center" >
						@if($v->dd_status == '1')
							<a href="/admin/order/{{$v->id}}/edit">管理</a>
						@endif
						@if($v->dd_status == '2')
							<a href="/admin/order/{{$v->id}}">管理</a>
						@endif
						@if($v->dd_status == '3')
							<a href="/admin/order/{{$v->id}}">订单以完成</a>
						@endif
							&nbsp;
							<form style="display: inline-block;" action="/admin/order/{{$v->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				
				</tbody>

			</table>
		</div>
	<!-- /tile body -->


	<!-- 分页 -->
	<div style="margin-bottom: 20px;"></div>
	<div class="col-sm-4 text-right sm-center pull-right">
		
	</div>
<!-- /tile footer -->
</section>
@endforeach
@endsection
@section('js')
<script>
$('.del').submit(function(){
    if(!confirm('您确定要删除该地址吗?')) return false;
});
</script>
@endsection