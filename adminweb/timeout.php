<?php
session_start();
function timer(){
$time=1000; //set the timer
$_SESSION[timeout]=time()+$time;
}
function ceklogin(){
$timeout=$_SESSION[timeout];
if(time()<$timeout){
timer();
return true;
}else{
unset($_SESSION[timeout]);
return false;
}
}
?>