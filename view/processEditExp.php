<?php
session_start ();
include_once ('../include_dao.php');
include_once ('helperFunctions.php');

if (isset ( $_GET ['expdes'] ))
	$ExpDesp = $_GET ['expdes'];
if (isset ( $_GET ['expdate'] ))
	$ExpDate = $_GET ['expdate'];
if (isset ( $_GET ['expby'] ))
	$ExpBy = $_GET ['expby'];
else
	$ExpBy = $_SESSION ["userId"];
if (isset ( $_GET ['expamt'] ))
	$ExpAmt = $_GET ['expamt'];
if (isset ( $_GET ['expid'] ))
	$ExpId = $_GET ['expid'];

if ($ExpAmt > 0) {
	$expObj = new Expense ();
	
	$expObj->setExpenseId ( $ExpId );
	$expObj->setExpense ( $ExpDesp );
	$expObj->setDate ( $ExpDate );
	$expObj->setUserId ( findTillDot ( $ExpBy ) );
	$expObj->setAmount ( $ExpAmt );
	
	$transaction = new Transaction ();
	$update = DAOFactory::getExpenseDAO ()->update ( $expObj );
	$transaction->commit ();
	
	if ($update > 0) {
		$errormsg = "Sucess";
	}
} else {
	$errormsg = "Some Error Occured";
}
header ( "Location: editExp.php?expId=$ExpId&errormsg=$errormsg" );
?>