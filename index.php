<?php
session_start();
ob_start();
function __autoload($class_name) 
{
    include 'Classes/'. $class_name . '.php';
}

if(!isset($_SESSION['User'])) $_SESSION['User'] = null;

if(isset($_COOKIE['language'])){
    $language = $_COOKIE['language'];
}
else{
    setcookie("language", "hr", time() + (10 * 365 * 24 * 60 * 60)); $language = "hr";
}

include_once('Pages/language_'.$language.'.php');

/* Change the part below - $donation->getBasicStats() -> cache it?
-------------------------------------------------- */

unset($_SESSION['BasicStats']);
if(!isset($_SESSION['BasicStats']))
{
	$donation = new Donation(null);

	$_SESSION['BasicStats'] = $donation->getBasicStats();

	$donation = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">	-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Seminar 2</title>

	<!-- Bootstrap -->
	<link href="Scripts/bootstrap-3.3.4-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="Styles/custom.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Economica|Jura|Shadows+Into+Light+Two|Amaranth' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="Scripts/zebra_datepicker/css/bootstrap.css" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>
	<body>
			<div id="bg-pattern"></div>
			<div id="bg-darker"></div>

		<div class="content-fluid nav-push" id="contentDiv">

<!-- Navigation
************************************************************************************************** -->
			<div class="row">
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="btn btn-default pull-left navbar-btn visible-xs-block searchNav" 
							style="background-color: #101010; margin-left: 15px;">
								<span class="glyphicon glyphicon-search" aria-hidden="true" style="color: #9d9d9d;"></span>
							</button>
							<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#top-nav-bar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="top-nav-bar">
							<ul class="nav navbar-nav">
								<li class='menu'><a href='index.php'>Home</a></li>
								<?php if($_SESSION['User'] != null) echo '<li class="menu"><a href="index.php?page=addDonation">'.$words['dodajDonaciju'].'</a></li>'; ?>
								<li class="menu"><a href="#" class="hidden-xs searchNav"><?php echo $words['trazi']; ?></a></li>
							</ul>
							<?php
								include_once('Pages/menuBarUser.php');
							?>

						</div>
					</div>
				</nav>
			</div>

			<div id="siteContent">
<!-- Content
************************************************************************************************** -->
				<div class="row" style="margin: 0 auto; width: 100%; margin-top: 50px;">

					<div class="col-sm-9" id="divOne">

					<div id="search" class="col-sm-12 border" style="margin: 0 0 10px 0; display: none; height: auto; ">
						<div class="form-group">
							<label for="searchText" style="color: white;">Text</label>
							<input type="text" class="form-control" id="ajaxSearchText" placeholder="Text">
						</div>		

						<div class="form-group">
							<button type="button" class="btn btn-default" id="ajaxSearch"> <?php echo $words['trazi']; ?></button>
							<button type="button" class="btn btn-default" id="hideSearch"> <?php echo $words['sakrij']; ?></button>
						</div>
					</div>

					<?php
	//				include_once('pages/donationItem.php');
	//				include_once('pages/donationList.php');

	                if(!empty($_GET['page']))
	                {
	                	$pages_dir = 'Pages';
	                    $pages = scandir($pages_dir, 0);
	                    unset($pages[0], $pages[1]);                      
	                    $a = $_GET['page'];

	                    if(in_array($a . '.php', $pages )) 
	                    {
	                         include ($pages_dir.'/'.$a.'.php');
	                    }
	                    else echo '
	                         <div class="col-xs-12 homeDiv" style="background-color:#96652B; height: auto;">
	                              <p>Stranica nije pronađena</p>
	                         </div>
	                         ';                     
	                }
	                else
	                    include('Pages/donationList.php');

					?> 

					</div>

					<div class="col-sm-3 fixed" id="divTwo">
						<h2><?php echo $_SESSION['BasicStats']['Successful'] . ' ' . $words['zivota']; ?></h2>
						<p><?php echo $words['promijenjeno']; ?></p>

						<hr class="divider2">

						<h2><?php echo number_format($_SESSION['BasicStats']['TotalDonations'], 0, '.', ',') . ' ' . $words['prica']; ?></h2>
						<p><?php echo $words['ispricano']; ?></p>

						<hr class="divider2">

						<h2><?php echo number_format($_SESSION['BasicStats']['Donated'], 0, '.', ',') . ' ' . $words['kuna']; ?></h2>
						<p><?php echo $words['donirano']; ?></p>

						<hr class="divider2">

						<h2><?php echo $words['partneri']; ?></h2>
					</div>

					<div class="clear"></div>
				</div>
			</div>

		</div>


<!-- Potrebne skripte
************************************************************************************************** -->

		<script src="Scripts/jquery-1.11.2.min.js"></script>
		<script src="Scripts/jquery-1.3.2-mobile.custom.min.js"></script>
		<script src="Scripts/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script>
		<script src="Scripts/jquery.cookie.js"></script>
		<script src="Scripts/custom.js"></script>
		<script src="Scripts/backstretch.js"></script>
		<script src="Scripts/validator.js"></script>
		<script src="Scripts/jquery.twbsPagination.min.js"></script>
		<!--     <script src="Scripts/jquery.fullscreenBackground.js"></script>	-->
		<!--     <script src="Scripts/custom-mobile"></script>  -->
		<script type="text/javascript" src="Scripts/zebra_datepicker/javascript/zebra_datepicker.js"></script>

		<!-- Smart menu bootstrap plugin 
		<script type="text/javascript" src="Scripts/smartmenus-0.9.7/jquery.smartmenus.min.js"></script>
		<script type="text/javascript" src="Scripts/smartmenus-0.9.7/addons/bootstrap/jquery.smartmenus.bootstrap.min.js"></script>
		-->

		

	</body>
	</html>
