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
         
         $item = $_POST['item'];
         $loc = $_POST['loc'];
         $qty = $_POST['qty'];
         
         $zx = "insert into stock(itemname,stockqty,opbal,location)values('$item','$qty','$qty','$loc')";
         
         $trans = "insert into trans(tdate,itemname,qtyin,qtyout,opstock,location)values(curdate(),'$item',0,0,'$qty','$loc')";
         mysql_query($trans) or die('cant insert into tranz');
         
         $rtx = mysql_query($zx) or die('cant insert');
         
         $dex = "select itemname,stockqty as stock,opbal,location from stock where location ='$loc'";
         
         $res = mysql_query($dex);
         
         
                                   $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped">';
                
                
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
     
    echo '</table>';
        
         
         
        ?>
    </body>
</html>
