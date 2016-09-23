<?php
$currentPage = "Users";
include_once ('inc/header.php');
include_once ('inc/menu.php');

if(isset($_GET['id']))
    $userId = $_GET['id'];

$transaction = new Transaction();
$delete = DAOFactory::getUsersDAO()->delete($userId);
$transaction->commit();

if($delete>0)
    $error = 'Sucess';
else
    $error ='Some Error Occured';

header("Location: users.php?errormsg=$error");

include_once('inc/footer.php');
?>
