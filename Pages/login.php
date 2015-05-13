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
						<input type="email" class="form-control inputTextArea" id="inputEmail" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="inputPassword">Password</label>
						<input type="password" class="form-control inputTextArea" id="inputPassword" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			';

			break;

		case 'facebook':
			echo '<p style="color: white;">Login with Facebook</p>';
			break;

		case 'googleplus':
			echo '<p style="color: white;">Login with Google plus.</p>';
			break;

		default:
			echo '<p style="color: white;">Default action.</p>';
			break;
	}
}


?>