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
                color:  #000066;
                border: 1px #000099 solid;
                width: 659px;
                font-size: 10pt;
                
            }
            
            td{
                font-size: 9pt;
                color:  #800020;
                border: 1px #d9edf7 solid;
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
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        type:"post",
                        url:"mexp.php",
                        data:"date="+date+"&yr="+yr,
                        
                        success:function(data)
                        {
                            $("#tito").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Noppe');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
            <label>Month</label>
            <input type="text" name="dte" id="dte" class="form-control">
            
            <label>Year</label>
            <input type="number" name="yr" id="yr" class="form-control">
            <input type="button" value="Preview" id="btn" class="btn btn-primary btn-lg">
        
        <?php
        
        ?>
        
        <div id="tito"></div>
        </div>
        </div>
            </div>
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
	$("#titop").dialog(
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
	$("#ritas").dialog(
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
