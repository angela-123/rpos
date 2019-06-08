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
            }
            
            td{
                border: 1px #aaa solid;
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
         $cashier = $_POST['cashier'];
         $waiter = $_POST['waiter'];
         //$cashier = $_SESSION['username'];
         $maya = "select tdate, recno,rxt,staff from receipts where tdate = curdate() and status = 'orders'";
         
         $slim = mysql_query($maya);
         $ray = mysql_fetch_assoc($slim);
         
         $date = $ray['tdate'];
         
         
         
         $cashier = $_SESSION['username'];
         
         $dex = "select * from dailies where sdate = curdate() and cashier = '$cashier' and waiter = '$waiter' group by recno";
        $braxol = mysql_query($dex);
        
        $rum = mysql_num_rows($braxol);
            $tax = 0;
        while ($daya = mysql_fetch_assoc($braxol))
                
                
             
        {
            $rec = $daya['recno'];
             $inner = "select did, itemname,unitprice,qtyout,qtyout * unitprice as total from dailies where recno = '$rec' and cashier = '$cashier' and waiter = '$waiter'";
             $des = "select itemname As name,SUM(qtyout)As qty,unitprice as rate,SUM(qtyout) * unitprice As extended from dailies where sdate = curdate() and recno = '$rcord' and cashier = '$cashier' GROUP BY recno ORDER BY did";
             $tonu = "select SUM(qtyout * unitprice) As Total from dailies where recno = '$rec' and cashier = '$cashier'";
             $zash = mysql_query($tonu);
             $fun = mysql_fetch_assoc($zash);
        $finalsales = $fun['Total'];
        $ups = "update receipts set rxt = 1";
        //mysql_query($ups);
             $res = mysql_query($inner);
             
             
             
             $buns = mysql_num_fields($res);
                echo '<table class ="table table-responsive table-hover table-striped">';
                echo '<th id = uno>';
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'THE SECRET GARDEN' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                //echo '<tr>';
                //echo '<td>';
                //echo '<nobr>'.'OPP. GLO OFFICE' .'<nobr>';
                //echo '</td>';
                //echo '</tr>';
                
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Wuse 2,Abuja'.'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                //echo '<nobr>'. '08033140469' .'<nobr>';
                echo '</td>';
                echo '</tr>';
                
                
                
                
                
                echo '<tr>';
                echo '<td>';
                echo '<nobr>'. 'Table#' .'<nobr>';
                echo '</td>';
                
                echo '<td>';
                echo $rec;
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
    echo '<td>';
    echo '<nobr>'. 'Total For Receipt' .'</nobr>';
    echo '</td>';
    
    echo '<td>';
    echo number_format($finalsales,2);
    echo '</td>';
    
    echo '</tr>';
    
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
             
             
             
             
         
        }    
        ?>
    </body>
</html>
