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
            th{
                text-align:  left;
                font-size: 10pt;
                color:  darkblue;
                width: 550px;
            }
            
            td{
                font-size: 9pt;
                color:  #149bdf;
                font-weight: normal;
            }
        </style>
    </head>
    <body style=" background:  #5bc0de;">
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $itemname = $_POST['itemname'];
         $large = $_POST['large'];
         $medium = $_POST['medium'];
         $small = $_POST['small'];
         $details = $_POST['details'];
         $etop = $_POST['etop'];
         
         $yes = "insert into positems(itemname,lrate,mrate,srate,half,details)values('$itemname','$large','$medium','$small','$etop',   '$details')";
         
         if(mysql_query($yes))
             
         {
             echo 'Records Inserted';
         }
         
 else {
             echo 'Data Not Inserted';
 }
         
        ?>
        
        
        <?php
        
        $juk = "select * from positems";
        
        $res = mysql_query($juk);
        
                
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
