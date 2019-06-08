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
                                             <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script>  
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-md-offset-3">
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $edx = "select sdate as date,itemname,qtyout,unitprice,waiter,cashier,recno as tableno from dailies";
         
         $res = mysql_query($edx);
         
         $nrows = mysql_num_rows($res);
         
         if($nrows < 0)
         {
             echo '<h3>ALL TABLESCLEARED</>';
         }
         
 else {
         
                                           $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-bordered table-striped">';
                
                echo '<tr>';
                echo '<th>';
                echo 'UNCLEARED ORDERS FOR THE DAY';
                echo '</th>';
                echo '</tr>';
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
        
 }
        ?>
        </div>  
        </div>
    </body>
</html>
