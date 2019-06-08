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
         
         $loc = $_POST['loc'];
         $destloc = $_POST['destloc'];
         $item = $_POST['item'];
         $qty = $_POST['qty'];
         
         $sec = "select * from stock where itemname = '$item' and location ='$loc'";
         
         $mary = mysql_query($sec);
         $zx = mysql_fetch_assoc($mary);
         
         $stock = $zx['stockqty'];
         echo 'Old Stock is .........................' .$stock;
         
         if($qty > $stock)
         {
             echo '<blink><h3>You Cant Move thisstock from this location, insufficient stock</h3></blink>';
             return;
         }
         
         $trp = "update stock set stockqty = stockqty - $qty where itemname = '$item' and location = '$loc'" ;
         
         $yut = mysql_query($trp) or die('cant update');
         
         
         
         $seck = "select * from stock where itemname = '$item' and location ='$destloc'";
         $mari = mysql_query($seck);
         $zxx = mysql_fetch_assoc($mari);
         $nrows = mysql_num_rows($mari);
         
         if($nrows <= 0)
         {
             echo '<blink>This location cant accept this stock,open stock for it first</blink>';
              $trpt = "update stock set stockqty = stockqty + $qty where itemname = '$item' and location = '$loc'" ;
              
              mysql_query($trpt);
              
              echo '<blink>Stock Returned To Source</blink>';
              return;
             
         }
         
         
         $stk = $zxx['stockqty'];
         
         
         
          $tp = "update stock set stockqty = stockqty + $qty where itemname = '$item' and location = '$destloc'" ;
         
         $yt = mysql_query($tp) or die('cant update');
         
         
        ?>
    </body>
</html>
