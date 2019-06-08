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
        <?php
        $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $orders = "orders";
         $dex = "delete  from receipts where  status = '$orders'";
         $tex = "delete  from dailies where sdate = curdate()";
         
         //mysql_query($dex) or die('cant query');
         mysql_query($tex) or die('cant query 2');
         echo 'Orders Deleted';
        ?>
    </body>
</html>
