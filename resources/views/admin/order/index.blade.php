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

	<section class="tile color transparent-black">
	<!-- tile header -->
		<div class="tile-header">
			<!-- 标题 -->
			<h1><strong>订单</strong>列表</h1>
		</div>
	<!-- /tile header -->

	<!-- tile body -->
		<div class="tile-body nopadding">
			<table class="table table-bordered table-sortable">
				<thead>
					<tr>					
						<th class="text-center">ID</th>
						<th class="text-center">会员名</th>
						<th class="text-center">商品名称</th>
						<th class="text-center">收货人名字</th>
						<th class="text-center">收货地址</th>
						<th class="text-center">收货电话</th>
						<th class="text-center">订单状态</th>
						<th class="text-center" style="width: 140px;">操作</th>
					</tr>
				</thead>
				<tbody>
				@foreach($data as $k=>$v)
					<tr>					
						<td class="text-center">{{$v->id}}</td>
						<td class="text-center">{{$v->username}}</td>
						<td class="text-center">{{$v->goodsname}}</td>
						<td class="text-center">{{$v->address->name}}</td>
						<td class="text-center">{{$v->pro}} {{$v->city}} {{$v->county}} {{$v->content}}</td>
						
						<td class="text-center">{{$v->address->phone}}</td>
						@if( $v->dd_status == '0')
						<td class="text-center">未支付</td>
						@elseif($v->dd_status == '1')
						<td class="text-center">已支付</td>
						@elseif($v->dd_status == '2')
						<td class="text-center">待发货</td>
						@elseif($v->dd_status == '3')
						<td class="text-center">已发货</td>
						@elseif($v->dd_status == '4')
						<td class="text-center">已收货</td>
						@else
						<td class="text-center">待评论</td>
						@endif
						<td class="text-center" >
							<a href="/admin/order/{{$v->id}}/edit">修改</a>
							&nbsp;
							<form style="display: inline-block;" action="/admin/order/{{$v->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				@endforeach
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
@endsection
@section('js')
<script>
$('.del').submit(function(){
    if(!confirm('您确定要删除该地址吗?')) return false;
});
</script>
@endsection