<?php
include_once('ConnectionToDb.php');
include_once('password.php');

class User
{	
	private $connection;
	protected $userId;
	private $name;

	public function __construct()
	{	
		$c = new ConnectionToDb();
		$this->connection = $c->getInstance();
	}

	public function __destruct()
	{
		$this->connection = null;
	}

	public function getUserId()
	{
		return $this->userId;
	}


	public function registerUser($data)
	{
		try
		{ 
		$query = $this->connection->prepare("INSERT INTO users (id, Email, Name, Surname, CountryID, Password, Role) 
				VALUES (NULL, :email, :name, :surname, :countryID, :password, :role)");

		$query->bindParam(':email', $data['email']);
		$query->bindParam(':name', $data['name']);
		$query->bindParam(':surname', $data['surname']);
		$query->bindParam(':countryID', $data['countryId']);
		$query->bindParam(':password', $data['password']);
		$query->bindParam(':role', $data['role']);
		$query->execute();

		$this->userId = $this->connection->lastInsertId();
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function loginUser($data)
	{
		$query = $this->connection->prepare("SELECT ID, Email, Password, Name, Surname, Credits, Role FROM users WHERE Email = :email LIMIT 1");
		$query->bindParam(':email', $data['email']);

		$query->execute();
		$result = $query->fetch();

		if($result > 0)
		{
			if($this->verifyPassword($data['password'], $result['Password']))
			{
               $tmpArray = array(
                   "ID" => $result['ID'],
                   "Name" => $result['Name'],
                   "Surname" => $result['Surname'],
                   "Email" => $result['Email'],
                   "Credits" => $result['Credits'],
                   "Role" => $result['Role']
               );
               $_SESSION['User'] = $tmpArray;
               if($_SESSION['User']['Credits'] == null) $_SESSION['User']['Credits'] = 0;
               header('Location: index.php');

			}
			else echo 'Wrong password';
		}	
		else echo 'Wrong username / password.';
	}

	public function encryptPassword($password)
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}

	public function verifyPassword($password, $dbPassword)
	{
		if( password_verify($password, $dbPassword) ) return 1;
		else return 0;
	}

	public function getSocialFacebookId($facebookId)
	{
		$query = $this->connection->prepare("SELECT ID, Name, Surname, Email from users WHERE FacebookID = :facebookId LIMIT 1");
		$query->bindParam(':facebookId', $facebookId);

		$query->execute();
		$result = $query->fetch();

		if($result > 0)
		{	
			$this->userId = $result['ID'];
			return 1;
		}	
		else return 0;
	}

	public function getSocialEmail($facebookEmail)
	{
		$query = $this->connection->prepare("SELECT ID, Name, Surname, Email from users WHERE Email = :facebookEmail LIMIT 1");
		$query->bindParam(':facebookEmail', $facebookEmail);

		$query->execute();
		$result = $query->fetch();

		if($result > 0)
		{	
			$this->userId = $result['ID'];
			return 1;
		}	
		else return 0;
	}

	public function updateFacebookId($id)
	{	
		try
		{
			$query = $this->connection->prepare("UPDATE users SET FacebookID = :facebookId WHERE ID = :id");
			$query->bindParam(':id', $this->userId);
			$query->bindParam(':facebookId', $id);
			$query->execute();
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function getData($id)
	{	
		try
		{
		$query = $this->connection->prepare("SELECT users.ID, users.Email, users.Name, users.Surname, users.Credits, countries.Name AS country, users.Role  FROM users 
											INNER JOIN countries ON Users.CountryID = countries.id
											WHERE users.ID = :id LIMIT 1;");
		$query->bindParam(':id', $id);

		$query->execute();
		$result = $query->fetch();

		if($result > 0)
		{
               $tmpArray = array(
                   "ID" => $result['ID'],
                   "Name" => $result['Name'],
                   "Surname" => $result['Surname'],
                   "Email" => $result['Email'],
                   "Credits" => $result['Credits'],
                   "Role" => $result['Role'],
                   "Country" => $result['country']
               );

               if($tmpArray['Credits'] == null) $tmpArray['Credits'] = 0;

               return $tmpArray;
		}		
		else return null;
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function editUser($id, $ime, $prezime, $email, $currentPassword, $newPassword)
	{
		try
		{
		$query = $this->connection->prepare("SELECT ID, Password FROM users WHERE ID = :id LIMIT 1");
		$query->bindParam(':id', $id);

		$query->execute();
		$result = $query->fetch();

		if($result > 0)
		{
			if($this->verifyPassword($currentPassword, $result['Password']))
			{

				if($newPassword == null)
				{
					$query = $this->connection->prepare("UPDATE users SET Email = :email, Name = :name, Surname = :surname WHERE ID = :id");
					$query->bindParam(':id', $id);
					$query->bindParam(':email', $email);
					$query->bindParam(':name', $ime);
					$query->bindParam(':surname', $prezime);
//					$query->bindParam(':country', $drzava);

					$query->execute();
				}

				else
				{	
					$newPw = $this->encryptPassword($newPassword);

					$query = $this->connection->prepare("UPDATE users SET Email = :email, Name = :name, Surname = :surname, Password = :password WHERE ID = :id");
					$query->bindParam(':id', $id);
					$query->bindParam(':email', $email);
					$query->bindParam(':name', $ime);
					$query->bindParam(':surname', $prezime);
//					$query->bindParam(':country', $drzava);
					$query->bindParam(':password', $newPw);

					$query->execute();
				}
				return 1;
			}
		}
		return 0;
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}
}

?>