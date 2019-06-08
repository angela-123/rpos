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
                font-size: 1.1em;
                font-weight:  bold;
            }
            
            h4{
                
                font-weight:  bolder;
            }
        </style>
    </head>
    <body>
        <?php
         $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $cashier = $_POST['cashier'];
         
         //$fed = "select itemname as item,SUM(qtyout) As qty,SUM(qtyout)*unitprice as extended from trans where tdate = '$date' And location = '$loc' And qtyout > 0 and dtime <= curdate()+ '23:59:59' GROUP BY itemname";
         $fed = "select itemname as item,SUM(qtyout*mult) As qty,SUM(qtyout*mult*unitprice) as extended from lookup where cashier = '$cashier'  GROUP BY itemname";
         
         
         
         $sfed = "select itemname as item,qtyout ,qtyout*unitprice*mult  as extended from lookup    ";
         
         $jfed = "select itemname as item,qtyout ,SUM(qtyout*unitprice *mult) as extended from lookup  where and cashier = '$cashier' qtyout > 0 GROUP BY itemname";
         
         
         $mk = mysql_query($sfed);
         
         $res = mysql_query($fed);
         $tra= 0.0;
         
                     
         //echo $tra;  
         
         if($res)
         {
             //echo 'Sales Records Retrieved';
             //echo $date;
             //echo $loc;
         }
         
 else {
             echo 'Sales Records Not Retrieved';
      }
      
      
                      
                  $buns = mysql_num_fields($res);
                echo '<table id = diaga class = "table table-responsive table-striped">';
                echo '<tr>';
                echo '<td id = jili>';
                echo '<nobr>'. 'Total Sales By ' .'</nobr>';
                echo '</td>' ;
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $cashier;
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
    
    echo '<h4>'. 'Total Sales For The Day.......'        . number_format($tra,2) .'</h4>';
    
    
    $jxfed = "select itemname as item,size,SUM(qtyout) as qtyout,unitprice,SUM(qtyout*unitprice*mult) as extended,SUM(qtyout*unitprice*mult)/$tra * 100 as percentage from lookup where location = '$loc' GROUP BY itemname,size";
        
    $jaxfed = "select SUM(qtyout*unitprice) as TotalSales,SUM(qtyout*unitprice)/$tra * 100 as percentage,location from trans where  location = '$loc' GROUP BY ldate";
       
    //$dasg = mysql_query($jaxfed);
    
    //$rack = mysql_query($jxfed);
    
    
?>
    </body>
</html>
