 function chpass(){
   var p = document.getElementById("pass").value;
   var plength = p.length;
   var v = document.getElementById("con");
   if (plength != 0){
     if (plength <= 3){
   	 v.innerHTML = "  Weak";
   	 v.style.color="red";
   }
   if (plength > 3 && plength <= 7){
   	 v.innerHTML = "  Fair";
   	 v.style.color="orange";
   }
   if (plength > 7){
   	 v.innerHTML = "  Strong";
   	 v.style.color="green";
   }
   }
   else{
   	 v.innerHTML ="";
   }
 }
 function conpass(){
   var p = document.getElementById("pass").value;
   var c = document.getElementById("cpas").value;
   var cnt = c.length;
   var v = document.getElementById("ver");
   if (cnt != 0){
     if (p == c){
   	  v.innerHTML = "  Confirmed";
   	  v.style.color="green";
   }
   else{
   	  v.innerHTML = "  Passwords do not match";
   	  v.style.color="red";
   }
   }
   else{
   	v.innerHTML ="";
   }
 }