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
			$this->connection = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8;', $this->user, $this->pass);
			$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} 
		catch (PDOException $e) 
		{
		    echo 'Connection failed: ' . $e->getMessage();
		    exit;
		}
	}

	public function __destruct()
	{
		$this->connection = null;
	}

	
	public function getInstance()
	{
       if ($this->connection instanceof PDO) {
            return $this->connection;
       }		
	}
	

}

?>