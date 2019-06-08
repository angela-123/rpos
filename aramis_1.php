<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>No Chill</title>
        <style> 
            #mynavy{
                background: #5bc0de;
            }
            
           #mynavy a{
                color: #000;
                font-size: 1.3em;
                font-family: tahoma;
            }
            
           .dropdown ul,dropdown-toggle ul{
                color: darkred;
                background: #8c8c8c;
            }
            
            #eva{
                position: absolute;
                bottom:5%;
                left:5%;
            }
        </style>
        
               
        <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body onload="adx();">
        
        <?php session_start(); ?>
        
        <div class="navbar navbar-default" id="mynavy">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle = "collapse" data-target="#mynavbar-content">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        
                    </button>
                    
                    <a class="navbar-brand brand" href="#" style=" font-style:  italic;color:  darkred;font-size: 2.5em;">Aramis</a>
                    
                </div>
                
                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Start<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="hmsuseradmin.html">Create Users</a></li>
                                
                                <li><a href="newmenu.php">Menu Items</a></li>
                                
                                <li><a href="#">Prepare Receipt</a></li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="newpos.php">Point Of Sales</a></li>
                                
                                <li><a href="newposorders.php">Orders</a></li>
                                <li><a href="yrsales.php">Orders-Live Streaming</a></li>
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="dbsalesprinto.php">Daily Sales</a></li>
                                <li><a href="mgsales.php">Monthly Sales</a></li>
                                <li><a href="yrbsales.php">Yearly Sales</a></li>
                                
                            </ul>
                            
                        </li>
                        
                        
                        
                        
                        
                        <li><a href="help.php">Help</a></li>
                    </ul>
                    
                </div>
                
            </div>
        </div>
        
        <script src="js/jquery-1.11.3.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>

        <?php
        // put your code here
        ?>
<script>
    $(document).ready(function(){
        
        $("#help").click(function(){
            
           
           $.ajax({
               
               url:"help.php",
               
               success:function(data)
               {
                   $("#yaya").html(data);
               },
               
               error:function()
               {
                   alert('No Network');
               }
               
           });
            
        });
        
    });
</script>
<div id="yaya"></div>

<script>
            
            $("#yaya").dialog({
                
                show:"slide",
                width:"550",
                height:"auto",
                position:"right top "
                
            });
        </script>
        
        <div id="eva" style="background:  #1c94c4;color: #e7e7e7;font-size: 2.5em" class="col-sm-6 col-md-6 col-lg-10">
            
            <h2 style="color: darkblue;"><nobr>Welcome:<?php echo $_SESSION['username']; ?></nobr></h2>
            
        </div>
        
        <script>
            function adx()
            {
                $("#eva").fadeOut(5000);
            }
        </script>
    </body>
</html>
