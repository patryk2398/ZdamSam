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
								echo "<li><a href='addPracticalScheduleForm.php'>Dodaj zajęcia</a></li>";
								echo "<li><a href='instructor_form.php'>Dodaj instruktora</a></li>";
								echo "<li><a href='student_form.php'>Dodaj kursanta</a></li>";
								echo "<li><a href='car_list.php'>Lista samochodów</a></li>";
								echo "<li class='active'><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='schedule.php'>Terminarz</a></li>";
								echo "<li><a href='studentList.php'>Kursanci</a></li>";
							}
							else if($accountType['accountType'] == 2)
							{
								echo "<li class='active'><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='studentSchedule.php'>Terminarz</a></li>";
								echo "<li><a href='progress.php'>Postępy</a></li>";
							}
						
						?>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Materiały dla kursantów</h1>			
				<div style="display:grid; grid-template-columns: 250px 250px; grid-row: auto auto; grid-column-gap: 50px; grid-row-gap: 30px;">
					
					<a href="./materials/Lesson1.pdf" download="Lekcja 1" style=" display:flex; align-items:center; justify-content:center; margin-top:20px;">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 1" width="100" height="100">
						<h4>Lekcja 1</h4>
					</a>
					<a href="./materials/Lesson2.pdf" download="Lekcja 2" style=" display:flex; align-items:center; justify-content:center; margin-top:20px; ">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 2" width="100" height="100" >
						<h4>Lekcja 2</h4>
					</a>					
					<a href="./materials/Lesson3.pdf" download="Lekcja 3" style=" display:flex; align-items:center; justify-content:center;">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 3" width="100" height="100">
						<h4>Lekcja 3</h4>
					</a>
					<a href="./materials/Lesson4.pdf" download="Lekcja 4" style=" display:flex; align-items:center; justify-content:center;">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 4" width="100" height="100">
						<h4>Lekcja 4</h4>
					</a>					
					<a href="./materials/Lesson5.pdf" download="Lekcja 5" style=" display:flex; align-items:center; justify-content:center;">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 5" width="100" height="100">
						<h4>Lekcja 5</h4>
					</a>					
					<a href="./materials/Lesson6.pdf" download="Lekcja 6" style=" display:flex; align-items:center; justify-content:center;">				
						<img src="./graphics/pdf-logo.png" alt="Lekcja 6" width="100" height="100">
						<h4>Lekcja 6</h4>
					</a>					
				</div>			
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
		
		<script src="js/bootstrap.min.js">
	</body>
</html>
