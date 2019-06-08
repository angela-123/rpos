<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>DEBTORS RECORDS</title>
        
        <style>
            #pmt,#mol,#btp{
                
                display: none;
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
                
                $("#btd").click(function(){
                    
                    var date = $("#dte").val();
                    var cname = $("#cname").val();
                    var damt = $("#damt").val();
                    var pmt =$("#pmt").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"debtees.php",
                        data:"date="+date+"&cname="+cname+"&damt="+damt+"&pmt="+pmt,
                        
                        success:function(data)
                        {
                            $("#mawa").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#mawa").html('Not Connected');
                        }
                        
                    });
                    
                });
                
                $("#btp").click(function(){
                    
                    var date = $("#dte").val();
                    var cname = $("#cname").val();
                    var damt = $("#damt").val();
                    var pmt =$("#pmt").val();
                    
                    $.ajax({
                        type:"post",
                        url:"pmts.php",
                        data:"date="+date+"&cname="+cname+"&damt="+damt+"&pmt="+pmt,
                        
                        success:function(data)
                        {
                            $("#mawa").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#mawa").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" id="dte" class="form-control">
                        <label>Customer Name</label>
                        <input type="text" id="cname" class="form-control">
                        <label id="ramt">Debt Amount</label>
                        <input type="number" id="damt" class="form-control" placeholder="enter debt amount">
                        <label id="mol">Payment</label>
                        <input type="number" id="pmt" class="form-control" placeholder="enter amount paid">
                        <input type="button" id="btd" class="btn btn-default btn-lg" value="Update Debt Record">
                        <input type="button" id="btu" class="btn btn-default btn-lg" value="Rebuild UI For Payment Entry" onclick="opx();">
                        <input type="button" id="btp" class="btn btn-default btn-lg" value="Update Payment">
                    </div>
                    
                </div>
                <div id="mawa" class="col-md-5"></div>
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
        
                        <script type="text/javascript">
$("input#cname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "mydebtors.php",
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
<script>
    function opx()
    {
        $("#pmt").show(2000);
        $("#mol").show(2000);
        $("#btp").show(2000);
        $("#btd").hide(2000);
        $("#btu").hide(2000);
        $("#damt").hide(2000);
        $("#ramt").hide(2000);
    }
</script>
    </body>
</html>
