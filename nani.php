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
        $link1 = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos,$link1);
        
        $ted = "select * from positems";
        
        $res = mysql_query($ted);
        
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
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Revenue';
    echo '</td>';
    
    echo '<td>';
    echo number_format($trev,2);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
        
        
        
        //$link2 = mysql_connect('localhost','staff','angela');
        
        
        ?>
        
        <?php 
        $link2 = mysql_connect('localhost','staff','angela');
        
        
        
        mysql_select_db(fleet,$link2);
        
        $mina = "select * from vehicles";
        
        $rar = mysql_query($mina);
        
                                  $bunns = mysql_num_fields($rar);
                echo '<table id = diaga title = "PIZZA LIST">';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rar, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rar))
{
	echo '<tr>';
	
	for($i = 0;$i<$bunns;$i++)
	
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
    echo 'Total Revenue';
    echo '</td>';
    
    echo '<td>';
    echo number_format($trev,2);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
        
        
        
    
        
        
        ?>
        
       <?php
        
        
        //mysql_query($hana)or die('cant query');
        
       $hana = "select * from positems ";
       
       mysql_query($hana)or die('cant juve');
       ?>
        
        
        
        
    </body>
</html>
