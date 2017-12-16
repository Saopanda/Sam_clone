@extends('layouts.admin_index')


@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> Sam站点列表<span> Sam 站点列表</span></h2>   
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
		<h1><strong>评论</strong> 列表</h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>					
					<th class="text-center">ID</th>
					<th class="text-center">用户id</th>
					<th class="text-center">用户名</th>
					<th class="text-center">商品id</th>
					<th class="text-center" style="width:500px;">评论信息</th>
					<th class="text-center">状态</th>
					<th class="text-center">评论时间</th>
					<th class="text-center">是否审核</th>
				</tr>
			</thead>
			@foreach($pl as $k => $v)
			<tbody> 
				<tr>								
					<td class="text-center">{{$v->id}}</td>
					<td class="text-center">{{$v->userid}}</td>
					<td class="text-center">{{$v->name}}</td>
					<td class="text-center">{{$v->goodsid}}</td>
					<td class="text-center">{{$v->content}}</td>
					<td class="text-center">
						@if($v->ztid == 1)好评
						@elseif($v->ztid == 2)中评
						@elseif($v->ztid == 3)差评
						@endif
					</td>
					<td class="text-center">{{$v->time}}</td>
					<td class="text-center">
						<form method="post" action="/admin/pinglun/{{$v->id}}">
							{{csrf_field()}}
      						{{method_field('PUT')}}
      						<button class="btn-a">审核</button>
						</form>						
					</td>
				</tr>				
			</tbody>
			@endforeach
		</table>
	</div>
<!-- /tile body -->

</section>
<div class="text-right sm-center pull-right">
	{{$pl->links()}}
</div>
@stop

@section('js')
<script>
	$(function() {
		$('.btn-a').click(function() {
			var rs = confirm('你确定审核通过吗?')
			if(rs){

			}else{
				return false;
			}
		});
	})
</script>
@stop