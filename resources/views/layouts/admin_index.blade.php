

<!DOCTYPE html>
<html>
  <head>
  @section('title')
    <title>Sam 后台管理</title>
  @show
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />

    <!-- Bootstrap -->
    <link href="/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vendor/animate/animate.min.css">
    <link type="text/css" rel="stylesheet" media="all" href="/js/vendor/mmenu/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="/js/vendor/videobackground/css/jquery.videobackground.css">
    <link rel="stylesheet" href="/css/vendor/bootstrap-checkbox.css">

    <link rel="stylesheet" href="/js/vendor/rickshaw/css/rickshaw.min.css">
    <link rel="stylesheet" href="/js/vendor/morris/css/morris.css">
    <link rel="stylesheet" href="/js/vendor/tabdrop/css/tabdrop.css">
    <link rel="stylesheet" href="/js/vendor/summernote/css/summernote.css">
    <link rel="stylesheet" href="/js/vendor/summernote/css/summernote-bs3.css">
    <link rel="stylesheet" href="/js/vendor/chosen/css/chosen.min.css">
    <link rel="stylesheet" href="/js/vendor/chosen/css/chosen-bootstrap.css">
    <link href="/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/css/minimal.css" rel="stylesheet">
  </head>
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
    .btn-a{
      display: inline-block;
      border: 0;
      background: rgba(255,255,255,0);
      color: #428bca;
    }
    
  </style>
  <body class="bg-1">
    <!-- Preloader -->
    <!-- <div class="mask"><div id="loader"></div></div> -->
    <!--/Preloader -->
    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Make page fluid -->
      <div class="row">
        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
          <!-- Branding -->
          <div class="navbar-header col-md-2">
            <a class="navbar-brand" href="/admin">
              <strong>Sam</strong>商城后台
            </a>
            <div class="sidebar-collapse">
              <a href="#">
                <i class="fa fa-bars"></i>
              </a>
            </div>
          </div>
          <!-- .nav-collapse -->
          <div class="navbar-collapse">
            <!-- Page refresh -->
            <ul class="nav navbar-nav refresh">
              <li class="divided">
                <a href="#" class="page-refresh"><i class="fa fa-refresh"></i></a>
              </li>
            </ul>
            <!-- /Page refresh -->
            <!-- Search -->
            <div class="search" id="main-search">
              <i class="fa fa-search"></i> <input type="text" placeholder="Search...">
            </div>
            <!-- Search end -->
            <!-- Quick Actions -->
            <ul class="nav navbar-nav quick-actions">
              <li class="dropdown divided user" id="current-user">
                <a class="dropdown-toggle options" style="height: 45px" data-toggle="dropdown" href="#">
                  用户名 <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu arrow settings">
                  <li>
                    <a href="/admin/logout"><i class="fa fa-power-off"></i> 退出登陆</a>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- /Quick Actions -->
            <!-- Sidebar -->
            <ul class="nav navbar-nav side-nav" id="sidebar">
              @include('layouts.admin_menu')
            </ul>
            <!-- Sidebar end -->
          </div>
          <!--/.nav-collapse -->
        </div>
        <!-- Fixed navbar end -->
        <!-- Page content -->
        <div id="content" class="col-md-12">
          <!-- page header -->
            @section('nr_title')
              
            @show
            <div style="height: 20px"></div>
            @if(!empty(session('msg')))
            <div class="alert {{session('msg_info')}}">
              <strong>{{session('msg')}}</strong>
            </div>
            @endif
            @section('nr')

            @show
          </div>
          <!-- /page header -->
        </div>
        <!-- Page content end -->
        <div id="mmenu" class="right-panel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#mmenu-users" data-toggle="tab"><i class="fa fa-users"></i></a></li>
            <li class=""><a href="#mmenu-history" data-toggle="tab"><i class="fa fa-clock-o"></i></a></li>
            <li class=""><a href="#mmenu-friends" data-toggle="tab"><i class="fa fa-heart"></i></a></li>
            <li class=""><a href="#mmenu-settings" data-toggle="tab"><i class="fa fa-gear"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- Make page fluid-->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/vendor/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/vendor/mmenu/js/jquery.mmenu.min.js"></script>
    <script type="text/javascript" src="/js/vendor/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="/js/vendor/nicescroll/jquery.nicescroll.min.js"></script>
    <!-- <script type="text/javascript" src="/js/vendor/animate-numbers/jquery.animateNumbers.js"></script> -->
    <!-- <script type="text/javascript" src="/js/vendor/videobackground/jquery.videobackground.js"></script> -->
    <script type="text/javascript" src="/js/vendor/blockui/jquery.blockUI.js"></script>

    <!-- <script src="/js/vendor/flot/jquery.flot.min.js"></script> -->
    <!-- <script src="/js/vendor/flot/jquery.flot.time.min.js"></script> -->
    <!-- <script src="/js/vendor/flot/jquery.flot.selection.min.js"></script> -->
    <!-- <script src="/js/vendor/flot/jquery.flot.animator.min.js"></script> -->
    <!-- <script src="/js/vendor/flot/jquery.flot.orderBars.js"></script> -->
    <!-- <script src="/js/vendor/easypiechart/jquery.easypiechart.min.js"></script> -->

    <!-- <script src="/js/vendor/rickshaw/raphael-min.js"></script>  -->
    <!-- <script src="/js/vendor/rickshaw/d3.v2.js"></script> -->
    <!-- <script src="/js/vendor/rickshaw/rickshaw.min.js"></script> -->

    <!-- <script src="/js/vendor/morris/morris.min.js"></script> -->

    <script src="/js/vendor/tabdrop/bootstrap-tabdrop.min.js"></script>

    <!-- <script src="/js/vendor/summernote/summernote.min.js"></script> -->

    <!-- <script src="/js/vendor/chosen/chosen.jquery.min.js"></script> -->

    <script src="/js/minimal.min.js"></script>
  </body>
<script>
  $(function(){
    var path = location.pathname;

    $('a').each(function() {
      if(path != '/admin'){
        if($(this).attr('href') == path){
          $(this).parent('li').addClass('active').parent().parent('li').addClass('active open')
        }
      }
    });
    //parents('dropdown-in').addClass('active').parents('dropdown').addClass('active open')
  })
</script>
  @section('js')


  @show
</html>
