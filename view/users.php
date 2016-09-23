<?php
$currentPage = "Users";
include_once ('inc/header.php');
include_once ('inc/menu.php');

if(isset($_GET['errormsg']))
    $errorMsg = $_GET['errormsg'];
else
    $errorMsg = '0';
?>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h3 class="page-header">User Details
            <?php if($_SESSION["admin"]=="1"){?>
            <small> or </small><a class="btn btn-default btn-xs" href="addUser.php" role="button"> Add New User</a>
            <?php }?>
        </h3>

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

    <div class="table-responsive">
        <table id="example" class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="row">#</th>
                <th>User Name</th>
                <th>Roles</th>
                <th>No of Contributions</th>
                <th>Total Amt Contributed</th>
                <?php if ($_SESSION["admin"] == "1") { ?>
						<th>Modify Roles</th>
				<?php } ?>
            </tr>
            </thead>
            <tbody>
            <?php?>
            <tr>
            <?php 
            $userObj = DAOFactory::getUsersDAO()->queryAll();
            $temp = 1;
            foreach ($userObj as $users) {            
            ?>
				<td><?= $temp ?></td>
                <td><strong><?= $users->getUserName() ?></strong></td>
                <td><?php 
				if($users->getIsAdmin() == "1")
					echo "Administrator";
				else 
					echo "User";
                ?></td>
                <td><?php 
				$expObj = DAOFactory::getExpenseDAO()->queryByUserIdMonth($users->getUserId());
				?>
				<a href="othersExp.php?id=<?= $users->getUserId()?>"><?= count($expObj)?></a>
				</td>	
				<?php 
				$amt = DAOFactory::getExpenseDAO()->TotalExpenseById($users->getUserId())->getTotal();
				if($amt <= 0)
					$amt =0;
				?>			
				<td>Rs <?= $amt ?></td>
                <?php if ($_SESSION["admin"] == "1") { ?>
					<td><a href="">Edit</a> / <a onclick="return confirm('Delete this User?')"
					href="delUser.php?id=<?= $users->getUserId() ?>">Delete</a></td>
				<?php } ?>   
             </tr>
            <?php
            $temp++;
			}?>
            </tbody>
        </table>
    </div>
</div>

<?php
include_once('inc/footer.php');
?>