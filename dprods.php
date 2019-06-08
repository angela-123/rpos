<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DAILY PRODUCTIONS</title>
        
        
        
        <style>
            input[type="button"]
            {
                width: 100px;
                height: 50px;
                border:   #0088cc solid 1px;
                color:  #000066;
            }
            
            label{
                color:  #003580;
                font-size: 12pt;
            }
            
            li{
                font-size: 10pt;
                font-weight: bold;
                color:  #0000cc;
            }
            
            input[type = "date"]
            {
                font-size: 9pt;
                color: #0074cc;
                font-weight: normal;
            }
            
            input[type = "text"]
            {
                font-size: 10pt;
                color:  #0055cc;
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
                    var item = $("#itemname").val();
                    var loc = $("#loc").val();
                    var qty = $("#qty").val();
                    var sice = $("#sice").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"prods.php",
                        data:"date="+date+"&item="+item+"&loc="+loc+"&qty="+qty+"&sice="+sice,
                        
                        success:function(data)
                        {
                            $("#haba").html(data);
                            $("#itemname").val('');
                            $("#qty").val('');
                            $("#sice").val();
                        },
                        
                        error:function()
                        {
                            alert('Noppe');
                        }
                    });
                    
                });
                
            });
        </script>
        <form id="dialog" title="Daily Productions">
            
            <label>Itemname</label><br>
            <input type="text" name="itemname" id="itemname"><br>
            <label>Size</label><br>
            <select id="sice" name="sice">
                <option value="Large">Large</option>
                <option value="Medium">Medium</option>
                <option value="Small">Small</option>
                
            </select><br>
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <label>Qty</label><br>
            <input type="number" name="qty" id="qty"><br>
            <input type="button" value="save" id="btn">
        </form>
        
        <div id="haba"></div>
        <?php
        
        ?>
        
                                            		                           <script type="text/javascript">
$("input#itemname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "positems.php",
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
	$("#dialog").dialog(
			{
			show:"slide",
                            draggable:false,
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>

      <script type="text/javascript">
	$("#haba").dialog(
			{
			show:"slide",
                            draggable:false,
			    hide:"puff",
			    height:"auto",
			    width:"400",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>  
        
    </body>
</html>
