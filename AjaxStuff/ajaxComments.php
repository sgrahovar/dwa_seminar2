<?php
session_start();
ob_start();
header('content-type: application/json; charset=utf-8');
include_once('../Classes/Comment.php');

if(isset($_COOKIE['language'])){
    $language = $_COOKIE['language'];
}
else{
    setcookie("language", "hr", time() + (10 * 365 * 24 * 60 * 60)); $language = "hr";
}

if($_GET['type'] == 'insert')
{
	$comment = new Comment();

	$comment->addComment($_SESSION['User']['ID'], $_POST['id'], $_POST['text'], $_POST['replyToId']);

	echo $_SESSION['User']['ID'] . ' ' . $_POST['id'] . ' ' . $_POST['text'] . '<br>';
}

?>