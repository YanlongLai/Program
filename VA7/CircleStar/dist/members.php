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

	<!--30 members -->
<hr class="">
<div class="container target">
    <div class="row">
        <div class="col-sm-10">
             <h1 class="">王老闆</h1>
         
          <!--<button type="button" class="btn btn-success">追蹤</button>  <button type="button" class="btn btn-info">給一顆水球</button>-->
		<button type="button" class="btn btn-success" onclick="window.location.href='memberInfo.php'">粉圓詳細資料</button>    <button type="button" class="btn btn-info" onclick="window.location.href='memberForm.php'">新增粉圓</button>
<br>
        </div>
      <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.rlsandbox.com/img/profile.jpg"></a>

        </div>
    </div>
  <br>
    <div class="row">
        <div class="col-sm-3">
			<h3><i class="glyphicon glyphicon-user"></i> Profile</h3>
			<hr>
            <!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted" contenteditable="false">個人資訊</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">加入時間</strong></span> 2014/02/13</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">最後一次等入時間</strong></span> 昨天18:18</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">真實姓名</strong></span>王小明</li>
              <li class="list-group-item text-right"><span class="pull-left"><strong class="">角色</strong></span>大老闆
               
                      </li>
            </ul>
           <div class="panel panel-default">
             <div class="panel-heading">公司統編

                </div>
                <div class="panel-body"><i style="color:green" class="fa fa-check-square"></i>168888888

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">網站 <i class="fa fa-link fa-1x"></i>

                </div>
                <div class="panel-body"><a href="http://google.com" class="">google.com</a>

                </div>
            </div>
          
            <ul class="list-group">
                <li class="list-group-item text-muted">活動 <i class="fa fa-dashboard fa-1x"></i>

                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">分享</strong></span> 125</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong class="">喜歡</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong class="">發佈</strong></span> 37</li>
                        <li class="list-group-item text-right"><span class="pull-left"><strong class="">粉圓數</strong></span> 78</li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading">簡介</div>
                <div class="panel-body">我是一名偵探，專門服務迷失的客人！<i class="fa fa-facebook fa-2x"></i>  <i class="fa fa-github fa-2x"></i> 
                    <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i>  <i class="fa fa-google-plus fa-2x"></i>

                </div>
            </div>
        </div>
        <!--/col-3-->
        <div class="col-sm-9" contenteditable="false" style="">
			<h3><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>
			<hr>
           <div class="panel panel-default">
                <div class="panel-heading">粉圓資訊統計</div>
                <div class="panel-body pull-center">	
                   	
                    <img src="http://placehold.it/90X90/CC2222/FFF" class="img-circle">
                    
                    <img src="http://placehold.it/90X90/11CC22/FFF" class="img-circle">
                    
                    <img src="http://placehold.it/90X90/EEEEEE/222" class="img-circle">
                    
                  </div>

                <div class="panel-body pull-center">
					<small>粉圓人數</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        <span class="sr-only">72% Complete</span>
                      </div>
                    </div>
                    <small>有效粉圓人數</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                    <small>封鎖/解除粉圓數</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>

                  </div>
				</div>
			<h3><i class="glyphicon glyphicon-comment"></i> Discussions</h3>
			<hr>	
            <div class="panel panel-default target">
                <div class="panel-heading" contenteditable="false">近期公告與活動</div>
                <div class="panel-body">
                  <div class="row">
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/people">
						<div class="caption">
							<h3>
								尋找人們
							</h3>
							<p>
								活動時間:12.13.2014-12.14.2014
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/city">
						<div class="caption">
							<h3>
								我的城市
							</h3>
							<p>
								活動時間:6.13.2014-6.14.2014
							</p>
							<p>
							
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="thumbnail">
						<img alt="300x200" src="http://lorempixel.com/600/200/sports">
						<div class="caption">
							<h3>
								運動日
							</h3>
							<p>
								活動時間:1.13.2014-1.14.2014
							</p>
							<p>
							
							</p>
						</div>
                </div>
                 
            </div>
                     
            </div>
                 
        </div>
              
    </div>
</div>


            <div id="push"></div>
        </div>
		<!--
        <footer id="footer">
            <div class="row-fluid">
                <div class="span3">
                    <span class="pull-right">©Copyright 2015</span>
                </div>
            </div>
        </footer>
        -->
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-40413119-1', 'bootply.com');
          ga('send', 'pageview');
        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/vendor/bootstrap-pager.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/bootstrap-select.min.js"></script>
        <script src="js/vendor/jquery.codemirror.js"></script>
        <script src="js/vendor/beautifier.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');

			/* pagination */
$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            numbersPerPage: 1,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pagination');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
  
    if (settings.numbersPerPage>1) {
       $('.page_link').hide();
       $('.page_link').slice(pager.data("curr"), settings.numbersPerPage).show();
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
       
        if (settings.numbersPerPage>1) {
       		$('.page_link').hide();
       		$('.page_link').slice(page, settings.numbersPerPage+page).show();
    	}
      
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");  
    }
};

$('#items').pageMe({pagerSelector:'#myPager',childSelector:'tr',showPrevNext:true,hidePageNumbers:false,perPage:5});
/****/


        </script>
    </body>
</html>
