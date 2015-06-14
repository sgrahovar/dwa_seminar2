<div id="login">
<?php

if($_GET['page'] == 'login')
{
	switch((isset($_GET['method'])) && $_GET['method'] != null)
	{
		case 'email':
			
			echo '
			<div id="loginWithMail">
				<form method="post" action="">
					<div class="form-group">
						<label for="inputEmail">Email address</label>
						<input type="email" class="form-control inputTextArea" id="inputEmail" placeholder="Enter email" name="mail">
					</div>
					<div class="form-group">
						<label for="inputPassword">Password</label>
						<input type="password" class="form-control inputTextArea" id="inputPassword" placeholder="Password" name="password">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default" name="loginEmailButton">Submit</button>
					</div>
				</form>
			</div>
			';

			break;

		case 'facebook':

			break;

		case 'googleplus':
			echo '<p style="color: white;">Login with Google plus.</p>';
			break;

		default:
			echo '<p style="color: white;">Default action on $_GET[\'method\'] switch case</p>';
			break;
	}
}

if(isset($_POST['loginEmailButton']))
{
	$loginData = array(
			'email' => $_POST['mail'],
			'password' => $_POST['password']
			);	

	$user = new User();

	$user->loginUser($loginData);
}


?>
</div>