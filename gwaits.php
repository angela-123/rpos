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
         $conn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos)or die('Cant connect');
        
        $waiter = $_POST['waiters'];
        
        $we = "insert into waiters(waitername)values('$waiter')";
        
        $rtd = mysql_query($we)or die('cant insert');
        
        $dx = "select * from waiters";
        
        $res = mysql_query($dx);
        
                        
                  $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped table-hover">';
                echo '<tr>';
                echo '<td>';
                echo 'Waiters';
                echo '</td>';
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
