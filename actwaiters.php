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
                
                 $('.gig').bind('click',function(){
                    
                    
                     var waiter = $(this).attr('id');
                    //var waiter = $("#waiter").val();
                    //alert(waiter);
                    
                    $.ajax({
                         type:"post",
                         url:"granoyod.php",
                         data:"waiter="+waiter,
                         
                         success:function(data)
                         {
                             $("#dale").html(data);
                             $("#mult").val(1);
                         },
                         
                         
                         error:function()
                         {
                             alert(new Date());
                         }
                         
                         
                    });
                    
                });
                
                
                
                
                
            });
        </script>
        <div class="container-fluid">
            <label>ACTIVE WAITERS</label>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $teu ="select * from  trans  where tdate = '2017-04-05' group by waiter";
         
         $boom = mysql_query($teu);
         
         while($row = mysql_fetch_assoc($boom))
         {
         
        ?>
        
            <div class="row">
                
                <div class="col-md-4">
                    <input type="button" id="<?php echo $row['waiter']; ?>" class="gig" value="<?php echo $row['waiter']; ?>" style=" background:  #0088cc; width: 10em; height: 10em;">
                    
                </div>
                
                
                
            </div>
            
            <div class="row">
                <div class="col-md-5">
                    <div id="dale">
                        
                    </div>
                    
                </div>
                
            </div>
            
         
        
            
         <?php } ?>
            
        
        <?php
        // put your code here
        ?>
        </div>
    </body>
</html>
