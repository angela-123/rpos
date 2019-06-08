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
         $item = $_POST['item'];
         $qty = $_POST['qty'];
         $mto = $_POST['mto'];
         
         $eel = "insert into storetrans(date,location,item,mvdout,movedto)values(CURDATE(),'$loc','$item','$qty','$mto')";
         
         $zito = mysql_query($eel);
         
         if($zito)
         {
             echo 'Data Inserted';
         }
         
 else {
             echo 'Data Not Inserted';
 }
         
        ?>
        
        <?php 
        $era = "select date,location,item,mvdout,movedto from storetrans where date = CURDATE()";
        
        $res = mysql_query($era);
        
                          $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "STOCK MOVEMENT">';
                
                
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
