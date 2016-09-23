<?php
$exp = DAOFactory::getExpenseDAO ()->TotalExpense ();
$myTExp = DAOFactory::getExpenseDAO ()->TotalExpenseById ( $_SESSION ['userId'] );
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li <?php if ($currentPage == "Dashboard") echo "class='active'" ?>><a
					href="dashboard.php">Expense Meter : <small>Rs <?= number_format($exp->getTotal()) ?></small>
				</a></li>
				<br>
				<li>
				<?php include_once ('inc/expenseBar.php');?>
				</li>
			</ul>
			<ul class="nav nav-sidebar">
				<li <?php if ($currentPage == "Expense") echo "class='active'" ?>><a
					href="myExpense.php">My Contributions : <small>Rs <?= number_format($myTExp->getTotal()) ?></small>
				</a></li>
				<li <?php if ($currentPage == "AddExpense") echo "class='active'" ?>><a
					href="addExp.php">Add Expense </a></li>
				<li
					<?php if ($currentPage == "EditExpense") echo "class='active'" ?>><a
					href="#">Edit Expense </a></li>
			</ul>

			<ul class="nav nav-sidebar">
				<li <?php if ($currentPage == "Users") echo "class='active'" ?>><a
					href="users.php">Other Users</a></li>
				<li <?php if ($currentPage == "Setting") echo "class='active'" ?>><a
					href="profile.php">Settings</a></li>
				<li <?php if ($currentPage == "SignOff") echo "class='active'" ?>><a
					href="logout.php">SignOff</a></li>
			</ul>

		</div>