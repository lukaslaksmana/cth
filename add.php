<?php
require_once('./core/Model.php');
$query = new DBquery();

if($_GET['action'] == "users")
{
	print_r($query->getUsers());
} 
elseif($_GET['action'] == "addUsers")
{
	if(isset($_POST['add']) == "tambahkan")
	{
		if($_POST['addusers'])
		{
			if($query->addUsers($_POST['addusers']))
			{
				foreach($query->getUsers() as $row):
					echo $query->addUserSkillsId($row['id']);
					echo "Data sudah diinput <a href='index.php'> Home </a>";
					exit();
				endforeach;
			}
		} else {
			echo "Masukan Username <a href='index.php'>";
		}
	} else {
		header('Location: index.php');
		exit();
	}
}
elseif($_GET['action'] == "update")
{
	if(isset($_POST['update']) == "tambahkan");
	{
		if($_POST['id'] && $_POST['skill'])
		{
			$query->updateUserSkills($_POST['skill'], $_POST['id']);
			header("Location: index.php");
		}
	}
} 