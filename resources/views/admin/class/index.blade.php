@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--分类列表</title>
@endsection
@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 分类列表<span> Sam 分类列表页</span></h2>
</div>
@stop
@section('nr')

	<section class="tile color transparent-black">
	<!-- tile header -->
		<div class="tile-header">
			<!-- 标题 -->
			<h1><strong>分类</strong>列表</h1>
		</div>
	<!-- /tile header -->

	<!-- tile body -->
		<div class="tile-body nopadding">
			<table class="table table-bordered table-sortable">
				<thead>
					<tr>					
						<th class="text-center">ID</th>
						<th class="text-center">分类名称</th>
						<th class="text-center">是否显示</th>
						<th class="text-center" style="width: 140px;">操作</th>
					</tr>
				</thead>
				@foreach($class as $k=>$v)
				<tbody>
				
					<tr>					
						<td class="text-center">{{$v->id}}</td>
						<td class="text-left">{{$v->flname}}</td>

						@if($v->ztid == 1)
						<td class="text-center">是</td>
						@else
						<td class="text-center">否</td>
						@endif
						
						<td class="text-center" >
							&nbsp;
							<form style="display: inline-block;" action="/admin/class/{{$v->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				
				</tbody>
				@foreach($v->two as $va)
				<tbody>
				
					<tr>					
						<td class="text-center">{{$va->id}}</td>
						<td class="text-left">┣━━━{{$va->flname}}</td>

						@if($va->ztid == 1)
						<td class="text-center">是</td>
						@else
						<td class="text-center">否</td>
						@endif
						
						<td class="text-center" >
							&nbsp;
							<form style="display: inline-block;" action="/admin/class/{{$va->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				
				</tbody>
				@foreach($va->there as $vas)
				<tbody>
				
					<tr>					
						<td class="text-center">{{$vas->id}}</td>
						<td class="text-left">┣━━━━┣━━━━{{$vas->flname}}</td>

						@if($vas->ztid == 1)
						<td class="text-center">是</td>
						@else
						<td class="text-center">否</td>
						@endif
						
						<td class="text-center" >
							&nbsp;
							<form style="display: inline-block;" action="/admin/class/{{$vas->id}}" method="post" class="del">
							{{method_field('DELETE')}}
                            {{csrf_field()}}
							<button class='btn-a'>删除</button>
							</form>
						</td>
					</tr>
				
				</tbody>
				@endforeach
				@endforeach
				@endforeach
			</table>
		</div>
	<!-- /tile body -->


	<!-- 分页 -->
	<div style="margin-bottom: 20px;"></div>
	<div class="col-sm-4 text-right sm-center pull-right">
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