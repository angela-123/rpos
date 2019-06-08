<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        td{
            font-size:1.2em;
            font-weight:bolder;
            color:black;
        }
        th{
            background:orangered;
            color:black;
            font-size:1.3em;
        }
        </style>
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
   if($perm!='admin')
   {   print '<div id = "jim">';
       print '<h1>' .$message.'</h1>';
       print '</div>';
       
       exit();
   }
       
       ?>
    <?php
      $nas = mysql_connect('localhost','staff','angela');
      mysql_select_db(ajpos);
      $d1 = $_POST['db'];
      $d2 = $_POST['de'];
      //echo $d1;
      //echo $d2;
      $dex = "select rdate AS date, rtime as time,recno as receiptno,username from rdeletes where rdate between '$d1' And '$d2'";

      $res = mysql_query($dex) or die('cant query');

      //$res = mysql_fetch_assoc($miss);
      $buns = mysql_num_fields($res);
      echo '<h3>DELETES AND ATTEMPTED DELETES</h3>';
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

echo '</table>';


     ?>
    </body>
</html>