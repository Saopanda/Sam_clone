@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> Sam评论列表<span> Sam 评论列表</span></h2>   
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
	.jb{
  background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
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
					<th class="text-center" style="width: 500px;">评论信息</th>
					<th class="text-center">状态</th>
					<th class="text-center">评论时间</th>
					<th class="text-center">是否审核</th>
				</tr>
			</thead>
			@foreach($pl as $key => $val)
			<tbody> 
				<tr>								
					<td class="text-center">{{$val->id}}</td>
					<td class="text-center">{{$val->userid}}</td>
					<td class="text-center">{{$val->name}}</td>
					<td class="text-center">{{$val->goodsid}}</td>
					<td class="text-center">{{$val->content}}</td>
					<td class="text-center">
						@if($val->ztid == 1)好评
						@elseif($val->ztid == 2)中评
						@elseif($val->ztid == 3)差评
						@endif
					</td>
					<td class="text-center">{{$val->time}}</td>
					<td class="text-center">
						@if($val->shenghe == 1)已审核
						@else($val->shenghe == 2)未审核
						@endif
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


