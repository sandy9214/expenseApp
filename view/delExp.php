<?php
include_once ('inc/header.php');

if(isset($_GET['expId']))
    $expenseId = $_GET['expId'];

$transaction = new Transaction();
$delete = DAOFactory::getExpenseDAO()->delete($expenseId);
$transaction->commit();

if($delete > 0)
    $error = 'Sucess';
else
    $error ='Some Error Occured';

header("Location: dashboard.php?errormsg=$error");

include_once('inc/footer.php');
?>
