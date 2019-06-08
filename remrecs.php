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
                
                
                font-size: 1.2em;
                font-style: normal;
                color: black;
            }
            
            td{
                
                border: 1px #888 solid;
                font-size: 1.1em;
                font-weight:  bolder;
            }
            
            #lag{
                font-size: 1.2em;
            }
            
            #laga{
                
                font-style: italic;
            }
            
            .muje{
                
                font-size: 1.1em;
            }
            
            li{
                
                text-align:center;
                color:  #000066;
                font-size: 1em;
                list-style:  none;  
            }
            
            thead{
                
                text-align: left;
            }
            
            nobr{
                
                text-align:  center;
            }
            
            h3{
                
               color: darkred;
            }
            
            #diaga{
                alignment-baseline:  middle;
            }
        </style>
    </head>
    <body>
        <?php
        $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(ajpos);
         $recn = $_POST['recno'];
         $item = $_POST['item'];
         $user = $_POST['usernow'];
         $users = $_SESSION['username'];
         //echo $users;
         
         $raq = "delete from dailies where recno = '$recn'";
         $dels = "insert into rdeletes(rdate,rtime,recno,username)values(curdate(),curtime(),'$recn','$users')";
         mysql_query($dels);
         
         
         
         mysql_query($raq);
                  
         $jol = "delete from lookup where recno = '$recn'";
         $tara = "delete from sales where refno = '$recn'";
         
         mysql_query($jol) or die('cant lookup');
         mysql_query($tara) or die('cant sales');
         
         echo '<h3>Receipt#' .$recn.'Removed From Sales</h3>';
         
         
         
    
        ?>
    </body>
</html>
