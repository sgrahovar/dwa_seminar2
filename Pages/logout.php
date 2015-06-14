<?php 
session_start();
session_unset();
$_SESSION['User'] = null;
header('Location: index.php');
?>