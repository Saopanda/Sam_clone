
<!DOCTYPE html>
<html>
  <head>
    <title>山姆后台管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8" />
    <!-- Bootstrap -->
    <link href="/css/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vendor/bootstrap-checkbox.css">
    <link href="/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/minimal.css" rel="stylesheet">
    <style>
      button.btn.btn-default{
          width: 160px;
      }
      body #content.full-page {
        position: fixed;
        width: 100%;
        top: -45px;
      }
    </style>
  </head>
  <body class="bg-1">
        <!-- Page content -->
        <div id="content" class="container full-page login" style="overflow: hidden;">


          <div class="inside-block">
            <img src="/images/manage/logo-big.png" alt class="logo">
            <h1><strong>Sam's CLUB</strong> 后台管理</h1>
            <h5>欢迎登陆</h5>
            
            <form id="form-signin" class="form-signin" action="/admin/login" method="post">
              <section>
                @if(!empty(session('msg')))
                <div class="alert {{session('msg_info')}}">
                  <strong>{{session('msg')}}</strong>
                </div>
                @endif
                <div class="input-group">
                  <input type="text" class="form-control" name="name" placeholder="请输入用户名">
                  <div class="input-group-addon"><i class="fa fa-user"></i></div>
                </div>
                {{csrf_field()}}
                <div class="input-group">
                  <input type="password" class="form-control" name="pwd" placeholder="请输入密码">
                  <div class="input-group-addon"><i class="fa fa-key"></i></div>
                </div>
              </section>
              <section class="log-in">
                <button class="btn btn-default">登陆</button>
              </section>
            </form>
          </div>
        </div>
        <!-- /Page content -->  
  </body>
</html>
      
