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
            td{
                font-size: 10pt;
                font-weight:  normal;
                border: 1px #333333 solid;
            }
            
            th{
                font-size: 10pt;
                font-weight:  bold;
                text-align: left;
                
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $zx = "select itemname,lrate as L,mrate As M,srate As S, half as etops from positems";
         $res = mysql_query($zx);
         
         
                            $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "PRICE LIST">';
                
                
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
