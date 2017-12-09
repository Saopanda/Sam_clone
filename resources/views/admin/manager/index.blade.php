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
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			@foreach($data as $key => $val)
			<tbody> 
				<tr>					
					<td class="text-center">{{$val->id}}</td>
					<td class="text-center">{{$val->name}}</td>
					<td class="text-center">{{$val->status}}</td>
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
		</table>
	</div>
<!-- /tile body -->


<!-- 分页 -->
<div class="text-right sm-center pull-right">
	{{$data->links()}}
</div>
<!-- /tile footer -->
</section>
@stop
