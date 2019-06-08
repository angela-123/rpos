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
        
                               <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $waiter = $_POST['waiter'];
         $item = $_POST['item'];
         $qty = $_POST['qty'];
         $qty = -$qty;
         
         $rate = "select * from positems where itemname = '$item'";
         $rada = mysql_query($rate);
         $price = mysql_fetch_assoc($rada);
         $up = $price['lrate'];
         
         
         $tem = "insert into trans(tdate,itemname,waiter,qtyout,location,unitprice)values(curdate(),'$item','$waiter','$qty', 'Bar',   '$up')";
         $weed = "insert into lookup(ldate,itemname,qtyout,location,waiter,mult,unitprice)values(curdate(),'$item','$qty','Bar','$waiter',1,'$up')";
         $zade = mysql_query($weed) or die('cant lookup');
         $sicas = "update stock set stockqty = stockqty - $qty where itemname = '$item' and location = 'Bar'";
         
         mysql_query($sicas) or die('cant update');
         
         $rad = mysql_query($tem) or die('cant insert');
         
         
         $rax = "select tdate,waiter,itemname,qtyout from trans where tdate = curdate() and waiter = '$waiter' and itemname = '$item'";
         
         $rada = mysql_query($rax);
         
         
                             $buns = mysql_num_fields($rada);
                echo '<table id = diaga class = "table table-responsive table-striped">';
                //echo '<thead>';
                //echo '<tr>';
               // echo '<td><nobr>FoodStop</nobr></td>';
                //echo '</tr>';
                
                //echo '<tr>';
                //echo '<td><nobr>DBM Plaza</nobr></td>';
                //echo '</tr>';
                
                //echo '</thead>';
                //echo '<p>FoodStop</p>';
                //echo '<nobsp>';
                //echo '<p>DBM Plaza,Wuse Zone 1</p>';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rada, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rada))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		
		{
			echo '<nobr>'.$row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    
    echo '</tr>';
    
    
     
    echo '</table>';
   
    
         
         
         
         
         
        ?>
    </body>
</html>
