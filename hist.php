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
        $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $item = $_POST['item'];
         $dec ="select tdate, itemname,opstock,qtyin,qtyout,mvdin,mvout from trans where itemname = '$item'";
         
         
         
         $res = mysql_query($dec) or die('cant select');
         
         
                           $buns = mysql_num_fields($res);
                echo '<table  class = "table table-responsive table-striped table-bordered table-hover">';
                
                
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
