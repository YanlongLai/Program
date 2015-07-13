<?php
/*

UserFrosting Version: 0.2.2
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

require_once("../models/config.php");

// Request method: GET
$ajax = checkRequestMode("get");

if (!securePage(__FILE__)){
    apiReturnError($ajax);
}

setReferralPage(getAbsoluteDocumentPath(__FILE__));

?>

<!DOCTYPE html>
<html lang="en">
  <?php
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "Dashboard"));
  ?>
  <head>
<style>
.btn-group .active 
{ background-color: #428bca ; color: white; }
.btn-lg 
{ padding: 10px 50px;}
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
.page-header {
  margin-top: 0px;
}
h3 small {
  color: #f0776c;
}
</style>
<script src="../js/validate/jquery.validate.js"></script>
  </head>
  <body>

    <div id="wrapper">

      <!-- Sidebar -->
        <?php
         echo renderMenu("user-add");
        ?>  

      <div id="page-wrapper">
	  	<div class="row">
          <div id='display-alerts' class="col-lg-12">
          
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>會員新增區 <small></small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> 您可以新增您活動圈的會員於此區，方便您未來的活動發起與資訊統計！</li>
            </ol>
            <!--<div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to UserFrosting!  The back end account management system is derived from <a class="alert-link" href="http://usercake.com">UserCake 2.0.2</a>, while the dashboard and admin account features are based on the SB Admin Template by <a class="alert-link" href="http://startbootstrap.com">Start Bootstrap</a>. Other key frameworks and plugins used in this system are:
              <br><a class="alert-link" href='http://http://jquery.com/'>jQuery 1.10.2</a>
              <br><a class="alert-link" href='http://getbootstrap.com/'>Twitter Bootstrap 3.0</a>
              <br><a class="alert-link" href='http://fontawesome.io/'>Font Awesome</a>
              <br><a class="alert-link" href='http://tablesorter.com/docs/'>Tablesorter 2.0</a>
              <br>The <a class="alert-link" href='http://www.bootstrap-switch.org/'>Bootstrap Switch</a> component by Mattia Larentis,Peter Stein, and Emanuele Marchi
              <br>All components are copyright of their respective creators.
            </div>-->
          </div>
        </div><!-- /.row -->


        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-user"></i> 活動圈的用戶基本資料</h3>
              </div>
              <div class="panel-body">
      <form class="cmxform" id="commentForm" method="get" action="">
<!--
    <div class="form-group">
        <label class="control-label" for="firstname">Nome:</label>
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input class="form-control" placeholder="Insira o seu nome próprio" name="firstname" type="text" />
        </div>
    </div>
        
    <div class="form-group">
        <label class="control-label" for="lastname">Apelido:</label>
        <div class="input-group">
            <span class="input-group-addon">€</span>
            <input class="form-control" placeholder="Insira o seu apelido" name="lastname" type="text" />
        </div>
    </div>
-->
      <div class="page-header">
      <h3><i class="fa fa-asterisk"></i> 必填資料 <small>請務必填寫完整！</small></h3>
      </div>
      <div class="form-group">
      <div class="btn-group" data-toggle="buttons">
            <label label-default="" class="btn btn-default active btn-lg">
                <input type="radio" name="member_sex" value="1">男</label>
            <label label-default="" class="btn btn-default btn-lg">
                <input type="radio" name="member_sex" value="0">女</label>
        </div>
      </div>
      <div class="form-group">
        <input type="text" name="member_id" id="member_id" class="form-control input-lg" placeholder="系統代碼" tabindex="1" required>
      </div>
      <div class="form-group">
        <input type="text" name="circle_id" id="circle_id" class="form-control input-lg" placeholder="活動圈代碼" tabindex="1" required>
      </div>
      <div class="form-group">
        <input type="text" name="member_name" id="member_name" class="form-control input-lg" placeholder="姓名" tabindex="3" required>
      </div>
      <div class="form-group">
        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="電子信箱" tabindex="4" required>
      </div>
      <div class="form-group">
        <input type="number" name="number" id="number" class="form-control input-lg" placeholder="電話" tabindex="5"required>
      </div>
      <hr class="colorgraph">
      <div class="page-header">
      <h3><i class="fa fa-info-circle"></i> 參考資料 <small>不用全部填寫完畢！</small></h3>
      </div>
      <div class="form-group">
                <button id="add-form-button" type="submit" class="btn btn-success btn-sm" disabled><i class="fa fa-plus"></i> 增加欄位</button>
      </div>
      <!--
      <div class="row" id="key-value-one">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="key" id="key_name" class="form-control input-lg" placeholder="新增屬性" tabindex="6">
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="value_name" id="value_name" class="form-control input-lg" placeholder="新增屬性值" tabindex="7">
          </div>
        </div>
      </div>
      -->
      <div class="form-group">
        <input type="text" name="1" id="1" class="form-control input-lg" placeholder="家族名稱" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="2" id="2" class="form-control input-lg" placeholder="入會日期" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="3" id="3" class="form-control input-lg" placeholder="電話2" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="7" id="7" class="form-control input-lg" placeholder="電話3" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="8" id="8" class="form-control input-lg" placeholder="等級" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="9" id="9" class="form-control input-lg" placeholder="他牌客廳" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="10" id="10" class="form-control input-lg" placeholder="他牌帳篷" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="11" id="11" class="form-control input-lg" placeholder="他牌車架" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="12" id="12" class="form-control input-lg" placeholder="備註" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="17" id="17" class="form-control input-lg" placeholder="會員代碼" tabindex="5">
      </div>
      <div class="form-group">
        <input type="text" name="18" id="18" class="form-control input-lg" placeholder="店家代號" tabindex="5">
      </div>
        
                <!--<div class="list-group">
                  <a href="#" class="list-group-item">
                    <span class="badge">最新</span>
                    <i class="fa fa-calendar"></i> 行事曆更新
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">4 分鐘前</span>
                    <i class="fa fa-comment"></i> 文章回應
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">23 分鐘前</span>
                    <i class="fa fa-truck"></i> 392 個訂單
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">46 分鐘前</span>
                    <i class="fa fa-money"></i> 發票編號 653 已經付清
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">1 小時前</span>
                    <i class="fa fa-user"></i> 一個新使用者已經加入
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">2 小時前</span>
                    <i class="fa fa-check"></i> 完成工作: "完成乾洗"
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">昨天</span>
                    <i class="fa fa-globe"></i> 已存於網路
                  </a>
                  <a href="#" class="list-group-item">
                    <span class="badge">2 天前</span>
                    <i class="fa fa-check"></i> 完成工作: "修正銷售頁面"
                  </a>
                </div>-->
                <!--<div class="text-right">
                  <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
                <button id=add-submit type="submit" class="btn btn-danger pull-right btn-lg">送出</button>
              </div>
            </div>
          </div>
        </div><!-- /.row -->
        </form>
              <div id=add-list></div>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <script>  
      function getForm(){
          var form= $(".form-group .form-control").map(function() {
               return $(this).val();
          }).get();
          //console.log(form);
          return form;
      }
      $(document).ready(function() {       
          //alertWidget('display-alerts');
          //console.log("<?=$loggedInUser->csrf_token?>");

          $('#add-form-button').on('click',function(){
            var r= $('<input type="button" value="new button"/>');
            var s= $("#key-value-one").html();
            //console.log(s);
            $("#key-value-one").append(s);
                        });
          $('#add-submit').on('click',function(){

            //var u="para1";
            var u=getForm();
            var error=0;
            var s=""
              $(".form-group .form-control").each(function() {
                var contentLength=($(this).val()).length;
              if(contentLength==0)
                error++;
              //console.log(contentLength+" "+error);
            });
            if(error!=0)
            s= $('<div id=user-warning class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;<\/span><\/button>新增失敗，請檢查姓名、地址、電子信箱與電話是否有填寫！<\/div>');
            else{
              s= $('<div id=user-warning class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;<\/span><\/button>'+u+'<\/div>');
              $(".form-group .form-control").each(function() {
                $(this).val("");
              });
            }
            //var s= $('<input type="button" value="new button"/>');
            $( ".alert" ).each(function() {
              $(this).fadeOut();
              });
            $("#add-list").append(s);
            //console.log(s);
                        });
              
          $('form').validate({
            /*
              rules: {
              firstname: {
                minlength: 3,
                  maxlength: 15,
                  required: true
              },
              lastname: {
                minlength: 3,
                  maxlength: 15,
                  required: true
              }
          },
             */
            highlight: function(element) {
              $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
            },
                errorElement: 'span',
                errorClass: 'help-block',
                errorPlacement: function(error, element) {
                  if(element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                  } else {
                    error.insertAfter(element);
                  }
                }

          });

		});
	</script>
  </body>
</html>


