<?php
  @session_start();
  if (isset($_SESSION['client'])){
      
  }
  else{
      echo '<script>window.location.replace("index.html")</script>';
  }
?>
<html>
    <head><link rel="shortcut icon" href="icon.png"><meta name="viewport" content="width=device-width,initial-scale=0.8"><title>Virtual Farm | Plant New Crop</title></head>
    <style>
        .login-pane{
            position:absolute;
            width:50vw;
            top:10vh;
            background-color:#f2f2f2;
            padding:30px;
            left:25vw;
            border-radius:20px;
        }
        .login-contents{
            width:100%;
        }
        .logo{
            width:200px;
            height:50px;
        }
        .field{
            font-size:18px;
            font-family:tahoma;
            padding-left:5px;
            padding-right:5px;
            border-radius:5px;
            width:100%;
        }
        .title{
            padding-top:20px;
            font-size:20px;
            font-weight:bold;
            font-family:tahoma;  
        }
        .admin{
            font-size:25px;
            font-weight:bold;
            font-family:tahoma; 
            color:green;
        }
        .title.pad{
            padding-top:10px;
        }
        .new-admin{
            font-size:18px;
            font-family:tahoma;
        }
        .new-admin.pad{
            padding-top:10px;
        }
        .pad{
            padding-top:10px;
        }
        .padder{
            padding-top:10px;
            padding-bottom:10px;
        }
        .submit{
            font-size:18px;
            font-weight:bold;
            border-radius:5px;
            padding:8px;
            background-color:green;
            color:white;
            cursor:hand;
            border:0px;
        }
        body{
            margin:0;
        }
        @media(max-width:550px){
            .login-pane{
                width:80vw;
                left:5vw;
            }
            .login-contents{
                width:100%;
            }
        }
    </style>
    <body>
        <div class="login-pane">
            <table class="login-contents">
                <form action="Plant.php" method="post">
                <tr><td class="title padder"><center><img src="virtual.png" class="logo"></center></td></tr>
                <tr><td class="admin"><center>Plant New Crop</center></td></tr>
                <tr><td class="title">Select Crop to Plant:</td></tr>
                <tr>
                  <td>
                   <select class="field" name="plant" required>
                     <?php
                       $db = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_admin');
                       $q = mysqli_query($db, "SELECT * FROM plants");
                       $cnt = mysqli_num_rows($q);
                       if ($cnt == 0){?>
                       <option>No crops available yet</option>
                       <?php      
                       }
                       else{
                         while($r = mysqli_fetch_array($q)){ ?>
                          <option><?php echo $r['names']. ' <font color="maroon">('.$r['price'].')</font>'; ?></option>
                       <?php       
                       }
                       }
                     ?>
                   </select>
                  </td></tr>
                <tr><td class="title pad">Select Location:</td></tr>
                <tr><td>
                    <select class="field" name="location" required>
                        <?php
                       $db1 = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_admin');
                       $q1 = mysqli_query($db1, "SELECT * FROM locations");
                       $cnt1 = mysqli_num_rows($q1);
                       if ($cnt1 == 0){?>
                       <option>None available yet</option>
                       <?php      
                       }
                       else{
                         while($r1 = mysqli_fetch_array($q1)){ ?>
                          <option><?php echo $r1['names']; ?></option>
                       <?php       
                       }
                       }
                     ?>
                    </select>
                </td></tr>
                <tr><td class="pad"><center><input type="submit" class="submit" name="submit" value="Plant Now!"></center></td></tr>
                </form>
            </table>
        </div>
    </body>
</html>
<?php
   if (isset($_POST['submit'])){
       $pro = $_POST['plant'];
       $addr = $_POST['location'];
       @session_start();
       $em = $_SESSION['client'];
       $db2 = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_admin');
       $db3 = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_main');
       $q3 = mysqli_query($db3, "SELECT * FROM users WHERE emailphone = '$em'");
       $id = 0;
       $name = "";
       while ($r3 = mysqli_fetch_array($q3)){
           $id = $r3['id'];
           $name = $r3['first']." ".$r3['second'];
       }
       $rand = mt_rand(0,100000);
       $spl = explode(" ",$pro);
       $p1 = str_replace("(","",$spl[1]);
       $p2 = str_replace(")","",$p1);
       $price = $p2;
       $q2 = mysqli_query($db2, "INSERT INTO transactions(product, name, emailphone, transactionid, address, amount, approved) VALUES('$pro','$name','$em','$rand','$addr', '$price','no')");
       $q4 = mysqli_query($db3, "INSERT into u".$id."_transactions(product,status,planted,harvested,amount,ref,claimed,address) VALUES('$pro','Pending','Pending','Pending','$price','$rand','no','$addr')");
       echo '<script>window.location = "https://paystack.com/pay/r6gxgx8sf1";</script>';
   }
?>