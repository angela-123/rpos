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
                text-align: left;
                color: #000066;
                font-size: 12pt;
            }
            
            label{
                font-size: 12pt;
                color:  #000099;
                
            }
            
            input[type = "button"]
            {
                width: 130px;
                height: 60px;
                border: 2px #999999 solid;
            }
            
            li{
                font-size: 10pt;
                
            }
            
            td{
                font-size:1.2em;
                color: #000066;
                font-weight: bold;
                border: 1px #c09853 solid;
            }
            
            #diagaf{
                width: 550px;
                border: 1px #999999 solid;
                position: absolute;
                left: 400px;
                top:100px;
            }
        </style>
                                               <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var cc = $("#cc").val();
                    var recby = $("#recby").val();
                    var dsc = $("#dsc").val();
                    var amt = $("#amt").val();
                    var loc = $("#loc").val();
                    
                    $.ajax({
                        type:"post",
                        url:"exp.php",
                        data:"date="+date+"&cc="+cc+"&recby="+recby+"&dsc="+dsc+"&amt="+amt+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#niyi").html(data);
                            $("#cc").val('');
                            $("#recby").val('');
                            $("#dsc").val('');
                            $("#amt").val('');
                            
                        },
                        error:function()
                        {
                            alert('Nopee');
                        }
                        
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
            <label>Costcenter</label>
            <input type="text" name="cc" id="cc" class="form-control">
            <label>Received By</label>
            <input type="text" name="recby" id="recby" class="form-control">
            <label>Description</label>
            <input type="text" name="dsc" id="dsc" class="form-control">
            <label>Amount</label>
            <input type="number" name="amt" id="amt" class="form-control">
            <input type="button" name="btn" id="btn" value="Save">
                </div>
                <div id="niyi" class="col-md-4"></div>
            </div>
        </div>        
                                            		                           <script type="text/javascript">
$("input#cc").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "ccenter.php",
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
	$("#mikel").dialog(
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
	$("#niyiw").dialog(
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
        
        
        
        
        
        
        <?php
        
        ?>
    </body>
</html>
