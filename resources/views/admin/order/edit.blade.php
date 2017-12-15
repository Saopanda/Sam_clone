@extends('layouts.admin_index')

@section('title')
    <title>Sam 后台管理--订单详情</title>

@endsection
@section('nr_title')
<div class="pageheader">
  <h2><i class="fa fa-check-square" style="line-height: 48px;padding-left: 1px;"></i> 订单详情<span> Sam 订单详情页</span></h2>
</div>
@stop

@section('nr')
<style>
.ddd{
    background-color: rgba(0, 0, 0, 0.3);
    border: 0;
    color: rgba(255, 255, 255, 0.8);
    font-size: 14px;
    line-height: 20px;
  } 
</style>
  <section class="tile color transparent-black">
  <!-- tile header -->
    <div class="tile-header">
      <!-- 标题 -->
      <h1><strong>订单编号</strong>&nbsp;&nbsp;<h2>{{$order->orderid}}</h2></h1>
      <div class="controls">
          <a href="#" class="refresh"><i class="fa fa-refresh"></i></a>
          <a href="#" class="remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
  <!-- /tile header -->

  <!-- tile body -->
    <div class="tile-body nopadding">
      <table class="table table-bordered table-sortable">
        <thead>
          <tr>          
            <th class="text-center" style="width: 300px;">商品名称</th>
            <th class="text-center">商品单价</th>
            <th class="text-center">购买数量</th>
            <th class="text-center">小计</th>
          </tr>
        </thead>
        <tbody>
          @foreach($goodsinfo as $k=>$v)
          <tr>
            <td class="text-center">{{$v->goodsname}}</td> 
            <td class="text-center">￥{{$v->price}}</td>
            <td class="text-center">{{$v->num}}</td>
            <td class="text-center">￥{{$v->xiaoji}}</td>
          </tr>
          @endforeach
          
          <tr>
            <td colspan="1" class="text-right">电话号码 :</td>
            <td colspan="3">{{$dizhi->phone}}</td>
          </tr>
          <tr>
            <td colspan="1" class="text-right">创建时间 :</td>
            <td colspan="3">{{$order->date}}</td>
          </tr>
          <tr>
            <td colspan="1" class="text-right">收货地址 :</td>
            <td colspan="3">{{$dizhi->pro}}&nbsp;{{$dizhi->city}}&nbsp;{{$dizhi->county}}&nbsp;{{$dizhi->content}}</td>
          </tr>
          <tr>
            <td colspan="1" class="text-right">订单状态 :</td>
            @if( $order->dd_status == '0')
            <td colspan="3">未支付</td>
            @elseif($order->dd_status == '1')
            <td colspan="3">已支付</td>
            @elseif($order->dd_status == '2')
            <td colspan="3">已发货</td>
            @elseif($order->dd_status == '3')
            <td colspan="3">已收货</td>
            @else
            <td colspan="3">待评论</td>
            @endif
          </tr>
          <tr>
            <td colspan="3" class="text-right">总价 :</td>
            <td colspan="1" class="text-center">￥{{$order->sum_price}}</td>
          </tr>
          <form method="post" action="/admin/order">
          <tr>
            <td colspan="1" class="text-right">选择快递 :</td>
            <td colspan="3" class="text-center">
            <div class="col-sm-6">
              <select name="kuaidi" class="form-control parsley-validated ddd">
                <option value="">请选择</option>
                <option value="1">韵达快递</option>
                <option value="2">中通快递</option>
                <option value="3">申通快递</option>
                <option value="4">圆通快递</option>
                <option value="5">天天快递</option>
                <option value="6">邮政快递</option>
                <option value="7">顺丰快递</option>
              </select>
            </div>
            </td>
          </tr>
          
           <tr>
            <td colspan="1" class="text-right">快递单号 :</td>
            <td colspan="3" class="text-center">
              <div class="col-sm-6">
                <input name="kuaidihao" type="text" class="form-control parsley-validated" id="fullname" parsley-trigger="change" parsley-required="true" parsley-minlength="4" parsley-validation-minlength="1">
              </div>
              <input type="hidden" name="id" value="{{$order->id}}">
            </td>
          </tr>
          {{csrf_field()}}
          <tr>

            <td colspan="4" class="text-center"><input type="submit" class='btn btn-warning' value="发货"></td>
          </tr>
        </form>
        </tbody>

      </table>
    </div>
  <!-- /tile body -->
<!-- /tile footer -->
</section>
<div style="height: 80px;"></div>

@endsection
@section('js')
<script>
$('.del').submit(function(){
    if(!confirm('您确定要删除该地址吗?')) return false;
});
</script>
@endsection