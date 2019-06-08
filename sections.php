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
                
                $("#btx").click(function(){
                    
                    var sec = $("#sec").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"sec.php",
                        data:"sec="+sec,
                        
                        
                        success:function(data)
                        {
                            $("#yila").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#yila").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" id="sec" class="form-control">
                        <input type="button" id="btx" value="Update" class="btn btn-default" style=" background: #31b0d5;">
                        
                    </div>
                    
                </div>
                <div id="yila" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
