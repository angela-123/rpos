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
            button{
                width: 100px;
                height: 50px;
                border: 1px #004099 solid;
                background: #0055cc;
                border-radius: 2px;
            }
            
            #btn1{
                background:  #e9322d;
            }
            #mule{
                position: absolute;
                top:10px;
                border: 1px #1c94c4 solid;
                width: 750px;
                left: 20px;
                height:  fit-content;
            }
            
            table{
                width: 250px;
                background:  buttonface;
            }
            
            #carr{
                position:  absolute;
                top:100px;
            }
            
            #car td{
                font-size: 9pt;
                color:  #e9322d;
            }
            
            #car{
                width: 550px;
            }
            
            th{
                width: 450px;
                font-size: 11pt;
                text-align: left;
                color:  #004099;
                font-weight: normal;
            }
        </style>
        <script type="text/javascript" src = "libs/jquery-1.9.0.js"></script>
        <link rel="stylesheet" href="libs/jquery-ui-1.10.0.custom.css">
        <script type="text/javascript" src = "libs/jquery-ui-1.10.0.custom.min.js"></script>
        
    </head>
    <body>
                <?php
         $nas = mysql_connect('localhost','staff','angela');
         mysql_select_db(pos);
         
         $zew = "insert into receipts(tdate,staff)values(CURDATE(),'na')";
        if( mysql_query($zew))
        {
            echo '';
        }
        
 else {
            echo 'Not inserted';
 }
         
        ?>
        
        
        <?php
        $sew = "select MAX(recno) As Recno from receipts";
        $rew = mysql_query($sew);
        while ($row = mysql_fetch_assoc($rew)) {
            $max = $row['Recno'];
        }
        ?>
        
        <?php 
        $trek = "select CURDATE() As date";
        $era = mysql_query($trek);
        $rad = mysql_fetch_assoc($era);
        $tad = $rad['date'];
        
        //echo $tad;
        ?>
        
        <script>
            function xchange()
            {
                $("#7up").text('Star');
            }
        </script>
        
        <script>
            function sell(name,qty,recno,cashier)
            {
                var name = name;
                //var price = price;
                var qty = qty;
                var recno = recno;
                var cashier = cashier;
                
                $.ajax({
                    type:"post",
                    url:"debo.php",
                    data:"name="+name+"&qty="+qty+"&recno="+recno+"&cashier="+cashier,
                    
                    success:function(data)
                    {
                        $("#car").html(data);
                    },
                    
                    error:function()
                    {
                        alert(new Date());
                    }
                    
                });
            }
        </script>
            
        <div id="mule" title="RECEIPT">
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Receipt#</th>
                        <th>Cashier</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="date" name="dte" id="dte" value="<?php echo $tad; ?>"></td>
                        <td><input type="number" name="recno" id="recno" value="<?php echo $max; ?>"></td>
                        <td><input type="text" name="cashier" id="cashier" value="<?php echo $cashier; ?>"></td>
                        <td><input type="button">Print Receipt</td>
                
                    </tr>
                </tbody>
            </table
            
            
            
            <button id="7up" class="btn1" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn1" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn1" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <button id="gulder" class="btn1" value="gulder" onclick="sell('Gulder',1,$('#recno').val(),$('#cashier').val())">Gulder</button>
            <button id="candy" class="btn" value="candy" onclick="sell('Candy',1,$('#recno').val(),$('#cashier').val())">Candy</button><br>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <hr>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <hr>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
            <hr>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button>
            <button id="7up" class="btn" value="7up" onclick="sell($('#7up').val(),1,$('#recno').val(),$('#cashier').val())">7up</button>
            <button id="cabin" class="btn" value="cabin" onclick="sell('Cabin',1,$('#recno').val(),$('#cashier').val())">Cabin</button>
            <button id="star" class="btn" value="star" onclick="sell('Star',1,$('#recno').val(),$('#cashier').val())">Star</button><br>
        </div>
        <div id="car"></div>
        <?php
        
        ?>
        
        <script type="text/javascript">
	$("#car").dialog(
			{
			show:"slide",
			    hide:"puff",
			    height:"auto",
			    width:"460",
			    position:"right top"
			    
			    	
			}
			
			);
	</script>
        
    </body>
</html>
