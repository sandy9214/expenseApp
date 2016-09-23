
<?php
$currentPage = "Dashboard";
include_once('inc/header.php');
include_once('inc/menu.php');
if(isset($_GET['errormsg']))
	$errorMsg = $_GET['errormsg'];
else
	$errorMsg = '0';
?>

<link rel="stylesheet"
	href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
	
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div>
			<h3 class="page-header"> Expenses for <?= date('F')?></h3>
		</div>

		<?php if ($errorMsg !== '0' && $errorMsg !== 'Sucess') { ?>
			<div class="box box-default">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="alert alert-danger alert-dismissible" id="alert">
						<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-ban"></i> <?= $errorMsg ?>
						</h4>
						Please Try Again !!
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		<?php } ?>

		<?php if ($errorMsg == 'Sucess') { ?>
			<div class="box box-default">
				<!-- /.box-header -->
				<div class="box-body">
					<div class="alert alert-success alert-dismissible" id="alert">
						<button type="button" class="close" data-dismiss="alert"
								aria-hidden="true">&times;</button>
						<h4>
							<i class="icon fa fa-ban"></i> <?= $errorMsg ?>
						</h4>
						1 Expense Deleted
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		<?php } ?>
		
		<div class="table-responsive">
			<table  id="example" class="table table-striped table-hover">
				<thead>
				<tr>
					<th scope="row">#</th>
					<th>Expense Description</th>
					<th>Expense Date</th>
					<th>Expense By</th>
					<th>Expense Amount</th>
					<?php if ($_SESSION["admin"] == "1") { ?>
						<th>Modify Expense</th>
					<?php } ?>
				</tr>
				</thead>
				<tbody>
                <?php
                $temp = 0;
				$expense = DAOFactory::getExpenseDAO()->expenseByMonth();
				if (!empty ($expense)) {
					foreach ($expense as $exp) {
						$temp++;
						?>
                        <tr>
							<td><?= $temp ?></td>
							<td><?= $exp->getExpense() ?></td>
							<td><?= $exp->getDate() ?></td>
							<td>
								<?php
								$user = DAOFactory::getUsersDAO()->load($exp->getUserId());
								echo $user->getUserName();
								?>
							</td>
							<td>Rs <?= $exp->getAmount() ?></td>
							<?php if ($_SESSION["admin"] == "1") { ?>
								<td>
								&emsp;
								<a href="editExp.php?expId=<?= $exp->getExpenseId() ?>&errormsg=0" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>  
								 &emsp;
								 <a onclick="return confirm('Delete this expense?')"	href="delExp.php?expId=<?= $exp->getExpenseId() ?>" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							<?php } ?>
						</tr>
                        <?php
					}
				} else {
					echo "Sorry No Data";
				}
				?>
                </tbody>
			</table>
		</div>
	</div>
	</div>
	</div>


<?php
include_once('inc/footer.php');
?>