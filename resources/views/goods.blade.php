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
	<link rel="stylesheet" type="text/css" href="/css/gong.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<link rel="stylesheet" type="text/css" href="/css/xiangqing1.css">
	<link rel="stylesheet" href="/css/xiangqing.css">
	<script type="text/javascript" src="/bootstrap/js/jquery-2.1.1.js"></script>
	<script type="text/javascript" src="/bootstrap/js/xingqing.js"></script>

	
	
<!-- 调试 -->


	<script type="text/javascript" src="/bootstrap/js/holder.min.js"></script>
	<title>sam_index</title>
</head>
<body id="body">
<!-- 头部 -->
 @include('layouts.header')


<!-- 商品详情 -->
<!-- 面包屑导航开始 -->
	<div class="mianbaox container">
		<ol class="lis">
		  <li><a href="#">首页</a><span class="iconfont">></span></li>
		  <li><a href="#">生鲜食品</a><span class="iconfont">></span></li>
		  <li class=""><a href="#">新鲜水果</a><span class="iconfont">></span></li>
		  <li><a href="#">橙子</a><span class="iconfont">></span></li>
		  <li class=""><a href="#">JOYVIO佳沃</a><span class="iconfont">></span></li>
		  <li class=""><a href="#">JOYVIO佳沃 澳洲脐橙2.7kg. Item#:981203</a></li>
		</ol>
	</div>
	<!-- 面包屑导航结束 -->
	<!-- 主体详情(1)开始 -->
	<section class="container">
		<div class="detail-commodity-title" style="width: 636px;">
			<h2 id="cnName" class="title">JOYVIO佳沃 澳洲脐橙2.7kg. Item#:981203 </h2>
			<p class="subtitle">产自澳大利亚 单果重250g以上</p>
		</div>
		<div class="tu" id="fangdajing">
			<div class="big_img">
				<div class="img_ul">
					<img src="/file/img/xiangqing/orange.jpg">
				</div>
				<div class="magnifyingBegin"></div>
				<div class="big_imgshow">
					<img id="J_prodImg" src="/file/img/xiangqing/big_orange.jpg" alt=""/>
				</div>
			</div>
			<div class="sm_img">
				<div class="smallimgbox">
					<ul class="smallimgbox-trig">
						<li class="active"><img src="/file/img/xiangqing/sm_orange.jpg" data-bigimg="./file/img/xiangqing/sm_orange.jpg" alt=""></li>
						<li><img src="/file/img/xiangqing/sm_orange.jpg" data-bigimg="/file/img/xiangqing/sm_orange.jpg" alt=""></li>
						<li><img src="/file/img/xiangqing/sm_orange.jpg" data-bigimg="/file/img/xiangqing/sm_orange.jpg" alt=""></li>
						<li><img src="/file/img/xiangqing/sm_orange.jpg" data-bigimg="/file/img/xiangqing/sm_orange.jpg" alt=""></li>
						<li><img src="/file/img/xiangqing/sm_orange.jpg"  data-bigimg="/file/img/xiangqing/sm_orange.jpg" alt=""></li>
						<li><img src="/file/img/xiangqing/sm_orange.jpg" data-bigimg="/file/img/xiangqing/sm_orange.jpg" alt=""></li>
					</ul>
				</div>
			</div>
		</div>
		<div class=" content_ra">
			<div class="content_r">
				<div class="price">
					<span class="pricenum"><sub>¥</sub><del id="mainprice">63.8</del>
					<!-- 降价通知 -->
					<em class="thePrice" id="sam_priceNotice">降价通知</em>
					</span>
					<span class="weight" id="mainweight">重量：0.01kg </span>
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
					<div id="reduceBtn" class="glyphicon glyphicon-minus"></div>
					<div class="num">
						<input id="buyNum" data-max="999999" data-min="1" data-step="1" type="text" value="1">
					</div>
					<div id="addBtn" class="glyphicon glyphicon-plus"></div>
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
		    </div>
		</div>
	</section>
	<!-- 主体详情(1)结束 -->



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
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEi11dc2cyAarGKAAVP9wnUmXo36800.jpg">
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEi21dc2c6AKcvsAAAn7JcL7ac83700.jpg">
				</div>
				<div class="canshu">
					<table border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td class="canshu-wz">
								品名：澳洲脐橙
								<br>
								规格：单果重>250g
							</td>
							<td>
								原产地：澳大利亚 
								<br> 
								规格：单果重>250g
							</td>
						</tr>				
					</table>
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEbuldc2c-ARP2EAAAmH-klyc033800.jpg">
				</div>
				<div class="liyou">
					<ul>
						<li>产自澳大利亚维多利亚州</li>
						<li>墨累河水(澳洲母亲河)灌溉 地中海气候生长</li>
						<li>选单果重>250g大果 皮薄籽小</li>
						<li>含糖量>12% 畅享新鲜美味</li>
					</ul>
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/CgQIzVdc2dGAHyGZAAAmkLqjRI858700.jpg">
				</div>				
				<div>
					<table border="0" cellpadding="0" cellspacing="0" width="100%">
						<tbody>
							<tr>
								<td align="center" colspan="2">
									<img alt=" " src="/file/img/xiangqing/CgQIz1dc2dKAEILgAAc7CpBMrWM67100.jpg" title=" "></td>
							</tr>
							<tr>
								<td align="left" style=" vertical-align:top;">
									<div style="max-width:460px; padding:10px 0 10px 0;">
									<div style="font-family:'微软雅黑'; font-weight:bold; font-size:18px; color:#666666;">
								优质产地</div>
									<div style="font-family:'微软雅黑'; font-size:14px; color:#666666;">
								澳洲柑橘产区气候属地中海气候类型，阳光充沛，昼夜温差较大，柑橘色泽鲜艳，品质上乘。</div>
									</div>
								</td>
								<td align="left" style=" vertical-align:top;">
									<div style="max-width:460px; padding:10px 0 10px 0;">
									<div style="font-family:'微软雅黑'; font-weight:bold; font-size:18px; color:#666666;">
								甘美甜蜜</div>
									<div style="font-family:'微软雅黑'; font-size:14px; color:#666666;">
								皮薄肉厚，多汁籽小，果肉脆嫩化渣，口感甜中带酸，细嫩柔滑，给你回味无穷的感受。</div>
									</div>
								</td>
							</tr>
							<tr>
								<td align="center" colspan="2">
									<img alt=" " src="/file/img/xiangqing/ChEi1ldc2dWAH8-xAAXu4ZfRfF877700.jpg" title=" ">
								</td>
							</tr>
							<tr>
								<td align="left" style=" vertical-align:top;">
									<div style="max-width:460px; padding:10px 0 10px 0;">
										<div style="font-family:'微软雅黑'; font-weight:bold; font-size:18px; color:#666666;">
										营养丰富</div>
										<div style="font-family:'微软雅黑'; font-size:14px; color:#666666;">
										橙子含有丰富的维生素C、胡萝卜素、柠檬酸等多种微量元素，营养价值高。</div>
									</div>
								</td>
								<td align="left" style=" vertical-align:top;">
									<div style="max-width:460px; padding:10px 0 10px 0;">
										<div style="font-family:'微软雅黑'; font-weight:bold; font-size:18px; color:#666666;">
										送礼佳品</div>
										<div style="font-family:'微软雅黑'; font-size:14px; color:#666666;">
										老少皆宜，天然新鲜，是大众喜爱的健康水果，是馈赠亲友，补充维C的好选择。</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEi3Fl-f3mAVz6kAAZNjJrcDvE93800.jpg">
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEwoFl-f3qAP9rYAATFsiMXPSI57900.jpg">
				</div>
				<div class="shop_Tp">
					<img src="/file/img/xiangqing/ChEi2Fl-f3iAMDnDAAF7JP15ZvQ62400.jpg">
				</div>
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
</html>