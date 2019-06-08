<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" http-equiv>
        <title></title>
        <style>
            #yahooh{
                
                background:  #99c2ff;
            }
        </style>
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        
        <?php 
        
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $recno = $_POST['recno'];
        ?>
        
        <script>
            $(document).ready(function(){
                
                setInterval(function(){
                
                
                //var recs = <?php echo $recno; ?>
                
                $.ajax({
                    
                    type:'post',
                    url:'granoyo.php',
                    //data:'recno='+recs,
                    
                    
                    success:function(data)
                    {
                        //alert(new Date());
                       
                        //alert('Printed');
                        $("#yahoo").html(data);
                        //printDiv('yahoo');
                        
                    },
                    
                    
                    
                    error:function()
                    {
                        alert('Nothing oo');
                        printDiv($("#yahoo"));
                        
                    }
                    
                    
                });
                
                },1000);
                
            });
        </script>
        <?php
        
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 table table-responsive table-striped" >
                    <div id="yahoo" title="ORDERS FOR THE DAY" style=" font-size: 1.2em; font-weight:  bolder; background:  white;"></div>
                </div>
            </div>
        </div>
        <div id="putin"></div>
                     <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        //alert(new Date());

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
    </body>
</html>
