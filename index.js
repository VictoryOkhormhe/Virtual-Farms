function scheck(){
  var k = document.getElementById("scr");
  if (k.scrollTop >= 400){
    document.getElementById("menu").style.height = "55px";
  }
  else{
    document.getElementById("menu").style.height = "90px";
  }
}
function fun(){
  document.getElementById("error").innerHTML = "";
  document.getElementById("username").value="";
  document.getElementById("password").value="";
}
function vis(){
  document.getElementById('login').style.opacity="1";
  document.getElementById('login2').style.opacity="1";
}
function invis(){
  document.getElementById('login').style.opacity="0";
  document.getElementById('login2').style.opacity="0";
}