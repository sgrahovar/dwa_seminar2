<?php

class ConnectionToDb
{	
private $connection;
	private $host = '127.0.0.1';
	private $dbname = 'seminar2';
	private $user = "root";
	private $pass = "sanjin11";

	public function __construct()
	{	
		try
		{
			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->pass);
		} 
		catch (PDOException $e) 
		{
		    echo 'Connection failed: ' . $e->getMessage();
		    exit;
		}
		echo 'Created.</br>';
	}

	public function __destruct()
	{
		$this->connection = null;
		echo 'Destroyed.</br>';
	}
}

?>