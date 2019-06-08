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
                font-size: 1.2em;
                font-weight:bolder;
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
                    var endate = $("#endte").val();
                    
                    $.ajax({
                        
                        type:"post",
                        url:"jimopapal.php",
                        data:"date="+date+"&endate="+endate,
                        
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
            <div class="row">
                <div class="col-md-3">
                    <div id="nilid" title="ENTER DATE AND LOCATION " class="form-group">
                        <label class="form-control" style=" background: #b9def0;">Beginning Date</label>
                        <input type="date" name="dte" id="dte" class="form-control">

                        <label class="form-control" style=" background: #b9def0;">End Date</label>
                        <input type="date" name="dte" id="endte" class="form-control">
            
                        <input type="button" name="btn" id="btn" value="Preview" class="btn bg-primary btn-lg">
                        <input type="button" name="btj" id="btn" value="Print" class="btn bg-primary btn-lg" onclick="printDiv('jaga')">
                        
                        
                        
        </div>    
                    
                </div>
                <div class="col-md-4 ">
                    
                    <div id="jaga"></div>
                    
                </div>
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
               
               <script>
            $(function(){
                
                $("#dte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
                 
                 <script>
            $(function(){
                
                $("#endte").datepicker({
                    
                    dateFormat:"yy-mm-dd"
                    
                });
            });
        </script>
                 


    </body>
</html>
