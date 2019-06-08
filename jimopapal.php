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
                
                font-size: 1.3em;
                font-weight: bold;
                font-style: italic;
            }


            th{
                font-size:1.4em;
                font-weight:bold;
                font-style:italic;
            }
            
            h4{
                font-size: 1.2em;
                font-weight: bold;
                font-style:  italic;
            }
        </style>
    </head>
    <body>
        <?php
         $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $endate = $_POST['endate'];
         
         //$fed = "select itemname as item,SUM(qtyout) As qty,SUM(qtyout)*unitprice as extended from trans where tdate = '$date' And location = '$loc' And qtyout > 0 and dtime <= curdate()+ '23:59:59' GROUP BY itemname";
         $fed = "select itemname as item,SUM(qtyout *mult) As qty,SUM(qtyout*unitprice *mult) as extended from dailies where sdate between '$date' And '$endate' GROUP BY itemname";
         
         $scharge = "select sum(qtyout * unitprice * qtyout * mult * scharge) as charge from dailies where sdate between '$date' And '$endate'";
         
         $sfed = "select itemname as item,qtyout ,sum(qtyout*unitprice * mult)  as extended from dailies where sdate between '$date' and '$endate'   group by itemname ";
         
         $jfed = "select itemname as item,qtyout ,SUM(qtyout*unitprice *mult )as extended from dailies where sdate between '$date' And '$endate' And qtyout > 0 GROUP BY itemname";
         
         $rold = mysql_query($sfed);
         $tsales = mysql_fetch_assoc($rold); 
          
         $totals = $rold['extended'];
         //echo $totals;
         
         $mk = mysql_query($sfed);
         
         $res = mysql_query($fed);
         $tra= 0.0;
         $ch = mysql_query($scharge) or die('cant sum');
         $chx = mysql_fetch_assoc($ch);
         $tcharge = $chx['charge'];
                     
         //echo $tra;  
         
         if($res)
         {
             echo '<h2>Sales Records Retrieved</h2>';
             //echo $date;
             //echo $loc;
         }
         
 else {
             echo 'Sales Records Not Retrieved';
      }
      
      
                      
                  $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-hover table-bordered">';
                echo '<tr>';
                echo '<td id = jili>';
                echo '<nobr><h4>'. 'Total Sales Between' .'</h4></nobr>';
                echo '</td>' ;
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $date;
                echo '    And   ';
                echo $endate;
                echo '</td>';
                
                
                


                echo '</tr>';
                
                
                
                
                
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
		
		{     if(is_numeric($row2[$i]))
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
    
    while ($row = mysql_fetch_assoc($mk))
    {
        $tra = $tra + $row['extended'];
    }
    
    $vat = 0.05 * $tra;
    $exvat = $tra + $vat +$tcharge;
    
    echo '<h4>'. 'Total Sales For The Day Exclusive of  Vat/ Service Charge.......'        . number_format($tra,2) .'</h4>';
    echo '<h4>'. 'Total Vat For The Day.......'        . number_format($vat,2) .'</h4>';
    echo '<h4>'. 'Total Service For The Day.......'        . number_format($tcharge,2) .'</h4>';
    echo '<h4>'. 'Total Sales For The Day Inclusive Of Vat/Service charge.......'        . number_format($exvat,2) .'</h4>';
    
    
    $jxfed = "select itemname as item,size,SUM(qtyout) as qtyout,unitprice,SUM(qtyout*unitprice*mult) as extended,SUM(qtyout*unitprice*mult)/$tra * 100 as percentage from trans where tdate = '$date' And location = '$loc' GROUP BY itemname,size";
        
    $jaxfed = "select SUM(qtyout*unitprice) as TotalSales,SUM(qtyout*unitprice)/$tra * 100 as percentage,location from trans where tdate = '$date'  And location = '$loc' GROUP BY tdate";
       
    //$dasg = mysql_query($jaxfed);
    
    //$rack = mysql_query($jxfed);
    
    
?>
    </body>
</html>
