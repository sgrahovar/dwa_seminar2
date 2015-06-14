<?php
$donation = new Donation();
$result = $donation->getOneDonation($_GET['id']);

if($result['currentAmount'] != 0)
{
	$percent = (int)($result['currentAmount'] * 100 / $result['targetAmount']);
	if($percent > 100) $percent_width = 100;
	else $percent_width = $percent;
}

else
{
	$percent = 0;
	$percent_width = 0;
}

$date1 = strtotime($result['endDate']);
?>

<div id="donationItem">

		<div id="donationItemInfo">
			<div class="col-sm-4 text">

				<div class="itemProgress progress">
					<div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="<?php echo $percent; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent_width; ?>%;">
						<?php echo $percent . '%'; ?>
					</div>
				</div>

				<h3> <?php echo number_format($result['currentAmount'], 2, '.', ','); ?> <span>of <?php echo number_format($result['targetAmount'], 0, '.', ','); ?></span> </h3>
				<div class="clear"></div>
				<p><?php echo date("d.m.Y", $date1); ?></p>

				<a href="#" class="donateButton"> <h3>Donate</h3> </a>

				<p>Tag<br>Location</p>

			</div>

			<div class="col-sm-8 imageArea">
				<img src="Images/donationImages/<?php echo $result['Picture_url']; ?>.jpg" class="img-responsive">
			</div>

		</div>	
	
		<div id="donationItemContent" class="col-sm-12">
			<h2><?php echo $result['Name_'.$language]; ?></h2>

			<p>
				<?php echo $result['Description_'.$language]; ?>
			</p>

		</div>
<input type="hidden" value="<?php echo $_GET['id'];?>" id="hiddenValueId">
</div>

<!--

<div id="donationComments" class="border col-sm-12">
	<button type="button" class="btn btn-default" id="addCommentButton" style="margin-bottom: 10px;"> Add comment </button>
	<input type="hidden" value="<?php echo $_GET['id'];?>" id="hiddenValueId">

	<div class="col-sm-12 border comment">
		<p style="float: left; font-weight: bold;">Sanjin Grahovar Sadiković</p>
		<p style="float: right;">24.08.1991 - 21:33</p>
		<div class="clear"></div>
		<p>Text text Please donate and help my sister and her family get back on their feet.
			It is the hardest thing to loose everything you have. Especially on Mother's Day. Please donate and help my sister and her family get back on their feet.
			They have two boys Ryan who will be turning 5 next week and Aidan who is 1.
		</p>
	</div>

</div>

-->