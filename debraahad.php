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
            #ul{
                width: 250px;
            }
            
            #thd{
                width: 245px;
            }
            
            p{
                position: relative;
                display:  inline;
                background:  #dff0d8;
               padding:3px 8px;
                border:0px #bfbfbf solid;
                width: 120px;
                
            }
            
            #game{
                width: 80px;
            }
            
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
         $mult = $_POST['mult'];
         
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
      
 


$mimi= "insert into trans(tdate,itemname,unitprice,qtyout,recno,cashier,location,shift,size,mult)values(CURDATE(),'$item','$price','$qty','$recno','$cashier','$loc', '$shift', '$size','$mult')";


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
        
        $des = "select itemname As name,SUM(qtyout*mult)As qty,unitprice as rate,SUM(qtyout*mult) * unitprice As extended from trans where recno = '$recno' GROUP BY itemname ORDER BY trid";
        $tonu = "select SUM(qtyout * unitprice * mult) As Total from trans where recno = '$recno'";
        $res = mysql_query($des) or die('cant query');
        $zash = mysql_query($tonu);
        
        $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $buns = mysql_num_fields($res);
                echo '<section id = diaga>';
                
                
                
                
                
                
                
                
           
               // echo '<ul>';
for($i = 0;$i<$buns;$i++)
{
	echo '<p id = game>' .mysql_field_name($res, $i).'</p>';
        //echo '<br>';
}
echo '<br>';
//echo '</ul>';
//echo '<ul>';
while ($row2 = mysql_fetch_row($res))
{
	//echo '<ul>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<p>';
		if(is_numeric($row2[$i]))
		{
		echo  number_format($row2[$i]);
                //echo '<br>';
		}
		
		else 
		{
			echo  $row2[$i];
                       // echo '<br>';
		}
	}   echo '</p>';
        
echo '<br>';
        
    }
    
    //echo '</ul>';
      
    
    echo number_format($finalsales,2);
    echo '</section>';
    
    
    
    //echo '</table>';
        
        
        
        
        
        ?>
    </body>
</html>
