<html><head><meta name="viewport" content="user-scalable=0,width=device-width,initial-scale=1"><link rel="shortcut icon" href="icon.png"><title>Virtual Farms | Plants</title></head>
<style>
    body{
      margin:0;
      padding-top:25px;
    }
    .page-contents{
      width:95vw;
    }
    .plant-catalogue{
      float:left;
      width:400px;
      padding-top:20px;
    }
    h1{
      font-family:tahoma;
    }
    .crop{
      width:280px;
      height:260px;
      border-radius:50%;
      transition:1s;
      cursor:hand;
    }
    .catalogue-contents{
      font-family:tahoma;
      font-size:22px;
    }
    .tag{
      padding-top:10px;
    }
    .price-tag{
      padding:4px;
      background-color:white;
      border:5px solid orange;
      border-radius:10px;
      color:orange;
      font-family:elephant;
      cursor:hand;
      transition:1s;
    }
    .price-tag:hover{
      background-color:orange;
      border:5px solid white;
      border-radius:10px;
      color:white;
    }
    .unavailable{
      transition:1s;
      padding:4px;
      background-color:white;
      border:5px solid red;
      border-radius:10px;
      color:red;
      font-family:elephant;
      cursor:hand;
    }
    .unavailable:hover{
      background-color:red;
      border:5px solid white;
      border-radius:10px;
      color:white;
    }
    @media(max-width:750px){
     .page-contents{
        width:95vw;
     }
     .plant-catalogue{
        width:90vw;
        float:none;
     }
     .crop{
        width:80vw;
        height:75vw;
     }
    }
</style>
<body>
<center>
    <div class="page-contents">
        <center><h1>Plant Catalogue</h1></center>
      <center>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit1.jpg" class="crop" id="f1" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Cassava</b></center></td></tr>
          <tr><td><center><font color="green"><b>Manihot esculenta</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit2.jpg" class="crop" id="f2" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Lettuce</b></center></td></tr>
          <tr><td><center><font color="green"><b>Lactuca sativa</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="unavailable">Not Available</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit3.jpg" class="crop" id="f3" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Cabbage</b></center></td></tr>
          <tr><td><center><font color="green"><b>Brassica oleracea var. capitata</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit4.jpg" class="crop" id="f4" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Onions</b></center></td></tr>
          <tr><td><center><font color="green"><b>Allium cepa</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit5.jpg" class="crop" id="f5" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Maize</b></center></td></tr>
          <tr><td><center><font color="green"><b>Zea mays</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="unavailable">Not Available</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit6.jpg" class="crop" id="f6" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Carrot</b></center></td></tr>
          <tr><td><center><font color="green"><b>Daucus carota</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit7.jpg" class="crop" id="f7" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Pepper</b></center></td></tr>
          <tr><td><center><font color="green"><b>Capsicum</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="unavailable">Not Available</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit8.jpg" class="crop" id="f8" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Tomatoes</b></center></td></tr>
          <tr><td><center><font color="green"><b>Solanum lycopersicum</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
       <div class="plant-catalogue">
          <table class="catalogue-contents">
          <tr>
             <td><center><img src="images/fruit9.jpg" class="crop" id="f9" onclick="window.location='Create Account.php'"></center></td>
          </tr>
          <tr><td><center><b>Potatoes</b></center></td></tr>
          <tr><td><center><font color="green"><b>Solanum tuberosum</b></font></center></td></tr>
          <tr><td class="tag"><center><label class="price-tag">NGN 2500</label></center></td></tr>
          </table>
       </div>
     </center>
    </div>
</center>
</body>
</html>