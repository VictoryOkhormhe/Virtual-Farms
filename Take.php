<?php
  if (isset($_GET['name'])){
      $nm = $_GET['name'];
      $em = $_GET['email'];
      $sug = $_GET['suggestion'];
      $db = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_admin');
      $q = mysqli_query($db, "INSERT INTO suggestions (name, emailadd, message,status) VALUES('$nm','$em','$sug','unread')");
      @session_start();
      if (isset($_SESSION['client'])){
          echo 'nav';
      }
      else{
          echo 'nonav';
      }
  }
?>