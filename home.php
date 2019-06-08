<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html ng-app = "myApp">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width,initial-scale=1">
        <title>WAFFLE STOP</title>
        <style> 
            #mynavy{
                background:gray;
            }
            
           #mynavy a{
                color: #000;
                font-size: 1.3em;
                font-family: tahoma;
            }
            
            #mikl{
                font-size: 0.67em;
                color: orangered;
            }
            
            #hobo{
                
                background: orangered;
            }
            
           .dropdown ul,dropdown-toggle ul{
                color: darkred;
                background: #8c8c8c;
            }
            
            h1{
                font-size: 10em;
                color: linen;
                font-style:  italic;
            }
            
            #eva{
                position: absolute;
                bottom:5%;
                left:5%;
            }
            
            #kini{
                
                display:  none;
            }
            
        </style>
        
                      <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
          <script src="js/bootstrap.min.js"></script>  
          <script src="js/jquery-1.11.3.js"></script>
          <script src = "js/angular.min.js"></script>
          <script src = "js/angular-route.min.js"></script>
        ‪<script src="js/bootstrap.min.js"></script>
 
    </head>
    <body onload="adxx();">
        
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
                    
                    <a class="navbar-brand brand" href="#" style=" font-style:  italic;color: white;font-size: 2.5em; background:black;">WAFFLE STOP</a>
                    
                </div>
                
                <div class="collapse navbar-collapse navbar-center" id="mynavbar-content">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Start<b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: white; color:burlywood;">
                                <li><a href="#!hms">Create Users</a></li>
                                <li><a href="#!depts">Create Departments</a></li>
                                <li><a href="#!waiters">Waiters</a></li>
                                <li><a href="#!tables">Tables</a></li>
                                
                                <li><a href="#!newmenu">Menu Items</a></li>
                                <li><a href="#!subplace">Edit Menu Items</a></li>
                                
                                <li><a href="#!trunks">Remove Waiters</a></li>
                                <li><a href="#!zunks">Z Reports</a></li>
                                
                            </ul>
                        </li>
                        
                        
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transactions <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:white;">
                                <li><a href="#!newpos">Point Of Sales</a></li>
                                <li><a href="#!purchazes">Purchases</a></li>
                                <li><a href="#!removrecs">Delete Receipt</a></li>
                                
                                
                                
                                
                            </ul>
                            
                        </li>
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background:  #c8e5bc;">
                                <li><a href="#!dbsalesprinto">Daily Sales Total</a></li>
                                
                                <li id="hobo"><a href="#!cleansales">Daily Sales-Only Evening To Morning</a></li>
                               
                                
                               
                                
                                
                            </ul>
                            
                        </li>
                        
                        
                        
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Expenses <b class="caret"></b></a>
                            <ul class="dropdown-menu" style=" background: burlywood;">
                                <li><a href="#!cc">Cost Centers</a></li>
                                <li><a href="#!expenses">Expenses Entry</a></li>
                                <li><a href="#!dexpenses">Daily Expenses Report</a></li>
                                
                                
                                
                            </ul>
                            
                        </li>
                        
                        
                       
                        
                        
                        
                        <li><a href="jogin.php" id="mikl">Log Out</a></li>
                        
                    </ul>
                    
                </div>
                
            </div>
        </div>
        
        
        

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
            function adxx()
            {
                $("#eva").fadeOut(5000);
                $("#kini").fadeIn(10000);
            }
        </script>
        <div class=" container-fluid">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    
                </div>
                
            </div>
            
        </div>

        <div ng-view></div>

        <script>
                    var angela = angular.module('myApp',['ngRoute']);
                    angela.config(function($routeProvider){
                        $routeProvider.when("/",{

                            templateUrl:'remains.html'

                        }).when("/hms",{

                            templateUrl:'users.php'
                        }).when('/depts',{

                            templateUrl:'depts.php'
                        }).when('/waiters',{

                            templateUrl:'gwaiters.php'
                        }).when('/newmenu',{
                            templateUrl:'newmenu.php'
                        }).when('/subplace',{

                            templateUrl:'subplace.php'
                        }).when('/#!trunks',{
                            templateUrl:'trunks.php'
                        }).when('/newpos',{
                            templateUrl:'newpos.php'
                        }).when('/purchazes',{
                            templateUrl:'purchases.php'
                        }).when('/removrecs',{
                            templateUrl:'removrecs.php'
                        }).when('/dbsalesprinto',{
                            templateUrl:'dbsalesprinto.php'
                        }).when('/cleansales',{
                            templateUrl:'cleansales.php'
                        }).when('/cc',{
                            templateUrl:'cc.php'
                        }).when('/expenses',{
                            templateUrl:'expenses.php'
                        }).when('/dexpenses',{
                            templateUrl:'dexpenses.php'
                        }).when('/pchreturns',{
                            templateUrl:''
                        }).when('/dsales',{
                            templateUrl:'dsales.php'
                        }).when('/cash',{
                            templateUrl:'cashsumm.php'
                        }).when('/dsalesumm',{
                            templateUrl:'dsalesumm.php'
                        }).when('/drevs',{
                            templateUrl:'drevs.php'
                        }).when('/dsalesall',{

                            templateUrl:'dsalesall.php'
                        }).when('/yrs',{

                            templateUrl:'yrrsales.php'
                        }).when('/mtsales',{
                            templateUrl:'mtsales.php'
                        }).when('/mtsaless',{
                            templateUrl:'mtsalescash.php'
                        }).when('/cashperf',{
                            templateUrl:'cashierperf.php'
                        }).when('/mpurch',{
                            templateUrl:'mpurchases.php'
                        }).when('/tables',{
                            templateUrl:'tables.html'
                        }

                        ).when('/dashboard',{
                            templateUrl:'dashboard.php'
                        }).when('/stock',{

                            templateUrl:'stock.php'
                        }).when('/audit',{

                            templateUrl:'audit.php'
                        }).when('/trunks',{
                            templateUrl:'rxwaiters.html'
                        }).when('/count',{
                            templateUrl:'stockcount.php'
                        }).when('/supas',{
                            templateUrl:'supayments.php'
                        }).when('/edits',{
                            templateUrl:'edits.php'
                        }).when('/editprods',{
                            templateUrl:'editprods.php'
                        }).when('/zunks',{
                            templateUrl:'zade.php'
                        })


                    });

                    </script>
               

    </body>
</html>
