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
            h3{
                
                color: darkred;
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
         
         $det = "select * from positems where itemname = '$item'";
         
         $tag = mysql_query($det) or die('cant query');
         
         $rara = mysql_fetch_assoc($tag);
         
         $price = $rara['lrate'];
         
         
         $yaks = "insert into dailies(sdate,itemname,qtyout,unitprice,waiter,recno,cashier)values(curdate(),'$item','$qty','$price','$waiter','$recno','$cashier')";
         
         mysql_query($yaks)or die('cant insert');
         
         echo '<blink><h3>Order Added To Table,Click View Orders To Confirm</h3></blink>';
         
         
        ?>
    </body>
</html>
