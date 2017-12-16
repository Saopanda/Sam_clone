@extends('layouts.admin_index')
@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 网站待激活会员</h2>
</div>
@stop
@section('nr')
<section class="tile color transparent-black">
<!-- tile header -->
	<div class="tile-header">
		<!-- 标题 -->
		<h1><strong>待激活会员</strong></h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>					
					<th class="text-center">ID</th>
					<th class="text-center">用户名</th>
					<th class="text-center">邮箱</th>
					<th class="text-center">手机号</th>
					<th class="text-center">状态</th>
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($rs as $k=>$v)
				<tr>					
					<td class="text-center">{{$v->id}}</td>
					<td class="text-center">{{$v->name}}</td>
					<td class="text-center">{{$v->email}}</td>
					<td class="text-center">{{$v->phone}}</td>
					<td class="text-center">@if($v->ztid == 0)未激活@elseif($v->ztid == 1)已激活@endif</td>
					<td class="text-center">
						<a href="/admin/user/{{$v->id}}/tx">提醒</a>
						&nbsp;
						<form style="display: inline-block;" action="/admin/user/{{$v->id}}" method="post">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn-a" >删除</button>
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
			{{$rs->links()}}
	</div>
<!-- /tile footer -->
</section>
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