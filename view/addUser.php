<?php
$currentPage = "Users";
include_once ('inc/header.php');
include_once ('inc/menu.php');
if (isset ($_GET ['errormsg']))
    $errorMsg = $_GET ['errormsg'];
else
    $errorMsg = 'Sucess';
?>

    <div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-2 main">

        <h3 class="page-header">Add User</h3>

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

        <form action="processAddUser.php">
            <div class="form-group ">
                <label> User Name </label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group ">
                <label>Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                &nbsp;&nbsp;<input type="checkbox" name="isadmin" >
                <label>Is Admin</label>
            </div>

            <button type="submit" class="btn btn-default btn-success">Submit Expense</button>
            <a class="btn btn-default pull-right btn-warning" href="dashboard.php" role="button">Back 2
                Dashboard</a>
        </form>
    </div>

<?php
include_once ('inc/footer.php');
?>