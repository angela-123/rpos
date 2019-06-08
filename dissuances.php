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
            li{
                font-size: 10pt;
                color:  #000066;
                
            }
        </style>
         <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var loc = $("#loc").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"isua.php",
                        data:"loc="+loc,
                        
                        success:function(data)
                        {
                            $("#tapi").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Nopee');
                        }
                            
                        
                    });
                    
                });
                
            });
        </script>
        
        <form>
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <input type="button" name="btn" id="btn" style="width: 120px;height: 60px;border: 0px;background:  #0074cc ">
        </form>
            
        <div id="tapi"></div>
        
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
if (result != "success") return;
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
