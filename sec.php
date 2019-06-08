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
         
         $sec = $_POST['sec'];
         
         $dee = "insert into sections(section)values('$sec')";
         
         $resa = mysql_query($dee) or die('cant insert');
         
         $yoyo ="select section as sections from sections";
         
         $res = mysql_query($yoyo);
         
         
                                  $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-hover table-striped">';
                
                
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
