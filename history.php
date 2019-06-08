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
                    
                    var item =$("#item").val();
                    
                    
                    $.ajax({
                        type:"post",
                        url:"hist.php",
                        data:"item="+item,
                        
                        
                        success:function(data)
                        {
                            $("#miki").html(data);
                        },
                        
                        error:function()
                        {
                            $("#miki").html('Not Connected');
                        }
                        
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Item</label>
                        <input type="text" id="item" class="form-control" >
                        <input type="button" id="btn" class="btn btn-default btn-lg" value="Search">
                        
                    </div>
                    
                </div>
                <div id="miki" class="col-md-5"></div>
            </div>
        </div>
        
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
        <?php
        // put your code here
        ?>
    </body>
</html>
