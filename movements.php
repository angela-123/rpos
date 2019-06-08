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
            h3{
                
                border: 2px #000066 solid;
                background:  #ce8483;
                top:200px;
            }
        </style>
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
               
               var loc =$("#loc").val();
               var destloc = $("#destloc").val();
               var item = $("#item").val();
               var qty = $("#qty").val();
               
               
               $.ajax({
                   type:"post",
                   url:"moves.php",
                   data:"loc="+loc+"&destloc="+destloc+"&item="+item+"&qty="+qty,
                   
                   success:function(data)
                   {
                       $("#source").html(data);
                   },
                   
                   error:function()
                   {
                       $("#source").html('Not Connected');
                   }
               });
                   
               });
               
               
           
               
           });
              
           
          
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Source Location</label>
                        <input type="text" id="loc" class="form-control">
                        <label>Destination</label>
                        <input type="text" id="destloc" class="form-control">
                        <label>Item</label>
                        <input type="text" id="item" class="form-control">
                        <label>Quantity Moved</label>
                        <input type="number" id="qty" class="form-control">
                        
                        
                        
                       
                        
                        
                        <input type="button" id="btn" class="form-control" value="Update" style=" background: violet;">
                        
                        
                        
                        
                    </div>
                    
                </div>
                
                <div id="source" class="jumbotron col-md-2"></div>
                <div id="dest" class="col-md-1 col-md-offset-1 jumbotron"></div>
                
            </div>
            
        </div>
        
                                        <script type="text/javascript">
$("input#loc").autocomplete ({
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
        

                                <script type="text/javascript">
$("input#destloc").autocomplete ({
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
        
              <script type="text/javascript">
$("input#item").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "newitems.php",
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
$("input#itemdest").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "newitems.php",
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
        
        ?>
    </body>
</html>
