<?php
$currentPage = "Setting";
include_once ('inc/header.php');
include_once ('inc/menu.php');
if (isset ( $_GET ['errormsg'] ))
	$errorMsg = $_GET ['errormsg'];
else
	$errorMsg = '0';

$userObj = DAOFactory::getUsersDAO ()->load ( $_SESSION ["userId"] );
?>

<div class="col-sm-9 col-sm-offset-3 col-md-6 col-md-offset-2 main">
	<h3 class="page-header">Profile Settings</h3>

<?php if ($errorMsg !== '0' && $errorMsg !== 'Sucess') { ?>
        <div class="box box-default">
		<!-- /.box-header -->
		<div class="box-body">
			<div class="alert alert-danger alert-dismissible" id="alert">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">&times;</button>
				<h4>
					<i class="icon fa fa-ban"></i> <?= $errorMsg?>
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
					<i class="icon fa fa-ban"></i> Password Changed Sucessfully!
				</h4>
				You will be redirected to login page in few seconds..
			</div>
		</div>
		<!-- /.box-body -->
	</div>
	<?php session_destroy()?>
	
	<!-- redirection code in javascript needed -->
	<script type="text/javascript">
         <!--
            function Redirect() {
               window.location="dashboard.php";
            }            
            setTimeout('Redirect()', 3100);
         //-->
      </script>
	
    <?php } ?>


	<form action="processSettings.php" method="post">
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-2 col-form-label">Nick
				Name</label>
			<div class="col-xs-10">
				<input class="form-control" type="text" name="nickname"
					value="<?= $userObj->getUserName() ?>" id="example-text-input"
					disabled>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-2 col-form-label">First
				Name</label>
			<div class="col-xs-10">
				<input class="form-control" type="text" name="firstname"
					value="<?= $userObj->getFirstName() ?>" id="example-text-input">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-xs-2 col-form-label">Last
				Name</label>
			<div class="col-xs-10">
				<input class="form-control" type="text" name="lastname"
					value="<?= $userObj->getLastName() ?>" id="example-text-input">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-email-input" class="col-xs-2 col-form-label">Email</label>
			<div class="col-xs-10">
				<input class="form-control" type="email" name="email"
					value="<?= $userObj->getEmailid() ?>" id="example-email-input">
			</div>
		</div>

		<div class="form-group row">
			<label for="example-tel-input" class="col-xs-2 col-form-label">Phone</label>
			<div class="col-xs-10">
				<input class="form-control" type="tel" name="phone"
					value="<?= $userObj->getMobile() ?>" id="example-tel-input">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-password-input" class="col-xs-2 col-form-label">Current
				Password</label>
			<div class="col-xs-10">
				<input class="form-control" type="password" name="password"
					placeholder="Password@123" id="example-password-input">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-password-input" class="col-xs-2 col-form-label">
				New Password</label>
			<div class="col-xs-10">
				<input class="form-control" type="password" name="newpassword"
					placeholder="hunter@123" id="example-password-input">
			</div>
		</div>
		<div class="form-group row">
			<label for="example-password-input" class="col-xs-2 col-form-label">Confirm
				Password</label>
			<div class="col-xs-10">
				<input class="form-control" type="password" name="confirmpassword"
					placeholder="hunter@123" id="example-password-input">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-xs-4 col-form-label"></label>
			<div class="col-sm-5">
				<button type="submit"
					class=" form-control btn btn-default btn-warning">Update Changes</button>
			</div>
		</div>
	</form>
</div>
<?php include ("inc/footer.php");?>