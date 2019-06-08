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
         
         $dales = "select itemname,sum(qtyout) as qtyout,sum(qtyout) * unitprice as extended from trans where tdate = '$date' GROUP BY itemname";
         $gaha = mysql_query($dales);
         
         
                 //$res = mysql_query($juk);
        
                
                  $buns = mysql_num_fields($gaha);
                echo '<table id = diaga >';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($gaha, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($gaha))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		
		{        if(is_numeric($row2[$i]))
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
        
         
         
         
         
         
         $rt = "select SUM(qtyout * unitprice) as Totalsales from trans where tdate = '$date'";
         
         $zx = mysql_query($rt);
         $sales = mysql_fetch_assoc($zx);
         
         $tsales = $sales['Totalsales'];
         echo 'Total Sales For The Day       '   . number_format($tsales,2);
         echo '<hr>';
         echo 'Production Analysis For The Day';
         
         $prods = "select item,sum(qty)as qty from productions where date = '$date' GROUP BY item ";
         
         $res = mysql_query($prods);
         
         
                 //$res = mysql_query($juk);
        
                
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
		
		{      if(is_numeric($row2[$i]))
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
        
    echo '<hr>'; 
         
    $exp = "select costcenter,dsp as description,recby,sum(amount) as amount from expenses where date = '$date' GROUP BY costcenter";
    $texp = "select sum(amount) as Totalexpenses from expenses where date = '$date'";
    $cexp = mysql_query($texp);
    $rexp = mysql_fetch_assoc($cexp);
    $texpenses = $rexp['Totalexpenses'];
    //echo 'Total Expenses For The Day     '   .$texpenses;
    
    $det = mysql_query($exp);
    
    
            //$res = mysql_query($juk);
        
                
                  $buns = mysql_num_fields($det);
                echo '<table id = diaga title = "PIZZA LIST">';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($det, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($det))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		
		{      if(is_numeric($row2[$i]))
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
    
    
    //echo 'Total Expenses For The Day     '   .$texpenses;
     
    echo '</table>';
     echo 'Total Expenses For The Day     '   .number_format($texpenses,2);   
     echo '<hr>';
    
    
    $purch = "select item,qtyin,unitcost,qtyin * unitcost as amount from storetrans where date = '$date' and qtyin > 0";
    $tpurch =  "select sum(qtyin * unitcost) as totals from storetrans where date = '$date'";
    
    $zpurch =  mysql_query($tpurch);
    $rpurch = mysql_fetch_assoc($zpurch);
    $totpurch = $rpurch['totals'];
    
    $mypurch = mysql_query($purch);
    
    
    
            //$res = mysql_query($juk);
        
                
                  $buns = mysql_num_fields($mypurch);
                echo '<table id = diaga>';
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($mypurch, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($mypurch))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td>';
		
		{        if(is_numeric($row2[$i]))
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
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Purchases';
    echo '</td>';
    
    echo '<td>';
    echo number_format($totpurch,2);
    echo '</td>';
    
    echo '</tr>';
    
     
    echo '</table>';
    
    
        echo 'Total Purchases For The Day     '   .number_format($totpurch,2);
         
         
        ?>
    </body>
</html>
