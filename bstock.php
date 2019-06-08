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
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border-radius: 10px;
                border: 3px #f8b9b7 solid;
                background: #f8b9b7;
                color: darkblue;
            }
            
            
            input[type = "text"]
            {
                font-size: 9pt;
                color:  #005580;
                font-size: 9pt;
            }
            
            
            label{
                color: darkblue;
            }
            
            li{
                font-size: 10pt;
                font-weight: normal;
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
                    
                    var branch = $("#branch").val();
                    
                    $.ajax({
                        type:"post",
                        url:"branch.php",
                        data:"brch="+branch,
                        
                        success:function(data)
                        {
                            $("#nyaji").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Nope');
                        }
                    });
                });
                
            });
        </script>
        <form id="kaya" title="SELECT LOCATION">
            <label>Branch</label><br>
            <input type="text" name="branch" id="branch"><br>
            <input type="button" name="btn" id="btn" value="Preview">
        </form>
        <div id="nyaji" title="STOCK REPORT"></div>
        <?php
        
        ?>
        
                                         		                           <script type="text/javascript">
$("input#branch").autocomplete ({
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
	$("#nyaji").dialog(
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
	$("#kaya").dialog(
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
