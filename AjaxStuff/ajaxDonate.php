<?php
session_start();
ob_start();
header('content-type: application/json; charset=utf-8');
include_once('../Classes/Donation.php');

if(isset($_COOKIE['language'])){
    $language = $_COOKIE['language'];
}
else{
    setcookie("language", "hr", time() + (10 * 365 * 24 * 60 * 60)); $language = "hr";
}

$donation = new Donation();

if($_SESSION['User']['Credits'] < $_POST['donatedAmount'])
{
	if($language == "hr") echo 'Donirate više nego imate! Provjerite iznos donacije.';
	if($language == "en") echo 'You are donating more than you have! Check donated amount';
}

if($_SESSION['User']['Credits'] >= $_POST['donatedAmount'])
{
	if($donation->donate($_SESSION['User']['ID'], $_POST['donationId'], $_POST['donatedAmount']) == 1)
	{
	$_SESSION['User']['Credits'] = $_SESSION['User']['Credits'] - $_POST['donatedAmount'];
	if($language == "hr") echo 'Donacija uspješna. Refresham stranicu...';
	if($language == "en") echo 'Donation successful. Refreshing site...';
	}
	else
	{
	if($language == "hr") echo 'Donacija neuspješna. Refresham stranicu...';
	if($language == "en") echo 'Donation unsuccessful. Refreshing site...';		
	}

}








?>