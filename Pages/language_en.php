<?php


// Common words

$words = array(
	'jezik' => 'Language',
	'jezik1' => 'Croatian',
	'jezik2' => 'English',
	'zivota' => 'lifes',
	'promijenjeno' => 'changed',
	'prica' => 'stories',
	'ispricano' => 'told',
	'kuna' => 'kuna',
	'donirano' => 'donated',
	'partneri' => 'partners',
	'dobrodosao' => 'Welcome',
	'dodajDonaciju' => 'Add donation',
	'sakrij' => 'Hide',
	'trazi' => 'Search',
	'loginEmail' => 'Login with email',
	'loginFacebook' => 'Login with facebook',
	'mojProfil' => 'My profile',
	'mojeDonacije' => 'My donations',
	'transakcije' => 'My transactions'
	);

	if(isset($_GET['page']) && $_GET['page'] == 'addDonation')
	{
		$tmpArray = array(
			'naslov' => 'Title',
			'tekst' => 'Text',
			'kolikoDonirati' => 'How much do you want to donate',
			'kadaZavrsavaDonacija' => 'When does the donation end',
			'kategorija' => 'Category',
			'posalji' => 'Submit'		
			);

		$words = array_merge($words, $tmpArray);
	}

	if(isset($_GET['page']) && ($_GET['page'] == 'myDonations' || $_GET['page'] == 'showTransactions'))
	{
		$tmpArray = array(
			'naziv' => 'Title',
			'prikupljeno' => 'Donated',
			'kada' => 'When'
			);

		$words = array_merge($words, $tmpArray);		
	}

	if(isset($_GET['page']) && $_GET['page'] == "showUser")
	{
		$tmpArray = array(
			'ime' => 'Name',
			'prezime' => 'Surname',
			'drzava' => 'Country',
			'urediProfil' => 'Edit profile'
			);

		$words = array_merge($words, $tmpArray);			
	}

?>