<?php
session_start();
/*
 * Security Code
 * If a user signout and copies the url
 * This code will handle
 * */
if (!isset ($_SESSION ['logged_in'])){
    header("Location: index.php");
}


include_once('../include_dao.php');
include_once('helperFunctions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ExpenseMonitor</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet"
	href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">	

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css"
          rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

	<!-- DataTables -->
	<link rel="stylesheet"
	href="../plugins/datatables/dataTables.bootstrap.css">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Expense Monitor</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">                
                <li><a href="myExpense.php"> Hi, <?= ucfirst($_SESSION["name"]) ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Expense <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="myExpense.php">Your Contribution</a></li>
                        <li><a href="addExp.php">Add Expense</a></li>
                    </ul>
                </li>
                <li><a href="users.php"> Users </a></li>
                <li><a href="profile.php"> Settings </a></li>
                <li><a href="logout.php">SignOff</a></li>
            </ul>

        </div>
    </div>
</nav>
