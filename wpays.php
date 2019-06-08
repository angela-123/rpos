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
         $conn = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos)or die('Cant connect');
         
         $waiter = $_POST['waiter'];
         $amt = $_POST['amt'];
         
         $dea = "insert into sales(pdate,itemname,waiter,paid)values(curdate(),'payment','$waiter','$amt')";
         
         $zz = mysql_query($dea) or die('cant insert');
         
         $sx = "select sum(rate * qty) as total,sum(paid) as payments from sales where pdate = curdate() and waiter = '$waiter' group by waiter";
         
         $rat = mysql_query($sx);
         
         $dash = mysql_fetch_assoc($rat);
         
         $debit = $dash['total'];
         $credit = $dash['payments'];
         
         echo '<h3> Total Collection For The Day.......' .number_format($debit,2);
         
         echo '<h3> Total Payment For The Day.......' .number_format($credit,2);  
         
         $bal = $debit - $credit;
         
         
        echo '<h3> Outstanding For The Day.......' .number_format($bal,2);          
                 
                 
                 
        ?>
        
    </body>
</html>
