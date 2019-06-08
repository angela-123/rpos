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
         
         $fed = "select tdate as date,itemname,size,SUM(qtyout * mult) As qty,unitprice,SUM(qtyout * mult)*unitprice as extended from trans where tdate = '$date' And location = '$loc'  GROUP BY itemname,size";
         
         $sfed = "select tdate as date,itemname,qtyout * mult as qtyout,unitprice,qtyout*unitprice * mult as extended from trans where tdate = '$date' And location = '$loc' ";
         
         $jfed = "select tdate as date,itemname,size,qtyout * mult,unitprice,SUM(qtyout*unitprice * mult) as extended from trans where tdate = '$date' And location = '$loc' GROUP BY itemname,size";
         
         
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
                echo '<table id = diaga title = "DAY SALES">';
                
                
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
			echo '<nobr>'. number_format($row2[$i]) . '</nobr>';
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
      
    echo 'Total Sales           '        . number_format($tra,2);
    
    
    $jxfed = "select tdate as date,itemname,size,SUM(qtyout * mult) as qtyout,unitprice,SUM(qtyout*unitprice*mult) as extended,SUM(qtyout*unitprice*mult)/$tra * 100 as percentage from trans where tdate = '$date' And location = '$loc' GROUP BY itemname,size";
        
    $jaxfed = "select tdate as date,SUM(qtyout*unitprice * mult) as TotalSales,SUM(qtyout*unitprice * mult)/$tra * 100 as percentage,location from trans where tdate = '$date'  And location = '$loc' GROUP BY tdate";
       
    $dasg = mysql_query($jaxfed);
    
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
    
    
    
                      $bunns = mysql_num_fields($dasg);
                echo '<table id = diaga title = "DAY SALES">';
                
                
                echo '<tr>';
                
for($i = 0;$i<$bunns;$i++)
{
	echo '<th>' .mysql_field_name($dasg, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($dasg))
{
	echo '<tr>';
	
	for($i = 0;$i<$bunns;$i++)
	
	{
		echo '<td>';
		
		{         if(is_numeric($row2[$i]))
                {
			echo '<nobr>'.number_format($row2[$i],1) . '</nobr>';
		}
                
 else {
     echo '<nobr>'. $row2[$i] . '</nobr>';
 }
                }
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
     
    echo '</table>';
    
    
    echo 'Total Sales           '        . number_format($tra,2);
    
    
        ?>
        
        
    </body>
</html>
