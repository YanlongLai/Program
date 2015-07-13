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
	<style>
	/*
A custom Bootstrap 3.1 template
from http://bootply.com

This CSS code should follow the 'bootstrap.css'
in your HTML file.

license: MIT
author: bootply.com
*/
.colorgraph {
  height: 5px;
  border-top: 0;
  background: #c4e17f;
  border-radius: 5px;
  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
}

    </style>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->


  <div class="panel panel-info">
  <div class="panel-heading">FansRolling 會員註冊</div>
  <div class="panel-body">
<div class="container">

<div class="row">
  
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form role="form">
      <h2>註冊表單 <small>您的資訊將會安全無虞</small></h2>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="姓" tabindex="1">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="名" tabindex="2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="顯示名稱" tabindex="3">
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="電子信箱" tabindex="4">
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="密碼" tabindex="5">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="再次確認您的密碼" tabindex="6">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4 col-sm-3 col-md-3">
          <span class="button-checkbox">
            <button type="button" class="btn" data-color="info" tabindex="7"> 我同意</button>
                        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
          </span>
        </div>
        <div class="col-xs-8 col-sm-9 col-md-9">
           當您點擊 <strong class="label label-primary">註冊</strong> 以後，表示您同意我們網站的<u><a href="#" data-toggle="modal" data-target="#t_and_c_m">條款與細項</a></u>。
        </div>
      </div>
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="註冊" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
      </div>
    </form>
  </div>
</div>
    </div></div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">條款與細項</h4>
      </div>
      <div class="modal-body">
      <h4>網站所有權及使用條款協議</h4>
        <p>FansRolling 基於其獨立判斷，保留在任何時候變更、修改、增加或刪除使用條款內容之權利。您有責任定期檢閱使用條款的變動。隨著張貼於本網站上的變動資訊，您對本網站的持續使用，視為您同意接受該變動。只要您遵循該使用條款，FansRolling 將授予您一個人化、無專屬性、不可轉讓、有限的權限進入並使用本網站。</p>
      <h4>內容</h4>
        <p>所有於本網站之文字、圖表、使用者界面、可視界面、圖片、商標、標記、聲音、音樂、美術作品及電腦編碼 (合稱為 "本網站內容")，包括但不限於包含在公司所有，或其控管、授權之網站所出現對內容之設計、結構、選擇、協調、表達、 "look and feel" 及安排等，均屬 FansRolling 所有、控制或取得授權；並且受商業形象、著作權法、專利法、商標法以及各類智慧財產權及公平交易法之保護。</p>
      <h4>帳戶、密碼及安全</h4>
        <p>您負有全責維護您帳戶資訊之保密性，包括您的密碼和任何在您的帳戶下發生之所有活動。您同意於帳戶或密碼未經授權被使用或安全性有任何破壞時，應立刻通知 FansRolling。然而，您可能須對他人使用您的帳戶密碼，導致 FansRolling 或其他使用者或訪客所受之損害負責。</p>
      <h4>隱私性</h4>
        <p>...</p>
      <h4>聲明</h4>
        <p>...</p>
      <h4>賠償</h4>
        <p>...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">我同意</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



            <div id="push"></div>
        </div>


            <div id="push"></div>
        



        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <!-- Add JS code-->
        <script>
$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
            }
        }
        init();
    });
});
  
        </script>
    </body>
