<?php
include_once('ConnectionToDb.php');

class Donation
{	
	private $connection;
	private $userId;

	public function __construct()
	{	
		$c = new ConnectionToDb();
		$this->connection = $c->getInstance();
	}

	public function __destruct()
	{
		$this->connection = null;
	}

	public function addDonation($data)
	{
		try
		{ 
		$query = $this->connection->prepare("INSERT INTO donation_page (ID, UserID, Name_hr, Description_hr, Name_en, Description_en, Picture_url, targetAmount, endDate, TagID) VALUES (NULL, :userId, :nameHr, :descriptionHr, :nameEn, :descriptionEn, 'null', :targetAmount, :endDate, :category)");

		$date = DateTime::createFromFormat('d.m.Y', $data['date']);
		$tmpDate = $date->format('Y-m-d');

		$query->bindParam(':userId', $this->userId);
		$query->bindParam(':nameHr', $data['title_hr']);
		$query->bindParam(':descriptionHr', $data['text_hr']);
		$query->bindParam(':nameEn', $data['title_en']);
		$query->bindParam(':descriptionEn', $data['text_en']);
		$query->bindParam(':targetAmount', $data['amount']);
		$query->bindParam(':endDate', $tmpDate);
		$query->bindParam(':category', $data['category']);
		$query->execute();
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function donate($userId, $donationId, $amount)
	{
		try {  
		  $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  $this->connection->beginTransaction();

		  $userCredits = (double)$this->connection->query("SELECT Credits from users where ID = '".$userId."'")->fetchColumn();
		  $donationGoal = (double)$this->connection->query("SELECT targetAmount from donation_page where ID = '".$donationId."'")->fetchColumn();
		  $currentFunds = (double)$this->connection->query("SELECT currentAmount from donation_page where ID = '".$donationId."'")->fetchColumn();

		  if($userCredits < $amount)
		  {
		  	return 0;
		  }
		  
		  $query = $this->connection->prepare("UPDATE users SET Credits = Credits - :amount WHERE ID = :id");
		  $query->bindParam('amount', $amount);
		  $query->bindParam('id', $userId);
		  $query->execute();

		  $query = $this->connection->prepare("UPDATE Donation_page SET currentAmount = currentAmount + :amount WHERE ID = :id");
		  $query->bindParam('amount', $amount);
		  $query->bindParam('id', $donationId);
		  $query->execute();

		  $query = $this->connection->prepare("INSERT INTO creditTransactions (ID, UserID, DonationID, Amount, DateTime) VALUES (NULL, :userid, :donationid, :amount, :datetime)");
		  $query->bindParam('userid', $userId);	
		  $query->bindParam('donationid', $donationId);
		  $query->bindParam('amount', $amount);
		  $query->bindParam('datetime', date('Y-m-d H:i:s'));
		  $query->execute();

		  if($currentFunds + $amount > $donationGoal)
		  {
		  $query = $this->connection->prepare("UPDATE Donation_page SET isSuccessful = 1 WHERE ID = :id");
		  $query->bindParam('id', $donationId);
		  $query->execute();		  	
		  }

		  $this->connection->commit();
		  return 1;
		  
		} catch (Exception $e) {
		  $this->connection->rollBack();
		  echo "Failed: " . $e->getMessage();
		  return 0;
		}
	}

	public function getBasicStats()
	{	
		$Successful = (int)$this->connection->query("SELECT COUNT(*) FROM donation_page WHERE isSuccessful = 1")->fetchColumn();
		$TotalDonations = (int)$this->connection->query("SELECT COUNT(*) FROM donation_page")->fetchColumn();	
		$Donated = (double)$this->connection->query("SELECT SUM(amount) FROM credittransactions")->fetchColumn();

		return $tmpArray = array('Successful' => $Successful, 'TotalDonations' => $TotalDonations, 'Donated' => $Donated);
	}

	public function setUserId($id)
	{
		$this->userId = $id;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getAllTags()
	{
		$query = $this->connection->prepare("SELECT * FROM donation_tags");;
		$query->execute();	

		return $query->fetchAll(PDO::FETCH_ASSOC);	
	}

	public function getAllDonations()
	{
		try
		{ 
		$query = $this->connection->prepare("SELECT donation_page.*, users.Name FROM donation_page INNER JOIN users ON donation_page.UserID = users.ID LIMIT 0, 9");
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}

	public function getFilteredDonations($text, $country, $page, $language)
	{
		try
		{ 
		$p = ($page-1) * 9;
		$text = '%'.$text.'%';
		if($language == "hr") $query = $this->connection->prepare("SELECT donation_page.*, users.Name FROM donation_page INNER JOIN users ON donation_page.UserID = users.ID AND lower(donation_page.Name_hr) LIKE :text LIMIT :pageNumber, 9");
		if($language == "en") $query = $this->connection->prepare("SELECT donation_page.*, users.Name FROM donation_page INNER JOIN users ON donation_page.UserID = users.ID AND lower(donation_page.Name_en) LIKE :text LIMIT :pageNumber, 9");
		$query->bindParam(':text', $text, PDO::PARAM_STR);
//		$query->bindParam(':country', $country);
		$query->bindValue(':pageNumber', (int)$p, PDO::PARAM_INT);

		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}		
	}

	public function getOneDonation($id)
	{
		$query = $this->connection->prepare("SELECT donation_page.*, users.Name, users.Surname, donation_tags.tag_hr
				FROM donation_page
				INNER JOIN users ON donation_page.UserID = users.ID
				INNER JOIN donation_tags ON donation_page.tagID = donation_tags.ID
				WHERE donation_page.ID = ".$id);

		$query->execute();

		return $query->fetch(PDO::FETCH_ASSOC);		
	}

	public function getMyDonations($id)
	{
		try
		{ 
		$query = $this->connection->prepare("SELECT donation_page.* FROM donation_page WHERE UserID = :id");
		$query->bindParam(':id', $id);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}				
	}

	public function getMyTransactions($id)
	{
		try
		{ 
		$query = $this->connection->prepare("SELECT credittransactions.*, donation_page.Name_hr, donation_page.Name_en FROM credittransactions 
											INNER JOIN donation_page on credittransactions.DonationID = donation_page.ID WHERE credittransactions.UserID = :id ORDER BY credittransactions.Datetime asc");
		$query->bindParam(':id', $id);
		$query->execute();

		return $query->fetchAll(PDO::FETCH_ASSOC);

		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}			
	}

}

?>