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
        $yas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pos);
         
          $dey = "select pcode,pname,rate from products where pcode = '$name'";
          
          $cax = mysql_query($dey);
          $zamp = mysql_fetch_assoc($cax);
          
          $codename = $zamp['pname'];
          $rate = $zamp['rate'];
          $recno = $_POST['recno'];
          $cashier = $_POST['cashier'];
         
         $name = $_POST['name'];
         //$price = $_POST['price'];
         $qty = $_POST['qty'];
         
         $mili = "insert into dailies(rdate,pcode,qtyout,unitprice,cashier,recno)values(CURDATE(),'$name','$qty','$rate','$cashier','$recno')";
         
         if(mysql_query($mili))
         {
             echo '';
         }
         
 else {
     
             echo 'Not Inserted';
 }
        ?>
        
        <?php
        
        $des = "select pcode As name,SUM(qtyout)As qty,unitprice,SUM(qtyout) * unitprice As extended from dailies where recno = '$recno' GROUP BY pcode";
        $tonu = "select SUM(qtyout * unitprice) As Total from dailies where recno = '$recno'";
        $res = mysql_query($des) or die('cant query');
        $zash = mysql_query($tonu);
        
        $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "Preview Job" width = "80">';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'DEMO RESTAURANT' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Receipt#' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $recno;
                echo '</td>';
                
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Cashier' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $cashier;
                echo '</td>';
                
                echo '</tr>';
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Date' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                
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
    echo '<nobr>'. 'Total For Receipt' .'</nobr>';
    echo '</td>';
    
    echo '<td>';
    echo number_format($finalsales,2);
    echo '</td>';
    
    echo '</tr>';
    
    //echo '</table>';
	
    
    
    echo '</table>';
        
        ?>
    </body>
</html>
