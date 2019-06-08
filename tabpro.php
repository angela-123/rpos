<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
    <?php
    $conn = mysql_connect('localhost','staff','angela');
    mysql_select_db(ajpos)or die('Cant connect');
    
   
    $table = $_POST['table'];

    $fx = "delete from mytables where tabname = '$table'";
             mysql_query($fx);

             $dex = "select tabname as tableno from mytables";
             $res = mysql_query($dex);
             $buns = mysql_num_fields($res);
             echo '<table class = "table table-responsive table-bordered table-striped">';
             
             
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