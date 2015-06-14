<?php
if($_SESSION['User'] == null)
echo '
<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a href="index.php?page=login&method=email">'.$words['loginEmail'].'</a></li>
			<li class="menu"><a href="index.php?page=loginWithFacebook">'.$words['loginFacebook'].'</a></li>
		</ul>
	</li>
	<li class="menu"><a href="index.php?page=register">Register</a></li>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'. $words['jezik'] .'<span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">
			<li><a class="chooseLanguage" href="#" data-lang="hr">'. $words['jezik1'] .'</a></li>
			<li><a class="chooseLanguage" href="#" data-lang="en">'. $words['jezik2'] .'</a></li>
		</ul>
	</li>
</ul>';
else echo '
	<ul class="nav navbar-nav navbar-right">
		<li class="menu"><p class="navbar-text" style="margin-left: 15px;"><span id="userCredits">'.number_format($_SESSION['User']['Credits'], 2, '.', ',').'</span> kuna</p></li>
		<li class="menu"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
		'.$words['dobrodosao'].', '. $_SESSION['User']['Name'] .'<span class="caret"></span></a>
		    <ul class="dropdown-menu" role="menu">
		    	'. ($_SESSION['User']['Role'] == 2 ? '<li class="menu"><a href="index.php?page=adminpage">Admin</a></li>' : '') .'
		    	<li class="menu"><a href="index.php?page=showUser&id='.$_SESSION['User']['ID'].'">'. $words['mojProfil'] .'</a></li>
		    	<li class="menu"><a href="index.php?page=myDonations">'. $words['mojeDonacije'] .'</a></li>
		    	<li class="menu"><a href="index.php?page=showTransactions">'. $words['transakcije'] .'</a></li>
			</ul>
		</li>
		<li class="menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'. $words['jezik'] .'<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a class="chooseLanguage" href="#" data-lang="hr">'. $words['jezik1'] .'</a></li>
				<li><a class="chooseLanguage" href="#" data-lang="en">'. $words['jezik2'] .'</a></li>
			</ul>
		</li>	
		<li class="menu"><a href="index.php?page=logout">Logout</a></li>								
	</ul>
	';
?>