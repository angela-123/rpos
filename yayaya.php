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
                
                width: 80px;
                font-size: 1em;
                font-style:  italic;
                color: black;
            }
            
            td{
                
                border: 1px #888 solid;
            }
            
            #mookie{
                
                font-weight:  bolder;
                font-size: 1.3em;
            }
            
            p{
                
                text-align: justify;
                color: black;
                font-size: 1.2em;
            }
            
            nobr{
                font-size: 1.3em;
            }
            
            
            thead{
                
                text-align: center;
            }
            
            nobr{
                
                text-align:  center;
            }
            
            
            #lp{
                
                font-size: 1em;
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
        $cash = $_SESSION['username'];
        $waiter = $_POST['waiter'];
        $table = $_POST['table'];
        
        $ref = "select itemname,lrate from positems where itemname = '$pname'";
        $count = "select MAX(recno) as rec from receipts";
        $mek = "select * from proconfigs";
        
        $sop = "select curdate() as date";
        
        $zara = mysql_query($sop);
        
        $tara = mysql_fetch_assoc($zara);
        $date = $tara['date'];
        
        //$jason = mysql_query($mek);
        
        //$sala = mysql_fetch_assoc($jason);
        
        $add1 = $sala['address1'];
        $add2 = $sala['address2'];
        
        $kunt = mysql_query($count);
        $zow = mysql_fetch_assoc($kunt);
        $numb = $zow['rec'];
        
        $res = mysql_query($ref);
        
        $dow = mysql_fetch_assoc($res);
        
            $rate = $dow['lrate'];
        
 
 //$rate = $dep['rate'];
 //echo $rate;
        
        if($res)
        {
            //echo 'Records Retrived';
            //echo $rate;
        }
        
 else {
            echo 'Data Not Retrieved';
 }
 
 $ups = "insert into dailies(sdate,itemname,qtyout,cashier,unitprice,location,recno,tnumber,waiter)values(curdate(),'$pname','$qty','$cash','$rate', '$kloc', '$numb','$table','$waiter')";
 mysql_query($ups)or die('cant insert');
 
   $shit = 1;  
 $rtx = "select itemname,sum(qtyout) as qty  from dailies where recno = '$numb' and cashier!='' group by itemname";
 $tot = "select itemname, sum(qtyout * unitprice) as total from dailies where recno = '$numb' group by recno";
 $faith = "select sum(qtyout * unitprice) as totalsales from dailies where sdate = curdate() and recno = '$numb'";
 $mimi = "update receipts set status = 'orders',staff = '$cash' where recno = $numb";
 $mysales = mysql_query($faith);
 $dsales = mysql_fetch_assoc($mysales);
 $sales = $dsales['totalsales'];
  $rada = mysql_query($rtx) or die('cant query');
  $kada = mysql_query($tot) or die('query not');
  mysql_query($mimi);
  
  $rara = mysql_fetch_assoc($kada);
  $total = $rara['total'];
  echo $waiter;
  
                     $buns = mysql_num_fields($rada);
                echo '<table class ="table table-responsive table-bordered table-striped table-hover">';
                //echo '<thead>';
                //echo '<tr>';
                //echo '<td><nobr>' .$add1.'</nobr></td>';
                //echo '</tr>';
                
                //echo '<tr>';
                //echo '<td><nobr>' .$add2.'</nobr></td>';
                //echo '</tr>';
                
                //echo '</thead>';
                echo '<p>' .          'THE SECRET GARDEN'.'</p>';
                echo '<nobsp>';
               
                
                //echo '<p class = "lp">' .'OPP.SHARON ULTIMATE.'.'</p>';
                echo '<nobsp>';
                //echo '<p class = "lp">' .'AREA 3, GARKI'.'</p>';
                //echo '<p class = "lp">' .'08092919664,07063178485'.'</p>';
                echo '<p class= "lp">Waiter Name.........' .$waiter.'</p>';
                echo '<p class= "lp">Date.........' .$date.'</p>';
                
                 echo '<p>' .'CUSTOMER ORDER'.'</p>';
                 echo '<p>OREDER#....' .$numb.'</p>';
                
                
                
                echo '<tr>';
                
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
		echo '<td>';
		
		{
			echo '<nobr>'.$row2[$i] . '</nobr>';
		}
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
   // echo '<tr>';
   // echo '<td id = "mookie">';
    //echo 'Total Amount';
    //echo '</td>';
    
    //echo '<td>';
    //echo '<h3>'. number_format($total,2).'</h3>';
    //echo '</td>';
    
    
    //echo '</tr>';
    
   
     
    echo '</table>';
        
        ?>
        
       
    </body>
</html>
