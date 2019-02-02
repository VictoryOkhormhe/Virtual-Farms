<html>
<head><meta name="viewport" content="width=device-width,initial-scale=0.8">
<link rel="shortcut icon" href="icon.png">
<script src="create.js" type="text/javascript"></script>
<meta name="description" content="Create a Virtual Farm account today and get started with planting of crops remotely"><title>Virtual Farms | Create an Account</title></head>
<link rel ="stylesheet" href="create.css">
<body style="margin:0;padding-top:6vh">
<center>
<div class="body">
<table style="width:100%">
	<form action="Create Account.php" method="post" enctype="multipart/form-data">
	<tr><td><img src="virtual.png" class="logo"></td></tr>
	<tr><td class="title" style="text-align:center">Create your Virtual Farm Account</td></tr>
	<tr><td>
	<p align="center" style="padding-bottom:10px"><font size="4" face="comic sans ms" color="tomato"><b>Choose A Profile Picture</b></font></p>
	<p align="center"><button style="width:200px;height:200px;background-color:transparent;border:0;border-radius:50%"><img src="profile.png" style="cursor:hand;border-radius:50%;width:100%;height:100%;border:2px solid gold" id="imgs"></button></p>
	<p align="center"><input type="file" id="fl" name="upload" accept="image/*" style="cursor:hand;opacity:0;position:relative;top:-210px;height:200px;width:200px" onchange="auth()"></p>
    <p align="center" style="position:relative;top:-220px;font-family:tahoma;font-size:20px;font-weight:bold" id="dis"><font color="red">No file uploaded</font></p>
    <script>
    	function auth(){
    	  var file = document.getElementById('fl').files[0];
    	  if (!file){
    	  	document.getElementById('imgs').src="profile.png";
            document.getElementById('dis').innerHTML = '<font color="red">Pic Removed</font>';
    	  }
    	  else{
    	  	document.getElementById('imgs').src = window.URL.createObjectURL(file);
    	  var t = (((file.size)/1024)/1024);
    	  var rn = t.toFixed(2);
    	  if (rn <= 0.6){
            document.getElementById('dis').innerHTML = 'File Size: <font color="green">' + rn + 'MB</font>'+ ' <font size="3" color="gray">- Good</font>';
    	  }
    	  if (rn >= 0.7 && rn <= 1.4){
            document.getElementById('dis').innerHTML = 'File Size: <font color="orange">' + rn + 'MB</font>'+ ' <font size="3" color="gray">- Warning</font>';
    	  }
    	  if (rn > 1.5){
            document.getElementById('dis').innerHTML = 'File Size: <font color="red">' + rn + 'MB</font>'+ ' <font size="3" color="gray">- Limit Exceeded!</font>';
    	  }
    	  }
    	}
    </script>
    </td></tr>
    </table>
    <table style="width:100%;position:relative;top:-220px;padding-top:20px">
	<tr><td class="inputs"><input class="field" name="first" type="text" class="field" placeholder="First name" required></tr>
	<tr><td class="inputs"><input type="text" class="field" placeholder="Last name" name="second" required></td></tr>
	<tr><td class="inputs"><input type="text" class="field" name="username" placeholder="Email address or Phone number"></td></tr>
	<tr><td><input type="password" class="field" id="pass" name="password" required placeholder="Password" oninput="chpass()"></td></tr>
	<tr><td class="pass-confirm" id="con"></td></tr>
    <tr><td><input type="password" id="cpas" class="field" placeholder="Confirm Password" oninput="conpass()" required></td></tr>
    <tr><td class="pass-verify" id="ver"></td></tr>
    <tr><td class="inputs" style="text-align:center;padding-top:15px"><button type="submit" class="submit" name="submit">Sign Up</button></td></tr>
    </form>
</table>
</div>
</center>
</body>
</html>
<?php
 if (isset($_POST['submit'])){
 	if (isset($_FILES['upload'])){
        $fname = $_POST['first'];
        $sname = $_POST['second'];
        $email = $_POST['username'];
        $pass = $_POST['password'];
        $h = "localhost";
        $u = "openvirt_elzucky";
        $p = "danielpatrick";
        $d = "openvirt_main";
        $db = mysqli_connect($h,$u,$p,$d);
        $q = "SELECT * FROM users WHERE emailphone = '$email'";
        $query = mysqli_query($db, $q);
        $cnt = mysqli_num_rows($query);
        $fl = $_FILES['upload']['name'];
        $ftmp = $_FILES['upload']['tmp_name'];
        $file = "Profile Pics/".$fl;
        if ($cnt == 0){
            move_uploaded_file($ftmp,$file);
            $qu = mysqli_query($db, "INSERT INTO users(first,second,emailphone,password,profilepic) VALUES('$fname','$sname','$email','$pass','$file')");
            $qr = mysqli_query($db, "SELECT id FROM users WHERE emailphone = '$email'");
            $tg = 0;
            while($r = mysqli_fetch_array($qr)){
                $tg = $r['id'];
            }
            $qw = mysqli_query($db, "CREATE TABLE u".$tg."_transactions(id int(255) AUTO_INCREMENT, product varchar(255), status varchar(255), planted varchar(255), harvested varchar(255), amount	varchar(255), ref varchar(255), claimed varchar(20), address varchar(255), PRIMARY KEY(id))");
            $qx = mysqli_query($db, "CREATE TABLE u".$tg."_harvests(id int(255) AUTO_INCREMENT, product varchar(255), location varchar(255), ref varchar(255), PRIMARY KEY(id))");
            @session_start();
            $_SESSION['client']=$email;
            $_SESSION['new']='true';
            echo '<script>window.location.replace("Dashboard.php");</script>';
        }
        else{
        	echo '<script>alert("Email or phone has already been used!");</script>';
        }
 	}
 	else{
 		echo '<script>alert("You must upload a profile picture!");</script>';
 	}
 }
?>