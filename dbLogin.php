<?php
header( "refresh:0;url=login.php" );
$user = $_POST['login'];
$pass = $_POST['pass'];

if ($user&&$pass) 
	{
	//connect to db
	$connect = mysqli_connect("localhost","root","","zdamsam");
	$query = mysqli_query($connect, "SELECT * FROM login WHERE email='$user' AND password='$pass'");

	$numrows = mysqli_num_rows($query);

	if ($numrows!=0)
	{
	//while loop
	while ($row = mysqli_fetch_assoc($query))
	{
	$dbusername = $row['email'];
	$dbpassword = $row['password'];
	$dbaccountType = $row['accountType'];
	
	session_start();
	$_SESSION['login'] = $dbusername;
	$_SESSION['accountType'] = $dbaccountType;
	header("location: studentSchedule.php");
	}
	  
	}
	else
	{
		$error = "Nie znaleziono takiego użytkownika w bazie danych. Spróbuj ponownie!";
		$errorEncoded = base64_encode($error);
		header("location: login.php?error=".$errorEncoded);
	}
}

?>