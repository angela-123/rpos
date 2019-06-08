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
        
        <style type="text/css">

#iroko{
position:relative;
width:200px;
height:50px;
background-image:url("kintoy.jpg");
background:orange;
left:89px;
}

body{
background-image:url("kintopolox.jpg");
}

#tolx{
position:absolute;
left:50px;
bottom:100px;
width:200px;
height:200px;
border:1px solid grey;
background-image:url(kintoy.jpg);
border-radius:35px;
}


#nav{
position:absolute;
width:95%;
left:180px;
top:70px;
}
#nav li {
	list-style-type: none;
	margin: 0;
	padding-bottom: 1px;

	float: left;
	position: relative;
	width: 150px;
	background:#800020;
	color:white;
	text-align:left;
	font-family:Arial;
	font-size:9pt;
	font-weight:bold;
	border-radius:7px;
	
	
}

#nav li a li a{
color:blue;
}

a{
width:40px;

}
#aj{
    position:  absolute;
    top:400px;
    left: 600px;
    display: block;
    font-size: 12pt;
    font-weight:  bolder;
    color: darkred;
}
#nav a {
	display: block;
	padding: 12px 5px;
	margin: 0;
	border-left: #ccc 1px solid;
	color: white;
	
	font-weight: bold;
	text-decoration: none;
	font-family: Calibri ;
	text-align:left;
	font-size: 10pt;
}

#nav a li ul a{
color:Violet;
}

#nav ul {
	display: none;
}

#nav li:hover>ul {
	display: block;
}

#nav ul li {
	float: none;
	margin: 1;
	padding: 1;
	border:1px solid whitesmoke;
	background: #D32C25;
}

#nav ul {
	display: none;
	margin: 0;
	padding: 0;
	position: absolute;
	left: 0;
	top: 40px;
	width: 150px;
	background:whitesmoke;
}

#nav ul ul {
	left: 150px;
	top: 5px;
}

.hi{
font-family:Consolas;
font-weight:bold;
color:black;
}

#nav li:hover>a {
	color: white;
}

#nav ul {
	background:whitesmoke;
}


#nav li:first-child a,#nav ul ul li:first-child,#nav ul a {
	border: none;
}

#splash{
position:absolute;
top:200px;
left:300px;
width:100px;
height:100px;
background:fuchsia;
border-radius:50%;

}

span{
font-size:48pt;
font-family:Arial Narrow,Verdana;
color:navy;
width:500px;
height:300px;
background:orange;
}

#screen{
position:absolute;
top:400px;
left:300px;
width:700px;
height:400px;
display:none;
background-image:-webkit-linear-gradient(270deg,cyan,yellow);
border-radius:50%;

}

body{
background:whitesmoke;
}




#gaugee{
position:absolute;
left:300px;
bottom:0px;
width:100px;
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
                $page = $vid['page'];
	}
	
	//if($perm!='pharmacy') 
	if($perm!='admin')
            
	{   
            if($perm!='cashier')
            {
            print '<div id = "jim">';
		print '<h1>' .$message.'</h1>';
		print '</div>';
		
		exit();
                
            }
        
	}
    
        
        
        ?>
        
	<ul id="nav">
		<li><a href="#"><nobr>Admin</nobr></a>
		<ul>
                    <li><a href = "hmsuseradmin.html"><nobr>Create Users</nobr></a></li>
		
                <li><a href = "menu.php"><nobr>Register Menu Items</nobr></a></li>
		
                
                
		</ul>
			</li>
				
								
								
								
			
			
		<li><a href="#">Transactions</a>
			<ul>
                            <li><a href="lounge.php"><nobr>Point Of Sales</nobr></a></li>
                            <li><a href = "orders.php"><nobr>Orders</nobr></a></li>
                            <li><a href="zlounge.php">Orders-Live Streaming</a>
                                    
				
				
				</li>
                                <li><a href = "dprods.php"><nobr>Daily Productions</nobr></a></li>
				
				
				<li><a href="clsvw.php"><nobr>Stock Movements</nobr></a>
				<ul>
				
                                    <li><a href = "smvts.php"><nobr>Stock Moved Out</nobr></a></li>
				
				
				</ul>
					
					</li>
                                        
                                        <li><a href="#">Returns</a>
                                            <ul>
                                                <li><a href="retouts.php"><nobr>Return In</nobr></a></li>
                                                <li><a href="#"><nobr>Return Out</nobr></a></li>
                                            </ul>
                                        </li>
				
			</ul></li>
		<li><a href="#"><nobr>Accounts</nobr></a>
			<ul>
                            <li><a href="#"><nobr>Daily Expenses Entry</nobr></a>
				
				</li>
				
				
				
				
			</ul></li>
		<li><a href="#">Store</a>
		<ul>
                    <li><a href = "storeitems.php"><nobr>Store Items</nobr></a></li>
                    <li><a href = "opstock.php"><nobr>Opening Stock</nobr></a>
		
		</li>
		
		
		</ul>
		
		
                
                <li><a href="ajtory.html">Reports</a>
                   
                    
                    
                    
                </li>
                
		</ul>
        
        
        
        <div id="aj"><h1>Welcome                 <?php echo       $_SESSION['username'];?></h1></div>
        
        
        <script type="text/javascript">
	
	
	$("#aj").fadeOut(4500);
        
	
        </script>
	
	

        <?php
        // put your code here
        ?>
    </body>
</html>
