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
         
         mysql_query($foo) or die('No Payment');
         $yaks = "insert into dailies(sdate,itemname,qtyout,unitprice,waiter,recno,cashier)values(curdate(),'$item','$qtty','$price','$waiter','$recno','$cashier')";
         
         //$zias = mysql_query($yaks)or die('cant insert,ok');
         
         $dod = "insert into lookup(ldate,itemname,qtyout,unitprice,mult,recno,waiter,cashier)values(curdate(),'$tname','$qty','$price',1, '$recno','$waiter','$cashier')";
         
         mysql_query($dod) or die('cant look up');
         
         $rod = "delete  from dailies where itemname = '$item' and recno ='$recno' and waiter = '$waiter' and did = '$rf'";
         $dt = "delete from dailies where did = '$rf'";
         mysql_query($dt) or die('cant delete');
         
         
         $xade = "select itemname,qty,rate,qty * rate as extended from payments where refno ='$rex' ";
         
         $pro = "select sum(qty * rate) as total from payments where refno = '$rex'";
         $go = mysql_query($pro);
         
         $ru = mysql_fetch_assoc($go);
         
         $altotal= $ru['total'];
         
         
         $res = mysql_query($xade);
         
                                    $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-hover table-striped table-bordered">';
                
                
                echo '<ul align = "left">';
                echo '<li id = "lag">THE SECRET GARDEN</li>';
                //echo '<li id = "laga">WINE & BAR</li>';
                echo '<nobsp>';
                //echo '<li>Opp. Sharon Ultimate Hotels</li>';
                //echo '<li>Area 3,Garki,Abuja</li>';
                //echo '<li>ABUJA</li>';
                //echo '<li>' .'08099388887,07032305841'.'</li>';
                echo '<li>' .$mydate.'</li>' ;
                echo '<li>Cashier..' .$cashier.'</li>' ;
                echo '<li>Waiter..' .$waiter.'</li>' ;
                echo '<li>Recceipt#..' .$numb.'</li>' ;
                echo '</ul>';
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($res, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($res))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Bill';
    echo '</td>';
    echo '<td>';
    echo number_format($altotal,2);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
        
         
         
         
         
         
        ?>
    </body>
</html>
