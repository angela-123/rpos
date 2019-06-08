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
         $cashier = $_POST['cashier'];
        $xade = "select refno,sum(qty * rate *mult )as extended from sales where cashier = '$cashier' and pdate = curdate()  group by refno ";
       $res = mysql_query($xade) or die('cant select');
       
                
                                           $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped">';
                
                echo '<tr>';
                echo '<th>';
                echo 'RECEIPTS SUMMARY FOR';
                echo '</th>';
                echo '<th>';
                echo $cashier;
                echo '</th>';
                echo '</tr>';
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
