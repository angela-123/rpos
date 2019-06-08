<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
          .toldo{

              width:160px;
              height:40px;
              background:black;
              color:white;
          }
          h3{

              color:darkblue;
          }

          h4{
              color:red;
          }
        </style>
    </head>
    <body>
<script>
    $(document).ready(function(){
        $('.toldo').bind('click', function(){
            var wname = $(this).attr('id');
            
            $.ajax({
                type:"post",
                url:"rxwaiters.php",
                data:"wname="+wname,

                success:function(data)
                {
                    $("#pila").html('')
                },

                error:function()
                {
                    $("#pila").html('Not Connected');
                }
            })

        })
    })
    
</script>

    
<h3>Waffle Stop Waiters</h3>
    <table>
        
       <thead>
           
       </thead>
    <?php 
   $nas = mysql_connect('localhost','staff','angela');
    mysql_select_db(ajpos);


    $bam = "select waitername from waiters";

    $zee = mysql_query($bam);

    while($row = mysql_fetch_assoc($zee))
    {

    ?>
    <tbody>
        <tr>
            <button class = "toldo btn btn-default" value = "<?php echo $row['waitername']; ?>" id = "<?php echo $row['waitername']; ?>"><?php echo $row['waitername']; ?></button><br>
        </tr>
        
    </tbody>



<?php
    }
 ?>

</table>
<h4>Click To Remove!</h4>
<div id = "pila"></div>
    </body>
</html>