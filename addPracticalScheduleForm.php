<?php
	session_start();
	if(!isset($_SESSION['login']))
	{
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="pl">
	<head>
	
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>ZdamSam!</title>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		
		<link rel="shortcut icon" href="graphics/favicon.ico" type="image/x-icon">
		<link rel="icon" href="graphics/favicon.ico" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		
	</head>
	<body>
		<div class="content">
			<header>
				<img src="graphics/logo.svg" class="logo">
				<nav>
					<ul>
						<?php
						
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
							$email = $_SESSION['login'];
							$sql = mysqli_query($conn, "SELECT accountType FROM login WHERE email= '$email'");
							$accountType = mysqli_fetch_array($sql);
							if($accountType['accountType'] == 1)
							{
								echo "<li class='active'><a href='addPracticalScheduleForm.php'>Dodaj zajęcia</a></li>";
								echo "<li><a href='instructor_form.php'>Dodaj instruktora</a></li>";
								echo "<li><a href='student_form.php'>Dodaj kursanta</a></li>";
								echo "<li><a href='car_list.php'>Lista samochodów</a></li>";
								echo "<li><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='schedule.php'>Terminarz</a></li>";
							}
							else if($accountType['accountType'] == 2)
							{
								echo "<li><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='schedule.php'>Terminarz</a></li>";
								echo "<li><a href='progress.php'>Postępy</a></li>";
							}
						
						?>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Dodaj zajęcia </h1>
				<h2><a href="addPracticalScheduleForm.php">praktyczne</a> <a style="opacity: 0.4;" href="addTeoreticalScheduleForm.Php">teoretyczne</a></h2>
				<form action="addPracticalSchedule.php" method="post">
					<input autocomplete="off" list="trainee" placeholder="Kursant" class="short" name="trainee">
					<datalist id="trainee">
						<?php
							session_start();							
							$email = $_SESSION['login'];
							include('dbConnect.php');
							$records = mysqli_query($con,"SELECT t.name, t.surname FROM trainee t
							INNER JOIN instructor i ON instructor_id_instructor = id_instructor
							INNER JOIN login ON i.login_id_login = id_login 
							WHERE email = '$email'");

							while($data = mysqli_fetch_array($records))
							{
								$student .= $data['name'];
								$student .= " ";
								$student .= $data['surname'];

								echo "<option value='". $student ."'>";
								$student = '';
							}	
						?>  
					</datalist>
					<input list="cars" autocomplete="off" placeholder="Samochód" class="short" name="car">
					<datalist id="cars">
						<?php
							include('dbConnect.php');
							$records = mysqli_query($con,"SELECT brand, model, regNumber FROM `cars`");

							while($data = mysqli_fetch_array($records))
							{
								$car .= $data['brand'];
								$car .= " ";
								$car .= $data['model'];
								$car .= " ";
								$car .= $data['regNumber'];

								echo "<option value='". $car ."'>";
							}	
						?>  
					</datalist>
					<input placeholder="Data zajęć" class="short" type="text" onfocus="(this.type='date')" name="date">
					<input list="times" placeholder="Czas zajęć" class="short" name="time">
					<datalist id="times">
						<option value="08:00-10:00">
						<option value="10:00-12:00">
						<option value="12:00-14:00">
						<option value="14:00-16:00">
					  </datalist>
					<input type="submit" value="Dodaj zajęcia" class="long button">
				</form>
				<?php
					if(isset($_SESSION['error']))
					{
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					}						
					if(isset($_SESSION['success']))
					{
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					}						
				?>
			</main>
		</div>
		<footer>
			<ul class="bottom-left-nav">
				<li>O ZdamSam!</li>
				<li>Cennik</li>
				<li>Kontakt</li>
			</ul>
			<p>&copy; ZdamSam! 2021. Wszelkie prawa zastrzeżone.</p>
			<ul>
				<li>Regulamin</li>
				<li>Polityka prywatności</li>
			</ul>
		</footer>
		
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>