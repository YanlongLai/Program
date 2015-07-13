<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>



    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		
	<!--10 topbar  -->
	<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">粉圓管理</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="about.php">關於</a></li>
            <li class="active"><a href="members.php">粉圓資料</a></li>
            <li><a href="records.php">消費記錄</a></li>
            <li><a href="activities.php">活動記錄</a></li>
            <li><a href="patterns.php">粉圓特性</a></li>
            <li><a href="levels.php">粉圓等級</a></li>
		<!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
		-->
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

	<!--20 about  -->
	<div class="container" style="margin-top:70px">

      <!-- Main component for a primary marketing message or call to action -->
  <h2>新增粉圓 <p class="lead">Add to your circle</p></h2>
  <form role="form" class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-1" for="inputEmail1">頭像</label>
      <div class="col-sm-5"><img src="http://placehold.it/90X90/CC2222/FFF" class="img-circle"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-1" for="inputEmail1">Email</label>
      <div class="col-sm-5"><input type="email" class="form-control" id="inputEmail1" placeholder="Email"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-1" for="inputPassword1">密碼</label>
      <div class="col-sm-5"><input type="password" class="form-control" id="inputPassword1" placeholder="Password"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-12" for="TextArea">備註</label>
      <div class="col-sm-6"><textarea class="form-control" id="TextArea"></textarea></div>
    </div>
    <div class="form-group">
      <div class="col-sm-3"><label>姓</label><input type="text" class="form-control" placeholder="First"></div>
      <div class="col-sm-3"><label>名</label><input type="text" class="form-control" placeholder="Last"></div>
    </div>
    <div class="form-group">
      <label class="col-sm-12">電話號碼</label>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="886"><div class="help">國際碼</div></div>
      <div class="col-sm-1"><input type="text" class="form-control" placeholder="03"><div class="help">區域</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="7777777"><div class="help">號碼</div></div>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="168"><div class="help">轉</div></div>
    </div>
    <div class="form-group">
      <label class="col-sm-1">選項</label>
      <div class="col-sm-2"><input type="text" class="form-control" placeholder="Option 1"></div>
      <div class="col-sm-3"><input type="text" class="form-control" placeholder="Option 2"></div>
    </div>
    <div class="form-group">
      <div class="col-sm-6">
        <button type="submit" class="btn btn-info pull-right">送出</button>
      </div>
    </div>
  </form>
  <hr>
    </div>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
