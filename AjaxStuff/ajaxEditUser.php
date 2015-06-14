<?php
session_start();
ob_start();
header('content-type: application/json; charset=utf-8');
include_once('../Classes/User.php');

if(isset($_COOKIE['language'])){
    $language = $_COOKIE['language'];
}
else{
    setcookie("language", "hr", time() + (10 * 365 * 24 * 60 * 60)); $language = "hr";
}

$user = new User();

if($user->editUser($_SESSION['User']['ID'], $_POST['name'], $_POST['surname'], $_POST['email'], $_POST['cPw'], $_POST['nPw'])) 
	echo 'Success';
else echo 'Failed.';



?>