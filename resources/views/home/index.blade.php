@extends('layouts.my_center')

@section('style')
<link rel="stylesheet" type="text/css" href="/css/zhongxin.css">
@stop
@section('right')
	<section class="right">
		<h4 class="gec-bread-title">编辑个人信息</h4>
		<div class="top_a">
			<span class="tupian_tit">当前头像：</span>
		    <div class="tou_img">
		    	<img src="./file/img/geren/user-img.png" alt="" width="100%" height="100%" />
		    	<input type="file" class="heard_img" onchange="touxiang(this)" />
		    	<img src="" id='portrait' style="display: none;" width="90" height="90">
		    </div>
		    <div class="gp-tip">（图片类型：jpg、gif；大小不能超过100KB）
		    </div>
		    <a class="user-destroy" href="#">账户注销</a>
		</div>
		<div class="content">
			<ul>
				<li class="clear">
					<span class="labels">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</span>
					<div class="item-box">
						<p>asdsasda</p>
					</div>
				</li>
				<li class="clear">
					<span class="labels">真实姓名 ：</span>
					<div class="item-box"><input type="text" class="btn btn-default" /></div>
				</li>
				<li class="clear">
					<span class="labels">您的生日：</span>
					<div class="item-box"><input type="text" class="btn btn-default" /></div>
				</li>
			</ul>
		</div>
		<div class="content there">
			<ul>
				<li class="nnn">
					<label class="label_tit"><em>*</em><span>您的手机</span></label>
					<div class="label_box">	
                        <input id="mobileInput" class="btn btn-default an" type="text" maxlength="11" autocomplete="off" value="182****9396" readonly="true">
                      	<a class="labox-btn label-yz-btn" href="" onclick="preVerifyMobile(this);" data-tpa="3044" data-trackersend="1">已验证，可点击修改</a>
                        <div class="babox-normal-tip">便于接受优惠信息等</div>
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
                        <input id="mobileInput" class="btn btn-default an" type="text" maxlength="11" autocomplete="off" value="" readonly="true">
                      	<a class="labox-btn label-yz-btn" href="" onclick="preVerifyMobile(this);" data-tpa="3044" data-trackersend="1">验证邮箱</a>
                        <div class="babox-normal-tip">便于密码找回、接受优惠信息等</div>
                        <div class="clearfix"></div>
                        <div class="la-check">
                            <input type="checkbox" class="check-input" id="mobileAcceptMsg" >
                            <label for="mobileAcceptMsg">接受优惠信息的发送</label>
                        </div>
					</div>
				</li>
			</ul>
		</div>
		<div class="clear">
			<button class="form-sumbit-btn">保存</button>
		</div>
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
</script>				
@stop