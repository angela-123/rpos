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
             li{
                
                text-align:center;
                color:  #000066;
                font-size: 1em;
                list-style:  none;  
            }
            
            
            h3{
                
                color: orangered;
            }
        </style>
    </head>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $recno = $_POST['recno'];
         $item = $_POST['item'];
         $qty = $_POST['qty'];
         $waiter = $_POST['waiter'];
         $qtty = -$qty;
         $cashier = $_SESSION['username'];
         $rf = $_POST['rfid'];
         $rex = $_POST['rex'];
         
         echo $rf;
         
         $zax = "select * from dailies where did = '$rf'";
         
         $top = mysql_query($zax);
         
         $cloud = mysql_fetch_assoc($top);
         
         $quant = $cloud['qtyout'];
         $tname = $cloud['itemname'];
         
         
         $det = "select * from positems where itemname = '$tname'";
         
         $tag = mysql_query($det) or die('cant query');
         
         $rara = mysql_fetch_assoc($tag);
         
         $price = $rara['lrate'];
         
         $foo = "insert into payments(pdate,itemname,qty,rate,cashier,waiter,refno)values(curdate(),'$tname','$quant','$price','$cashier','$waiter','$rex')";
         
        // mysql_query($foo) or die('No Payment');
         $yaks = "insert into dailies(sdate,itemname,qtyout,unitprice,waiter,recno,cashier)values(curdate(),'$item','$qtty','$price','$waiter','$recno','$cashier')";
         
         //$zias = mysql_query($yaks)or die('cant insert,ok');
         
         $rod = "delete  from dailies where itemname = '$item' and recno ='$recno' and waiter = '$waiter' and did = '$rf'";
         $dt = "delete from dailies where did = '$rf'";
         mysql_query($dt) or die('cant delete');
         echo '<h3>Order Removed From Table,Confirm By Clicking View Orders</h3>';
         
         
         
         
         
        ?>
    </body>
</html>
