


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
            #kilope{
                position: absolute;
                left: 700px;
                top:350px;
                
            }
            
            .toldo{
                
                background: black;
                border-radius: 0px;
                border: 1px #0088cc solid;
                width: 100px;
                height: 80px;
                font-size: 0.75em;
                color:  white;
            }
        </style>
        <script src="libs/jquery-1.11.2.min.js"></script>
    </head>
    <body>
        
        <script>
             $(document).ready(function(){
                
                $('.toldo').bind('click',function(){
                    
                    
                    var pname = $(this).attr('id');
                    var waiter = $("#waiter").val();
                    var table = $("#table").val();
                    var qty = $("#qty").val();
                    
                    
                    $.ajax({
                         type:"post",
                         url:"yayaya.php",
                         data:"pname="+pname+"&waiter="+waiter+"&table="+table+"&qty="+qty,
                         
                         success:function(data)
                         {
                             $("#kilop").html(data);
                             $("#qty").val('1');
                         },
                         
                         
                         error:function()
                         {
                             alert(new Date());
                         }
                         
                         
                    });
                    
                    
                    
                    
                });
                
                
            });
        </script>
        <?php
        $conn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos)or die('Cant connect');
        
        $pax = $_POST['pname'];
        $wea = "select itemname,lrate,dept from positems where dept = '$pax'";
        
        $straw = mysql_query($wea);
        
        if($straw)
        {
            //echo 'Diplayed';
            //echo $pax;
            //while ($row = mysql_fetch_assoc($straw))
        //{
           // echo '<button  class = toldo value ='. $row['itemcode'].' id =' .$row['itemcode'] .'>' .'<nobr>'.$row['itemname'].'</nobr>'.'</button>';
        //}
        }
        
 else {
     
            echo 'No Items For Dept';
 }
 ?>
        
        <?php
        while ($row = mysql_fetch_assoc($straw))
        {   if($row >0)
        
        ?>
 
        <button class="toldo" value="<?php echo $row['itemname']; ?>" id="<?php echo $row['itemname']; ?>"><nobr><?php echo $row['itemname'];?></nobr></button>
            
        
        <?php
        
        }
        ?>
        
        <input type="number" id="qty" class="form-control col-sm-6" value="1" style=" background:  #ebebeb; color:  #000; font-size: 1.3em;font-weight: bold;">
        
    </body>
</html>
