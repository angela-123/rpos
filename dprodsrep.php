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
           
            #nade{
                width: 650px;
            }
            
            td{
                border: 1px #0088cc solid; 
            
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
                        url:"dps.php",
                        data:"date="+date+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#nade").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Nopee');
                        }
                        
                    });
                });
                
            });
        </script>
        <form id="jik" title="LOCATION">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <input type="button" name="btn" id="btn" value="Preview">
        </form>
        
        <div id="nade" title="PRODUCTIONS REPORT"></div>
        <?php
        // put your code here
        ?>
        
        <script type="text/javascript">
	$("#nade").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"660",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
         <script type="text/javascript">
	$("#jik").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
        
    </body>
</html>
