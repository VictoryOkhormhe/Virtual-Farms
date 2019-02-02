<html>
    <?php
      @session_start();
      $c = "";
      if (isset($_SESSION['client'])){
         $c = $_SESSION['client'];
      }
      else{
         echo '<script>window.location.replace("index.html");</script>';
      }
      $db = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_main');
      $q = mysqli_query($db, "SELECT * FROM users WHERE emailphone='$c'");
      $nm = "";
      $pic = "";
      $id = "";
      while ($r = mysqli_fetch_array($q)){
          $nm = $r['first']." ".$r['second'];
          $pic = $r['profilepic'];
          $id = $r['id'];
      }
      $q2 = mysqli_query($db, "SELECT * FROM u".$id."_harvests");
      $q3 = mysqli_query($db, "SELECT * FROM u".$id."_transactions");
      date_default_timezone_set("Africa/Lagos");
      $dtn = date("d-m-Y")." WAT";
      $ey1 = explode("-",$dtn);
      $ey2 = $ey1[2];
      $ey3 = $ey1[1];
      $yearnow = str_replace(" WAT","", $ey2);
      $monthnow = $ey3;
      $yn = 0;
      $mn = 0;
      $dn = 0;
      $dn = $ey1[0];
      $yn = $yearnow;
      $mn = $monthnow;
      $qpx = mysqli_query($db, "SELECT * FROM u".$id."_transactions");
      while ($rpx = mysqli_fetch_array($qpx)){
          $prx = $rpx['product']; 
          $adx = $rpx['address'];
          $harv = $rpx['harvested'];
          $trx = $rpx['ref'];
          $ex1 = explode("-",$harv);
          $ex2 = $ex1[2];
          $ex3 = $ex1[1];
          $yearharv = str_replace(" WAT","", $ex2);
          $monthharv = $ex3;
          $yh = 0;
          $mh = 0;
          $dh = 0;
          $dh = $ex1[0];
          $yh = $yearharv;
          $mh = $monthharv;
          if ($dn >= $dh && $mn == $mh && $yn == $yh){
            $qqx = mysqli_query($db, "INSERT INTO u".$id."_harvests(product,location,ref) VALUES('$prx','$adx','$trx')");
            $qpz = mysqli_query($db, "DELETE FROM u".$id."_transactions WHERE ref = '$trx'");
          }
          elseif ($mn >= $mh && $yn == $yh){
            $qqx = mysqli_query($db, "INSERT INTO u".$id."_harvests(product,location,ref) VALUES('$prx','$adx','$trx')");
            $qpz = mysqli_query($db, "DELETE FROM u".$id."_transactions WHERE ref = '$trx'"); 
          }
          elseif ($yn >= $yh){
            $qqx = mysqli_query($db, "INSERT INTO u".$id."_harvests(product,location,ref) VALUES('$prx','$adx','$trx')");
            $qpz = mysqli_query($db, "DELETE FROM u".$id."_transactions WHERE ref = '$trx'");   
          }
      }
      $cnt = mysqli_num_rows($q2);
      $cnt2 = mysqli_num_rows($q3);
      $plants = $cnt;
      $trans = $cnt2;
    ?>
    <head><meta name="viewport" content="width=device-width,initial-scale=0.8"><link rel="shortcut icon" href="icon.png"><title>Dashboard | <?php echo $nm; ?></title></head>
    <style>
        .menu-bar{
            width:100%;
            height:90px;
            background-color:green;
            position:absolute;
            top:0px;
            z-index:2;
        }
        .page-body{
           position:absolute;
            top:0px;
            width:100%;
            height:100%;
            overflow-y:auto;
            z-index:1; 
        }
        .logo{
            width:250px;
            height:50px;
        }
        .logo-holder{
            width:250px;
        }
        .user-icon{
            width:65px;
            height:65px;
            border-radius:50%;
        }
        .drop{
            border:0px;
            background-color:transparent;
            font-size:20px;
            color:white;
            cursor:hand;
            text-shadow:gray 2px 2px 1px;
        }
        .controls{
            text-align:right;
        }
        .menu-contents{
            width:100%;
            height:100%;
            padding-left:20px;
        }
        #dropdown{
            position:absolute;
            top:90px;
            right:0px;
            background-color:white;
            border:1px solid gray;
            transition:0.5s;
            visibility:hidden;
            z-index:3;
        }
        .head{
            background-color:gray;
            border-bottom:2px solid gray;
            font-family:tahoma;
            font-weight:bold;
            font-size:16px;
            padding-left:10px;
            padding-right:10px;
        }
        .clicks{
            border:0px;
            width:100%;
            font-family:tahoma;
            background-color:white;
            border-bottom:2px solid gray;
            cursor:hand;
            border-radius:2px;
            font-size:14px;
        }
        .mini-stats{
            width:60vw;
            padding-top:100px;
        }
        .floater1{
            float:left;
        }
        .floater2{
            float:right;
        }
        .component1{
            width:100px;
            height:100px;
            font-size:30px;
            font-weight:bold;
            border:0;
            border-radius:50%;
            border-left:30px solid lightgray;
            border-right:30px solid lightgray;
            border-bottom:30px solid white;
            border-top:30px solid orange;
            text-align:center;
        }
        .component2{
            width:100px;
            height:100px;
            font-size:30px;
            font-weight:bold;
            border:0;
            border-radius:50%;
            border-left:30px solid lightgray;
            border-right:30px solid lightgray;
            border-bottom:30px solid white;
            border-top:30px solid red;
            text-align:center;
        }
        .header{
            font-size:25px;
            font-weight:bold;
            font-family:candara;
            color:green;
        }
        label{
            position:relative;
            top:35px;
        }
        @media(max-width:880px){
            }
            .logo{
                height:40px;
                width:200px;
            }
            
        }
    </style>
    <script>
        var t=0;
        function drop(){
            document.getElementById("dropdown").style.visibility= "visible";
        }
        function hide(){
            document.getElementById("dropdown").style.visibility= "hidden";
        }
        function vdrop(){
            if (t==0){
                document.getElementById("dropdown").style.visibility= "visible";
                t=1;
            }
            else{
               document.getElementById("dropdown").style.visibility= "hidden";
                t=0; 
            }
        }
    </script>
    <body style="margin:0">
        <div class="menu-bar">
        <table class="menu-contents">
            <tr>
                <td class="logo-holder">
                    <img src="virtual.png" class="logo">
                </td>
                <td class="controls">
                    <img src="<?php echo $pic; ?>" class="user-icon"><button class="drop" onmouseover="drop()"  onclick="vdrop()">&#9660;</button>
                </td>
            </tr>
        </table>
    </div>
    <div class="page-body">
        <center>
            <table class="mini-stats">
                <tr>
                  <td>
                      <div class="floater1">
                         <table>
                             <tr><td class="header"><center>Plants</center></td></tr>
                             <tr>
                              <td>
                                 <center>
                                 <div class="component1">
                                 <label><?php echo $plants; ?></label>
                                 </div>
                                 </center>
                              </td>
                             </tr>
                         </table>
                      </div>
                       <div class="floater2">
                         <table>
                             <tr><td class="header"><center>Transactions</center></td></tr>
                             <tr>
                              <td>
                                 <center>
                                 <div class="component2">
                                 <label><?php echo $trans; ?></label>
                                 </div>
                                 </center>
                              </td>
                             </tr>
                         </table>
                      </div>
                  </td>
                </tr>
            </table>
        </center>
        	<style>
	  .center{
	  	text-align:center;
	  	font-family:candara;
	  	border:0.5px solid gray;
	  	font-size:18px;
	  }
	  .head{
	  	text-align:center;
	  	background-color:lightgray;
	  	font-family:tahoma;
	  	color:green;
	  	border:0.5px solid gray;
	  	font-size:15px;
	  }
	  table.stats{
	  	border:1px solid gray;
	  	border-radius:5px;
	  }
	  table.stat{
	  	border:1px solid gray;
	  	border-radius:5px;
	  }
	  h1{
	  	font-family:candara;
	  }
	  .claim{
	  	border:0;
	  	padding:5px;
	  	background-color:green;
	  	color:white;
	  	cursor:hand;
	  }
	  .claimorange{
	  	border:0;
	  	padding:5px;
	  	background-color:orange;
	  	cursor:hand;
	  	font-weight:bold;
	  }
	  .claimno{
	  	border:0;
	  	padding:5px;
	  	background-color:green;
	  	color:white;
	  	opacity:0.5;
	  	cursor:not-allowed;
	  }
	  .alignment{
	      padding-top:30px;
	      padding-bottom:10px;
	  }
    </style>
    <div class="alignment" style="width:100%;overflow-x:auto">
	<center><table cellspacing="0" cellpadding="10" class="stats">
			<thead>
			<td class="head"><b>ID</b></td>
			<td class="head"><b>Products</b></td>
			<td class="head"><b>Status</b></td>
			<td class="head"><b>Date Planted</b></td>
			<td class="head"><b>Estimated Harvest Date</b></td>
			<td class="head"><b>Amount (NGN)</b></td>
			<td class="head"><b>Transaction ID</b></td>
			<td class="head"><b>Claim</b></td>
			</thead>
			<tbody>
			<form action="Dashboard.php" method="post">
		    <?php
		      $num = 0;
		      $db = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_main');
		      $qr = mysqli_query($db,"SELECT * FROM u".$id."_transactions");
		      $co = mysqli_num_rows($qr);
		      if ($co == 0){ ?>
		      <tr><td colspan="8" class="center">No transactions available yet</td></tr>
		      <?php 
		      }
		      else{
		       while ($ro = mysqli_fetch_array($qr)){ 
		         $num++;
		         $id1 = $ro['id'];
		         $pr = $ro['product'];
		         $st = $ro['status'];
		         $pl = $ro['planted'];
		         $ha = $ro['harvested'];
		         $am = $ro['amount'];
		         $re = $ro['ref'];
		         $claim = $ro['claimed'];
		       ?>
		       <tr>
			    <td class="center"><?php echo $num; ?></td>
			    <td class="center"><?php echo $pr; ?></td>
			    <td class="center"><?php echo $st; ?></td>
			    <td class="center"><?php echo $pl; ?></td>
			    <td class="center"><?php echo $ha; ?></td>
			    <td class="center"><?php echo $am; ?></td>
			    <td class="center"><?php echo $re; ?></td>
			    <td class="center"><button type="submit"
			    <?php
			      if ($claim == 'no' || $claim == 'yes'){
			          echo 'class = "claimno" ';
			      }
			      else{
			          echo 'class = "claim" ';
			      }
			    ?><?php
			      if ($claim != 'pending'){
			          echo 'disabled';
			      }
			    ?>
			    value ="<?php echo $id1; ?>" name="submit">Claim</button></td>
			    
		       </tr>
		    <?php
		      }
		      }
		   ?>
		   </form>
		    </tbody>
    </table>
    </center>
    </div>
     <div class="alignment" style="width:100%;overflow-x:auto">
    <center><h1>Pending Harvests</h1></center>
    <center>
    <table cellspacing="0" cellpadding="10" class="stat">
    	<thead>
			<td class="head"><b>ID</b></td>
			<td class="head"><b>Products</b></td>
			<td class="head"><b>Retrieval Location</b></td>
			<td class="head"><b>Transaction ID</b></td>
			<td class="head"><b>Orders</b></td>
		</thead>
		<tbody>
		    <?php
		      $numb = 0;
		      $db1 = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_main');
		      $qr1 = mysqli_query($db1,"SELECT * FROM u".$id."_harvests");
		      $co1 = mysqli_num_rows($qr1);
		      if ($co1 == 0){ ?>
		      <tr><form action="Dashboard.php" method="post"><td colspan="8" class="center">No pending harvests yet</td></tr>
		      <?php 
		      }
		      else{
		       while ($ro1 = mysqli_fetch_array($qr1)){ 
		         $numb++;
		         $id2 = $ro1['id2'];
		         $pr1 = $ro1['product'];
		         $lo1 = $ro1['location'];
		         $ti1 = $ro1['ref'];
		       ?>
		       <tr>
			    <td class="center"><?php echo $numb; ?></td>
			    <td class="center"><?php echo $pr1; ?></td>
			    <td class="center"><?php echo $lo1; ?></td>
			    <td class="center"><?php echo $ti1; ?></td>
			    <td class="center"><button type="submit" class="claimorange" value ="<?php echo $id2; ?>" name="details">See Details</button></td>
			   </form></tr>
		    <?php
		      }
		      }
		   ?>
		</tbody>
    </table>
    </center>
    </div>
    </div>
    <div id="dropdown" onmouseleave="hide()">
        <table class="controller" cellspacing="0" cellpadding="0">
            <tr>
               <td class="head">
                <?php echo $nm; ?>
               </td>
            </tr>
            <tr>
               <td>
                <a href="Virtual Farm.html"><button type="button" class="clicks">AI Chat</button></a>
               </td>
            </tr>
            <tr>
               <td>
                <a href="Plant.php"><button type="button" class="clicks">Plant New Crop</button></a>
               </td>
            </tr>
            <tr>
               <td>
                <a href="Search.php"><button type="button" class="clicks">Catalogue</button></a>
               </td>
            </tr>
        </table>
    </div>
    </body>
</html>
<?php
   @session_start();
   $uid = $_SESSION['client'];
   $dz = mysqli_connect('localhost','openvirt_elzucky','danielpatrick','openvirt_main');
   $qz = mysqli_query($dz, "SELECT id FROM users WHERE emailphone = '$uid'");
   $id = 0;
   while ($rz = mysqli_fetch_array($qz)){
       $id = $rz['id'];
   }
   if (isset($_POST['submit'])){
       $tid = $_POST['submit'];
       $qa = mysqli_query($dz, "UPDATE u".$id."_transactions SET claimed = 'no' WHERE id='$tid'");
       echo '<script>window.location.replace("Dashboard.php");</script>';
   }
   if (isset($_POST['details'])){
       $tid = $_POST['details'];
       $qa = mysqli_query($dz, "SELECT * FROM u".$id."_harvests WHERE id='$tid'");
       $zn = $nm;
       @session_start();
       $ze = $_SESSION['client'];
       $zi = "";
       $za = "";
       while ($rt = mysqli_fetch_array($qa)){
           $zi = $rt['ref'];
           $za = $rt['location'];
       }
       $_SESSION['printname']=$zn;
       $_SESSION['printemail']=$zn;
       $_SESSION['printlocation']=$zn;
       $_SESSION['printref']=$zn;
       echo '<script>window.location="Print.php";</script>';
   }
?>