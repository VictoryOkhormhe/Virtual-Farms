var t = 0;
var cnt = 0;
function wel(){
   var ti = setTimeout(function(){
   var d = new Date();
   var h = d.getHours();
   var m = d.getMinutes();
   if (h < 12 && h >= 0){
   	 document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Good morning, dear. Please I want us to have a good conversation</td></tr></table></p>';
   }
   if (h >=12 && h <=15){
   	 document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Good afternoon, dear. Please I want us to have a good conversation</td></tr></table></p>';
   }
   if (h >=16 && h <=23){
   	 document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Good evening, dear. Please I want us to have a good conversation</td></tr></table></p>';
   }
   },2000);
}
var rise = 1;
function dz(){
   rise++;
   var inb = document.getElementById("msg").value;
   var m = document.getElementById("msg");
   var r = inb.toLowerCase();
   m.value="";
   if (rise == 2){
      setTimeout(function(){
        document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">My name is Smith. Please tell me yours</td></tr></table></p>';
   	    document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  },1000);
   }
   if (rise == 3){
      setTimeout(function(){
        document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Can I get your Email Address?</td></tr></table></p>';
   	    document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  },1500);
   }
   if (rise == 4){
      setTimeout(function(){
        document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">What suggestions or problems do you have concerning our farms?</td></tr></table></p>';
   	    document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  },1500);
   }
}
var q1 = "";
var q2 = "";
var q3 = "";
function snd(){
   var zz = setTimeout(dz,3500);
   var inb = document.getElementById("msg").value;
   var m = document.getElementById("msg");
   m.value="";
   document.getElementById("mess").innerHTML += '<p align="right" style="padding-top:5px;padding-right:10px;""><table><tr><td style="white-space:pre-wrap;background-color:green;color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">' + inb + '</td></tr></table></p>';
   var r = inb.toLowerCase();
   if (rise == 2){
   	  setTimeout(function(){
      document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Okay. Thanks</td></tr></table></p>';
   	  document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  q1 = inb;
   	  },1500);
   }
   if (rise == 3){
   	  setTimeout(function(){
      document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">That is nice. Ours is <a href="mailto:virtualfarmz@gmail.com">virtualfarmz@gmail.com</a></td></tr></table></p>';
   	  document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  q2 = inb;
   	  },1500);
   }
   if (rise == 4){
   	  setTimeout(function(){
      document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">Okay. Thanks for your response. You will get a response from our agents soon</td></tr></table></p>';
      document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px">To plant a crop, you need to create an account. Do so with this link...</td></tr></table></p>';
   	  document.getElementById("mess").innerHTML += '<p align="left" style="padding-top:15px;padding-left:10px;"><table><tr><td style="white-space:pre-wrap;background-color:white;border-radius:10px;padding:8px;font-family:tahoma;font-size:20px"><a href="Create Account.php">Register Now!</a></td></tr></table></p>';
   	  document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
   	  q3 = inb;
   	  feed();
   	  },4000);
   }
   document.getElementById("cont").scrollTop = document.getElementById("cont").scrollHeight;
}
function feed(){
    var interv =  setInterval(function(){
        var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200){
            if (this.responseText == "nav"){
                window.location.replace("Dashboard.php");
            }
            else{
                window.location.replace("index.html");
            }
        }
    };
    xhttp.open("GET","Take.php?name="+q1+"&email="+q2 + "&suggestion="+q3,true);
    xhttp.send();
    },6000);
}