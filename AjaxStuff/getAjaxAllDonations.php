<?php
header('content-type: application/json; charset=utf-8');
include_once('../Classes/Donation.php');

if(isset($_COOKIE['language'])){
    $language = $_COOKIE['language'];
}
else{
    setcookie("language", "hr", time() + (10 * 365 * 24 * 60 * 60)); $language = "hr";
}

$donation = new Donation();

$donations = $donation->getFilteredDonations(strtolower($_POST['search']), strtolower($_POST['country']), $_POST['page'], $language);

/* Ajax - returns a json array to .done()
echo json_encode($donations);
*/

//echo json_encode($donations);



foreach ($donations as $d) 
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

/*
echo '<pre>';
print_r($donations);
echo '</pre>';
*/

?>