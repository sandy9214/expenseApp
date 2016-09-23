<?php
session_start ();
include_once ('../include_dao.php');
include_once ('helperFunctions.php');

date_default_timezone_set ( 'Asia/Kolkata' );

$userObj = DAOFactory::getUsersDAO ()->load ( $_SESSION ["userId"] );

if (isset ( $_POST ['nickname'] ))
	$nicename = $_POST ['nickname'];
else
	$nicename = $userObj->getUserName ();

if (isset ( $_POST ['firstname'] ))
	$firstname = $_POST ['firstname'];
else
	$firstname = $userObj->getFirstName ();

if (isset ( $_POST ['lastname'] ))
	$lastname = $_POST ['lastname'];
else
	$lastname = $userObj->getLastName ();

if (isset ( $_POST ['email'] ))
	$email = $_POST ['email'];
else
	$email = $userObj->getEmailid ();

if (isset ( $_POST ['phone'] ))
	$phone = $_POST ['phone'];
else
	$phone = $userObj->getMobile ();

if (isset ( $_POST ['password'] )) {
	if ($_POST ['password'] != $userObj->getPassword ()) {
		$error = "Password not valid";
		header ( "Location: settings.php?errormsg=$error" );
	} else {
		if (isset ( $_POST ['newpassword'] ))
			$newpass = $_POST ['newpassword'];
		if (isset ( $_POST ['confirmpassword'] ))
			$confirmpass = $_POST ['confirmpassword'];
		if($newpass != $confirmpass){
			$error = "Password does not match";
			header ( "Location: settings.php?errormsg=$error" );
		}
	}
}

$newUserObj = new User();
$newUserObj->setUserName($nicename);
$newUserObj->setFirstName($firstname);
$newUserObj->setLastName($lastname);
$newUserObj->setEmailid($email);
$newUserObj->setMobile($phone);
$newUserObj->setPassword($newpass);

$transaction = new Transaction ();
$update = DAOFactory::getUsersDAO ()->update ( $newUserObj );
$transaction->commit ();

if ($update > 0) {
	$errormsg = "Sucess";
} else {
	$errormsg = "Some Error Occured";
}
header ( "Location: settings.php?errormsg=$errormsg" );
?>

	