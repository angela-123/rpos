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
         
         $zaq = "select costcenter,sum(amount) as amount from expenses where year(date) ='$yr' group by costcenter";
         $taq = "select SUM(amount) as Amount from expenses where  year(date) ='$yr'";
         
         $iran = mysql_query($taq);
         $dow = mysql_fetch_assoc($iran);
         $total = $dow['Amount'];
         $res = mysql_query($zaq);
         
         if($res)
         {
             echo 'Preview Expenses';
         }
         
 else {
             echo 'No Preview';
 }
 
 
 
 $buns = mysql_num_fields($res);
                echo '<table id = diaga  class = "table table-responsive table-bordered table striped">';
                
               
                
                
                
                
                
           
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
		if(is_numeric($row2[$i]))
		{
		echo number_format( $row2[$i],2);
		}
		
		else 
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
        
	echo '</tr>';
        
    }
      
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Expenses';
    echo '</td>';
    echo '<td>';
    echo number_format($total,2);
    echo '</td>';
    
    echo '</tr>';
	
    
    
    echo '</table>';
 
         
        ?>
    </body>
</html>
