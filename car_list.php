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
						<li><a href="addPracticalScheduleForm.php">Dodaj zajęcia</a></li>
						<li><a href="instructor_form.php">Dodaj instruktora</a></li>
						<li><a href="student_form.php">Dodaj kursanta</a></li>
						<li class="active"><a href="car_list.php">Lista samochodów</a></li>
						<li><a href="learning_materials.php">Materiały szkoleniowe</a></li>
						<li><a href="schedule.php">Terminarz</a></li>
						<li><a href='studentList.php'>Kursanci</a></li>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Lista Samochodów</h1>		
				<div class="container" style="overflow-y: scroll; height:450px;">
				<?php
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "zdamsam";

							// Create connection
							$conn = new mysqli($servername, $username, $password, $dbname);
							// Check connection
							if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT * FROM cars";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<div class='row'><img src='".$row['picture']."' class='carpicture'/><div class='col-8 text-nowrap'>Marka: ".$row["brand"]."<br>Model: ".$row["model"]."<br>Rok produkcji: ".$row["productionYear"]."<br>Numer rejestracyjny: ".$row["regNumber"]."<br>Przebieg: ".$row["mileage"]."<br>Data następnego serwisu: ".$row["serviceDate"]."<br>Data ważności OC: ".$row["ocDate"]."<br>Data ważności AC: ".$row["acDate"]."<br><a href='deleteCar.php?id=".$row['id_cars']."' style='color: red'>Usuń pojazd</a></div></div>";
								}
							} else {
								echo "0 results";
							}
						?>
						<button id="addCar" class="confirm_button" >Dodaj pojazd</button>
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
				</div>		
				<div>
					<script type="text/javascript">
						document.getElementById("addCar").onclick = function () 
						{
							location.href = "car_form.php";
						};
					</script>	
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
		
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
