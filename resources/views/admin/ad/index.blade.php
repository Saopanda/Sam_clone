@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--广告列表</title>
@endsection

@section('nr')
	<div class="pageheader">
	    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 广告列表</h2>   
	</div>
	<div style="height: 20px;"></div>

	<section class="tile color transparent-black">
	<!-- tile header -->
		<div class="tile-header">
			<!-- 标题 -->
			<h1><strong>广告</strong>列表</h1>
		</div>
	<!-- /tile header -->

	<!-- tile body -->
		<div class="tile-body nopadding">
			<table class="table table-bordered table-sortable">
				<thead>
					<tr>					
						<th class="text-center">ID</th>
						<th class="text-center">标题</th>
						<th class="text-center">图片</th>
						<th class="text-center">是否显示</th>
						<th class="text-center">显示位置</th>
						<th class="text-center" style="width: 140px;">操作</th>
					</tr>
				</thead>
				<tbody>
					<tr>					
						<td class="text-center">ID</td>
						<td class="text-center">标题</td>
						<td class="text-center"><img src=""/></td>
						<td class="text-center">是</td>
						<td class="text-center">轮播图</td>
						<td class="text-center" >
							<a href="">修改</a>
							&nbsp;
							<a href="">删除</a>
						</td>
					</tr>				
				</tbody>
			</table>
		</div>
	<!-- /tile body -->


	<!-- 分页 -->
	<div style="margin-bottom: 20px;"></div>
	<div class="col-sm-4 text-right sm-center pull-right">
		<ul class="pagination pagination-xs nomargin pagination-custom">
			<li class="disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div>
<!-- /tile footer -->
</section>
@endsection