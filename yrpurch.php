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
         
         $date = $_POST['date'];
         $yr = $_POST['yr'];
         $fez = "select date,item,qtyin,unitcost,qtyin*unitcost as extended from storetrans where qtyin > 0  And YEAR(date) = YEAR(CURDATE())";
         $fizz = "select SUM(qtyin * unitcost) as Total from storetrans where  YEAR(date)= YEAR(CURDATE())";
         $res = mysql_query($fez);
         $dean = mysql_query($fizz);
         
         $fow = mysql_fetch_assoc($dean);
         
         $mooki = $fow['Total'];
         
         if($res)
         {
             echo 'Preview Purchases';
         }
         
 else {
             echo 'No data retrieved';
 }
 
                   $buns = mysql_num_fields($res);
                echo '<table id = diaga>';
                
                
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
    echo 'Total Purchases';
    echo '</td>';
    
    echo '<td>';
    echo number_format($mooki);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
        
 
         
        ?>
    </body>
</html>
