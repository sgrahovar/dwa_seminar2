<div id="donationList">
	<div id="donationListContent">
<?php

$donation = new Donation();

$allDonations = $donation->getAllDonations();

foreach ($allDonations as $d) 
{	
	if($d['currentAmount'] != 0)
	{
		$percent = (int)($d['currentAmount'] * 100 / $d['targetAmount']);
		if($percent > 100) $percent_width = 100;
		else $percent_width = $percent;
	}

	else
	{
		$percent = 0;
		$percent_width = 0;
	}

	$date1 = strtotime($d['endDate']);

	echo '
		<div class="item col-md-4 col-sm-6">
			<div class="thumbnail">
				<div class="itemImage">
					<img src="Images/donationImages/'.$d['Picture_url'].'.jpg" class="img-responsive">
				</div>
				<div class="itemInfo">
					<div class="itemProgress progress">
						<div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="'.$percent.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent_width.'%;">
							'.$percent.'%
						</div>
					</div>

					<h3>'.number_format($d['targetAmount'], 2, '.', ',').'</h3>
					<p>'. date("d.m.Y", $date1) .'</p>

					<a href="index.php?page=showDonation&id='.$d['ID'].'"><h2>'.$d['Name_'.$language].'</h2></a>

				</div>
			</div>
		</div> 
		';
}

?>
	</div>
<!--
	<div id="donationListPagination" class="col-sm-12" style="text-align: center;">
		<nav>
			<ul class="pagination" id="customPagination">
				<li>
					<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
					</a>
				</li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li>
					<a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
-->
	<div id="donationListPagination" class="col-sm-12" style="text-align: center; margin-top: 20px;">
    	<ul id="customPagination" class="pagination-sm"></ul>
	</div>

</div>