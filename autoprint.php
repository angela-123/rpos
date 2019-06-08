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
        mysql_select_db(salem)or die('Cant connect');
        
        $cax = "select rdate from dacts where rdate between '2015-02-01' and '2015-02-28' group by rdate";
        
        $rax = mysql_query($cax);
        
        while ($row = mysql_fetch_assoc($rax))
        {
            
            $datr = $row['rdate'];
            $eda = "select distinct(billhead.surname) As GuestName,accommodation.charge as RoomRate,billhead.acdtn as RoomType,billhead.wkdisc as WeekEndDiscount,billhead.wkdisc * accommodation.charge*0.01 as Discount,accommodation.charge - billhead.wkdisc*accommodation.charge*0.01 as AmountPaid from billhead,accommodation where accommodation.acdtn = billhead.acdtn  and  tdate = '$datr' group by billhead.surname";
            
            $rada = mysql_query($eda) or die('cant query3');
            
            
                                      $buns = mysql_num_fields($rada);
                echo '<table id = diaga class =  table-responsive table-striped>';
                echo '<tr>';
                echo '<td>';
                echo 'Daily Sales Report';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo 'Date';
                echo '</td>';
                
                echo '<td>';
                echo $datr;
                echo '</td>';
                
                
                echo '</tr>';
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rada, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rada))
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
    
    
    
    
    
    
    //echo '<tr>';
    //echo '<td class = hi>';
    //echo 'Total Deposit For The Day';
    //echo '</td>';
    //echo '<td class = hi>';
    //echo number_format($payments,2);
    //echo '</td>';
   // echo '</tr>';
    
    //echo '<tr>';
    //echo '<td class = hi>';
    //echo 'Total No.Of Guests';
    //echo '</td>';
    //echo '<td class = hi>';
    //echo number_format($trow);
    //echo '</td>';
    //echo '</tr>';
    
   
    $bal = $tbill - $payments;
    
    
    echo '<tr>';
    echo '<td class = hi>';
    echo 'Total Sales For The Day';
    echo '</td>';
    echo '<td class = hi>';
    echo number_format($roni,2);
    echo '</td>';
    echo '</tr>';
    
    
     
    echo '</table>';
 
             
         
            
            
        
        }
        
        ?>
    </body>
</html>
