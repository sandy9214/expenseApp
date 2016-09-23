<!-- php code for the expense bar -->
<?php
$expBar = DAOFactory::getBudgetDAO ()->queryCurrentMonth ();
$estimatedBGT = $expBar->getEstimatedBudget ();
$realBGT = $expBar->getRealExpense ();
$percent = ($realBGT / $estimatedBGT) * 100;
?>

<?php if($percent>'100'){?>
<div class="progress" data-toggle="tooltip"
	title="Out of Estimation by <?= abs(100-round($percent))?>% !">
	<div class="progress-bar progress-bar-danger" style="width: 100%"
		data-toggle="tooltip">
		<span class="sr-only"></span>
	</div>
<?php }else {?>
<div class="progress" data-toggle="tooltip"
		title="<?= round($percent)?>% expensed!">
				 <?php if($percent < '36'){?>
				<div class="progress-bar progress-bar-success" style="width: <?= $percent?>%"
					 data-toggle="tooltip">
			<span class="sr-only"></span>
		</div>
				<?php }elseif ($percent < '71'){?>
				
				<div class="progress-bar progress-bar-success" style="width: 35%"
			data-toggle="tooltip">
			<span class="sr-only"></span>
		</div>
		<div class="progress-bar progress-bar-warning" style="width: <?= ($percent-35)?>%">
			<span class="sr-only"></span>
		</div>
	<?php }else{?>
	
	<div class="progress-bar progress-bar-success" style="width: 35%"
			data-toggle="tooltip">
			<span class="sr-only"></span>
		</div>
		<div class="progress-bar progress-bar-warning" style="width: 35%">
			<span class="sr-only"></span>
		</div>

		<div class="progress-bar progress-bar-danger" style="width: <?= ($percent-70)?>%"
		data-toggle="tooltip">
			<span class="sr-only"></span>
		</div>
	<?php }?>
</div>
<?php }?>
