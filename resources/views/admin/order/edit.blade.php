@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--修改订单</title>
@endsection
@section('nr_title')
<div class="pageheader">
  <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 订单修改<span> Sam 订单修改页</span></h2>
</div>
@stop
@section('nr')
<style>
	label{
		font-weight: normal;
	}
	.btn-default{
		opacity: 0.7
	}
	.has-error{
		color: #FF9999;
	}
	input[type="file"],select[name="is_show"],select[name="show_order"]{
	background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
	}
  .tex{
    margin:14px 0;
  }
	
</style>

<!-- 主题表单 -->
<section class="col-md-7 col-md-offset-2 tile color transparent-black">
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>订单</strong>信息更新</h1>
    <div class="controls">
      <a href="#" class="remove"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <!-- /tile header -->
  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/ad/{{$xginfo->id}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">标题</label>
        <div class="col-sm-8">
          <input name="title" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$xginfo->title}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="img_url" class="col-sm-4 control-label ">上传图片</label>
        <div class="col-sm-8">
        <div class="tex">
        <img src="{{$xginfo->img_url}}" alt="" width="100" height="100">
        </div>
          <input name="img_url" type="file" class="form-control parsley-validated btn btn-default" id="email" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-type="email" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="col-sm-4 control-label">是否显示</label>
        <div class="col-sm-8">
          <select name="is_show" class="form-control parsley-validated">
            @if($xginfo->is_show == 1)
          	<option value="1" selected>显示</option>
          	<option value="0">隐藏</option>
            @else
            <option value="1">显示</option>
            <option value="0" selected>隐藏</option>
            @endif
          </select>
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="website" class="col-sm-4 control-label">显示位置</label>
        <div class="col-sm-8">
          <select name="show_order" class="form-control parsley-validated">
          	@if($xginfo->show_order == 1)
          	<option value="1" selected>轮播图</option>
          	<option value="2">中部广告</option>
          	<option value="3">尾部广告</option>
            @elseif($xginfo->show_order == 2)
            <option value="1">轮播图</option>
            <option value="2" selected>中部广告</option>
            <option value="3">尾部广告</option>
            @else
            <option value="1">轮播图</option>
            <option value="2" >中部广告</option>
            <option value="3" selected>尾部广告</option>
            @endif
          </select>
          <label></label>
        </div>
      </div>

      <div class="form-group form-footer">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-default">修改</button>
          <button type="reset" class="btn btn-default">重写</button>
        </div>
      </div>

    </form>

  </div>
  <!-- /tile body -->
</section>
<!-- 详细信息 -->
@endsection
@section('js')
<script>

function errors(a,b){
	a.siblings('label').addClass('has-error').html(b)
}
function oks(a) {
	a.siblings('label').removeClass('has-error').html('')
}

	$(function(){
		var title = $('input[name=title]')
		var img_url = $('input[name=img_url]')
		var is_show = $('select[name=is_show]')
		var show_order = $('select[name=show_order]')
		var btn = $('button[type=submit]')

		btn.click(function() {
			if(title.val() == ''){
				errors(title,'请输入标题!'); 
				var ea = 1;
			}else{
				oks(title) 
				var ea = ''
			}
			if(img_url.val() == ''){
				errors(img_url,'请上传图片');
				var eb = 1;
			}else{
				oks(img_url) 
				eb = ''
			}
			if(is_show.val() == ''){
				errors(is_show,'请选择是否显示!')
				var ed = 1
			}else{
				oks(is_show)
				ed = ''
			}
			if(show_order.val() == ''){
				errors(show_order,'请选择显示位置!')
				var ef = 1
			}else{
				oks(show_order)
				ef = ''
			}
			if(!ea && !eb && !ed && !ef){

			}else{
				return false;
			}
		});
	})

</script>
@stop