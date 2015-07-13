<?php
  echo "----Json get from MemberSearchHead.txt----".date("D M j G:i:s T Y");
?>
<script src="../js/jquery-1.10.2.min.js"></script>
<script>
/*
$.ajax({
  dataType: "json",
    url: "../ajax/data/member/MemberFormat.txt",
    data: data,
    success: success
});
 */


//var url="../ajax/data/member/MemberFormat2.txt";
var url="http://10.6.6.45:9997/MemberFormat.aspx?circle_id=1";
$.getJSON( url, function( data ) {
  
  //result = JSON.stringify(data);
  //console.log(result);

  var arr = $.map(data, function(el) { return el; });
  console.log(arr);

    var items = [];
      $.each( data, function( key, val ) {
        if(typeof(val.data)=="object" && val.data != ""){
          var objData=val.data;
          var lenData=objData.length;
          var contentData="";
          for (var i = 0; i < lenData; i++) {
              contentData+="["+i+"] desc:"+objData[i].desc+", value:"+objData[i].value+" ";
          }
          items.push( "<li id='" + key + "'>column="+ val.column +", desc=" + val.desc +", type="+ val.type +", data="+ contentData + "</li>" );
        }
        else
          items.push( "<li id='" + key + "'>column="+ val.column +", desc=" + val.desc +", type="+ val.type +"</li>" );
        //console.log("<li id='" + key + "'>column="+ val.column +", desc=" + val.desc +", type="+ val.type +", data="+ val.data +"</li>");
        /*
        if(typeof(val.data)=="object" && val.data != ""){
          var objData=val.data;
          var lenData=objData.length;
          console.log("Obj--start");
          console.log("number----"+lenData);

          for (var i = 0; i < lenData; i++) {
              console.log("data desc="+objData[i].desc+", data value="+objData[i].value);
          }

        }*/

      });
     
  $( "<ul/>", {
      "class": "my-new-list",
          html: items.join( "" )
  }).appendTo( "body" );
})
  .done(function() {
    console.log( url+" load success" );
  });
</script>

