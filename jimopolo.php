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
         $loc = $_POST['loc'];
         $yr = $_POST['yr'];
         
         $fed = "select itemname,SUM(qtyout) As qty,SUM(qtyout*unitprice) as extended from dailies where MONTHNAME(sdate) = '$date' And YEAR(sdate) = '$yr'  GROUP BY itemname";
         
         $sfed = "select itemname,sum(qtyout) as qtyout,sum(qtyout*unitprice ) as extended from dailies where MONTHNAME(sdate) = '$date' And YEAR(sdate) = '$yr'  group by itemname ";
         
         $jfed = "select itemname,qtyout,SUM(qtyout*unitprice) as extended from dailies where MONTHNAME(tdate) = '$date' And YEAR(sdate) = '$yr' GROUP BY itemname";
         
         
         $mk = mysql_query($sfed);
         
         $res = mysql_query($fed);
         $tra= 0.0;
         
                     
         //echo $tra;  
         
         if($res)
         {
             echo 'Sales Records Retrieved';
             //echo $date;
             //echo $loc;
         }
         
 else {
             echo 'Sales Records Not Retrieved';
      }
      
      
                      
                  $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered">';
                echo '<tr>';
                echo '<td>';
                echo $date;
                echo '</td>';
                
                echo '<td>';
                echo $yr;
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
      
    //echo 'Total Sales           '        . number_format($tra,2);
    
    
    $jxfed = "select itemname,size,SUM(qtyout) as qtyout,SUM(qtyout*unitprice) as ext,SUM(qtyout*unitprice)/$tra * 100 as perc from trans where MONTHNAME(tdate) = '$date' And YEAR(tdate) = '$yr' and location = '$loc'  GROUP BY itemname,size";
        
    $jaxfed = "select location, SUM(qtyout*unitprice) as TotalSales,SUM(qtyout*unitprice)/$tra * 100 as perc from trans where MONTHNAME(tdate) = '$date' And YEAR(tdate) = '$yr' and location = '$loc'  GROUP BY location";
       
    $dasg = mysql_query($jaxfed);
    
    $rack = mysql_query($jxfed);
    
    
 
    
    
    

    
    echo '<h3>' .'Grand Total Sales           '        . number_format($tra,2) .'</h3>';
    
    
    
        ?>
        
        
    </body>
</html>
