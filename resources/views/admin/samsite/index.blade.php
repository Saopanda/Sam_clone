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
		<h1><strong>站点</strong> 列表</h1>
	</div>
<!-- /tile header -->

<!-- tile body -->
	<div class="tile-body nopadding">
		<table class="table table-bordered table-sortable">
			<thead>
				<tr>					
					<th class="text-center">ID</th>
					<th class="text-center">网站名称</th>
					<th class="text-center">版权</th>
					<th class="text-center">在网时间</th>
					<th class="text-center">备案号</th>
					<th class="text-center">公网备案号</th>
					<th class="text-center">页面类型</th>
					<th class="text-center" style="width: 140px;">操作</th>
				</tr>
			</thead>
			@foreach($site as $key =>$val)
			<tbody> 
				<tr>								
					<td class="text-center">{{$val->id}}</td>
					<td class="text-center">{{$val->webname}}</td>
					<td class="text-center">{{$val->copyright}}</td>
					<td class="text-center">{{$val->time}}</td>
					<td class="text-center">{{$val->beianhao}}</td>
					<td class="text-center">{{$val->gongwangbeian}}</td>
					<td class="text-center">{{$val->weizhi}}</td>					
					<td class="text-center" >
						<a href="/admin/samsite/{{$val->id}}/edit">修改</a>									
					</td>
				</tr>				
			</tbody>
			@endforeach
		</table>
	</div>
<!-- /tile body -->

</section>


<div class="text-right sm-center pull-right">
	{{$site->links()}}
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