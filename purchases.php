<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PURCHASES</title>
                       <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <style>
        th{
            
            text-align:  center;
        }
    </style>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btc").click(function(){
                    
                    
                    var item = $("#item").val();
                    var qty = $("#qty").val();
                    var ucost = $("#ucost").val();
                    var loc = $("#poc").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"purch.php",
                        data:"item="+item+"&qty="+qty+"&ucost="+ucost+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#nene").html(data);
                        },
                        
                        
                        error:function()
                        {
                            alert('Bros,No Network');
                        }
                        
                    });
                    
                    
                });
                
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        
                        <label class="form-control">Location</label>
                        <input type="text" id="poc" class="form-control">
                        
                        
                        
                        <label class="form-control">Itemname</label>
                        <input type="text" id="item" class="form-control">
                        <label class="form-control">Quantity</label>
                        <input type="number" id="qty" class="form-control">
                        <label class="form-control">Unitcost</label>
                        <input type="number" id="ucost" class="form-control">
                        <button class="btn btn-primary btn-lg" id="btc">Save</button>
                        
                    </div>
                    
                    
                </div>
                <div class="col-sm-6">
                    <div id="nene"></div>
                    
                </div>
                
            </div>
            
        </div>
        <?php
        
        ?>
        
                                                     <script type="text/javascript">
$("input#item").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "drives.php",
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
   


                <script type="text/javascript">
$("input#poc").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "loca.php",
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
