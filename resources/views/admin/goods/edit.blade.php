@extends('layouts.admin_index')

@section('nr_title')
<div class="pageheader">
    <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 商品修改列表<span> Sam 商品修改列表页</span></h2>   
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
	
  select[name="flid"]{
  background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
  }
</style>



<section class="col-md-7 col-md-offset-2 tile color transparent-black">	
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>Sam商品</strong>添加页</h1>
    
  </div>
  <!-- /tile header -->

  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/goods/{{$goods->id}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      {{method_field('PUT')}}
      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">商品标题</label>
        <div class="col-sm-8">
          <input name="title" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$goods->title}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">库存</label>
        <div class="col-sm-8">
          <input name="num" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$goods->num}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">价格</label>
        <div class="col-sm-8">
          <input name="price" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1" value="{{$goods->price}}">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="fullname" class="col-sm-4 control-label">描述</label>
        <div class="col-sm-8">
          <script id="editor" type="text/plain" name="content">{!!$goods->content!!}</script>
          <label></label>
        </div>
      </div>
      


      <div class="form-group">        
          <input type="hidden" name="flid" value="{{$goods->flid}}">          
      </div>
      
      <div class="form-group">
         <label for="fullname" class="col-sm-4 control-label" style="margin-top: 15px;">商品图片</label>
         <div class="col-sm-8 pull-right" style="margin-bottom: 10px;">  
          @foreach($goodspic as $k => $v)           
          <img src="{{$v->imgs}}" width="40" height="40" style="margin-left: 4px;">     
         @endforeach 
         </div>
         <div class="col-sm-8 pull-right" style="margin-bottom: 10px;">
            <input type="file" name="imgs[]" class="pull-left" style="margin-top: 8px;margin-left: 8px;" multiple="">       
          </div>     
      </div>
      
      <div class="form-group">
            <label class="col-sm-4 control-label">状态</label>
            <div class="col-sm-8">
            	@if($goods->ztid == 1)
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios1" value="1" checked="">
                    <label for="optionsRadios1">上架</label>
                </div>
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios2" value="2">
                    <label for="optionsRadios2">下架</label>
                </div>
                @elseif($goods->ztid == 2)
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios1" value="1">
                    <label for="optionsRadios1">上架</label>
                </div>
                <div class="radio radio-transparent">
                    <input type="radio" name="ztid" id="optionsRadios2" value="2" checked="">
                    <label for="optionsRadios2">下架</label>
                </div>
                @endif
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
@stop

@section('js')
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script> 
<script>
    var ue = UE.getEditor('editor',{
        // toolbars: [
        //     ['fullscreen', 'source', 'undo', 'redo', 'bold']
        // ]
    });
</script>

@stop


