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
                background: orange;
                color:black;
                font-size:1.2em;
            }
            
            td{
                font-size: 1.3em;
                font-weight: bold;
                color:black;
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
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
                        
		} 
		
		function saveToDatabase(editableObj,column,id) {
			$(editableObj).css("background","#FFF url(loaderIcon.gif) no-repeat right");
                        
			$.ajax({
				url: "saveedito.php",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(){
					$(editableObj).css("background","#FDFDFD");
				}        
		   });
		}
		</script>
        
        
        
        
        <?php
        require_once('dbcontroller.php');
        $dbhandle = new DBController();
        $xd = new DBController();
         $san = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos);
        $ses = $_POST['ses'];
        $sec = $_POST['sec'];
        $term = $_POST['term'];
        $arm = $_POST['arm'];
        $sname = $_POST['sname'];
   $sw = "select itid, itemname,lrate,dept  from positems";
        $faq = $dbhandle->runquery($sw);
        $raf = $xd->numrows($sw);
       // echo $raf;
        
        
        ?>
                <div class=" container-fluid">
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
        <table class="table table-responsive table-striped table-hover table-bordered">
            
            <thead>
            <th class="table-header">Itemid</th>
            <th class="table-header">Item Name</th>
            
             <th class="table-header">Rate</th>
            <th class="table-header">Dept</th>
            
            </thead>
            <tbody>
                 <?php
		  foreach($faq as $k=>$v) {
		  ?>
			  <tr class="table-row">
                               <td><?php echo $k+1; ?></td>
                              <td contenteditable="true" onBlur="saveToDatabase(this,'itemname','<?php echo $faq[$k]["itid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["itemname"]; ?></td>
				
				<td contenteditable="true" onBlur="saveToDatabase(this,'lrate','<?php echo $faq[$k]["itid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["lrate"]; ?></td>
				<td contenteditable="true" onBlur="saveToDatabase(this,'dept','<?php echo $faq[$k]["itid"]; ?>')" onClick="showEdit(this);"><?php echo $faq[$k]["dept"]; ?></td>
				
                                
				
			  </tr>
		<?php
                $k++;
                
		}
		?>
                          
            </tbody>
            
        </table>
                </div>
                </div>
                </div>
    </body>
</html>
