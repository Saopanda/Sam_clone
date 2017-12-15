@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 管理员列表<span> Sam 管理员列表页</span></h2>   
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
		<h1><strong>管理员</strong> 列表</h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>					
					<th class="text-center">ID</th>
					<th class="text-center">管理员帐号</th>
					<th class="text-center">状态</th>
					<th class="text-center">权限</th>
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			@if(isset($data))
			@foreach($data as $key => $val)
			<tbody> 
				<tr>					
					<td class="text-center">{{$val->id}}</td>
					<td class="text-center">{{$val->name}}</td>
					<td class="text-center">
					@if($val->roles == 1)超级管理员
					@elseif($val->roles == 2)普通管理员
					@endif
					</td>
					<td class="text-center">
					@if($val->status == 1)正常
					@elseif($val->status == 2)冻结
					@endif
					</td>
					<td class="text-center" >
						<a href="/admin/manager/{{$val->id}}/edit">修改</a>
						&nbsp;
						<form method="post" action="/admin/manager/{{$val->id}}" style="display: inline-block;">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn-a">删除</button>							
						</form>
						
					</td>
				</tr>				
			</tbody>
			@endforeach
			@elseif(isset($da))
			<tbody> 
				<tr>					
					<td class="text-center">当前登录账号</td>
					<td class="text-center">{{$da->name}}</td>
					<td class="text-center">
					@if($da->roles == 1)超级管理员
					@elseif($da->roles == 2)普通管理员
					@endif
					</td>
					<td class="text-center">
					@if($da->status == 1)正常
					@elseif($da->status == 2)冻结
					@endif
					</td>
					<td class="text-center" >
						<a href="/admin/manager/{{$da->id}}/edit">修改</a>
						&nbsp;
						<form method="post" action="/admin/manager/{{$da->id}}" style="display: inline-block;">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn-a">删除</button>							
						</form>
						
					</td>
				</tr>				
			</tbody>
			@endif
		</table>
	</div>
<!-- /tile body -->


<!-- 分页 -->
<div class="text-right sm-center pull-right">
	@if(isset($data))
	{{$data->links()}}
	@endif
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