<div id="mojeDonacije" class="border col-sm-12" style="padding: 10px;">
<?php
$donation = new Donation();

$donacije = $donation->getMyDonations($_SESSION['User']['ID']);

echo '<table class="table" style="color: white; margin-top: 10px;">';
echo '<tr>
		<th style="border-top: none;">ID</th>
		<th style="border-top: none;">'.$words['naziv'].'</th>
		<th style="border-top: none;">'.$words['prikupljeno'].'</th>
		';

	foreach($donacije as $d)
	{
		echo'
			<tr>
				<td>'.$d['ID'].'</td>
				<td><a href="index.php?page=showDonation&id='.$d['ID'].'" style="color: orange;">'.$d['Name_'.$language].'</a></td>
				<td>'.$d['currentAmount'].' / '.$d['targetAmount'].'</td>
		';
	}

echo '</table>';

?>
</div>