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
                color:black;
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

            H2{
                color:darkred;
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
            
            h2x{
                
                position: absolute;
                bottom: 20px;
                left:  600px;
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
         $recno = $_POST['recno'];
         $item = $_POST['item'];
         $recn = 1 +$recno;
         
         $raq = "delete from payments where refno = '$recn'";
         
         
         
         if(mysql_query($raq))
         {
             //echo '<h4>Sale Deleted</h4>';
             //echo $recno;
         }
         
         
         $jol = "delete from lookup where recno = '$recn'";
         $tara = "delete from sales where refno = '$recn'";
         
         mysql_query($jol) or die('cant lookup');
         mysql_query($tara) or die('cant sales');
         
         echo '<h2>RECEIPT DELETED, REFRESH PAGE TO CONTINUE</h2>'
         
         
    
        ?>
    </body>
</html>
