<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!--引入核心css文件-->
	<link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
	<!--引入jQuery文件-->
	<script src="/bootstrap/js/jquery.js"></script>
	<!--最后引入bootstrap文件-->
	<script src="/bootstrap/js/bootstrap.js"></script>
	<!-- 引入字体 -->
	<link href="/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- 调试 -->
	<link rel="stylesheet" href="/css/css.css">	
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/xiangqing1.css">
	<link rel="stylesheet" href="/css/xiangqing.css">
	<script type="text/javascript" src="/bootstrap/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="/bootstrap/js/xingqing.js"></script>
<!-- 调试 -->
	<link rel="stylesheet" href="/css/login.css">
	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<title>{{$site->xq}}</title>
	<style>
		.smallimgbox-trig img{
			width: 100%;
			height: 100%;
		}
		button.btn{
			height: 42px;
		}
		.form-group{
			line-height: 33px;
		}
		#body .well{    
			width: 270px;
			height: 46px;
		    line-height: 46px;
		    text-align: center;
		    padding: 0 25px;
		    margin: 25px 90px;
		    display: none;
		    font-size: 15px;
		}
		.search{
			margin-top: 16px;
		}
	</style>
</head>
<body id="body">
<!-- 头部 -->
 @include('layouts.header')


<!-- 商品详情 -->
<!-- 面包屑导航开始 -->

	<div class="mianbaox container">
		<ol class="lis">
		  <li><a href="#">首页</a><span class="iconfont">></span></li>
		  <!-- 循环父级 -->
		  @foreach($tb as $k=>$v)
		  <li><a href="/list/{{$v->id}}.html">{{$v->flname}}</a><span class="iconfont">></span></li>
		  @endforeach
		  <li class=""><a href="/{{$rs->id}}.html">{{$rs->title}}</a></li>
		</ol>
	</div>
	<!-- 面包屑导航结束 -->
	<!-- 主体详情(1)开始 -->
	<section class="container">
		<div class="detail-commodity-title" style="width: 636px;">
			<h2 id="cnName" class="title">{{$rs->title}} </h2>
			<p class="subtitle">{!!$rs->content!!}</p>
			<input type="hidden" name="id" value="{{$rs->id}}">
		</div>
		<div class="tu" id="fangdajing">
			<div class="big_img">
				<div class="img_ul">
					<img src="{{$rs->goods_zhong[0]->imgs}}">
				</div>
				<div class="magnifyingBegin"></div>
				<div class="big_imgshow">
					<img id="J_prodImg" src="{{$rs->goods_zhong[0]->imgs}}" alt="">
				</div>
			</div>
			<div class="sm_img">
				<div class="smallimgbox">
					<ul class="smallimgbox-trig">

						@foreach($rs->goods_zhong as $k=>$v)
						<li @if($k == 0)class="active"@endif ><img src="{{$v->imgs}}" data-bigimg="{{$v->imgs}}"  alt=""></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class=" content_ra">
			<div class="content_r">
				<div class="price">
					<span class="pricenum"><sub>¥</sub><del id="mainprice">{{$rs->price}}</del>
					<!-- 降价通知 -->
					<em class="thePrice" id="sam_priceNotice">降价通知</em>
					</span>
				</div>
			</div>
			<div id="favorableRateDom" class="praise" style="">
					<i class="glyphicon glyphicon-thumbs-up"></i>
					<u id="favorableRate">89%</u>的用户给出好评
			</div>
			<div class="address">
				<div class="glyphicon glyphicon-subtitles"></div>
				<div class="addressCon">
					<span class="zhi">送货至</span>
					<span class="zhi yhd_val_text">北京 </span>
					<span class="color" id="stockstatus" style="">有货</span>
					<span id="deliveryMsg" style="">&nbsp;可当日出货，预计次日送达</span>
				</div>
			</div>
			<div class="tags">
			    <i class="glyphicon glyphicon-refresh" style="color: #ccc;"></i>
			    <a href="" style="color: #ccc;">不支持7天无理由退货</a>
		    </div>
		    <div class="gwc">
			    <div class="numbers" id="numAddcart">
					<div id="jian" class="glyphicon glyphicon-minus"></div>
					<div class="num">
						<input type="text" name="nums" id="num" value="1">
					</div>
					<div id="jia" class="glyphicon glyphicon-plus"></div>
				</div>
				<div class="cartbox buy_btn1" id="addCart" style=""  data-trackersend="1">
					<i class="glyphicon glyphicon-shopping-cart"></i>加入购物车
				</div>
				<div class="btns">
					<span class="qingdan" style="border-right: 1px solid #eee;">
						<i class="glyphicon glyphicon-level-up"></i>
						常购清单
					</span>
					<span class="qingdan">
						<i class="glyphicon glyphicon-log-out"></i>
						分享
					</span>
				</div>	
				<div class="clearfix"></div>
				<div class="well" id="cartok"></div>
		    </div>
		</div>
	</section>
	<!-- 主体详情(1)结束 -->

	<!-- 弹出登陆框 -->
<div class="theme-popover">
     <div class="theme-poptit">
          <a href="javascript:;" title="关闭" class="close btn btn-lg btn-info">×</a>
          <h5>请先登陆哦~~</h5>
     </div>
     <div class="theme-popbod dform">
          <div class="form-wrap">
			<h4>已开通山姆网购账户，请登录</h4>
			<br>
			<br>
			<div class="form_box">
				<form action="/login" method="post">
					{{csrf_field()}}
				  <div class="form-group">
				    <input type="text" class="form-control buts" id="exampleInputEmail1" placeholder="用户名" name="name">
				  </div>
				  <div class="form-group">
				    <input type="password" class="form-control buts" id="exampleInputPassword1" placeholder="密码" name="pwd">
				  </div>
				  <div class="form-group cols">
				  	  <a href="#" class="pull-left col">忘记密码</a>
				  	  <a href="#" class="pull-right">注册</a>
				  </div>
				  <div class="clearfix info_kuang" style="color: red">@if(session('msg')){{session('msg')}}
				  	<script>$('.theme-popover-mask').fadeIn(100);
						$('.theme-popover').slideDown(200);</script>@endif</div>
	  			  <button type="submit" class="btn btn-primary col-md-12 input-lg sub" id="tijiao">登录</button>
	            </form>
			</div>
		</div> 
     </div>
</div>
<div class="theme-popover-mask"></div>
<!-- 弹出登录框结束结束 -->

<!-- 商品详情 -->

<!-- 选项卡 -->
<div>
  <!-- Nav tabs -->
  <div class="container xxk">
	  <ul class="xxk-tabs" role="tablist">
	    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">商品介绍</a></li>
	    <div class="line-2"></div>
	    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">规格参数</a></li>
	    <div class="line-2"></div>
	    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">品牌信息</a></li>
	    <div class="line-2"></div>
	    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">商品评论</a></li>
	    <div class="line-2"></div>
	    <li role="presentation"><a href="#zixun" aria-controls="zixun" role="tab" data-toggle="tab">商品咨询</a></li>
	  </ul>
  </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="container tab-pane active" id="home">
    	<div class="tpxq">
			<div class="shop_js">
					@foreach($rs->goods_xq as $k=>$v)
					<img src="{{$v->imgs}}">
					@endforeach
    		</div>
		</div>
	</div>

    <div role="tabpanel" class="container tab-pane" id="profile">
    	<div class="ggcs">
			<div class="h5show">
				<dl>
					<dt>产地</dt>
						<dd><label>进口/国产</label>进口</dd>
						<dd><label>产地</label>澳大利亚</dd>
						<dd><label>地区</label>其它地区</dd>
				</dl> 	               
				<dl>
					<dt>包装</dt>
						<dd><label>包装</label>袋装</dd>
				</dl> 	               
				<dl>
					<dt>基本信息</dt>
						<dd><label>配送方式</label>新鲜直达</dd>
				</dl> 	               
				<dl>
					<dt>规格</dt>
						<dd><label>净重(g)</label>2700</dd>
				</dl> 	               
			</div>
		</div>
    </div>
    <div role="tabpanel" class="container pinpai tab-pane" id="messages">
    	<div class="pinpai-in">
    		<p>暂时没有品牌介绍,敬请期待</p>
    	</div>
    	<a href="">查看品牌其他推荐</a>
    </div>
    <div role="tabpanel" class="container pinpai tab-pane" id="settings">
    	<dl class="pinlun">
		    <!--评论列表 Start-->
		    <dd>
		        <div class="user-pinlun">
		            <div class="detail-pinlun-user clear">
		                <p class="name">107***</p>
		                <div class="star">
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                </div>
		                <div class="place">
	                    来自【<span>深圳</span>】
	                	</div>
		            </div>
		            <div class="detail-pinlun-con">
		                <div class="sign clear">
		                </div>
		                <div class="txt">山姆也开始弄假了吗？网购与实体店的货不一样。首先是包装，实体店是纸盒包装的，网购是篓子样的袋子装的。也许会说是为了方便运输，这不追究。但橙子种类都不一样，颜色，大小，光泽度明显不同，贴标也不同，关键是很酸，水分少，不新鲜，好几个像坏了的，明显是去年的陈货，而实体店买的是当季的，好吃。网购就能欺骗消费者吗？</div>
		                <br>
	                	<div class="time text-muted">2017-11-25 23:10:59</div>
		            </div>
		        </div>
		    </dd>
		    <dd>
		        <div class="user-pinlun">
		            <div class="detail-pinlun-user clear">
		                <p class="name">山**0</p>
		                <div class="star">
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                </div>
		                <div class="place">
		                    来自【<span>北京</span>】
		                </div>
		            </div>
		            <div class="detail-pinlun-con">
		                <div class="sign clear">
		                </div>
		                <div class="txt">一个烂的，反馈给客服，然后让拍照，传了照片还让数一共几个橙子，然后说返七块钱优惠卷，算是解决了问题。</div>
		                <br>
		            	<div class="time">2017-12-03 09:23:49</div>
		            </div>
		        </div>
		    </dd>
		    <dd>
		        <div class="user-pinlun">
		            <div class="detail-pinlun-user clear">
		                <p class="name">471***</p>
		                <div class="star">
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                     <span class="glyphicon glyphicon-star-empty"></span>
		                </div>
		                <div class="place">
		                    来自【<span>深圳</span>】
		                </div>
		            </div>
		            <div class="detail-pinlun-con">
		                <div class="sign clear">
		                </div>
		                <div class="txt">橙子不值得买，配送估计就是挑的存放很久的，至少我的是这样。</div>
		                <br>
		            	<div class="time">2017-12-02 17:16:13</div>
		            </div>
		        </div>
		    </dd>
		    <dd>
		        <div class="user-pinlun">
		            <div class="detail-pinlun-user clear">
		                <p class="name">107***</p>
		                <div class="star">
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                </div>
		                <div class="place">
		                    来自【<span>北京</span>】
		                </div>
		            </div>
		            <div class="detail-pinlun-con">
		                <div class="sign clear">
		                </div>
		                <div class="txt">拿来的很新鲜，满意</div>
		                <br>
		                <div class="time">2017-12-01 19:16:46</div>
		            </div>
		        </div>
		    </dd>
		    <dd>
		        <div class="user-pinlun">
		            <div class="detail-pinlun-user clear">
		                <p class="name">yyf***</p>
		                <div class="star">
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                     <span class="glyphicon glyphicon-star"></span>
		                </div>
		                <div class="place">
		                    来自【<span>深圳</span>】
		                </div>
		            </div>
		            <div class="detail-pinlun-con">
		                <div class="sign clear">
		                </div>
		                <div class="txt">东西很好，师傅给送到家门口，真的很方便！</div>
		                <br>
		            	<div class="time">2017-09-25 19:42:20</div>
		            </div>
		        </div>
		    </dd>
		    <!--评论列表 End-->
		</dl>
		<div class="container fenye">
		  <ul class="pagination center-block">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</div>
    </div>
    <div role="tabpanel" class="container tab-pane" id="zixun">
    	<div class="container zixun clear text-center">
    		<div class="zixun-in container">
    			<div class="empty-img pull-left"></div>
		    	<div class="empty-txt pull-right">&nbsp;暂无咨询</div>
    		</div>
		    
		    <button class="btn-zixun">
		   		我要咨询
		    </button>
		</div>
    </div>
  </div>

</div>







<!-- 尾部 -->
@include('layouts.footer')

</body>
<script>
	$(function () {

		$('.theme-poptit .close').click(function(){
			$('.theme-popover-mask').fadeOut(100);
			$('.theme-popover').slideUp(200);
		})


		$('#jia').click(function(){
			var num='';
			num=$('#num').val();
			var	a=parseInt(num);
			a+=1;
			$('#num').val(a);
		})
		$('#jian').click(function(){

			var num='';
			num=$('#num').val();
			var	a=parseInt(num);
			if (a>1) {
				a-=1;
				$('#num').val(a);
			}
		})

		$('#addCart').click(function() {
			if($('#cartok').css('display') == 'none'){
				var id = $('input[name=id]').val()
				var num = $('input[name=nums]').val()
				$.ajax({
					type:'get',
					url:'/home/cart/create',
					data:{goodsid:id,num:num},
					success:function(mes){
						if(mes == 'ok'){
							$('#cartok').html('<b>已成功加入购物车~!</b>').fadeIn().delay(2000).fadeOut();
						}else{
							$('.theme-popover-mask').fadeIn(100);
							$('.theme-popover').slideDown(200);
						}
					}
				})
			}
		})
		var yhm = $('#exampleInputEmail1');
		var mima = $('#exampleInputPassword1');
		var box =$('.clearfix');
		$('#tijiao').click(function(){
			//alert(123);
			if (yhm.val()=='') {
				yhm.parent('div').addClass('has-error');
				var e_n=box.html('请填写用户名');
				return false;
			}else{
				yhm.parent('div').removeClass('has-error');
				var e_n=box.html('');
			}
			if(mima.val() == ''){
				mima.parent('div').addClass('has-error');
				var e_p=box.html('请填写密码');
				return false;
			}else{
				mima.parent('div').removeClass('has-error');
				var e_p=box.html('');
			}
			if (e_n.html() == '' && e_p.html() == '') {
			}else{
				return false;
			}
		})
	})
</script>
</html>