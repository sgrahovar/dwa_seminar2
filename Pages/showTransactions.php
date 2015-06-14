<div id="mojeTransakcije" class="border col-sm-12" style="padding: 10px;">
<?php
$donation = new Donation();

$transakcije = $donation->getMyTransactions($_SESSION['User']['ID']);

echo '<table class="table" style="color: white; margin-top: 10px;">';
echo '<tr>
		<th style="border-top: none;">ID</th>
		<th style="border-top: none;">'.$words['naziv'].'</th>
		<th style="border-top: none;">'.$words['prikupljeno'].'</th>
		<th style="border-top: none;">'.$words['kada'].'</th>
		';

	foreach($transakcije as $t)
	{	
		$date = strtotime($t['Datetime']);
		echo'
			<tr>
				<td>'.$t['ID'].'</td>
				<td><a href="index.php?page=showDonation&id='.$t['DonationID'].'" style="color: orange;">'.$t['Name_'.$language].'</a></td>
				<td>'.number_format($t['Amount'], 2, '.', ',').'</td>
				<td>'.date('d.m.Y. - H:i:s', $date).'</td>
		';
	}

echo '</table>';

?>
</div>