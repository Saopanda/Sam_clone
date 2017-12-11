@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--添加分类</title>
@endsection
@section('nr_title')
<div class="pageheader">
	<h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 添加分类<span> Sam 分类添加页</span></h2>
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
	select[name="ztid"],.jb{
	background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    -webkit-font-smoothing: antialiased;
    line-height: 20px;
	}	
</style>
<!-- 主题表单 -->
<section class="col-md-7 col-md-offset-2 tile color transparent-black">
  <!-- tile header -->
  <div class="tile-header">
    <h1><strong>分类</strong>信息添加</h1>
    <div class="controls">
      <a href="#" class="remove"><i class="fa fa-times"></i></a>
    </div>
  </div>
  <!-- /tile header -->
  <!-- tile body -->
  <div class="tile-body">
    <form class="form-horizontal" role="form" parsley-validate="" id="basicvalidations" action="/admin/class" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="fullname" class="col-sm-3 control-label">分类名称</label>
        <div class="col-sm-8">
          <input name="flname" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
          <label></label>
        </div>
      </div>

      <div class="form-group">
        <label for="password" class="col-sm-3 control-label">父级分类</label>
        <div class="col-sm-3  pull-left">
          <select name="pid" onchange="getsel(this)" class="form-control parsley-validated jb">
            <option value="1">顶级分类</option>
            <option value="2">二级分类</option>
            <option value="3">三级分类</option>
          </select>
        </div>
      </div>
      <div class="form-group" id="topmenu"  style="display: none;">
      <label for="password" class="col-sm-3 control-label">顶级分类</label>
        <div class="col-sm-3  pull-left">
          <select name="jbone" class="form-control parsley-validated jb" onchange="gitone(this.value)">
          @foreach($fenl as $k=>$v)
            <option value="{{$v->id}}">{{$v->flname}}</option>
          @endforeach

          </select>
        </div>
      </div>
      <div class="form-group" id="twomenu" style="display: none;">
        <label for="password" class="col-sm-3 control-label">二级分类</label>
        <div class="col-sm-3  pull-left">
          <select name="jbtwo" class="form-control parsley-validated jb" id="two">
            
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="website" class="col-sm-3 control-label">是否显示</label>
        <div class="col-sm-8">
          <select name="ztid" class="form-control parsley-validated">
          	<option value="">请选择</option>
          	<option value="1">显示</option>
          	<option value="0">隐藏</option>
          </select>
          <label></label>
        </div>
      </div>

      <div class="form-group form-footer">
        <div class="col-sm-offset-4 col-sm-8">
          <button type="submit" class="btn btn-default">添加</button>
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
		var flname = $('input[name=flname]')
		var  pid= $('select[name=pid]')
		var ztid = $('select[name=ztid]')
		var btn = $('button[type=submit]')

		btn.click(function() {
			if(flname.val() == ''){
				errors(flname,'请输入分类名称!'); 
				var ea = 1;
			}else{
				oks(flname) 
				var ea = ''
			}
			if(ztid.val() == ''){
				errors(ztid,'请选择是否显示!')
				var ed = 1
			}else{
				oks(ztid)
				ed = ''
			}
			if(pid.val() == ''){
				errors(pid,'默认顶级分类!')
				var ef = 1
			}else{
				oks(pid)
				ef = ''
			}
			if(!ea && !ed && !ef){

			}else{
				return false;
			}
		});
	})

  function getsel(tag){
    var i=tag.value;
      //alert(tag.value);
      if(i==1){
        $("#topmenu").css("display","none");
        $("#twomenu").css("display","none");
      }else if(i==2){
        $("#topmenu").css("display","block");
        $("#twomenu").css("display","none");
      }else if(i==3){
        //查询到一级第一个的id值
        var q=$("#topmenu").find("option").eq(0).val();
        gitone(q);
        $("#topmenu").css("display","block");
        $("#twomenu").css("display","block");
      }
    }
function gitone(id){
  
  $.ajax({
    type:'get',
    url:'/getwomenu',
    data: 'oneid='+id,
    success: function(msg){
     // alert(msg);
     // var twonavs = eval("("+msg+")");
      var twonavinfos = '';
      for(var p=0;p<msg.length;p++)
      {
        twonavinfos += "<option value="+msg[p].id+">"+msg[p].flname+"</option>"
      }
      
       $("#two").html(twonavinfos)
    }
  });
  
}
</script>
@stop