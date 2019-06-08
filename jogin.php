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
            #fex{
                
               
                border: 0px #c09853 solid;
                
            }
            
            #arama{
                
                font-size: 2.5em;
               
                
            }
            input[type = "button"]{
                width: 100px;
                height: 50px;
                border: 1px #fef1ec solid;
                background:  #7699d1;
                font-size: 12pt;
            }
            
            h3{
                position: absolute;
                left: 390px;
                top:200px;
                color:  #c43c35;
            }
            
            label{
                font-size: 14pt;
                color: darkred;
                font-weight:  bold;
            }
            
            #mid{
                position: relative;
                left: 100px;
                top:40px;
            }
            
            body{
                background:white;
            }
            
            #tuliop{
                position: absolute;
                left: 400px;
                top:250px;
                color: red;
                font-size: 35pt;
            }
            
            
            input[type = "text"]
            {
                font-size: 11pt;
                color:darkblue;
            }
        </style>
        
                        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
                <link rel="stylesheet" href="css/bootstrap.min.css">
‪<!-- Optional Bootstrap theme -->
‪<link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
    </head>
    <body>
        
        <script>
            $(document).ready(function(){
            $("#save").click(function()
            {  
                
               //var date = $("#dte").val();
               var username = $("#usname").val();
               var password = $("#pswd").val();
               //var shift = $("#shift").val();
               
               //var qty = $("#qty").val();
              
              //var recno = $("#recno").val();
              
                
                $.ajax({
                    type:"POST",
                    url:"newjogger.php",
                    //data:"rdate="+date+"&guestname="+gname+"&menuitem="+kode+"&qty="+qty+"&rate="+rate+"&recno="+recno;
                    data:"username="+username+"&password="+password,
                     
                    success:function(data)
                    {
                       $("#info").html(data);
                       $("#tulio").html(data);
                       
                       $("#fex").fadeOut(100);
                       
                       
                    },
                    
                    error:function(data)
                    {
                        $("#info").html(data);
                        
                        
                    }
                    
                    
                });
            }
                    
                    );
            
    });
        </script>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="container-fluid">
        
        <div id="fex" class="row">
            
            <div id="midd" class="form-group col-md-4 col-md-offset-3" >
               
                <label class="form-control" style=" text-align:  center; color: white; font-size: 1.2em; background:black;">WAFFLE STOP</label>
                <label class="form-control" style=" background: black;color:white">Username</label>
                <input type="text" name="usname" id="usname" class="form-control">
                <label class="form-control" style=" background: black;color:white">Password</label>
                <input type="password" name="pswd" id="pswd" class="form-control">
            
                <input type="button" value="login" id="save" class="btn bg-primary btn-lg" style = "background:black;">
            <div id="info"></div>
            </div>
            
        </div>
        </div>
        <div id="tulio">
        </div>
        
        </script>

      <script type="text/javascript">
	$("#flex").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"560",
			    position:"center"
			    
			    	
			}
			
			);
	</script>
        
        
    </body>
</html>
