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
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="libs/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
         $conn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos)or die('Cant connect');
        $pname = $_POST['pname'];
        $qty = $_POST['qty'];
        $kloc = $_SESSION['loc'];
        $waiter = $_POST['waiter'];
        $cashier = $_POST['cashier'];
        $tup = $_POST['topup'];
        $table = $_POST['table'];
        $disc = $_POST['disc'];
        
        $ref = "select itemname,lrate from positems where itemname = '$pname'";
        $count = "select MAX(recno) as rec from receipts";
        $mek = "select * from proconfigs";
        $zigi = "select curdate() as dat";
        $tim = "select curtime() as timer";
        $xate = mysql_query($zigi);
        $zate = mysql_fetch_assoc($xate);
        $mydate = $zate['dat'];
        $jason = mysql_query($mek);
        
        $timx = mysql_query($tim);
        
        $timz = mysql_fetch_assoc($timx);
        
        $mytime = $timz['timer'];
        //echo $mytime;
        $sala = mysql_fetch_assoc($jason);
        
        $add1 = $sala['address1'];
        $add2 = $sala['address2'];
        
        $kunt = mysql_query($count);
        $zow = mysql_fetch_assoc($kunt);
        $numb = $zow['rec'];
        
        $res = mysql_query($ref);
        
        $dow = mysql_fetch_assoc($res);
        
            $rate = $dow['lrate'];
        
            //echo $disc;
 //$rate = $dep['rate'];
 //echo $rate;
        
        //if($_SESSION['page'] !== 'admin' And $disc > 0)
        //{
            //echo 'Cant Discount';
           // return;
        //}
        
 
 
 $ups = "insert into trans(tdate,itemname,qtyout,unitprice,topup,location,recno,waiter,cashier,tnumber)values(curdate(),'$pname','$qty','$rate',  '$tup','$kloc', '$numb','$waiter','$cashier','$table')";
 $bank = "insert into lookup(ldate,itemname,qtyout,unitprice,location,recno,mult,ltime,waiter,cashier)values(curdate(),'$pname',1,'$rate','$kloc','$numb','$qty', now(),'$waiter','$cashier')";
 
 $foo = "insert into payments(pdate,itemname,qty,rate,cashier,waiter,refno,discount)values(curdate(),'$pname','$qty','$rate','$cashier','$waiter','$numb','$disc')";
         
        // mysql_query($foo) or die('No Payment');
 
 
 
 //mysql_query($ups)or die('cant insert');
 //mysql_query($bank) or die('Not inserted to lookup');
 
 $trate = $rate + $tup;
     
 $rtx = "select itemname as item,sum(qtyout) as qty,unitprice+ topup as rate,sum(qtyout * (unitprice+topup)) as extended from trans where recno = '$numb' group by itemname";
 $sicas = "update stock set stockqty = stockqty - $qty where itemname = '$pname' and location ='$kloc'";
 $tot = "select itemname, sum(qtyout * (unitprice+topup)) as total from trans where recno = '$numb' group by recno";
 $faith = "select sum(qtyout * (unitprice+topup)) as totalsales from trans where tdate = curdate() and recno = '$numb'";
 $mysales = mysql_query($faith);
 $dsales = mysql_fetch_assoc($mysales);
 $sales = $dsales['totalsales'];
 $date = $dsales['tdate'];
  $radaa = mysql_query($rtx) or die('cant query sales');
  $kada = mysql_query($tot) or die('query not');
  //mysql_query($sicas) or die('cant update stock table');
  
  $rara = mysql_fetch_assoc($kada);
  $total = $rara['total'];
  
  $derick = "select * from payments where cashier = '$cashier' and pdate = curdate()";
  
  $zat = mysql_query($derick);
  $runs = mysql_num_rows($zat);
  
  
  
  $xade = "select itemname,sum(qty) as qty,rate,sum(qty * rate )as extended from payments where refno ='$numb' group by itemname ";
  $rada = mysql_query($xade) or die('cant select');
  
  $pro = "select sum(qty * rate) as total,sum(discount) as discount from payments group by refno";
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
                echo '<li>Waiter..' .$waiter.'</li>' ;
                echo '<li>Recceipt#..' .$numb.'</li>' ;
                echo '<li>' .$mytime.'</li>' ;
                echo '<li>08060722177</li>' ;
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
