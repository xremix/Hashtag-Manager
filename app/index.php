<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);
$userid = null;

if(isset($_COOKIE["userid"])){
	$userid = $_COOKIE["userid"];
}else{
	if(isset($_GET['email'])){
		$userid = md5($_GET['email']);
		setcookie("userid", $userid);
	}
}
if(!$userid){
	include ('register.html');
}else{
	include ('main.html');
}

?>