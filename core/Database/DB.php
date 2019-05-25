<?php
class DBconnect 
{
	protected $dbhost = "mysql:host=localhost;dbname=contohrelasi",
						$user = "root",
						$pass = "",
						$set = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	public function SQLconn() {
		try {
			// koneksikan
			$connect = new PDO($this->dbhost, $this->user, $this->pass);
			
			return $connect;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}