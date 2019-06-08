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
                <div class="col-md-6 col-md-offset-2">
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $dtr = "select debtor,sum(amount) as amount,sum(payment) as payment,sum(amount)-sum(payment) as balance from debts group by debtor";
         $res = mysql_query($dtr);
         
         $ford = "select sum(amount) as total,sum(payment) as pmt from debts";
         
         $all = mysql_query($ford);
         $tall = mysql_fetch_assoc($all);
         
         $tamt = $tall['total'];
         $tpmt =$tall['pmt'];
                                    $buns = mysql_num_fields($res);
                echo '<table class = "table table-responsive table-hover table-striped table-bordered">';
                
                
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
    echo 'Total Debt';
    echo '</td>';
    echo '<td>';
    echo number_format($tamt,2);
    echo '</td>';
    
    
    echo '</tr>';
     
    
    echo '<tr>';
    echo '<td>';
    echo 'Total Payment';
    echo '</td>';
    echo '<td>';
    echo number_format($tpmt,2);
    echo '</td>';
    
    
    echo '</tr>';
     
    
    
    $bal = $tamt - $tpmt;
    
    
    echo '<tr>';
    echo '<td>';
    echo 'Debt Outstanding';
    echo '</td>';
    echo '<td>';
    echo number_format($bal,2);
    echo '</td>';
    
    
    echo '</tr>';
     
    
    
    
    
    echo '</table>';
         
         
         
         
                 
    ?> </div>
            </div>
        </div>
    </body>
</html>
