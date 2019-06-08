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
            #diaga{
                text-align: left;
                color:  #000;
                font-size: 10pt;
                width: 250px;
            }
            
            #jili{
                font-size: 10pt;
                font-weight: normal;
            }
            
            
            h4{
                font-size: 11pt;
                font-weight: bold;
                font-style:  oblique;
                
            }
            
            td{
                font-size: 8pt;
                font-weight: normal;
                color: #000;
                border: 2px #bfbfbf solid;
                font-style:  oblique;
                font-family:  sans-serif;
                height: 10px;
            }
            
            
            input[type = "button"]
            {
                width: 120px;
                height: 60px;
                border: 1px #bfbfbf solid;
            }
        </style>
         <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        <?php
        
         $zon = mysql_connect('localhost','staff','angela');
    mysql_selectdb(ajpos);
    $user = $_SESSION['username'];
$wela = "select username,password,page from users where username = '$user'";
	$tas = mysql_query($wela);
	$message = "Access Denied";
	while ($vid = mysql_fetch_assoc($tas))
	{
		$perm = $vid['page'];
	}
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
	{   print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
	}
        
        ?>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var loc = $("#loc").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"jimopapa.php",
                        data:"date="+date+"&loc="+loc,
                        
                        success:function(data)
                        {
                            $("#jaga").html(data);
                        },
                        
                        error:function()
                        {
                            alert('Noppe');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <form id="nili" title="ENTER DATE AND LOCATION ">
            <label>Date</label><br>
            <input type="date" name="dte" id="dte"><br>
            <label>Location</label><br>
            <input type="text" id="loc"><br>
            
            <input type="button" name="btn" id="btn" value="Preview">
        </form>
        
        <div id="jaga" title="SALES SUMMARY FOR THE DAY"></div>
        
                
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
        <script type="text/javascript">
	$("#jagad").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"left bottom"
			    
			    	
			}
			
			);
	</script>
        
        <script type="text/javascript">
	$("#nili").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
