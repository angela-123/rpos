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
                
                $("#btp").click(function(){
                    
                    var date = $("#dte").val();
                    
                    
                    $.ajax({
                        
                        type:"post",
                        url:"dela.php",
                        data:"date="+date,
                        
                        
                        success:function(data)
                        {
                            $("#lab").html(data);
                        },
                        
                        
                        error:function(eda)
                        {
                            $("#lab").html(eda);
                        }
                        
                    });
                    
                });
                
            });
        </script>
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-control" style=" background:  #0088cc;">Date</label>
                        <input type="date" id="dte" class="form-control" style=" background: #d4d4d4;">
                        <button id="btp" class="btn btn-primary btn-lg">Clear Orders</button>
                        <label id="lab" class="form-control label label-success"></label>
                        
                        
                    </div>
                    
                </div>
                
                
                
            </div>
            
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
