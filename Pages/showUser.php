<div id="user" class="border" style="padding: 10px;">

<?php
$user = new User();
$data = $user->getData($_GET['id']);

echo '
<table class="table" id="showProfile">
	<tr>
		<td style="width: 25%; border-right: 1px solid white;">'.$words['ime'].'</td>
		<td id="showProfileName">'.$data['Name'].'</td>
	</tr>
	<tr>
		<td style="border-right: 1px solid white;">'.$words['prezime'].'</td>
		<td id="showProfileSurname">'.$data['Surname'].'</td>
	</tr>
	<tr>
		<td style="border-right: 1px solid white;">Email</td>
		<td id="showProfileEmail">'.$data['Email'].'</td>
	</tr>
	<tr>
		<td style="border-right: 1px solid white;">'.$words['drzava'].'</td>
		<td id="showProfileCountry">'.$data['Country'].'</td>
	</tr>
</table>
';


if($_GET['id'] == $_SESSION['User']['ID'])
	echo '<button type="button" id="editProfileButton" class="btn btn-default">'.$words['urediProfil'].'</button>';


?>

</div>