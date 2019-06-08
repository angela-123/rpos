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
                width: 299px;
                text-align:  left;
                color:  #000099;
            }
            
            
            td{
                border: 1px #bfbfbf solid;
                color:  #006FCC;
                font-size:  10pt;
                font-weight:  normal;
            }
            
            input[type = "button"]
            {
                width: 100px;
                height: 50px;
                border: 2px #bfbfbf solid;
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
        <form id="maya">
            <script>
                $(document).ready(function(){
                    
                    $("#btn").click(function(){
                        
                        var cc = $("#cc").val();
                        
                        $.ajax({
                            type:"post",
                            url:"ajcp.php",
                            data:"cc="+cc,
                            
                            success:function(data)
                            {
                                $("#shagie").html(data);
                            },
                            
                            error:function()
                            {
                                alert('Npeee');
                            }
                        });
                        
                    });
                    
                });
            </script>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
            <label>Cost Centers</label><br>
            <input type="text" name="cc" id="cc" class="form-control"><br>
            <input type="button" name="btn" id="btn" value="Save" class="btn btn-default btn-lg">
        
        <?php
        // put your code here
        ?>
        <div id="shagie" title="COSTCENTERS"></div>
            </div>
            </div>
            </div>
            </div>
        <script type="text/javascript">
	$("#shagieq").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#mayah").dialog(
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
