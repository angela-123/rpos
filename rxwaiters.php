<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
    </head>
    <body>
    <?php 
     $nas = mysql_connect('localhost','staff','angela');
     mysql_select_db(ajpos);

     $wname = $_POST['wname'];
     $dels = "delete from waiters where waitername = '$wname'";
     echo $wname;
     mysql_query($dels);
    ?>
    </body>
</html>