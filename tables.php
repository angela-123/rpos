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

                font-weight:2em;
                color:black;
            }
        
        </style>
    </head>
    <body>
        <?php
        $conn = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos)or die('Cant connect');
         
        
         $table = $_POST['table'];
         $plum = "insert into mytables(tabname)values('$table')";

         mysql_query($plum);
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
