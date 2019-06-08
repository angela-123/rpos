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
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $dept = $_POST['dept'];
         
         $rack = "insert into depts(deptname)values('$dept')";
         
         $res = mysql_query($rack);
         if($res)
         {
             echo 'Dept. Created';
         }
         
 else {
     
             echo 'Dept. Not Created';
 }
        ?>
    </body>
</html>
