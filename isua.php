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
         
         $dwe = "select date,item,qtyout,location from storetrans where date = CURDATE() and location = '$loc'";
         
         $res = mysql_query($dwe);
         
         
         if($res)
         {
             echo 'Retrieved Records';
         }
                 
 else {
             echo 'Nope,No Data';
 }  
      
 
         
                          $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "STORE LIST">';
                
                
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
 
    
    
    $reller = "select date,"
 
         
        ?>
    </body>
</html>
