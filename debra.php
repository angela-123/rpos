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
            
            
            
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $item = $_POST['name'];
         $qty = $_POST['qty'];
         $recno = $_POST['recno'];
         $cashier = $_POST['cashier'];
         $shift = $_POST['shift'];
         $size = $_POST['sice'];
         $loc = $_POST['location'];
         
         $zest = "select * from positems where itemname = '$item'";
         
         $tred = mysql_query($zest);
         
         $caro = mysql_fetch_assoc($tred);
         
         
 
         
         $lrate = $caro['lrate'];
         $mrate = $caro['mrate'];
         $srate = $caro['srate'];
         $half = $caro['half'];
      
         if($size == 'Large')
         {
             $price = $lrate;
         
             
         }
         
         elseif ($size == 'Medium')
             {
         $price = $mrate;
     }
     
 elseif($size == 'Small') {
     
     $price = $srate;
         
     }
     
     
 else {
     
     $price = $half;
         
}
      
 


$mimi= "insert into trans(tdate,itemname,unitprice,qtyout,recno,cashier,location,shift,size)values(CURDATE(),'$item','$price','$qty','$recno','$cashier','$loc', '$shift', '$size')";


mysql_query($mimi);


         
         
         

         
        ?>
        
        <?php 
        $trek = "select CURDATE() As date";
        $era = mysql_query($trek);
        $rad = mysql_fetch_assoc($era);
        $tad = $rad['date'];
        
        //echo $tad;
        ?>
        
        
        <?php
        
        $des = "select itemname As name,SUM(qtyout)As qty,unitprice,SUM(qtyout) * unitprice As extended from trans where recno = '$recno' GROUP BY itemname";
        $tonu = "select SUM(qtyout * unitprice) As Total from trans where recno = '$recno'";
        $res = mysql_query($des) or die('cant query');
        $zash = mysql_query($tonu);
        
        $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $buns = mysql_num_fields($res);
                echo '<table id = diaga width = "80">';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'AJs' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Suite A1 A2 Shariff Plaza' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Aminu Kano Crescent' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Wuse 2,Abuja'.'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. '0803-314-0469,0705-7779-111' .'<nobr>';
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
                echo $tad;
                
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
