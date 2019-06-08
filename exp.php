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
            #diagafd{
                position:  absolute;
                left: 500px;
            }
        </style>
    </head>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $date = $_POST['date'];
         $cc = $_POST['cc'];
         $recby = $_POST['recby'];
         $dsc = $_POST['dsc'];
         $amt = $_POST['amt'];
         $loc = $_POST['loc'];
         
         $gej = "insert into expenses(location,date,costcenter,recby,dsp,amount)values('$loc',CURDATE(),'$cc','$recby','$dsc','$amt')";
         $rat = "select SUM(amount)as amount  from expenses where date = CURDATE()";
         //$zion = mysql_query($rat)or die('cant query');
         
         
         //$total = $doll['amount'];
         
         
         
         
         //$total = $roll;
         
         $baya = mysql_query($gej);
         $zion = mysql_query($rat)or die('cant query');
         $doll = mysql_fetch_assoc($zion);
         $total = $doll['amount'];
         if($baya)
         {
             echo 'Expenses Updated';
             //echo $loc;
         }
         
 else {
             echo 'Expenses Not Inserted';
 }
 
 
         
        ?>
        
        <?php
        
        
        
        $udi = "select date,costcenter,recby as receivedby,dsp as description,amount from expenses where date = CURDATE()";
 $res = mysql_query($udi);
 
 
 
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
			echo '<nobr>'.$row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Expenses For The Day';
    echo '</td>';
    
    echo '<td>';
    echo number_format($total,2);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
        ?>
        
        
    </body>
</html>
