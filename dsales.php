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
            input[type = "button"]{
                width: 120px;
                height: 65px;
                border: 0px #006FCC solid;
            }
            
            
            td{
                font-size: 10pt;
                color:  #0074cc;
                border: 1px #eee solid;
            }
            
            li{
                font-size: 10pt;
            }
            
            
            
            th{
                font-size: 11pt;
                font-weight:  bold;
                text-align: left;
                width: 590px;
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
                        url:"jimo.php",
                        data:"date="+date+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#jaga").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Noppe');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <form id="nash">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <input type="button" name="btn" id="btn" value="Preview">
        </form>
        
        <div id="jaga"></div>
        <?php
        
        ?>
        
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
if (result !== "success") return;
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
	$("#jaga").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
       <script type="text/javascript">
	$("#nash").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"left top"
			    
			    	
			}
			
			);
	</script> 
        
        
        
    </body>
</html>
