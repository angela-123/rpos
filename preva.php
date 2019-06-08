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
            .toldo{
                
                width: 180px;
                height: 60px;
                background: #eb9316;
                font-size: 1em;
                color:  #0000cc;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $item = $_POST['item'];
         $dept = $_POST['dept'];
         $rate = $_POST['rate'];
         $qty = $_POST['qty'];
         
         $sax = "insert into positems(itemname,lrate,dept)values('$item','$rate','$dept')";
         $dret = "insert into stockinfo(itemname,rate,stock)values('$item','$rate','$qty')";
         $bobo = "insert into trans(tdate,itemname,qtyout,qtyin,recno)values(curdate(),'$item','$qty',0,0,621)";
         
         
         $raw = mysql_query($sax);
         //mysql_query($dret) or die('cant insert stock');
         //mysql_query($bobo) or die('cant insert trans');
         if($raw)
         {
             echo 'Data Inserted';
         }
         
 else {
             echo 'Data Not Inserted';
 }
 
  $jaw = "select itemname,lrate as rate,dept from positems where dept='$dept'";
  
  $res = mysql_query($jaw);
  
  
                            $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped table-hovered">';
                
                
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
     
    echo '</table>';
 
  
        ?>
    </body>
</html>
