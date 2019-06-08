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
           diaga th{
                
                width: 650px;
            }
            
        </style>
    </head>
    <body>
        <?php
        $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $loc = $_POST['loc'];
         $xade = "select date,item,size,rate,location,qty from productions where location ='$loc' And date = '$date' And qty > 0";
         $res = mysql_query($xade);
         
         if($res)
         {
             echo 'Preview Productions';
         }
         
 else {
             echo 'No Preview';
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
		
		{       if(is_numeric($row2[$i]))
                {
			echo '<nobr>'. number_format($row2[$i],2) . '</nobr>';
		}
 else {
     echo '<nobr>'. $row2[$i] . '</nobr>';
 }
                }
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
     
    echo '</table>';
 
        ?>
    </body>
</html>
