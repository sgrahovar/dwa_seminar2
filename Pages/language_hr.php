<?php

// Common words

$words = array(
	'jezik' => 'Jezik',
	'jezik1' => 'Hrvatski',
	'jezik2' => 'Engleski',
	'zivota' => 'života',
	'promijenjeno' =>'promijenjeno',
	'prica' => 'priča',
	'ispricano' =>'ispričano',
	'kuna' => 'kuna',
	'donirano' => 'donirano',
	'partneri' => 'partneri',
	'dobrodosao' => 'Dobrodošli',
	'dodajDonaciju' => 'Dodaj donaciju',
	'sakrij' => 'Sakrij',
	'trazi' => 'Traži',
	'loginEmail' => 'Login sa emailom',
	'loginFacebook' => 'Login sa facebookom',
	'mojProfil' => 'Moj profil',
	'mojeDonacije' => 'Moje donacije',
	'transakcije' => 'Moje transakcije'
	);


	if(isset($_GET['page']) && $_GET['page'] == 'addDonation')
	{
		$tmpArray = array(
			'naslov' => 'Naslov',
			'tekst' => 'Tekst',
			'kolikoDonirati' => 'Koliko želite donirati',
			'kadaZavrsavaDonacija' => 'Kada završava donacija',
			'kategorija' => 'Kategorija',
			'posalji' => 'Pošalji'		
			);

		$words = array_merge($words, $tmpArray);
	}

	if(isset($_GET['page']) && ($_GET['page'] == 'myDonations' || $_GET['page'] == 'showTransactions'))
	{
		$tmpArray = array(
			'naziv' => 'Naslov',
			'prikupljeno' => 'Donirano',
			'kada' => 'Kada'	
			);

		$words = array_merge($words, $tmpArray);		
	}

	if(isset($_GET['page']) && $_GET['page'] == "showUser")
	{
		$tmpArray = array(
			'ime' => 'Ime',
			'prezime' => 'Prezime',
			'drzava' => 'Država',
			'urediProfil' => 'Uredi profil'
			);

		$words = array_merge($words, $tmpArray);			
	}

?>