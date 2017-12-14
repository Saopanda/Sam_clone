@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--广告列表</title>
@endsection
@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 广告列表<span> Sam 广告列表页</span></h2>
</div>
@stop
@section('nr')

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
						<th class="text-center">背景颜色</th>
						<th class="text-center">图片</th>
						<th class="text-center">是否显示</th>
						<th class="text-center">显示位置</th>
						<th class="text-center" style="width: 140px;">操作</th>
					</tr>
				</thead>
				@foreach($data as $k=>$v)
				<tbody>
				
					<tr>					
						<td class="text-center">{{$v->id}}</td>
						<td class="text-center">{{$v->title}}</td>
						<th class="text-center">{{$v->bgcolor}}</th>
						<td class="text-center"><img src="{{$v->img_url}}" width="50" height="50" /></td>
						@if($v->is_show == 1)
						<td class="text-center">是</td>
						@else
						<td class="text-center">否</td>
						@endif
						@if($v->show_order == 1)
						<td class="text-center">轮播图</td>
						@elseif($v->show_order == 2)
						<td class="text-center">中部广告</td>
						@else
						<td class="text-center">尾部广告</td>
						@endif
						<td class="text-center" >
							<a href="/admin/ad/{{$v->id}}/edit">修改</a>
							&nbsp;
							<form style="display: inline-block;" action="/admin/ad/{{$v->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				
				</tbody>
				@endforeach
			</table>
		</div>
	<!-- /tile body -->


	<!-- 分页 -->
	<div style="margin-bottom: 20px;"></div>
	<div class="col-sm-4 text-right sm-center pull-right">
		{{$data->links()}}
	</div>
<!-- /tile footer -->
</section>
@endsection
@section('js')
<script>
$('.del').submit(function(){
    if(!confirm('您确定要删除该广告?')) return false;
});
</script>
@endsection