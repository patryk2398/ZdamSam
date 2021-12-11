<?php
header( "refresh:0;url=login.php" );
$user = $_POST['login'];
$pass = md5($_POST['pass']);

if ($user&&$pass) 
	{
	//connect to db
	$connect = mysqli_connect("localhost","root","","zdamsam");
	$query = mysqli_query($connect, "SELECT * FROM login WHERE email='$user'");

	$numrows = mysqli_num_rows($query);


	if ($numrows!=0)
	{
	//while loop
	  while ($row = mysqli_fetch_assoc($query))
	  {
		$dbusername = $row['email'];
		$dbpassword = $row['password'];
		$_SESSION['login'] = $row['email'];
		header("location: car_list.php");
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