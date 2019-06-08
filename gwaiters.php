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
 
    </head>
    <body>
        <script>
            $(document).ready(function(){

                $.ajax({
                    type:"post",
                        url:"gwaitors.php",
                        data:"waiters="+waiter,
                        
                        
                        success:function(data)
                        {
                            $("#trump").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#trump").html('Not Connected');
                        }

                });
                
                $("#btc").click(function(){
                    
                    var waiter = $("#waiter").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"gwaits.php",
                        data:"waiters="+waiter,
                        
                        
                        success:function(data)
                        {
                            $("#trump").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#trump").html('Not Connected');
                        }
                        
                    });
                    
                });


                $("#btp").click(function(){
                    var waiter = $("#waiter").val();


                    $.ajax({

                        type:"post",
                        url:"gwaitsdel.php",
                        data:"waiter="+waiter,

                        success:function(data)
                        {
                            $("#trump").html(data)
                        },


                        error:function()
                        {
                            $("#trump").html('Not Connected');
                        }
                    })
                    
                })
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Waiter</label>
                        <input type="text" id="waiter" class="form-control">
                        <input type="button" id="btc" class="btn btn-primary btn-lg" value="Update">
                        <input type="button" id="btp" class="btn btn-primary btn-lg" value="Remove Waiter">
                        
                    </div>
                    
                </div>
                <div id="trump" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
