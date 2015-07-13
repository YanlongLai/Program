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
            <li><a href="members.php">粉圓資料</a></li>
            <li class="active"><a href="records.php">消費記錄</a></li>
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
	<div class="table-responsive">
  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
    <thead>
      <tr>
        <th style="width:5%">
          <input class="no-margin" type="checkbox">
        </th>
        <th style="width:30%">姓名</th>
        <th style="width:20%" class="hidden-phone">消費記錄</th>
        <th style="width:10%" class="hidden-phone">狀態</th>
        <th style="width:15%" class="hidden-phone">日期</th>
        <th style="width:10%" class="hidden-phone">動作</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <input class="no-margin" type="checkbox">
        </td>
        <td>
          <span class="name">Donald Oswany</span>
        </td>
        <td class="hidden-phone">Agile #555</td>
        <td class="hidden-phone">
          <span class="label label label-info">New</span>
        </td>
        <td class="hidden-phone">15 - 10 - 2013</td>
        <td class="hidden-phone">
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
              Action 
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="#">Edit</a>
              </li>
              <li>
                <a href="#">Delete</a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <input class="no-margin" type="checkbox">
        </td>
        <td>
          <span class="name">Michel Clark</span>
        </td>
        <td class="hidden-phone">Wilson #343</td>
        <td class="hidden-phone">
          <span class="label label label-success">New</span>
        </td>
        <td class="hidden-phone">10 - 10 - 2013</td>
        <td class="hidden-phone">
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
              Action 
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="#">Edit</a>
              </li>
              <li>
                <a href="#">Delete</a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <input class="no-margin" type="checkbox">
        </td>
        <td>
          <span class="name">Rahul David</span>
        </td>
        <td class="hidden-phone">Mako #643</td>
        <td class="hidden-phone">
          <span class="label label label-danger">New</span>
        </td>
        <td class="hidden-phone">14 - 10 - 2014</td>
        <td class="hidden-phone">
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
              Action 
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="#">Edit</a>
              </li>
              <li>
                <a href="#">Delete</a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <input class="no-margin" type="checkbox">
        </td>
        <td>
          <span class="name">Anthony Michell</span>
        </td>
        <td class="hidden-phone">Mako #5432</td>
        <td class="hidden-phone">
          <span class="label label label-info">New</span>
        </td>
        <td class="hidden-phone">19 - 11 - 2014</td>
        <td class="hidden-phone">
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
              Action 
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="#">Edit</a>
              </li>
              <li>
                <a href="#">Delete</a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <input class="no-margin" type="checkbox">
        </td>
        <td>
          <span class="name">Mark Phillips</span>
        </td>
        <td class="hidden-phone">Phill #999</td>
        <td class="hidden-phone">
          <span class="label label label-success">New</span>
        </td>
        <td class="hidden-phone">12 - 11 - 2015</td>
        <td class="hidden-phone">
          <div class="btn-group">
            <button data-toggle="dropdown" class="btn btn-xs dropdown-toggle" data-original-title="" title="">
              Action 
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <li>
                <a href="#">Edit</a>
              </li>
              <li>
                <a href="#">Delete</a>
              </li>
            </ul>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

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
