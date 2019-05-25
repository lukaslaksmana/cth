<?php
require_once('./core/Database/DB.php');

class DBquery {
	
	function __construct()
	{
		$this->database = new DBconnect();
	}
	public function getUsers()
	{
		try {
			$db = $this->database->SQLconn();
			$query = $db->prepare('SELECT * FROM users ORDER BY id DESC');
			$query->execute();
			
			return $result = $query->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function addUsers($name)
	{
		try {
			$db = $this->database->SQLconn();
			$query = $db->prepare("INSERT INTO users (name) VALUES (?)");
			$query->bindParam(1, $name);
			
			return $query->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function getUserSkills()
	{
		try {
			$db = $this->database->SQLconn();
			$query = $db->prepare("SELECT * FROM skills INNER JOIN users ON skills.name_id = users.id");
			$query->execute();
			
			return $result = $query->fetchAll();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function updateUserSkills($value, $id)
	{
		try {
			$db = $this->database->SQLconn();
			$data = array($value, $id);
			$query = $db->prepare("UPDATE skills SET name = REPLACE(name, '.', CONCAT(', ', ?, '.')) WHERE name_id=?");
			$query->execute($data);
			
			return $result = $query->fetchAll();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	public function addUserSkillsId($id)
	{
		try {
			$db = $this->database->SQLconn();
			$query = $db->prepare("INSERT INTO skills (name, name_id) VALUES ('HTML.', ?)");
			$query->bindParam(1, $id);
			
			return $query->execute();
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}
