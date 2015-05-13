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
							<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target="#top-nav-bar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class='navbar-brand'>
								<div class='user-info'></div>
							</div>                    
						</div>
						<div class="collapse navbar-collapse" id="top-nav-bar">
							<ul class="nav navbar-nav">
								<li class='menu'><a href='index.php'>Home</a></li>
								<li class='menu'><a href='index.php?page=donationItem'>Specific donation</a></li>
								<li class='menu'><a href='#'>Link</a></li>
								<li class='menu'><a href='#'>Link</a></li>
								<li class='menu'><a href='#'>Link</a></li>
							</ul>

							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Login<span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="index.php?page=login&method=email">Login with email</a></li>
										<li><a href="index.php?page=login&method=facebook">Login with facebook</a></li>
										<li><a href="index.php?page=login&method=googleplus">Login with Google Plus</a></li>
									</ul>
								</li>
								<li class='menu'><a href='index.php?page=register'>Register</a></li>
							</ul>

						</div>
					</div>
				</nav>
			</div>


<!-- Content
************************************************************************************************** -->
			<div class="row" style="margin: 0 auto; width: 100%; margin-top: 50px;">
				<!--
				<p style="color: white;">
					<?php
						function __autoload($class_name) 
						{
						    include 'Classes/'. $class_name . '.php';
						}
						$c = new ConnectionToDb();
						$c = null;
					?>
				</p>
				-->

				<div class="col-sm-9" id="divOne">

				<?php
//				include_once('pages/donationItem.php');
//				include_once('pages/donationList.php');

               if( !empty($_GET['page']))
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
					<h2>25 života</h2>
					<p>promijenjeno</p>

					<hr class="divider2">

					<h2>13 priča</h2>
					<p>ispričano</p>

					<hr class="divider2">

					<h2>1300 kuna</h2>
					<p>donirano</p>

					<hr class="divider2">

					<h2>Partneri</h2>

				</div>

				<div class="clear"></div>
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
		<!--     <script src="Scripts/jquery.fullscreenBackground.js"></script>	-->
		<!--     <script src="Scripts/custom-mobile"></script>  -->

	</body>
	</html>
