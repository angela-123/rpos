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
            
            h2x{
                
                position: absolute;
                bottom: 20px;
                left:  600px;
            }
            
            #diaga{
                alignment-baseline:  middle;
            }
        </style>
        
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="libs/jquery-1.11.2.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
         $conn = mysql_connect('localhost','staff','angela');
        mysql_select_db(ajpos)or die('Cant connect');
        $pname = $_POST['pname'];
        $qty = $_POST['qty'];
        $kloc = $_SESSION['loc'];
        $waiter = $_POST['waiter'];
        $cashier = $_POST['cashier'];
        $tup = $_POST['topup'];
        $table = $_POST['table'];
        
        $ref = "select itemname,lrate from positems where itemname = '$pname'";
        $count = "select MAX(recno) as rec from receipts";
        $mek = "select * from proconfigs";
        $zigi = "select curdate() as dat";
        $xate = mysql_query($zigi);
        $zate = mysql_fetch_assoc($xate);
        $mydate = $zate['dat'];
        $jason = mysql_query($mek);
        
        $sala = mysql_fetch_assoc($jason);
        
        $add1 = $sala['address1'];
        $add2 = $sala['address2'];
        
        $kunt = mysql_query($count);
        $zow = mysql_fetch_assoc($kunt);
        $numb = $zow['rec'];
        
        $res = mysql_query($ref);
        
        $dow = mysql_fetch_assoc($res);
        
            $rate = $dow['lrate'];
        
 
 //$rate = $dep['rate'];
 //echo $rate;
        
        if($res)
        {
            //echo 'Records Retrived';
            //echo $rate;
        }
        
 else {
            echo 'Data Not Retrieved';
 }
 
 $ups = "insert into trans(tdate,itemname,qtyout,unitprice,topup,location,recno,waiter,cashier,tnumber)values(curdate(),'$pname','$qty','$rate',  '$tup','$kloc', '$numb','$waiter','$cashier','$table')";
 $bank = "insert into lookup(ldate,itemname,qtyout,unitprice,location,recno,mult,ltime,waiter,cashier)values(curdate(),'$pname',1,'$rate','$kloc','$numb','$qty', now(),'$waiter','$cashier')";
 
 $foo = "insert into payments(pdate,itemname,qty,rate,cashier,waiter,refno)values(curdate(),'$pname','$qty','$rate','$cashier','$waiter','$numb')";
         
         mysql_query($foo) or die('No Payment');
 
 
 
 //mysql_query($ups)or die('cant insert');
 mysql_query($bank) or die('Not inserted to lookup');
 
 $trate = $rate + $tup;
     
 $rtx = "select itemname as item,sum(qtyout) as qty,unitprice+ topup as rate,sum(qtyout * (unitprice+topup)) as extended from trans where recno = '$numb' group by itemname";
 $sicas = "update stock set stockqty = stockqty - $qty where itemname = '$pname' and location ='$kloc'";
 $tot = "select itemname, sum(qtyout * (unitprice+topup)) as total from trans where recno = '$numb' group by recno";
 $faith = "select sum(qtyout * (unitprice+topup)) as totalsales from trans where tdate = curdate() and recno = '$numb'";
 $mysales = mysql_query($faith);
 $dsales = mysql_fetch_assoc($mysales);
 $sales = $dsales['totalsales'];
 $date = $dsales['tdate'];
  $radaa = mysql_query($rtx) or die('cant query sales');
  $kada = mysql_query($tot) or die('query not');
  mysql_query($sicas) or die('cant update stock table');
  
  $rara = mysql_fetch_assoc($kada);
  $total = $rara['total'];
  
  $xade = "select itemname,sum(qty) as qty,rate,sum(qty * rate )as extended from payments where refno ='$numb' group by itemname ";
  $rada = mysql_query($xade) or die('cant select');
  
  $pro = "select sum(qty * rate) as total from payments where refno = '$numb'";
         $go = mysql_query($pro);
         
         $ru = mysql_fetch_assoc($go);
         
         $altotal= $ru['total'];
  
  
  
  
                     $buns = mysql_num_fields($rada);
      ?>
        
        
        <?php
        
      while ($row = mysql_fetch_assoc($rada))
      {
        ?>
        
        
        <input type="text" id="<?php echo $row['itemname']; ?>"><input type="number" id="<?php echo $row['qtyout']; ?>">
        
        
        
      <?php }?>
        <script>
            
            $(document).ready(function(){
                
                $('.zina').bind('click',function(){
                    
                    alert(new Date());
                });
                
            });
        </script>
    </body>
</html>
