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
                width: 440px;
                text-align: left;
                font-size: 11pt;
                font-weight: bold;
                color:  #003580;
            }
            
            td{
                color:  #0055cc;
                font-size: 10pt;
                font-weight:  bold;
                border: 1px #7699d1 solid;
            }
            
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 3px #7699d1 solid;
                background: #7699d1;
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
                    
                    $.ajax({
                        type:"post",
                        url:"dpurch.php",
                        data:"date="+date,
                        
                        success:function(data)
                        {
                            $("#king").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Nopee');
                        }
                        
                    });
                });
                
            });
        </script>
        <form id="sae" title="DATE">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <input type="button" id="btn" value="Preview">
        </form>
        
        <div id="king" title="TOTAL DAILY PURCHASES"></div>
        <?php
        
        ?>
        
          <script type="text/javascript">
	$("#king").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
	
        
          <script type="text/javascript">
	$("#sae").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
    </body>
</html>
