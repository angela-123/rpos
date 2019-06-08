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
            td{
                font-size: 1em;
                font-weight:  normal;
            }
            
            h4{
                
                font-weight:  bolder;
            }
        </style>
        
        
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
        
                <?php
        
         $zon = mysql_connect('localhost','staff','angela');
    mysql_selectdb(ajpos);
    $user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	while ($vid = mysql_fetch_assoc($tas))
	{
		$perm = $vid['page'];
	}
	
	//if($perm!='pharmacy') 
	if($perm!='admin' And $perm!='manager')
	{   print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        
        <div class="container-fluid">
            <div class="row">
                <button id="btn" class="btn btn-primary btn-lg" onclick="printDiv('mookie');">Print Report</button>
                <div class="col-md-4 col-md-offset-3" id="mookie">
                    
                   
                    
        <?php
         $jon = mysql_connect('localhost','staff','angela')or die('cant connect');
         mysql_selectdb(ajpos)or die('cant select');
         
         $date = $_POST['date'];
         $loc = $_POST['loc'];
         
         $sw ="select curdate() as date";
         $nix = mysql_query($sw);
         $ride = mysql_fetch_assoc($nix);
         $tdate = $ride['date'];
         
         
         //$fed = "select itemname as item,SUM(qtyout) As qty,SUM(qtyout)*unitprice as extended from trans where tdate = '$date' And location = '$loc' And qtyout > 0 and dtime <= curdate()+ '23:59:59' GROUP BY itemname";
         $fed = "select itemname as item,SUM(qty*mult) As qty,SUM(qty*mult*rate) as extended from sales  where itemname != 'payment' GROUP BY itemname ";
         
         
         
         $sfed = "select itemname as item,qty ,qty*rate*mult  as extended from sales    ";
         
         $jfed = "select itemname as item,qty ,SUM(qty*rate *mult) as extended from lookup  where qty > 0 GROUP BY itemname";
         
         
         $mk = mysql_query($sfed);
         
         $res = mysql_query($fed);
         $tra= 0.0;
         
                     
         //echo $tra;  
         
         if($res)
         {
             //echo 'Sales Records Retrieved';
             //echo $date;
             //echo $loc;
         }
         
 else {
             echo 'Sales Records Not Retrieved';
      }
      
      
                      
                  $buns = mysql_num_fields($res);
                echo '<table id = diaga class = "table table-responsive table-striped table-bordered">';
                echo '<tr>';
                echo '<td id = jili>';
                echo '<nobr>'. 'Total Sales For The Day' .'</nobr>';
                echo '</td>' ;
                echo '</tr>';
                echo '<tr>';
                echo '<td>';
                echo $tdate;
                echo '</td>';
                
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
		echo '<td contenteditable ="true" class = "lil">';
		
		{     if(is_numeric($row2[$i]))
                {
			echo '<nobr>'. number_format($row2[$i],2) . '</nobr>';
		}
                
 else {
     echo '<nobr>'. $row2[$i] . '</nobr>';
 }
                }
	}   echo '</td>';
	echo '</tr>';
        
        
        
    }
     
    echo '</table>';
    
    while ($row = mysql_fetch_assoc($mk))
    {
        $tra = $tra + $row['extended'];
    }
    
    echo '<h4>'. 'Total Sales For The Day.......'        . number_format($tra,2) .'</h4>';
    
    
    $jxfed = "select itemname as item,size,SUM(qtyout) as qtyout,unitprice,SUM(qtyout*unitprice*mult) as extended,SUM(qtyout*unitprice*mult)/$tra * 100 as percentage from lookup where location = '$loc' GROUP BY itemname,size";
        
    $jaxfed = "select SUM(qtyout*unitprice) as TotalSales,SUM(qtyout*unitprice)/$tra * 100 as percentage,location from trans where  location = '$loc' GROUP BY ldate";
       
    //$dasg = mysql_query($jaxfed);
    
    //$rack = mysql_query($jxfed);
    
    
    ?>     </div>
        </div>
        </div>
        
        
                                         <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
    </script>
    </body>
</html>
