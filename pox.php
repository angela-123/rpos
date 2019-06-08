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
         $conn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos)or die('Cant connect');
        $pname = $_POST['item'];
        $qty = $_POST['qty'];
        
        $kloc = $_SESSION['loc'];
        
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
            
            
            $ups = "insert into trans(tdate,itemname,qtyout,unitprice,location,recno)values(curdate(),'$pname','$qty','$rate', '$kloc', '$numb')";
            mysql_query($ups)or die('cant insert');
            
            
            $rtx = "select itemname,sum(qtyout) as extended,unitprice,sum(qtyout * unitprice) as extended  from trans where recno = '$numb' group by itemname";
 $tot = "select itemname, sum(qtyout * unitprice) as total from trans where recno = '$numb' group by recno";
 $faith = "select sum(qtyout * unitprice) as totalsales from trans where tdate = curdate() and recno = '$numb'";
 $mysales = mysql_query($faith);
 $dsales = mysql_fetch_assoc($mysales);
 $sales = $dsales['totalsales'];
  $rada = mysql_query($rtx) or die('cant query');
  $kada = mysql_query($tot) or die('query not');
  
  $rara = mysql_fetch_assoc($kada);
  $total = $rara['total'];
  
  
                     $buns = mysql_num_fields($rada);
                echo '<table id = diaga>';
                echo '<thead>';
                echo '<tr>';
                echo '<td><nobr>FoodStop</nobr></td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td><nobr>Opposite Glo Office</nobr></td>';
                echo '</tr>';
                
                echo '</thead>';
                echo '<p>Wuse Zone 3,Abuja</p>';
                echo '<nobsp>';
                echo '<p>' .$add2.'</p>';
                
                
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
