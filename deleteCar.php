<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("location: login.php");
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "zdamsam";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}
	
	$id = $_GET['id'];
	$sql = mysqli_query($conn, "DELETE FROM cars WHERE id_cars='$id'");
	
	if ($conn->query($sql) === TRUE) 
	{
	  $_SESSION['success'] = '<span style="color:green">Usunięto pojazd</span>';
	  header('Location: car_list.php');
	} 
	else
	{
	  $_SESSION['error'] = '<span style="color:red">Nie udało się usunąć samochodu</span>';
	  header('Location: car_list.php');
	}
?>
