@extends('layouts.my_center')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/zhongxin.css">
@stop

@section('right')
	<section class="right">
		<h4 class="gec-bread-title">编辑个人信息</h4>
		<form action="/home/bianji" method="post" enctype="multipart/form-data">
		<div class="top_a">
			<span class="tupian_tit">当前头像：</span>
		    <div class="tou_img">
		    	<img src="{{$info->touimg}}" alt="" width="100%" height="100%" style="border-radius: 100%;" />
		    	<input type="file" class="heard_img" onchange="touxiang(this)" name="touimg" />
		    	<img src="" id='portrait' style="display: none;" width="90" height="90" />
		    </div>
		    <div class="gp-tip">（图片类型：jpg、gif）
		    </div>
		    <a class="user-destroy" href="/logout">账户注销</a>
		</div>
		<div class="content">
			<ul>
				<li class="clear">
					<span class="labels">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</span>
					<div class="item-box">
						<p>{{$sioninfo->name}}</p>
					</div>
				</li>
				<li class="clear">
					<span class="labels">真实姓名 ：</span>
					<div class="item-box"><input type="text" class="form-control" value="" name="name" /></div>
				</li>
				<li class="clear">
					<span class="labels">您的生日：</span>
					<div class="item-box"><input type="text" class="form-control" value="{{$info->shengri}}" name="shengri" /></div>
				</li>
			</ul>
		</div>
		<div class="content there">
			<ul>
				<li class="nnn">
					<label class="label_tit"><em>*</em><span>您的手机</span></label>
					<div class="label_box">	
                        <input id="mobileInput" class="form-control an" type="text" maxlength="11" value="{{$sioninfo->phone}}" name="phone">
                        <input id="mobileyzm" class="form-control an" type="text" value="" name="yzm" style="width: 100px; margin-left: 10px; display: none;"
                        placeholder="验证码">
                      	<button type="button" class="labox-btn label-yz-btn" id="yzphone">已验证，可点击修改</button>
                        <div class="babox-normal-tip" id="xinxi">便于接受优惠信息等</div>
                        <div class="clearfix"></div>
                        <div class="la-check">
                            <input type="checkbox" class="check-input" id="mobileAcceptMsg" checked="">
                            <label for="mobileAcceptMsg">接受优惠信息的发送</label>
                        </div>
					</div>
				</li>
				<li class="nnn">
					<label class="label_tit"><em>*</em><span>您的邮箱</span></label>
					<div class="label_box">	
                        <input id="mobileInput" class="form-control an" type="text" maxlength="11" autocomplete="off" value="{{$sioninfo->email}}" name="email">
                      	<button class="labox-btn label-yz-btn" data-tpa="3044" data-trackersend="1" id='email'>验证邮箱</button>
                      	<input type="hidden" name="id" value= "{{$sioninfo->id}}" />
                      	<input type="hidden" name="ztid" value= "{{$sioninfo->ztid}}" />
                        <div class="babox-normal-tip" id="cang">便于密码找回、接受优惠信息等</div>
                        <div class="clearfix"></div>
                        <div class="la-check">
                            <input type="checkbox" class="check-input" id="mobileAcceptMsg" >
                            <label for="mobileAcceptMsg">接受优惠信息的发送</label>
                        </div>
					</div>
				</li>
			</ul>
		</div>
		{{csrf_field()}}
		<div class="clear">
			<button type="" class="form-sumbit-btn">保存</button>
		</div>
		</form>
	</section>			
@stop

@section('js')
<script type="text/javascript">
function touxiang(data)
{
 var file=data.files[0];
	if(window.FileReader) {
		var fr = new FileReader();
		console.log(fr);
		var portrait = document.getElementById('portrait');
		fr.onloadend = function (e){
			portrait.src = e.target.result;
		};

		fr.readAsDataURL(file);
		portrait.style.display='block';
	}
}
$(function(){


$('#yzphone').click(function(){
	var phone = $('input[name=phone]');
	var value = $('#yzphone');//点击框
	var yzm = $('#mobileyzm');//验证码
	var xinxi= $('#xinxi');
	if(value.html() =='已验证，可点击修改'){
		value.html('验证手机');
		phone.val('');		
	}else if(value.html() =='验证手机'){
		alert('验证码已经发送到您的手机!');
		yzm.css('display','block');
		$.ajax({
			type:'get',
			url:'/signup/sms_create',
			data:{phone:phone.val()},
			success:function (msg){
				console.log(msg);
			}
		});
		value.html('点击提交');
	}
	if(yzm.val()!=''){
		$.ajax({
			type:'get',
			url:'/signup/sms',
			data:{yzm:yzm.val(),phone:phone.val()},
			success:function(msg){
				if(msg!='ok'){
					xinxi.html('验证码输入有误');
				}else{
					alert('ok');
					xinxi.html('便于接受优惠信息等');
					
				}

			}
		})
	}
});

var email=$('input[name=email]');//email
var cang=$('#cang');//提示框
var anniu=$('#email');//按钮
var id=$('input[name=id]').val();//userid
var ztid=$('input[name=ztid').val();//状态id

if(ztid=='1'){
	cang.css('display','none');
	anniu.css('display','none');
}else{
	$('#email').click(function(){
	$.ajax({
			type:'get',
			url:'/signup/send/'+id,
			data:{},
			success:function(msg){
				
			}
		})
	cang.html("<span style='color:green;'>已发送邮件到您的邮箱,注意查收</span>");
	})
}


})

</script>				
@stop