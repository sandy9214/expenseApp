<?php
$currentPage = "EditExpense";
include_once('inc/header.php');
include_once('inc/menu.php');
$expenseId = $_GET ['expId'];
$exp = DAOFactory::getExpenseDAO()->load($expenseId);
$userObj = DAOFactory::getUsersDAO()->queryAll();
if (isset ($_GET ['errormsg']))
    $errorMsg = $_GET ['errormsg'];
?>
    <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-2 main">

        <h3 class="page-header">Update Expense
            <small> or </small><a class="btn btn-default btn-xs" href="addExp.php" role="button"> Add New</a>
        </h3>

        <?php if ($errorMsg != "0" && $errorMsg != "Sucess") { ?>
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                        <h4>
                            <i class="icon fa fa-ban"></i> <?= $errorMsg ?>
                        </h4>
                        Please Change The Value And Press Update Expense Button Again !!
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        <?php } ?>
        <?php if ($errorMsg == "Sucess") { ?>
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-success alert-dismissible" id="alert">
                        <button type="button" class="close" data-dismiss="alert"
                                aria-hidden="true">&times;</button>
                        <h4>
                            <i class="icon fa fa-ban"></i> Value Updated Sucessfully
                        </h4>
                        You Can Get Back To Dashboard Now!!
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        <?php } ?>

        <form action="processEditExp.php">
            <input type="hidden" name="expid" value="<?= $expenseId ?>">
            <div class="form-group ">
                <label> Expense Description
                    <small>(feed a precise
                        description)
                    </small>
                </label>
                <textarea name="expdes" class="form-control" rows="4"><?= $exp->getExpense() ?></textarea>
            </div>
            <div class="form-group ">
                <label>Expense Date</label> <input type="text" name="expdate"
                                                   class="form-control" value="<?= $exp->getDate() ?>">
            </div>
            
            <?php if($_SESSION["admin"] == "1"){?>
            	<div class="form-group ">
                <label>Expense By</label> <select class="form-control" name="expby">
                    <option><?= $exp->getUserId() . "." . DAOFactory::getUsersDAO()->load($exp->getUserId())->getUserName() ?></option>
                    <?php foreach ($userObj as $user) { ?>
                        <option><?= $user->getUserId() . "." . $user->getUserName() ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php }?>            
            

            <div class="form-group ">
                <label>Expense Amount
                    <small>(in Indian Rupees)</small>
                </label> <input
                    type="text" name="expamt" class="form-control"
                    value="<?= $exp->getAmount() ?>">
            </div>

            <button type="submit" class="btn btn-default btn-success">Update Expense</button>
            <a class="btn btn-default pull-right btn-warning" href="dashboard.php" role="button">Back 2
                Dashboard</a>
        </form>
    </div>

<?php include_once('inc/footer.php'); ?>