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
         $disc = $_POST['disc'];
         $recno = $_POST['recno'];
         
         echo $disc;
         echo $recno;
         $yu = "insert into payments(pdate,discount,refno)values(curdate(),'$disc','$recno')";
         echo $_SESSION['page'];
         if($_SESSION['page'] === 'admin')
         {
         
         
         $red = mysql_query($yu);
         }
         
 else {
     
             echo '<h3>You Cant Give Discount3>';
 }
        ?>
    </body>
</html>
