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
         $date = $_POST['date'];
         $loc = $_POST['loc'];
         $itname = $_POST['itname'];
         $qty = $_POST['qty'];
         
         $das = "insert into storetrans(date,item,qtyout,location)values(CURDATE(),'$itname','$qty','$loc')";
         
         if(mysql_query($das))
         {
             echo 'Updated';
         }
         
 else {
             echo 'Not Updated';
 }
         
        ?>
        <?php 
        
        $ras = "select date,item,qtyout,location from storetrans where qtyout > 0 and date = CURDATE()";
        
        $res = mysql_query($ras);
                       
                  $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "QTY OUT LIST">';
                
                
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
