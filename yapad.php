


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
                border: 2px orangered solid;
                width: 140px;
                height: 50px;
                color: white;
                font-size: 0.85em;
            }
        </style>
        <script src="libs/jquery-1.11.2.min.js"></script>
    </head>
    <body>
        
        <script>
             $(document).ready(function(){
                
                $('.toldo').bind('click',function(){
                    
                    
                    var pname = $(this).attr('id');
                    var qty = $("#qty").val();
                    var waiter = $("#waiter").val();
                    var mult = $("#mult").val();
                    var cashier = $("#cashier").val();
                    var topup = $("#topup").val();
                    var table = $("#table").val();
                    var disc = $("#disc").val();
                    var tvat = $("#vat").val();
                    var tserv = $("#services").val();
                    
                    
                    $.ajax({
                         type:"post",
                         url:"yaya.php",
                         data:"pname="+pname+"&qty="+qty+"&waiter="+waiter+"&mult="+mult+"&cashier="+cashier+"&topup="+topup+"&table="+table+"&disc="+disc+"&tvat="+tvat+"&tserv="+tserv,
                         
                         success:function(data)
                         {
                             $("#kilop").html(data);
                             $("#topup").val('0');
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
    
        
        <input type="number" id="topup" class="form-control col-sm-6" value="0" style=" background:  #ebebeb; color:  #000; font-size: 1.3em;font-weight: bold;" hidden="true">
        
        
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
        
        <button class="toldo btn btn-primary btn-lg" value="<?php echo $row['itemname']; ?>" id="<?php echo $row['itemname']; ?>"><nobr><?php echo $row['itemname'];?></nobr></button>
            
        
        <?php
        
        }
        ?>
        
        <input type="number" id="qty" class="form-control col-sm-6" value="1" style=" background:  #ebebeb; color:  #000; font-size: 1.3em;font-weight: bold;">
        
        <script>
            
            $("#topup").hide();
        </script>
    </body>
</html>
