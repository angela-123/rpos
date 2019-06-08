<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>


    <script>
    $(document).ready(function(){

        $("#btn").click(function(){
           
            var dte = $("#dte").val();
            var dtx = $("#dtx").val();

        $.ajax({

            type:"post",
            url:"zdx.php",
            data:"db="+dte+"&de="+dtx,

            success:function(data){
             $("#mono").html(data);
            },

            error:function()
            {
                $("#mono").html('Not Connected');
            }
        })
        })
    })
        
    </script>
      <div class="container-fluid">
      <div class="row">
      <div class="col-md-2">
      <label>Beginning Date</label>
      <input type="date" id="dte" class="form-control">
      <label>End Date</label>
      <input type="date" id="dtx" class="form-control">
      <button type="button" id = "btn" class="btn btn-primary btn-lg">Preview Attempted Deletes</button>
      </div>
      <div id = "mono" class = "col-md-5"></div>
      </div>
      
      </div>


      <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
                 
                 <script>
            $(function(){
                
                $("#dtx").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
    </body>
</html>