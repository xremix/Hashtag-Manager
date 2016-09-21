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

$GLOBALS["loggedIn"] = !!$userid;

include('layout/header.inc.php');
if(!$GLOBALS["loggedIn"]){
	include ('register.inc.php');
}else{
	if(isset($_GET["site"]) && $_GET["site"] == "about"){
		include ('about.inc.php');
	}else{
		include ('main.inc.php');	
	}
	
}
include('layout/footer.inc.php');

?>