@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 商品管理列表<span> Sam 商品管理列表页</span></h2>   
</div>
@stop

@section('nr')
<style type="text/css">
	a{
		text-decoration: none;
	}
	a:hover{
		text-decoration: none;
	}
</style>

<section class="tile color transparent-black">
<!-- tile header -->
	<div class="tile-header">
		<!-- 标题 -->
		<h1><strong>商品管理</strong> 列表</h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>					
					<th class="text-center">ID</th>
					<th class="text-center">商品标题</th>
					<th class="text-center">商品活动</th>
					<th class="text-center">商品价格</th>
					<th class="text-center">商品分类</th>					
					<th class="text-center">商品库存</th>
					<th class="text-center">商品状态</th>
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			@foreach($goods as $key => $val)
			<thead>
			<tr>					
				<th class="text-center">{{$val->id}}</th>
				<th class="text-center">{{$val->title}}</th>
				<th class="text-center">
				@if($val->huodong == 0)  默认 @endif
				@if($val->huodong == 1)  销量 @endif
				@if($val->huodong == 2)  最新 @endif
				@if($val->huodong == 3)  优惠 @endif
				</th>
				<th class="text-center">{{$val->price}}</th>				
				<th class="text-center">{{$val->flid}}</th>
				<th class="text-center">{{$val->num}}</th>
				<th class="text-center">
				@if($val->ztid == 1)上架
				@elseif($val->ztid == 2)下架
				@endif
				</th>
				<th class="text-center" style="width: 140px;">
					<a href="/admin/goods/{{$val->id}}/edit">修改</a>
						&nbsp;
						<form method="post" action="/admin/goods/{{$val->id}}" style="display: inline-block;">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn-a">删除</button>							
						</form>
				</th>
			</tr>
			</thead>
			@endforeach
		</table>
	</div>
<!-- /tile body -->


<!-- 分页 -->
<div class="text-right sm-center pull-right">
</div>
<!-- /tile footer -->
</section>


<div class="text-right sm-center pull-right">
	{{$goods->links()}}
</div>
@stop

@section('js')
<script>
	$(function() {
		$('.btn-a').click(function() {
			var rs = confirm('你确定要删除?')
			if(rs){

			}else{
				return false;
			}
		});
	})
</script>
@stop

