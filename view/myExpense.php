<?php
$currentPage = "Expense";
include_once('inc/header.php');
include_once('inc/menu.php');
?>


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">Your Contributions in <?= date('F')?> </h3>
    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th>Expense Description</th>
                <th>Expense Date</th>
                <th>Expense Amount</th>
                <th>Modify Expense</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $temp = 0;
            $expense = DAOFactory::getExpenseDAO()->queryByUserIdMonth($_SESSION ["userId"]);
            foreach ($expense as $exp) {
                $temp++;
                ?>
                <tr>
                    <td><?= $temp ?></td>
                    <td><?= $exp->getExpense() ?></td>
                    <td><?= $exp->getDate() ?></td>                    
                    <td>Rs <?= $exp->getAmount() ?></td>
                    <td>
                    &emsp;
                    <a href="editExp.php?expId=<?= $exp->getExpenseId() ?>&errormsg=0" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>  
					&emsp;
					<a onclick="return confirm('Delete this expense?')"	href="delExp.php?expId=<?= $exp->getExpenseId() ?>" data-toggle="tooltip" title="Delete"><span class="glyphicon glyphicon-trash"></span></a></td>
							
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('inc/footer.php');
?>
