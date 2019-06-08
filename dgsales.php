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
                color:  #000;
                font-size: 10pt;
                width: 585px;
            }
            
            td{
                font-size: 9pt;
                font-weight: bold;
                color:  #0480be;
                border: 2px #bfbfbf solid;
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
                        url:"jimopo.php",
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
        <form id="nili" title="ENTER DATE ">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            
            <input type="button" name="btn" id="btn" value="Preview">
        </form>
        
        <div id="jaga" title="SALES SUMMARY FOR THE DAY"></div>
        <?php
        
        ?>
        <script type="text/javascript">
	$("#jaga").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"600",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#nili").dialog(
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
