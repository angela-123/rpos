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
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪                <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        <script>
            
            $(document).ready(function(){
                
                $("#gtb").click(function(){
                    
                    var date = $("#dte").val();
                    var waiter = $("#waiter").val();
                    var item = $("#item").val();
                    var qty = $("#qty").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"rets.php",
                        data:"date="+date+"&waiter="+waiter+"&item="+item+"&qty="+qty,
                        
                        
                        success:function(data)
                        {
                            $("#yolo").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#yolo").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        
                        <label class="form-control" style=" background:  #E3A857;">Waiter</label>
                        <input type="text" id="waiter" class="form-control">
                        <label class="form-control" style=" background:  #c7ddef;">Itemname</label>
                        <input type="text" id="item" class="form-control">
                        <label class="form-control" style=" background:  #b94a48;">Qty</label>
                        <input type="number" id="qty" class="form-control">
                        
                        <button id="gtb" class="btn btn-primary btn-lg">Save</button>
                        
                    </div>
                    
                </div>
                <div id="yolo" class="col-md-4"></div>
            </div>
            
        </div>
 
        
        
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
        
        <?php
        // put your code here
        ?>
        
 
        
    </body>
</html>
