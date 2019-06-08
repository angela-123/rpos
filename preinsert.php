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
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $numb = $_POST['recno'];
         $jamb = $numb +1;
         $rx = "insert into sales(pdate,itemname,qty,rate,mult,cashier,waiter,refno,vat,scharge)select ldate,itemname,qtyout,unitprice,mult,cashier,waiter,recno,vat,scharge from lookup where recno = '$jamb'";
         $dx = "insert into dailies(sdate,itemname,qtyout,unitprice,mult,cashier,waiter,recno,vat,scharge)select ldate,itemname,qtyout,unitprice,mult,cashier,waiter,recno,vat,scharge from lookup where recno = '$jamb'";
         $res = mysql_query($rx) or die('cant select and insert');
         $tfx = mysql_query($dx) or die('cant dailies');
         echo $numb;
       
  
        ?>
    </body>
</html>
