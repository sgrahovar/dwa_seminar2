<?php
include_once('ConnectionToDb.php');

class Comment
{	
	private $connection;

	public function __construct()
	{	
		$c = new ConnectionToDb();
		$this->connection = $c->getInstance();
	}

	public function __destruct()
	{
		$this->connection = null;
	}

	public function addComment($userId, $donationId, $text, $replyTo)
	{
		try
		{ 
		$query = $this->connection->prepare("INSERT INTO comments (ID, UserID, DonationId, CommentText, ReplyTo, DatePosted) VALUES (NULL, :userId, :donationId, :commentText, :replyto, :dateNow)");

		$date = date("Y-m-d");

		if(!isset($replyTo)) $query->bindParam(':replyto', $replyTo);
		else $query->bindValue(':replyto', null);

		$query->bindParam(':userId', $userId);
		$query->bindParam(':donationId', $donationId);
		$query->bindParam(':commentText', $text);

		$query->bindParam(':dateNow', $date);
		$query->execute();
		}

		catch(PDOExepction $e) {
			echo 'ERROR: ' . $e->getMessage();
		}
	}

	public function getComments()
	{
		
	}

}