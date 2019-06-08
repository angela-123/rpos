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
                font-size: 1.1em;
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
                
                font-size: 1.2em;
            }
            
            li{
                
                text-align:center;
                color:black;
                font-size: 1.3em;
                list-style:  none; 
                font-weight: bolder;
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
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $recno = $_POST['recno'];
         $item = $_POST['item'];
         $recn = 1 +$recno;
         $waiter = $_POST['waiter'];
         $trim = "select curtime() as timme";
         $rt = mysql_query($trim);
         $ret = mysql_fetch_assoc($rt);
         $timxx = $ret['timme'];
         //echo $timxx;
         $we = "select * from payments where refno = '$recn' and itemname = '$item'";
         $laf = mysql_query($we);
         $nono = mysql_fetch_assoc($laf);
         
         $qty = $nono['qty'];
         
         $yups = "update stock set stockqty = stockqty + $qty where itemname = '$item'" ;
         //mysql_query($yups) or die('cant update stock');
         
         $raq = "delete from payments where itemname = '$item'and refno = '$recn'";
         
         $lk = "delete from lookup where itemname = '$item' and recno = '$recn'";
         $pk = "delete from sales where itemname = '$item' and refno = '$recn'";
         
         mysql_query($lk) or die('cant look up');
         mysql_query($pk) or die('cant sales');
         
         if(mysql_query($raq))
         {
             //echo '<h4>Sale Deleted</h4>';
             //echo $recno;
         }
         
         if($tvt = "vat")
            {
                $vatt = 0.05;
            }

            else{
                $vatt = 0.0;
            }

        
            if($tserv = "service charge")
            {
                $service = 0.05;
            }

            else{

                $service = 0.5;
            }





         
         $trx = "select itemname,sum(qty) as qty,rate,sum(qty * rate) as extended from payments where refno = '$recn' group by itemname";
         $sax = "select sum(qty * rate) as total from payments where refno = '$recn'";
         
         $st = mysql_query($sax);
         
         $dol = mysql_fetch_assoc($st);
         
         $total = $dol['total'];

         $vattotal = $total * $vatt;
         $disk = $ru['discount'];
         $tservtotal = $total * $service;
         $gtotal = $total + $vattotal + $tservtotal;
         
         $res = mysql_query($trx) or die('cant select');
         
         
         
                                                    $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped">';
                
                 echo '<ul align = "left">';
                echo '<li class = "lag">WAFFLE STOP</li>';
                 echo '<li class = "lag">45,Gana Street,Maitama</li>';
                echo '<li class ="lag">Abuja</li>';
                
                   
                //echo '<li class ="lag">Royal Indomie Road</li>';
                //echo '<li class ="lag">Gaduwa,Abuja</li>';
                //echo '<nobsp>';
                //echo '<li class ="lag">NassarawaState</li>';
                echo '<li class ="lag">08166804309</li>';
                //echo '<li>Area 3,Garki,Abuja</li>';
                //echo '<li>ABUJA</li>';
                //echo '<li>' .'08099388887,07032305841'.'</li>';
                echo '<li class = "tidi"> Date............' .$dat.'Receipt#..............'.$recno ;
                echo '<li class = "tidi">Cashier :' .$cashier.' :Waiter  :'.$waiter ;
                //echo '<li>Waiter..' .$waiter.'</li>' ;
                //echo '<li class = "tidi">Receipt#..' .$recno.'</li>' ;
                echo '<li class = "tidi">' .$mytime.'</li>' ;
                //echo '<li class = "tidi">08033906302</li>' ;
                echo '</ul>';
                echo '</ul>';
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
		
		{
			echo '<nobr>'. $row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }


    echo '<tr>';
    echo '<td>';
    echo 'Total Vat';
    echo '</td>';
    
    echo '<td>';
    echo number_format($vattotal,2);
    echo '</td>';
    
    echo '</tr>';


    echo '<tr>';
    echo '<td>';
    echo 'Service Charge';
    echo '</td>';
    
    echo '<td>';
    echo number_format($tservtotal,2);
    echo '</td>';
    
    echo '</tr>';


    echo '<tr>';
    echo '<td>';
    echo 'Sub-Total';
    echo '</td>';
    
    echo '<td>';
    echo number_format($total,2);
    echo '</td>';
    
    echo '</tr>';




     
    echo '<tr>';
    echo '<td>';
    echo 'Total';
    echo '</td>';
    echo '<td>';
     echo '<h3>'. number_format($gtotal,2).'</h3>';
    echo '</td>';
    echo '</tr>';
    
    
    echo '</table>';
        
    
 
         echo '<li class = "muje">Inclusive Of 5% Vat</li>';
    echo '<li class = "muje">Thanks for your patronage</li>';
    echo '<li class = "muje">Please call again</li>';
    
    
        ?>
    </body>
</html>
