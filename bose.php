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
            th{
                
                
                font-size: 1.2em;
                font-style: normal;
                color: black;
            }
            
            td{
                
                border: 1px #888 solid;
                font-size: 10pt;
                font-weight:  bolder;
            }
            
            #lag{
                font-size: 1.5em;
                font-weight: bolder;
            }
            
            #laga{
                
                font-style: italic;
            }
            
            .muje{
                
                font-size: 1.1em;
            }
            
            li{
                
                text-align:center;
                color: black;
                font-size: 1.3em;
                list-style:  none;  
            }
            
            thead{
                
                text-align: left;
            }
            
            nobr{
                
                text-align:  center;
            }
            
            h2x{
                
                position: absolute;
                bottom: 20px;
                left:  600px;
            }
            
            #diaga{
                alignment-baseline:  middle;
            }
        </style>
        
                       <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $recno = $_POST['recno'];
         $cashier = $_POST['cashier'];
         $xade = "select itemname,sum(qty) as qty,rate,sum(qty * rate )as extended from payments where refno ='$recno' group by itemname ";
  $rada = mysql_query($xade) or die('cant select');
  
  $pro = "select sum(qty * rate) as total,sum(discount) as discount from payments where refno = '$recno'";
         $go = mysql_query($pro);
         
         $ru = mysql_fetch_assoc($go);
         
         $altotal= $ru['total'];
         $disk = $ru['discount'];
  
  
  
  
                     $buns = mysql_num_fields($rada);
                echo '<table id = diagac>';
                //echo '<thead>';
                //echo '<tr>';
               // echo '<td><nobr>FoodStop</nobr></td>';
                //echo '</tr>';
                
                //echo '<tr>';
                //echo '<td><nobr>DBM Plaza</nobr></td>';
                //echo '</tr>';
                
                //echo '</thead>';
                echo '<ul align = "left">';
                echo '<li id = "lag">THE SECRET GARDEN</li>';
                //echo '<li id = "laga">WINE & BAR</li>';
                echo '<nobsp>';
                //echo '<li>Opp. Sharon Ultimate Hotels</li>';
                //echo '<li>Area 3,Garki,Abuja</li>';
                //echo '<li>ABUJA</li>';
                //echo '<li>' .'08099388887,07032305841'.'</li>';
                echo '<li>' .$mydate.'</li>' ;
                echo '<li>Cashier..' .$cashier.'</li>' ;
                //echo '<li>Waiter..' .$waiter.'</li>' ;
                echo '<li>Recceipt#..' .$recno.'</li>' ;
                echo '<li>' .$mytime.'</li>' ;
                echo '<li>08060722177</li>' ;
                echo '<li>DUPLICATE RECEIPT</li>' ;
                echo '</ul>';
                
                
                //echo '<tr>';
                
                //echo '<tr>';
                //echo '<td>';
                //echo 'Cashier';
                //echo '</td>';
                //echo '<td>';
                
                //echo $cashier;
               // echo '</td>';
               // echo '</tr>';
                
                
                
                
                //echo '<tr>';
                //echo '<td>';
                //echo 'Waiter';
                //echo '</td>';
                //echo '<td>';
                
                //echo $waiter;
                //echo '</td>';
                //echo '</tr>';
                
                
                //echo '<tr>';
                //echo '<td>';
                //echo 'Receipt#';
                //echo '</td>';
                //echo '<td>';
                
                //echo $numb;
                //echo '</td>';
                //echo '</tr>';
                
                
                
                
                
                
for($i = 0;$i<$buns;$i++)
{
	echo '<th>' .mysql_field_name($rada, $i).'</th>';
}
echo '</tr>';

while ($row2 = mysql_fetch_row($rada))
{
	echo '<tr>';
	
	for($i = 0;$i<$buns;$i++)
	
	{
		echo '<td> ';
		
		{
			echo '<nobr>'.$row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
    echo '<tr>';
    echo '<td>';
    echo 'Total';
    echo '</td>';
    
    echo '<td>';
    echo '<h3>'. number_format($altotal,2).'</h3>';
    echo '</td>';
    
    echo '</tr>';
    //echo '<td>';
    //echo 'Discount';
    //echo '</td>';
    
    //$tpay = $altotal - $disc;
    //echo '<td>';
    //echo '<h3>'. number_format($disc,2).'</h3>';
    //echo '</td>';
    
    
    //echo '<tr>';
    //echo '<td>';
    //echo 'Total Bill';
    //echo '</td>';
    
    //echo '<td>';
    //echo '<h3>'. number_format($tpay,2).'</h3>';
    //echo '</td>';
    
    
    
    
    
    //echo '</tr>';
    
    
     
    echo '</table>';
    echo '<li class = "muje">Inclusive Of 5% Vat</li>';
    echo '<li class = "muje">Thanks for your patronage</li>';
    echo '<li class = "muje">Please call again</li>';
        
        
         
         
        ?>
    </body>
</html>
