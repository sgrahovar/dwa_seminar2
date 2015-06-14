

<div id="register">

	<div class="col-sm-12 border">
			<form method="post" action="" data-toggle="validator">
				<div class="form-group">
					<label for="inputEmail">Email address</label>
					<?php
					if(isset($_SESSION['tmpSocialNetworks']))
						echo '<input type="email" class="form-control inputTextArea" id="inputEmail" value="'. $_SESSION['tmpSocialNetworks']['email'] .'" name="mail" readonly>';
					else
					{
						echo '<input type="email" class="form-control inputTextArea" id="inputEmail" placeholder="Enter email" name="mail"
							data-error="Invalid email address." required>';
						echo '<div class="help-block with-errors"></div>';
					}
					?>
				</div>
				<div class="form-group">
					<label for="inputName">Name</label>
					<?php
					if(isset($_SESSION['tmpSocialNetworks']))
						echo '<input type="text" class="form-control inputTextArea" id="inputName" value="'. $_SESSION['tmpSocialNetworks']['firstName'] .'" name="name" readonly>';
					else
						echo '<input type="text" class="form-control inputTextArea" id="inputName" placeholder="Name" name="name" required>';
					?>
				</div>
				<div class="form-group">
					<label for="inputSurname">Surname</label>
					
					<?php
					if(isset($_SESSION['tmpSocialNetworks']))
						echo '<input type="text" class="form-control inputTextArea" id="inputSurname" value="'. $_SESSION['tmpSocialNetworks']['lastName'] .'" name="surname" readonly>';
					else
						echo '<input type="text" class="form-control inputTextArea" id="inputSurname" placeholder="Surname" name="surname" required>';
					?>
				</div>
				<div class="form-group">
					<label for="sel1">Country:</label>
						<select class="form-control inputTextArea" id="countryDropdown" name="country" required>
						<?php
							try
							{
								$c = new ConnectionToDb();
								$connection = $c->getInstance();

								$query = $connection->prepare("SELECT * FROM countries");
								$query->execute();
								$result = $query->fetchAll();
								
								foreach($result as $row)
								{
									echo '<option value="'. $row['id'] .'">' . $row['name'] . '</option>';
								}
							}
							catch(PDOExepction $e) {
								echo 'ERROR: ' . $e->getMessage();
							}
							$c = null;	
						?>
						</select>
				</div>
				<div class="form-group">
					<label for="inputPassword1">Password</label>
					<input type="password" class="form-control inputTextArea" id="inputPassword1" placeholder="Password" name="password1" data-minlength="6" required
					data-match-error="Minimal of 6 characters">
					<span class="help-block with-errors"></span>
				</div>
				<div class="form-group">
					<label for="inputPassword2">Confirm password</label>
					<input type="password" class="form-control inputTextArea" id="inputPassword2" placeholder="Confirm password" name="password2" required
					data-match="#inputPassword1" data-match-error="Whoops, these don't match">
					<div class="help-block with-errors"></div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default" name="submitRegister">Submit</button>
				</div>
			</form>
	</div>

</div>

<?php

if(isset($_POST['submitRegister']))
{

$user = new User();

$registerData = array(
		'email' => $_POST['mail'],
		'name' => $_POST['name'],
		'surname' => $_POST['surname'],
		'countryId' => $_POST['country'],
		'password' => $user->encryptPassword($_POST['password1']),
		'role' => '1'
		);

$user->registerUser($registerData);

if(isset($_SESSION['tmpSocialNetworks']['ID']))
{
	$user->updateFacebookId($_SESSION['tmpSocialNetworks']['ID']);
}

$_SESSION['tmpSocialNetworks'] = null;

header('Location: index.php?page=login&method=email');

}

?>