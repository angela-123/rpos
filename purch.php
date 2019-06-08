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
                
                
                font-size: 1em;
                font-style: normal;
                color: black;
                text-align:  center;
            }
            
            td{
                
                border: 1px #888 solid;
                font-size: 1em;
                font-weight:  bold;
            }
            
            p{
                
                text-align:center;
                color:  #000066;
                font-size: 1.2em;
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
        $pname = $_POST['item'];
        $qty = $_POST['qty'];
        $kloc = $_SESSION['loc'];
        $ucost = $_POST['ucost'];
        $loc = $_POST['loc'];
        
        $ref = "select itemname,lrate from positems where itemname = '$pname'";
        $count = "select MAX(recno) as rec from receipts";
        $mek = "select * from proconfigs";
        
        $jason = mysql_query($mek);
        
        $sala = mysql_fetch_assoc($jason);
        
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
            //echo 'Records updated';
            //echo $rate;
        }
        
 else {
            echo 'Data Not Retrieved';
 }
 
 $ups = "insert into trans(tdate,itemname,qtyin,unitcost,location,recno)values(curdate(),'$pname','$qty','$ucost', '$kloc', 621)";
 mysql_query($ups)or die('cant insert');
 
     
 $rtx = "select itemname,sum(qtyin) as qty,unitcost,location,sum(qtyin * unitcost) as extended  from trans where tdate = curdate() and qtyin > 0 group by itemname";
 $sicas = "update stock set stockqty = stockqty + $qty where itemname = '$pname' and location = '$loc'";
 $tot = "select sum(qtyin * unitcost) as total from trans where tdate = curdate() group by curdate()";
 $faith = "select sum(qtyout * unitcost) as totalsales from trans where tdate = curdate()";
 $month = "select sum(qtyin * unitcost) as total from trans";
 $mysales = mysql_query($faith);
 $dsales = mysql_fetch_assoc($mysales);
 $sales = $dsales['totalsales'];
  $rada = mysql_query($rtx) or die('cant query');
  $kada = mysql_query($tot) or die('query not');
$zest =  mysql_query($sicas) or die('cant update stock table');
  
  if($zest)
  {
      echo 'Purchases';
  }
  
 else {
     
      echo 'Records Not Updated';
      
}
  
  $rara = mysql_fetch_assoc($kada);
  $total = $rara['total'];
  
  
                     $buns = mysql_num_fields($rada);
                echo '<table id = diaga class = "table table-responsive table-striped">';
                //echo '<thead>';
                //echo '<tr>';
               // echo '<td><nobr>FoodStop</nobr></td>';
                //echo '</tr>';
                
                //echo '<tr>';
                //echo '<td><nobr>DBM Plaza</nobr></td>';
                //echo '</tr>';
                
                //echo '</thead>';
                //echo '<p>FoodStop</p>';
                //echo '<nobsp>';
                //echo '<p>DBM Plaza,Wuse Zone 1</p>';
                
                
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
    echo '<tr>';
    echo '<td>';
    echo 'Total';
    echo '</td>';
    
    echo '<td>';
    echo '<h3>'. number_format($total,2).'</h3>';
    echo '</td>';
    
    
    echo '</tr>';
    
    
     
    echo '</table>';
   
    
        ?>
        
        
    </body>
</html>
