<?php
$currentPage = "AddExpense";
include_once ('inc/header.php');
include_once ('inc/menu.php');
if (isset ($_GET ['errormsg']))
    $errorMsg = $_GET ['errormsg'];
else
    $errorMsg = 'Sucess';
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-2 main">

        <h3 class="page-header">Add Expense</h3>

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

        <form action="processAddExp.php">
            <div class="form-group ">
                <label> Expense Description <small>(feed a precise description)</small></label>
                <textarea name="expdes" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group ">
                <label>Expense Date</label>
                <input type="datetime-local" name="expdate" class="form-control" required>
            </div>

            <?php if($_SESSION['admin'] === '1'){?>
                <div class="form-group ">
                    <label>Expense By</label>
                    <select class="form-control" name="expby" required>
                        <?php $userObj = DAOFactory::getUsersDAO()->queryAll()?>
                        <?php foreach ($userObj as $user) { ?>
                            <option><?= $user->getUserId() . '.' . $user->getUserName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            <?php }?>


            <div class="form-group ">
                <label>Expense Amount
                    <small>(in Indian Rupees)</small>
                </label> <input
                    type="text" name="expamt" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-default btn-success">Submit Expense</button>
            <a class="btn btn-default pull-right btn-warning" href="dashboard.php" role="button">Back 2
                Dashboard</a>
        </form>
    </div>

<?php
include_once ('inc/footer.php');
?>