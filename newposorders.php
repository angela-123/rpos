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
                height: 70px;
                background: #149bdf;
                border: 1px #f8b9b7 solid;
                font-size: 0.85em;
                color:darkred;
                    
            }
            
            #tita{
                background: orangered;
            }
            #pita{
                
                background:  #d43f3a;
                
            }
            #gimx{
                
                background: orangered;
            }
            #jinc{
                
                width: 12em;
                height: 6em;
                background:  orangered;
                color:black;
                font-size: 1.3em;
                
            }
            
            #luki,#pita{
                
                width: 90px;
                background: blue;
                color: white;
                font-weight:  bolder;
                font-size: 1em;
            }
            
            .till{
                
                background: blue;
                color: white;
                font-weight:  bolder;
                font-size: 0.75em;
            }
            
            
            #dte,#loc,#shift,#mult,#cashier{
                display: none;
            }
            
            #item{
                color: red;
                font-size: 1.2em;
            }
            
            #pita{
                
                background: orange;
            }
            
            th{
                
                font-weight: normal;
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
                    
                    var waiter = $("#waiter").val();
                    var table = $("#table").val();
                    
                    
                    
                    
                    $.ajax({
                         type:"post",
                         url:"yaparo.php",
                         data:"pname="+pname+"&waiter="+waiter+"&table="+table,
                         
                         
                         
                         
                         
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
                
                $("#pita").click(function(){
                    
                    var cashier = $("#cashier").val();
                    var waiter = $("#waiter").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"ritaski.php",
                        data:"cashier="+cashier+"&waiter="+waiter,
                        
                        
                        success:function(data)
                        {
                            $("#kilop").html(data);
                        },
                        
                        error:function()
                        {
                            alert('No Network');
                        }
                        
                    });
                    
                });
                
                
                $("#porder").click(function(){
                    
                    var rec = $("#rec").val();
                    var item = $("#item").val();
                    var qty = $("#qty").val();
                    var waiter = $("#waiter").val();
                    var rfid =$("#rfid").val();
                    var rex = $("#recno").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"payment.php",
                        data:"recno="+rec+"&item="+item+"&qty="+qty+"&waiter="+waiter+"&rfid="+rfid+"&rex="+rex,
                        
                        
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
                
                
                
                
                
                $("#remorder").click(function(){
                    
                    var rec = $("#rec").val();
                    var item = $("#item").val();
                    var qty = $("#qty").val();
                    var waiter = $("#waiter").val();
                    var rfid =$("#rfid").val();
                    var rex = $("#recno").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"remove.php",
                        data:"recno="+rec+"&item="+item+"&qty="+qty+"&waiter="+waiter+"&rfid="+rfid+"&rex="+rex,
                        
                        
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
                
                
                $("#addorder").click(function(){
                    
                    var rec = $("#rec").val();
                    var item = $("#item").val();
                    var qty = $("#qty").val();
                    var waiter = $("#waiter").val();
                    var rfid =$("#rfid").val();
                    var rex = $("#recno").val();
                    
                    if(rec ==='')
                    {
                        alert('Please Enter Table Number To Continue');
                        return;
                    }
                    
                    if(item ==='')
                    {
                        alert('Please Select Item To Be Addede');
                        return;
                    }
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"add.php",
                        data:"recno="+rec+"&item="+item+"&qty="+qty+"&waiter="+waiter+"&rfid="+rfid+"&rex="+rex,
                        
                        
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
                
                
                
                
                
                
                
                
            });
        </script>
        
        
                 <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $zew = "insert into receipts(tdate,staff)values(CURDATE(),'orders')";
         //mysql_query($zew);
        
        
 
         
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
                        
                    
                    <td><input type="text" name="shift" id="shift" size="7" value="<?php echo $_SESSION['shift']; ?>" class="form-control"></td>
                        
                    <td><a href="newpos.php" class="btn btn-link" id="jinc">Go To Direct Cash Sales</a></td>
                    <td><input type="text" name="loc" id="loc" size="7" value="<?php echo $myloc; ?>" class="form-control"></td>
                        
                    
                    <td><input type="text" id="waiter" class="form-control" placeholder="waiter name"></td>
                    <td><input type="text" id="rec" class="form-control" placeholder="table number for addition of order"></td>
                    <td><input type="text" id="item" class="form-control" placeholder="menu item to be added"></td>
                    <td><input type="text" id="rfid" class="form-control" placeholder="item sales id for payment"></td>
                    <td><input type="text" id="qty" class="form-control" placeholder="quantity" value="1"></td>
                        
                    
                    <td><input type="number" name="mult" id="mult" step="any" size="10" value="1" class="form-control"></td>
                            
                            
                   
                
                    
                
                   
                    
                </div>
                    <div class="form-group">
                        
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
                        
                        
                        <button id="tita" onclick="printDiv('kilop')"><nobr>Print</nobr></button>
                        <a href="newposorders.php" class="btn btn-primary btn-lg" id="gimx">Close Orders</a>
                        <button id="pita" class="btn btn-primary"><nobr>View Orders</nobr></button>
                        <button id="porder" class="btn btn-primary">Pay For Order</button>
                        <button id="remorder" class="btn btn-primary">Remove Order</button>
                        <button id="addorder" class="btn btn-primary" style=" background: #843534;">Add Order</button>
                        
                        
                    </div>
                </div>
                
                <div id="kilo"></div>
                
                </div>
                   
                       <div id="kilop" class="col-md-3" style=" background: white;"></div>
                
                <div id="kilopx" class="col-md-2 col-md-offset-1 "></div>
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
