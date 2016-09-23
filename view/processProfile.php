<?php
session_start ();
include_once ('../include_dao.php');
include_once ('helperFunctions.php');

date_default_timezone_set ( 'Asia/Kolkata' );

$target_dir = "../uploads/";

if (isset ( $_POST ['pass'] ))
	$password = $_POST ['pass'];

$userObj = new User ();

$userObj->setUserId ( $_SESSION ['userId'] );
$userObj->setPassword ( $password );
$userObj->setUserName ( $_SESSION ['name'] );
$userObj->setIsAdmin ( $_SESSION ['admin'] );
$userObj->setDate ( date ( "Y-m-d H:i:s" ) );

$transaction = new Transaction ();
$update = DAOFactory::getUsersDAO ()->update ( $userObj );
$transaction->commit ();

if ($update > 0) {
	$errormsg = "Sucess";
} else {
	$errormsg = "Some Error Occured";
}
header ( "Location: profile.php?errormsg=$errormsg" );
?>