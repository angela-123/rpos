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
                
                width: 100px;
                height: 40px;
                background: #149bdf;
                border: 1px #f8b9b7 solid;
                font-size: 1em;
                color:darkred;
                    
            }
            
            #minx{
                height:5em;
                width:15em;
                background: orangered;
                color: black;
            }
            
            
            #disck{
                
                display: none;
            }
            
            #kilop{
                
                border-radius: 10%;
            }
            #tita{
                
                width: 120px;
                background: orangered;
            }
            
             .till{
                
                background: black;
                color: white;
                font-weight:  bolder;
                font-size: 0.95em;
                width:120px;
            }

            .tablip{
                color:black;
                font-size:1.4em;
                width:60px;
            }
            
            
            #cashier,#recno,#dte,#loc{
                
                display:none;
            }
            
            th{
                
                font-family: Arial;
                font-size:1.3em;
                color:black;
                


            }
            
            td{
                font-family: calibri;
                font-weight: normal;
                color:black;
                font-size:1.1em;
            }

            select{
                font-size:1.2em;
                color:black;
            }

            .tulip{

                background: black;
                color:white;
                font-size: 1.2em;
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
        
<?php session_start();?>
       
        
        <script>
            $(document).ready(function(){

                $('.tulip').bind('click',function(){
                    $("#waiter").val($(this).attr('id'));
                    
                });

                $('.tablip').bind('click',function(){
                    $("#table").val($(this).attr('id'));
                    
                });


                
                $('.till').bind('click',function(){
                    
                    
                    var pname = $(this).attr('id');
                    var mult = $("#mult").val();
                    var waiter = $("#waiter").val();
                    var cashier = $("#cashier").val();
                    var date = $("#dte").val();
                    var table = $("#table").val();
                    var disc = $("#disc").val();
                    var table = $("#table").val();
                    
                    if(waiter === '')
                    {
                        alert('Select Waiter');
                        return;
                    }

                    if(table === '')
                    {
                        alert('Enter Table Number To Continue');
                        return;
                    }
                    $.ajax({
                         type:"post",
                         url:"yapad.php",
                         data:"pname="+pname+"&mult="+mult+"&waiter="+waiter+"&cashier="+cashier+"&date="+date+"&table="+table+"&disc="+disc,
                         
                         success:function(data)
                         {
                             $("#kilo").html(data);
                             $("#mult").val(1);
                         },
                         
                         
                         error:function()
                         {
                             alert(new Date());
                         }
                         
                         
                    });
                    
                });
                
                
                $("#delete").click(function(){
                    
                    var item =$("#item").val();
                    var recno = $("#recno").val();
                    var waiter = $("#waiter").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"del.php",
                        data:"item="+item+"&recno="+recno+"&waiter="+waiter,
                        
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#kilo").html('Not Connected');
                        }
                    });
                    
                    
                    
                });
                
                
                $("#showed").click(function(){
                    
                    //alert(new Date());
                    
                    var disc = $("#disc").val();
                    var recno = $("#recno").val();
                    
                    $.ajax({
                        type:"post",
                        url:"disc.php",
                        data:"disc="+disc+"&recno="+recno,
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $('#kilop').html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#dsales").click(function(){
                    
                    var rec = $("#recno").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"delall.php",
                        data:"recno="+rec,
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        error:function()
                        {
                            $("#kilop").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                $("#tita").click(function(){
                    
                    var recno = $("#recno").val();
                    
                    $.ajax({
                        type:"post",
                        url:"preinsert.php",
                        data:"recno="+recno,
                        
                        success:function(data)
                        {
                            $("#rand").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#rand").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#precs").click(function(){
                    
                    var cashier = $("#cashier").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"presales.php",
                        data:"cashier="+cashier,
                        
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        error:function()
                        {
                            $("#kilop").html('Not Connected');
                        }
                    });
                    
                });
                
                
                $("#prex").click(function(){
                    
                    var recno = $("#miki").val();
                    var cashier = $("#cashier").val();
                    
                    
                    
                    
                    $.ajax({
                        type:"post",
                        url:"bose.php",
                        data:"recno="+recno+"&cashier="+cashier,
                        
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#kilop").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                
                $("#rems").click(function(){
                    
                    $.ajax({
                        type:"post",
                        url:"wpayments.php",
                        
                        success:function(data)
                        {
                            $("#kilo").html(data);
                        },
                        
                        error:function()
                        {
                            $("#kilo").html('Not Connected');
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
                <div class="col-md-6" style=" background:  #f8b9b7;">
                    <div role="form" style=" background:  lightseagreen;">
                    <div class="form-group" style=" background:  cadetblue;">
                    
                    
                    
                    
                    
                    
                    
                    
                        <td><input type="date" name="dte" id="dte" value="<?php echo $tad; ?>" class="form-control" size="7" style=" background:  lightgrey;"></td>
               
                    
                        <td><input type="number" name="recno" id="recno" value="<?php echo $max; ?>" size="7" class="form-control" style=" background:  #99c2ff;"></td>
                        
                    
                     <td><input type="text" name="cashier" id="cashier" value="<?php echo $_SESSION['username']; ?>" size="7" class="form-control"></td>
                        
                    
                     
                        
                    
                    <td><input type="text" name="loc" id="loc" size="7" value="<?php echo $_SESSION['loc']; ?>" class="form-control"></td>
                      <td>
                      <select class = "form-control" id = "vat" >
                      <option value = "vat">vat</option>
                      <option value = "novat">no-vat</option>
                      </select>
                      </td> 

                      <td>
                      <select class = "form-control" id = services>
                      <option value = "service charge">service charge</option>
                      <option value = "no service charge">no service charge</option>
                      </select>

                      </td>
                      
                    <td><input type="text" id="waiter" class="form-control" placeholder ="waiter name"></td>
                    <td><input type="text" id="table" class="form-control" placeholder ="table number"></td>
                    <td><input type="text" id="item" class="form-control" placeholder ="item to remove"></td>
                     <td><input type="text" id="miki" class="form-control" placeholder ="receipt# to preview"></td>
                     
                    
                    
                            
                   
                
                    
                
                   
                    
                </div>
                    <div class="form-group">



                     
                   <?php 
                   $conn = mysql_connect('localhost','staff','angela');
                     mysql_select_db(ajpos)or die('Cant connect');
                     $tbs = "select tabname from mytables";
                     $tbx = mysql_query($tbs) or die('cant query');
                     while ($rp = mysql_fetch_assoc($tbx))
                     {
                         echo '<button class = "tablip" id =' .$rp['tabname'] .'>' .'<nobr>'.$rp['tabname'].'</nobr>'.'</button>';
                     }


                     $ws = "select waitername from waiters";

                     $wss = mysql_query($ws);
                     while ($roww = mysql_fetch_assoc($wss))
        {
            echo '<button class = "tulip" id =' .$roww['waitername'] .'>' .'<nobr>'.$roww['waitername'].'</nobr>'.'</button>';
        }
                     
                   ?>
             





                        
                                    <?php 
                    $con = mysql_connect('localhost','staff','angela');
                     mysql_select_db(ajpos)or die('Cant connect');
                     
                     $dop = "insert into receipts(tdate)values(curdate())";
                     
                     mysql_query($dop)or die('cant insert');
                    ?>
                    <?php 
                     $connx = mysql_connect('localhost','staff','angela');
                     mysql_select_db(ajpos)or die('Cant connect');
        
        $rtex = "select * from depts";
        
        $ress = mysql_query($rtex); 
        
        
        while ($row = mysql_fetch_assoc($ress))
        {
            echo '<button class = "till" id =' .$row['deptname'] .'>' .'<nobr>'.$row['deptname'].'</nobr>'.'</button>';
        }
        
                    ?>
                        
                        
                        <button id="tita" class="btn btn-primary btn-lg" onclick="printDiv('kilop');">Print Receipt</button>
                        <button id="delete" class="btn btn-primary btn-lg" style=" font-size: 0.85em;">Delete Item</button>
                        <button id="dsales" class="btn btn-primary btn-lg" style=" font-size: 0.85em;">Delete Sale</button>
                         <button id="precs" class="btn btn-primary btn-lg" style=" font-size: 0.85em;">Cashier Receipts</button>
                         <button id="prex" class="btn btn-primary btn-lg" style=" font-size: 0.75em;">Preview Receipt</button>
                         <a href="wpayments.php" class="btn btn-primary btn-lg">Waiters Remittances</a>
                    </div>
                </div>
                
                <div id="kilo"></div>
                
                </div>
                   <div class="col-md-3">
                       <div id="kilop" style=" background:white;"></div>
                </div>
                <div id="kilopx" class="col-md-3"></div>
            </div>
            
            <div class="row">
                <div id="rand" class="col-md-4"></div>
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
    
                                                                            		                           <script type="text/javascript">
$("input#waiter").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "cooza.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
              <script type="text/javascript">
$("input#item").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "newitems.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
        

    
    </body>
</html>
