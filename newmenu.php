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
            
            
            $("#btx").click(function(){
            
            var item = $("#mtem").val();
            var dept = $("#dept").val();
            var rate = $("#rate").val();
            var qty = $("#qty").val();
            
            
            
            
            
            $.ajax({
                
                type:"post",
                url:"preva.php",
                data:"item="+item+"&dept="+dept+"&rate="+rate+"&qty="+qty,
                
                success:function(data)
                {
                    $("#zest").html(data);
                },
                
                error:function()
                {
                    alert(new Date());
                }
            });
            
    });
            
        });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="form-group col-sm-4">
                    <label class="form-control" style=" background: lightskyblue;">Menuitem</label>
                    <input type="text" placeholder="menuitem name" id="mtem" class="form-control">
                    <label class="form-control" style=" background: lightblue;">Department</label>
                    <input type="text" id="dept" class="form-control" placeholder="department">
                    
                    
                    <label class="form-control" style=" background: #e4b9b9;">Rate</label>
                    <input type="number" id="rate" placeholder="rate" class="form-control">
                    
                    <button class="btn btn-primary btn-lg" id="btx">Save</button>
                    
                </div>
                
                <div class="col-md-6" id="zest">
                    
                </div>
                
            </div>
            
        </div>
        
        <?php
        $don = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos);
        
        ?>
        
                                                                        		                           <script type="text/javascript">
$("input#dept").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "frives.php",
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
