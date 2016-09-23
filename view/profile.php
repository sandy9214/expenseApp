<?php
$currentPage = "Setting";
include_once ('inc/header.php');
include_once ('inc/menu.php');
if (isset ( $_GET ['errormsg'] ))
	$errorMsg = $_GET ['errormsg'];
else
	$errorMsg = '0';
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
    
	<img data-src="holder.js/200x230"
		src="../uploads/<?= $_SESSION ["userId"]?>.jpeg" class="img-thumbnail">
	<br> <br>

	<form action="processProfile.php" method="post"
		enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-4 control-label">Change Profile Photo</label>
			<div class="col-sm-5">
				<input type="file" class="file" name="pic"> <br>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-4 control-label">Change Password</label>
			<div class="col-sm-5">
				<input type="password" class="form-control" name="pass"
					placeholder="New Password">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-4 control-label">
				<br>
				<button type="submit"
					class=" form-control btn btn-default btn-success">Submit Changes</button>
			</div>
		</div>
	</form>

</div>

<?php include ("inc/footer.php");?>