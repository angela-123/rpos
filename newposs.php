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
            
             button{
                
                width: 120px;
                height: 60px;
                background: #149bdf;
                border: 1px #f8b9b7 solid;
                font-size: 1.5em;
                color:darkred;
                    
            }
            #tita{
                
                width: 120px;
            }
            
             .till{
                
                background: blue;
                color: white;
                font-weight:  bolder;
                font-size: 1.5em;
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
        
   
        
        <script>
            $(document).ready(function(){
                
                $('.till').bind('click',function(){
                    
                    
                    var pname = $(this).attr('id');
                    //var qty = $("#mult").val();
                    
                    
                    $.ajax({
                         type:"post",
                         url:"yapad.php",
                         data:"pname="+pname,
                         
                         success:function(data)
                         {
                             $("#kilo").html(data);
                         },
                         
                         
                         error:function()
                         {
                             alert(new Date());
                         }
                         
                         
                    });
                    
                });
                
                
            });
        </script>
        
        
                 <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $zew = "insert into receipts(tdate,staff)values(CURDATE(),'na')";
         mysql_query($zew);
        
        
 
         
        ?>
        
        
        <?php
        $sew = "select MAX(recno) As Recno from receipts";
        $rew = mysql_query($sew);
        while ($row = mysql_fetch_assoc($rew)) {
            $max = $row['Recno'];
        }
        ?>
        
        <?php 
        $trek = "select CURDATE() As date";
        $era = mysql_query($trek);
        $rad = mysql_fetch_assoc($era);
        $tad = $rad['date'];
        
        //echo $tad;
        ?>
        
        <?php 
        $myloc = $_SESSION['loc'];
        $cashier = $_SESSION['username'];
        
        ?>
        
        <?php
        // put your code here
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style=" background:  #f8b9b7;">
                    <div role="form" style=" background:  lightseagreen;">
                    <div class="form-group" style=" background:  cadetblue;">
                    
                    
                    
                    
                    
                    
                    
                    
                        <td><input type="date" name="dte" id="dte" value="<?php echo $tad; ?>" class="form-control" size="7" style=" background:  lightgrey;"></td>
               
                    
                        <td><input type="number" name="recno" id="recno" value="<?php echo $max; ?>" size="7" class="form-control" style=" background:  #99c2ff;"></td>
                        
                    
                     <td><input type="text" name="cashier" id="cashier" value="<?php echo $_SESSION['username']; ?>" size="7" class="form-control"></td>
                        
                    
                    <td><input type="text" name="shift" id="shift" size="7" value="<?php echo $_SESSION['shift']; ?>" class="form-control"></td>
                        
                    
                    <td><input type="text" name="loc" id="loc" size="7" value="<?php echo $_SESSION['loc']; ?>" class="form-control"></td>
                        
                    
                        
                        
                    
                    <td><input type="number" name="mult" id="mult" step="any" size="10" value="1" class="form-control"></td>
                            
                            
                   
                
                    
                
                   
                    
                </div>
                    <div class="form-group">
                        
                                    <?php 
                    $con = mysql_connect('localhost','autospar_staff','angelauno_123');
                     mysql_select_db(ajpos)or die('Cant connect');
                     
                     $dop = "insert into receipts(tdate)values(curdate())";
                     
                     mysql_query($dop)or die('cant insert');
                    ?>
                    <?php 
                     $connx = mysql_connect('localhost','autospar_staff','angelauno_123');
                     mysql_select_db(ajpos)or die('Cant connect');
        
        $rtex = "select * from depts";
        
        $ress = mysql_query($rtex); 
        
        
        while ($row = mysql_fetch_assoc($ress))
        {
            echo '<button class = "till" id =' .$row['deptname'] .'>' .'<nobr>'.$row['deptname'].'</nobr>'.'</button>';
        }
        
                    ?>
                        
                        
                        <button id="tita" class="btn btn-primary btn-lg" onclick="printDiv('kilop');">Print Receipt</button>
                    </div>
                </div>
                
                <div id="kilo"></div>
                
                </div>
                   <div class="col-md-4">
                       <div id="kilop" class=" table table-responsive table-striped" style=" background:  #9acfea;"></div>
                </div>
            </div>
            
                <div class="col-md-12">
            <div id="kilopx" class=" table table-responsive table-striped"></div>
                </div>
            
        </div>
                                    <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
    </body>
</html>
