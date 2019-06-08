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
            #diagaa{
                width: 250px;
            }
            
            th{
                text-align: left;
                font-style:  italic;
                font-weight:  normal;
                font-size: 0.95em;
            }
            
            td{
                border: 1px #aaa solid;
                font-style:  normal;
            }
            
            hr{
                border: 2px #080808 solid;
            }
            
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $maya = "select tdate, recno,rxt,staff,status from receipts where tdate = curdate() and status = 'orders'";
         $faya = "select sdate from dailies where sdate = curdate()";
         
         $slim = mysql_query($maya);
         
           $dex = "select * from dailies where sdate = curdate()  group by recno";
        $braxol = mysql_query($dex);
        
        $rum = mysql_num_rows($braxol);
         
         $kount = 0;
         while ($row = mysql_fetch_assoc($braxol))
         {
             $rcord = $row['recno'];
             $date = $row['tdate'];
             $kount+=1;
             $inner = "select  itemname,qtyout as qty,waiter from dailies where recno = $rcord and qtyout > 0";
             $des = "select itemname As name,SUM(qtyout)As qty,unitprice as rate,SUM(qtyout) * unitprice As extended from dailies where sdate = curdate() and recno = '$rcord'  GROUP BY itemname ORDER BY did";
             $tonu = "select SUM(qtyout * unitprice) As Total from dailies where recno = '$rcord'";
             $zash = mysql_query($tonu);
             $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $ups = "update receipts set rxt = 1";
        //mysql_query($ups);
             $res = mysql_query($inner);
             
             $royo = mysql_query($inner);
             $doyo = mysql_fetch_assoc($royo);
             $waiter = $doyo['waiter'];
             $cashier = $doyo['cashier'];
             $datew = $doyo['sdate'];
             
             
             
             
             
             $buns = mysql_num_fields($res);
                echo '<table id = diaga >';
                echo '<th id = uno>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'THE SECRET GARDEN' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'.'WUSE 2,ABUJA' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                echo '<tr>';
                echo '<td>';
                echo $datew;
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                //echo '<nobr>'. '08033140469' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Order#' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $rcord;
                echo '</td>';
                
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Waiter' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $waiter;
                echo '</td>';
                
                echo '</tr>';
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Date' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $date;
                
                echo '</td>';
                
                echo '</tr>';
                
                echo '</th>';
                
                
                
           
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
		echo '<nobr>'. number_format($row2[$i]).'</nobr>';
		}
		
		else 
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
        
	echo '</tr>';
        
    }
      
   
    
    echo '<tr>';
    echo '<tr>';
    echo '<td>';
    echo  'Thanks for your patronage';
    echo '</td>';
    echo '</tr>';
    //echo '</table>';
    echo '</th>';
    
    
    echo '</table>';
        
    echo '<hr>'  .'</hr>'; 
             
             
    echo 'Order No.' .$kount.'<br>';
    echo '<button>Served' .'</button>';
             
         }
         
        ?>
    </body>
</html>
