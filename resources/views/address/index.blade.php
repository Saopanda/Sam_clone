@extends('layouts.my_center')


@section('style')
<link rel="stylesheet" type="text/css" href="/css/address.css">
<link rel="stylesheet" type="text/css" href="/css/jiesuan.css">
<link rel="stylesheet" type="text/css" href="/css/lanrenzhijia.css">

@stop
@section('right')
	<section class="right">
		<div class="top" >
			<h4 class="gpl-bread-title">地址管理
			<span class="ads-tips">（最多保存20个有效地址，已保存
			<b id="addressNumId">{{$num}}</b>个）</span></h4>
			<a href="javascript:;" class="you theme-login" id='add'>+新增收货地址</a>
		</div>
		<!-- 弹出窗开始 -->
		<div class="theme-popover">
	     	<div class="theme-poptit address-title">
	          <a href="javascript:;" title="关闭" class="close">×</a>
	     	</div>
	     	<h3 class="title_a">新增地址</h3>
	     	<div class="theme-popbod dform add_address">
		        <div class="biaodan">
						<form action="/home/address" method="post">
							<div class="bd_a">
								<div class="address">
									<span class="title"><i>*</i>收件人：</span>
									<div class="content">
										<input type="text" class="form-control" name="name" placeholder="收件人姓名">
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>地址：</span>
									<div class="content">
										<div class="sheng">
											<select name="pro" id="" class="form-control sheng_a">
												<option value="">请选择省</option>
											</select>
										</div>
										<div class="sheng" id="shi">
											<select name="city" id="" class=" form-control sheng_a">
												
											</select>
										</div>
										<div class="sheng">
											<select name="county" id="" class=" form-control sheng_a">
												
											</select>
										</div>
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>详细地址：</span>
									<div class="content">
										<input type="text" class="form-control" name="content" placeholder="街道名称/编号，楼宇名称，单位，房号" />
									</div>
								</div>
								<div class="address">
									<span class="title"><i>*</i>手机号码：</span>
									<div class="content">
										<input type="text" class="form-control" name="phone" placeholder="手机号码" maxlength="11" />
									</div>
								</div>
								{{csrf_field()}}
								<div class="address">
									<span class="title"></span>
									<div class="content">
										<input type="checkbox" name=""/> 设置为默认地址
									</div>
								</div>
								<div class="baocun">
									<input type="submit" name="" value="保存" class="tj">
									<a class="btn-cancel" href="#">取消</a>
								</div>

							</div>
						</form>
				</div>
	     	</div>
		</div>
		<div class="theme-popover-mask"></div>
		<!-- 弹出窗结束 -->
		<!-- 显示列表开始 -->
		<div class="ads_list">
			<ul>
			@foreach($addresses as $k=>$v)
				<li>
					<div class="ads-name"><b>{{$v->name}}</b></div>
					<div class="ads-phone">{{$v->phone}}</div>
					<div class="ads-address">{{$v->pname}} {{$v->cname}} {{$v->xname}} {{$v->content}} </div>
					<div class="ads-option" id="138666421">
					<form method="post" action="/home/address/{{$v->id}}">
						{{method_field('DELETE')}}
                            {{csrf_field()}}
						<button style="border:0;background: none;" class=" ads-delete"><em class="glyphicon glyphicon-trash"></em><span>删除</span></button>
					</form>
						<a class="blue-link ads-set-default" href="#" data-tpa="2847">设为默认地址</a>
					</div>
				</li>
			@endforeach
				
			</ul>
		</div>
		<!-- 显示列表结束 -->

	</section>			
@stop
@section('js')
<script>
jQuery(document).ready(function($) {
	$('.theme-login').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})
	$('.btn-cancel').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})

})
$(function(){
	var id=0;
	$('#add').click(function(){
        $.ajax({
        type:'get',
        url: '/home/address/getarea',
        data: 'pid='+id,
        success: function(data){
        	//alert(data);
        	for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=pro]').append(option);
            }
        }
    	})
	})

	$('select[name=pro]').change(function(){
    $('select[name=city]').html('<option value="">请选择</option>')
    //获取当前省的id
    var id = $(this).val();
    //alert(id);
    //发送ajax获取当前省所对应的市的信息
    $.ajax({
        type:'get',
        url: '/home/address/getarea',
        data: {pid:id},
        success: function(data){
            for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=city]').append(option);
            }
        }
    })
});
	$('select[name=city]').change(function(){
    $('select[name=county]').html('<option value="">请选择</option>')
    //获取当前省的id
    var id = $(this).val();
    //发送ajax获取当前省所对应的市的信息
    $.ajax({
        type:'get',
        url: '/home/address/getarea',
        data: {pid:id},
        success: function(data){
            for(var i=0;i<data.length;i++){
                var option = $('<option value="'+data[i].id+'">'+data[i].area_name+'</option>')
                //将option插入到省的select中
                $('select[name=county]').append(option);
            }
        }
    })
});
})

</script>
			
@stop