<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>REMOVE BILLS</title>
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
                //var usernow = <?php echo $user;?>;
                $("#btn").click(function(){
                    
                    var recno = $("#rec").val();
                    
                   // var usernow = <?php echo $user;?>;
                    
                    $.ajax({
                        
                        type:"post",
                        url:"remrecs.php",
                        data:"recno="+recno,
                        
                        
                        success:function(data)
                        {
                            $("#maya").html(data);
                        },
                        
                        
                        error:function()
                        {
                            $("#maya").html('Not Connected');
                        }
                    });
                    
                });
                
            });
        </script>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <label>Receipt#</label>
                    <input type="number" id="rec" class="form-control">
                    <input type="button" id="btn" class="btn btn-primary btn-lg" value="Delete Receipt" style=" background: orangered;">
                    <div id="maya"></div>
                </div>
                
            </div>
            
        </div>
    </body>
</html>
