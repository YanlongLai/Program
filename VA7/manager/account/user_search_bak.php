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
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
<!--<link rel="stylesheet" type="text/css" href="../css/columnFilter/demo_page.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/themes/smoothness/jquery-ui-1.7.2.custom.css">-->
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/jquery-ui.js"></script>
<!--<script src="../js/jquery.dataTables.columnFilter.js"></script>-->
<!--<script src="../js/jquery.highlight.js"></script>
<script src="../js/dataTables.searchHighlight.min.js"></script>-->
<style>
table.display tbody tr:nth-child(even) td{
    background-color: #F5F5F5 !important;
}

table.display tbody tr:nth-child(odd) td {
    background-color: white !important;
}  
<?php
/*
.form-control {
  font-size: 12px;
}

table.dataTable tfoot th, table.dataTable tfoot td {
  padding: 5px 5px 1px 1px;
}
 */
?>
</style>
  <body>

    <div id="wrapper">

      <!-- Sidebar -->
        <?php
          echo renderMenu("user-search");
        ?>  

      <div id="page-wrapper">
	  	<div class="row">
          <div id='display-alerts' class="col-lg-12">
          
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <h1>用戶搜尋區 <small>用戶資訊</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-search"></i> 搜尋</li>
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
                <h3 class="panel-title"><i class="fa fa-search"></i> 搜尋功能</h3>
              </div>
              <div class="panel-body">
              <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>姓名</th>
            <th>地址</th>
            <th>電子信箱</th>
            <th>電話</th>
            <th>會員等級</th>
            <th>備註</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th>姓名</th>
            <th>地址</th>
            <th>電子信箱</th>
            <th>電話</th>
            <th>會員等級</th>
            <th>備註</th>
        </tr>
    </tfoot>
</table>
              <!--  <div class="list-group">
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
                </div>
                <div class="text-right">
                  <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                </div>-->
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

	<script>
        $(document).ready(function() {       
          //alertWidget('display-alerts');

          $('#example').dataTable( {
            "ajax": '../ajax/data/arrays2.txt',
              "language": {
                  "lengthMenu": "顯示 _MENU_ 紀錄在每一頁",
                  "zeroRecords": "沒找到任何記錄 - 對不起",
                  "info": "顯示頁面 ( _PAGE_ / _PAGES_ )",
                  "infoEmpty": "沒有記錄可以顯示",
                  "infoFiltered": "(從 _MAX_ 筆紀錄中選出)",
                  "sSearch":"搜尋：",
                  "oPaginate": {
                    "sFirst":     "第一頁",
                    "sPrevious":  "前一頁",
                    "sNext":      "下一頁",
                    "sLast":      "最後一頁"
                  }
            }
          } );
            //.columnFilter();
		});
	</script>
  </body>
</html>


