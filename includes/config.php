<?php
session_start(); 
$db = mysqli_connect('localhost', 'root', '', 'rasti');
if(!$db){
	echo "خەلەتیەک هەیە ل ناڤا داتابەیسێ دا !";
}
date_default_timezone_set("Asia/Baghdad");
// Security Conf
function sec($data) {
	global $db;
	$data = mysqli_real_escape_string($db, htmlspecialchars($data));
	return $data;
}

// Admin Session And Logout
if(isset($_SESSION['adminid'])){
	$AdminId = $_SESSION['adminid'];
}
if(isset($_GET['logout'])){
    session_unset();
    unset($_SESSION['adminid']);
    session_destroy();
    header('Location: index.php');
}
?>