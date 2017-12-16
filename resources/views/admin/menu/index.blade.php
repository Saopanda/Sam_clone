@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 栏目权限管理<span> Sam 后台栏目权限管理</span></h2>   
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
		<h1><strong>管理员栏目权限</strong> 列表</h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>
					<th class="text-center">ID</th>					
					<th class="text-center">管理员ID</th>
					<th class="text-center">栏目权限</th>
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			@foreach($data as $key => $val)
			<tbody> 
				<tr>
					<td class="text-center">{{$val->id}}</td>					
					<td class="text-center">{{$val->adminid}}</td>
					<td class="text-center">
						@if($val->menuid == 1) 站点管理
						@elseif($val->menuid == 2) 用户管理
						@elseif($val->menuid == 3) 广告管理
						@elseif($val->menuid == 4) 分类管理
						@elseif($val->menuid == 5) 商品管理
						@elseif($val->menuid == 6) 评论管理
						@endif
					</td>					
					<td class="text-center">						
						<form method="post" action="/admin/menuroles/{{$val->id}}" style="display: inline-block;">
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
	@if(isset($data))
	{{$data->links()}}
	@endif
</div>
<!-- /tile footer -->
</section>

@stop