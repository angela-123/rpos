<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            th{
                width: 650px;
                text-align: left;
                color:  #000066;
                font-size: 11pt;
                font-weight:  bold;
            }
            
            td{
                font-size: 10pt;
                font-weight: bold;
                color:  #b81900;
            }
        </style>
         <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var loc = $("#loc").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"dtnx.php",
                        data:"date="+date+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#gala").html(data);
                        }
                    });
                });
                
            });
        </script>
        <form id="maya">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <input type="button" value="Preview" id="btn">
        </form>
        <?php
        // put your code here
        ?>
        <div id="gala" title="DAILY TRANSACTIONS ANALYSIS"></div>
        
                                                         		                           <script type="text/javascript">
$("input#loc").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "loca.php",
data : data,
complete : function (xhr, result)
{
if (result != "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
        
        
           <script type="text/javascript">
	$("#gala").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"660",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
        
           <script type="text/javascript">
	$("#maya").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"360",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
    </body>
</html>
