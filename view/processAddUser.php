<?php
session_start();
include_once('../include_dao.php');
include_once('helperFunctions.php');

if (isset ($_GET ['username']))
    $userName = $_GET ['username'];
if (isset ($_GET ['password']))
    $Pass = $_GET ['password'];
if (isset ($_GET ['isadmin']))
    $isAdmin = 1;

$userObj = new User();

$userObj->setUserName($userName);
$userObj->setPassword($Pass);
$userObj->setIsAdmin($isAdmin);

$transaction = new Transaction ();
$update = DAOFactory::getUsersDAO()->insert($userObj);
$transaction->commit();

if ($update > 0)
    $errormsg = "Sucess";
else
    $errormsg = "Some Error Occured";

header("Location: users.php");
?>