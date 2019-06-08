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
            #diagaf{
                position: absolute;
                top:300px;
                left: 400px;
            }
            
            p{
                color:  #cd0a0a;
                
                font-size: 9pt;
            }
        </style>
        
        
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $date = $_POST['date'];
         $loc = $_POST['loc'];
         $item = $_POST['item'];
         $qty = $_POST['qty'];
         
 
        
        
        
          $fas = "select location,item,SUM(qty) As qty from productions where date = '$date' GROUP BY location,item";
          $res = mysql_query($fas);
          if($res)
          {
              echo 'PREVIEW';
        }
        
 else {
            echo 'Nope';
 }
 
 
                   $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "PIZZA LIST">';
                
                
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
