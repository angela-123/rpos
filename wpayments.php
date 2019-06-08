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
                               <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
               
‪<!-- Optional Bootstrap theme -->
‪
          <script src="js/bootstrap.min.js"></script> 
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var waiter = $("#waiter").val();
                    var amt = $("#amt").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"wpays.php",
                        data:"waiter="+waiter+"&amt="+amt,
                        
                        
                        success:function(data)
                        {
                            $("#tito").html(data);
                            $("#amt").val(0);
                        },
                        
                        
                        error:function()
                        {
                            $("#tito").html('Not Connected');
                            
                        }
                        
                    });
                    
                });
                
                
                $("#bth").click(function(){
                    var waiter = $("#waiter").val();
                    
                    $.ajax({
                        type:"post",
                        url:"whist.php",
                        data:"waiter="+waiter,
                        
                        success:function(data)
                        {
                            $("#tito").html(data);
                        },
                        
                        error:function()
                        {
                            $("#tito").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Waiter Name</label>
                        <input type="text" id="waiter" class="form-control">
                        <label>Amount Paid</label>
                        <input type="number" id="amt" class="form-control">
                        
                        
                        <input type="button" id="btn" class="btn btn-primary btn-lg" value="Update" >
                        <input type="button" id="bth" class="btn btn-primary btn-lg" value="Waiter`s History" >
                        
                        
                    </div>
                    
                </div>
                <div id="tito" class="col-md-4"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
            
                                                                            		                           <script type="text/javascript">
$("input#waiter").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "cooza.php",
data : data,
complete : function (xhr, result)
{
if (result !== "success") return;
var response = xhr.responseText;
var books = [];
$(response).filter ("li").each (function ()
{
books.push ($(this).text ());
});
callback (books);
}
});
}
});
</script>
        
    </body>
</html>
