<?php
 if (isset($_POST['username'])){
 	    $emph = $_POST['username'];
 	    $pas = $_POST['password'];
 	    $h = "localhost";
        $u = "openvirt_elzucky";
        $p = "danielpatrick";
        $d = "openvirt_main";
        $db = mysqli_connect($h,$u,$p,$d);
        $email = mysqli_real_escape_string($db,$emph);
 	    $pass = mysqli_real_escape_string($db, $pas);
        $q = "SELECT * FROM users WHERE emailphone = '$email' AND password = '$pass'";
        $query = mysqli_query($db, $q);
        $cnt = mysqli_num_rows($query);
        if ($cnt == 1){
           @session_start();
           $_SESSION['client'] = $email;
           echo 'yes';
        }
        else{
        	echo 'no';
        }
 }
?>