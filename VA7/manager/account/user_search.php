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
  	echo renderAccountPageHeader(array("#SITE_ROOT#" => SITE_ROOT, "#SITE_TITLE#" => SITE_TITLE, "#PAGE_TITLE#" => "會員搜尋區"));
  ?>
<link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="../css/dataTables.tableTools.css">
<!--<link rel="stylesheet" type="text/css" href="../css/columnFilter/demo_page.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="../css/columnFilter/themes/smoothness/jquery-ui-1.7.2.custom.css">-->
<script src="../js/jquery-1.11.1.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.tableTools.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<!--<script src="../js/jquery.dataTables.columnFilter.js"></script>-->
<!--<script src="../js/jquery.highlight.js"></script>
<script src="../js/dataTables.searchHighlight.min.js"></script>-->
<style>
td.details-control {
    background: url('../images/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../images/details_close.png') no-repeat center center;
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
            <h1>會員搜尋區 <small>會員資訊</small></h1>
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
<div class="form-ajax"></div>
<!--
<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>系統代碼</th>
            <th>活動圈代碼</th>
            <th>姓名</th>
            <th>性別</th>
            <th>地址</th>
            <th>電子信箱</th>
            <th>電話</th>
        </tr>
    </thead>
 
    <tfoot>
        <tr>
            <th></th>
            <th>系統代碼</th>
            <th>活動圈代碼</th>
            <th>姓名</th>
            <th>性別</th>
            <th>地址</th>
            <th>電子信箱</th>
            <th>電話</th>
        </tr>
    </tfoot>
</table>-->
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

<!--modal start-->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>-->


<!--modal start-->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
<div id="myModal" class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="padding-left:10px;padding-right:10px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="gridSystemModalLabel"><img src="../../manager/images/CircleStar/CircleStar.png" style="height:24px;padding-right:53px;" class="img-responsive" center-block=""></h4>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row" id="modalContent">
      <div class="form-group">
        <input type="text" name="2" id="2" class="form-control input-lg" placeholder="入會日期" tabindex="5">
      </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id=member_modify type="button" class="btn btn-primary" data-dismiss="modal">修改</button>
          <button id=member_delete type="button" class="btn btn-danger" data-dismiss="modal">刪除</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<script>
String.prototype.insert = function (index, string) {
      if (index > 0)
              return this.substring(0, index) + string + this.substring(index, this.length);
        else
                return string + this;
};
/* Formatting function for row details - modify as you need */
/*
function format ( d ) {
  // `d` is the original data object for the row
  return '<table class="table table-responsive table-hover table-bordered" cellpadding="5" cellspacing="0" style="padding-left:50px;">'+
    '<tr>'+
    '<td>D1:</td>'+
    '<td>'+d.D1+'</td>'+
    '<td>D2:</td>'+
    '<td>'+d.D2+'</td>'+
    '<td>D3:</td>'+
    '<td>'+d.D3+'</td>'+
    '<td>D7:</td>'+
    '<td>'+d.D7+'</td>'+
    '<td>D8:</td>'+
    '<td>'+d.D8+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td>D9:</td>'+
    '<td>'+d.D9+'</td>'+
    '<td>D10:</td>'+
    '<td>'+d.D10+'</td>'+
    '<td>D11:</td>'+
    '<td>'+d.D11+'</td>'+
    '<td>D12:</td>'+
    '<td>'+d.D12+'</td>'+
    '<td>D17:</td>'+
    '<td>'+d.D17+'</td>'+
    '</tr>'+
    '<tr>'+
    '<td colspan="10">'+
    '<button id="edit'+d.member_id+'" type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-edit"></i>修改</button> '+
    '<button id="delete'+d.member_id+'" type="submit" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i>刪除</button>'+
    '</td>'+
    '</tr>'+
    '</table>';
}
 */
$(document).ready(function() {       
    //alertWidget('display-alerts');
          /*
              window.operateEvents = {
            'click .edit': function (e, value, row, index) {
              alert('You click edit icon, row: ' + JSON.stringify(row));
              console.log(value, row, index);
            },
          };
           */
    /*
    $.getJSON( url, function( data ) {
        var arr = $.map(data, function(el) { return el; });

    }
     */

    //var url = "http://10.6.6.45:9997/MemberSearchHead.aspx?circle_id=1";
    var url = "http://10.6.6.45:9997/MemberSearchHead.aspx?circle_id=1&format_type=1";
    //var headFormat2url = "http://10.6.6.45:9997/MembersearchHeadformat2.aspx?circle_id=1";
    var headFormat2url = "http://10.6.6.45:9997/MemberSearchHead.aspx?circle_id=1&format_type=2";
    var JsonHeadData ;
    //var tableColStr = '{"className":\'details-control\',"orderable":false, "data":null, "defaultContent": \'\'},';
    var headData;
    var tableSave;
    
          $('#member_modify').on('click',function(){
                  //$(".form-group .form-control").each(function() {
                  //$("#form-required").each(function() {
              //$(this).val("");
              tableSave.ajax.reload();
              alert("修改");
                  });
          $('#member_delete').on('click',function(){
                  //$(".form-group .form-control").each(function() {
                  //$("#form-required").each(function() {
                      //$(this).val("");
              tableSave.ajax.reload();
              alert("刪除");
                  });
    $.ajaxSetup({
        async: false
    });
    $.getJSON( headFormat2url, function( data ) {
        //JsonHeadData = JSON.stringify(data, null); 
        JsonHeadData = data; 
        //JsonHeadData = JsonHeadData.insert(1,tableColStr);
        //console.log(JsonHeadData);
    });
    $.getJSON( url, function( data ) {
       var items = [];
        //console.log(data[0].label);
        headData = data;
  $.each( data, function( key, val ) {
      if(typeof(val.data)=="object" && val.data != ""){
          var objData=val.data;
          var lenData=objData.length;
          var contentData="";
      }
      if(key==0)
          items.push('<table id="example2" class="display" cellspacing="0" width="100%"><thead><tr>');
      if(val.show == 1)
          items.push('<th>'+val.label+'</th>');
        });
       
  $.each( data, function( key, val ) {
      if(typeof(val.data)=="object" && val.data != ""){
          var objData=val.data;
          var lenData=objData.length;
          var contentData="";
    }
      if(key==0)
          items.push('</tr></thead><tfoot><tr>');
      if(val.show == 1)
          items.push('<th>'+val.label+'</th>');
      if(key==lenData-1)
      items.push('</tr></tfoot></table>');
        });
  $( "<div/>", {
      "class": "form-content",
          html: items.join( "" )
  }).appendTo( ".form-ajax" );
})
  .done(function() {
    //console.log( url+" load success" );
    //table2
    var table2 = $('#example2').DataTable( {
        //"ajax": '../ajax/data/member/MemberSearchDataArray2.txt',
        dom: 'T<"clear">lfrtip',
        "ajax": 'http://10.6.6.45:9997/MemberSearchData.aspx?circle_id=1',
            "processing":true,
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
            },
                "columns": JsonHeadData,
                "order": [[1, 'asc']]
    } );
    tableSave = table2;
    //附加功能2
    $('#example2 tbody').on('click', 'tr', function () {
        //var name = $('td', this).eq(0).text();
        var name = "";
        var length = $('td', this).length;
        var items = [];
        var contentData = "";
        for (var i = 0; i < length; i++) {
            name = $('td', this).eq(i).text();
            items.push('<div class="form-group"><input type="text" name="'+i+'" id="'+i+'" class="form-control input-lg" placeholder="'+headData[i].label+'" tabindex="'+i+'" value="'+name+'"></div>');
        }
        //alert( 'You clicked on '+name+'\'s row' );
        $("#modalContent").empty();
  $( "<div/>", {
      "class": "form-content",
          html: items.join( "" )
  }).appendTo( "#modalContent" );

        //$("#modalContent").html(length);
        $("#myModal").modal('toggle');
    } );
    
    //附加功能
    /*
    $('#example2 tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            $( document ).on( "click", function( event ) {
                var d=new Date();
                $( event.target ).closest( "#edit"+row.data().member_id ).html(function() {
                    console.log('%c Edit member_id['+row.data().member_id+']: '+d, 'background:#5cb85c; color: #fff');
                    console.log(row.data());
                });
                $( event.target ).closest( "#delete"+row.data().member_id ).html(function() {
                    console.log('%c Delete member_id['+row.data().member_id+']: '+d, 'background:#d9534f; color: #fff');
                    console.log(row.data());
                });
            });
        }
    } );
     */
    });


/*
    var table = $('#example').DataTable( {
        //"ajax": '../ajax/data/member/MemberSearchDataArray2.txt',
        "ajax": 'http://10.6.6.45:9997/MemberSearchData.aspx?circle_id=1',
            "processing":true,
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
            },
                "columns": [
{
    "className":      'details-control',
        "orderable":      false,
        "data":           null,
        "defaultContent": ''
},
{ "data": "member_id" },
{ "data": "circle_id" },
{ "data": "member_name" },
{ "data": "member_sex" },
{ "data": "member_address" },
{ "data": "member_email" },
{ "data": "member_phone" }
],
"order": [[1, 'asc']]
} );

 */

    //.columnFilter();

    // Add event listener for opening and closing details
    /*
    $('#example tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
            $( document ).on( "click", function( event ) {
                var d=new Date();
                $( event.target ).closest( "#edit"+row.data().member_id ).html(function() {
                    console.log('%c Edit member_id['+row.data().member_id+']: '+d, 'background:#5cb85c; color: #fff');
                    console.log(row.data());
                });
                $( event.target ).closest( "#delete"+row.data().member_id ).html(function() {
                    console.log('%c Delete member_id['+row.data().member_id+']: '+d, 'background:#d9534f; color: #fff');
                    console.log(row.data());
                });
            });
        }
    } );
     */

});
	</script>
  </body>
</html>


