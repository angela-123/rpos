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
                text-align: left;
                color:  #000;
                font-size: 10pt;
                width: 285px;
            }
            
            td{
                font-size: 8pt;
                font-weight: bold;
                color: black;
                border: 2px #bfbfbf solid;
                font-style:  oblique;
            }
            
            input[type = "button"]
            {
                width: 130px;
                height: 60px;
                border: 3px #bfbfbf solid;
            }
        </style>
                                <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
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
    <body>
        
        <script>
            $(document).ready(function(){
                
                $("#btn").click(function(){
                    
                    var date = $("#dte").val();
                    var loc = $("#loc").val();
                    var yr = $("#yr").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"yrmbjimo.php",
                        data:"date="+date+"&loc="+loc+"&yr="+yr,
                        
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
        <div class="container-fluid">
            <div class=" container-fluid">
                <div class=" row">
                    <div class="col-md-3">
                    <div id="nili" title="ENTER YEAR " class="form-group">
            
                        <label>Year</label><br>
                        <input type="number" name="yr" id="yr" class="form-control">
                        
            
                        <input type="button" name="btn" id="btn" value="Preview" class="btn btn-primary btn-lg">
                        <input type="button" name="btn" id="btp" value="Pint Report" class="btn btn-primary btn-lg" onclick="printDiv('jaga');">
        </div>
                </div>
                    <div id="jaga" class="col-md-4"></div>
                    
                </div>
                
            </div>
        </div>
        <?php
        
        ?>
        
                                    <script type="text/javascript">
    function printDiv(divID)
    {   //var dte = document.getElementById('hy');
     //dte = new Date();
        var divElements = document.getElementById(divID).innerHTML;

        var oldpage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body><table title = INTENT ENERGY SOLUTIONS>" +divElements + "</table></body>";
        
        window.print();
        
        
        

        document.body.innerHTML = oldpage; 
        //document.forms["dag"].refresh();
        window.location.reload();
        
    }
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
	$("#nilis").dialog(
			{
				show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"300",
			    position:"left top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
