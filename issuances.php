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
            th{
                text-align:  left;
                font-size: 10pt;
                font-weight:  bold;
                color:  #003580;
                width: 450px;
            }
            
            #diaga td{
                font-size: 9pt;
                font-weight:  normal;
                color:  #b81900;
                border: 1px #b94a48 solid;
            }
            
            
            li{
                font-size: 10pt;
                font-weight:  bolder;
                color:  #000099;
            }
            
            #gig{
                background: #fbeed5;
            }
            
            input[type = "button"]
            {
                width: 100px;
                height: 50px;
                border: 2px #0088cc solid;
                background: #1c94c4;
            }
            
            label{
                color:  #0000cc;
                font-size:  10pt;
            }
            
            #car{
                background: #fbeed5;
                border: 0px #d9534f solid;
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
                    var date = $("#dte").val();
                    var loc = $("#loc").val();
                    var itname = $("#itname").val();
                    var qty = $("#qty").val();
                    var det = $("#det").val();
                    
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"iskstock.php",
                        data:"date="+date+"&loc="+loc+"&itname="+itname+"&qty="+qty+"&details="+det,
                        
                        success:function(data)
                        {
                            $("#gig").html(data);
                            $("#itname").val('');
                            $("#qty").val('');
                        },
                        
                        error:function()
                        {
                            alert('Nopee');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <form id="car" title="DAILY ISSUANCES ENTRY">
            <a href="kstock.php"></a>
            
            <label>Location</label><br>
            <input type="text" name="loc" id="loc"><br>
            <label>Itemname</label><br>
            <input type="text" name="itname" id="itname"><br>
            <label>Qty Issued Out</label><br>
            <input type="number" name="qty" id="qty"><br>
            <label>Collected By</label><br>
            <input type="text" name="det" id="det">
            <input type="button" value="Save" id="btn">
                   
        </form>
        
        <div id="gig" title="DAILY ISSUANCES"></div>
        
                                            		                           <script type="text/javascript">
$("input#itname").autocomplete ({
source : function (request, callback)
{ 
var data = { term : request.term };
$.ajax ({
url : "coox.php",
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
        <?php
        // put your code here
        ?>
        
         <script type="text/javascript">
	$("#gig").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
        
         <script type="text/javascript">
	$("#car").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
