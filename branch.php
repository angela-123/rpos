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
                width: 590px;
                font-size: 10pt;
                color:  #000066;
                text-align: left;
                border: 1px #eee solid;
                background:  darksalmon;
            }
            
            td{
                font-size: 9pt;
                font-weight:  bold;
                color:  #005580;
                border: 1px #aaaaaa solid;
                background:  buttonface;
            }
        </style>
         
    </head>
    <body>
        <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         
         $branch = $_POST['brch'];
         
         $fg = "select item,SUM(qtyin) As qtyin,SUM(opstock) As opstock,SUM(qtyout) As qtyout,SUM(mvdin) As mvin,SUM(mvdout) As mvout,SUM(returnin) As returns,SUM(qtyin)+SUM(opstock)+SUM(mvdin)+SUM(returnin)-SUM(qtyout)-SUM(mvdout) As Stock,location from storetrans where location = '$branch' GROUP BY item ";
         
         $res = mysql_query($fg);
         
         $zax = mysql_fetch_assoc($res);
         //Totals
         
         $qtyin = $zax['qtyin'];
         $ops = $zax['opstk'];
         $qtyout = $zax['qtyout'];
         $mvdin = $zax['mvdin'];
         $mvdout = $zax['mvdout'];
         $ret = $zax['returnin'];
         if($res)
         {
             echo 'Preview Stock';
         }
         
 else {
             echo 'No Preview Available';
 }
 
                   $buns = mysql_num_fields($res);
                echo '<table id = diaga title = "PIZZA LIST">';
                
                
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
