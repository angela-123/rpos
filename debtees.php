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
         
         $date =$_POST['date'];
         $cname =$_POST['cname'];
         $damt = $_POST['damt'];
         
         $rdx = "insert into debts(date,debtor,amount,payment)values('$date','$cname','$damt',0)";
         
         $akara = mysql_query($rdx)or die('cant insert');
         
         
         $dxe = "select date,debtor,amount,payment from debts where debtor = '$cname'";
         
         $all = "select sum(amount) as amount,sum(payment) as payment from debts where debtor ='$cname'";
         
         $tar = mysql_query($all);
         $zad = mysql_fetch_assoc($tar);
         
         $amt = $zad['amount'];
         $pmt = $zad['payment'];
         
         $res = mysql_query($dxe);
         
                                     $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-hover table-striped table-bordered">';
                
                
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
    echo 'Total Debt';
    echo '</td>';
     echo '<td>';
    echo number_format($amt,2);
    echo '</td>';
    
    echo '</tr>';
     
    echo '</table>';
         
         
         
         
         
         
        ?>
    </body>
</html>
