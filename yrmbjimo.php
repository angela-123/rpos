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
            p{
                font-size: 1.3em;
                font-weight:  bolder;
            }
        </style>
    </head>
    <body>
        <?php
         $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $loc = $_POST['loc'];
         $yr = $_POST['yr'];
         
         $fed = "select itemname, SUM(qtyout) As qty,SUM(qtyout)*unitprice as ext from dailies where YEAR(sdate) = YEAR(CURDATE()) GROUP BY itemname";
         
         $sfed = "select itemname, qtyout,qtyout*unitprice as extended,location from dailies where  YEAR(sdate) = YEAR(CURDATE())";
         
         $jfed = "select itemname, qtyout,SUM(qtyout*unitprice) as extended from dailies where  YEAR(sdate) = YEAR(CURDATE()) GROUP BY itemname";
         
         
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
                echo '<table class = "table table-responsive">';
                
                 echo '<tr>';
                echo '<td>';
                echo 'SALES REPORT FOR';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $yr;
                echo '</td>';
                echo '</tr>';
                
                
                echo '<tr>';
                echo '<td>';
                echo 'Location';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $loc;
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
    
    while ($row = mysql_fetch_assoc($mk))
    {
        $tra = $tra + $row['extended'];
    }
      
   // echo 'Total Sales           '        . number_format($tra,2);
    
    
    $jxfed = "select itemname, SUM(qtyout) as qtyout,SUM(qtyout*unitprice) as extended,SUM(qtyout*unitprice)/$tra * 100 as perc from trans where location = '$loc' And YEAR(tdate) = YEAR(CURDATE()) GROUP BY itemname";
         
    $rack = mysql_query($jxfed);
    
    
                          
                  $buns = mysql_num_fields($rack);
                echo '<table id = diaga title = "DAY SALES">';
               
                
                
                echo '<tr>';
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rack, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rack))
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
    
    
    echo '<p>'. 'Total Sales           '        . number_format($tra,2) .'</p>';
    
        ?>
        
        
    </body>
</html>
