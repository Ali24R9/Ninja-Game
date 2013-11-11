<?php
	session_start();
	require("connection.php");

	if(isset($_POST) AND $_POST['building']=="Farm")
	{	
		$_SESSION['entered']="farm";
		$random= rand(10,20);
		$query= "INSERT INTO points (gold, created_at) VALUES ('{$random}', NOW())";
		mysql_query($query);
		$query= "SELECT gold,created_at FROM points ORDER BY created_at DESC";
		$_SESSION['fetchall']= fetch_all($query);
		$query="SELECT SUM(gold) FROM points";
		$_SESSION['sum'] = fetch_record($query);
		header("location:index(basic3).php");
	}		
	else if(isset($_POST) AND $_POST['building']=="Cave")
	{
		$_SESSION['entered']="cave";
		$random= rand(5,10);
		$query= "INSERT INTO points (gold, created_at) VALUES ('{$random}', NOW())";
		mysql_query($query);
		$query= "SELECT gold,created_at FROM points ORDER BY created_at DESC";
		$_SESSION['fetchall']= fetch_all($query);
		$query="SELECT SUM(gold) FROM points";
		$_SESSION['sum'] = fetch_record($query);
		header("location:index(basic3).php");
	}
	else if(isset($_POST) AND $_POST['building']=="House")
	{
		$_SESSION['entered']="house";
		$random= rand(2,5);
		$query= "INSERT INTO points (gold, created_at) VALUES ('{$random}', NOW())";
		mysql_query($query);
		$query= "SELECT gold,created_at FROM points ORDER BY created_at DESC";
		$_SESSION['fetchall']= fetch_all($query);
		$query="SELECT SUM(gold) FROM points";
		$_SESSION['sum'] = fetch_record($query);
		header("location:index(basic3).php");
	}
	else if(isset($_POST) AND $_POST['building']=="Casino")
	{
		$_SESSION['entered']="casino";
		$random= rand(-50,50);
		$query= "INSERT INTO points (gold, created_at) VALUES ('{$random}', NOW())";
		mysql_query($query);
		$query= "SELECT gold,created_at FROM points ORDER BY created_at DESC";
		$_SESSION['fetchall']= fetch_all($query);
		$query="SELECT SUM(gold) FROM points";
		$_SESSION['sum'] = fetch_record($query);
		header("location:index(basic3).php");
	}
	if(isset($_POST) AND $_POST['building']=="restart")
	{
		$query="TRUNCATE points";
		mysql_query($query);
		$query= "SELECT gold,created_at FROM points ORDER BY created_at DESC";
		$_SESSION['newgame']= fetch_all($query);
		header("location:index(basic3).php");
	}


?>

