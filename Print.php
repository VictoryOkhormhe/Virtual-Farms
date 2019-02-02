<html><head><title>Virtual Farms | Print Receipt</title></head>
<body style="padding-top:10vh">
    <script>
        
    </script>
    <style>
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
        table{
            width:50vw;
        }
        @media(max-width:700px){
            table{
                width:90vw;
            }
        }
    </style>
    <center>
    <table>
    <?php
      @session_start();
      $name = $_SESSION['printname'];
      $email = $_SESSION['printemail'];
      $location = $_SESSION['printlocation'];
      $ref =  $_SESSION['printref'];
    ?>  <tr><td><center><img src="virtual.png" style="width:200px;height:50px"></center></td></tr>
        <tr><td><B>Name:</B></td></tr>
        <tr><td><?php echo $name; ?></td></tr>
        <tr><td><B>Contact:</B></td></tr>
        <tr><td><?php echo $email; ?></td></tr>
        <tr><td><B>Address:</B></td></tr>
        <tr><td><?php echo $location; ?></td></tr>
        <tr><td><B>Transaction ID:</B></td></tr>
        <tr><td><?php echo $ref; ?></td></tr>
        <tr><td><center><button type="button" class="submit" onclick="document.getElementById('hide').style.visibility='hidden';this.style.visibility='hidden';window.print();this.style.visibility='visible';document.getElementById('hide').style.visibility='visible'">Print Receipt</button></center></td></tr>
        <tr><td id="hide">NOTE: This receipt is to be submitted to the location herein for retrieval. For home services, contact <a href="mailto:virtualfarmz@gmail.com">virtualfarmz@gmail.com</a></td></tr>
        <tr><td><center><img src="qr.png" style="width:150px;height:150px"></center></td></tr>
    </table>
    </center>
</body>
</html>