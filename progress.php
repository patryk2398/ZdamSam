<?php
	session_start();
	if(!isset($_SESSION['login']))
		header("location: login.php");
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
								echo "<li><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li ><a href='schedule.php'>Terminarz</a></li>";
							}
							else if($accountType['accountType'] == 2)
							{
								echo "<li><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='schedule.php'>Terminarz</a></li>";
								echo "<li class='active'><a href='progress.php'>Postępy</a></li>";
							}
						
						?>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
			<h1>Postępy</h1>
			<div class="w-100">
				<div class="mb-4">
					<div class="d-flex justify-content-between w-100">
						<div class="d-flex justify-content-start ">
							<label>Liczba godzin praktycznych</label>
						</div>
						<div class="d-flex justify-content-end ">
							<label>
								<?php  
									$practicalHours = 0;
									$email = $_SESSION['login'];
									include('dbConnect.php');
									$records = mysqli_query($con,"SELECT COUNT(1) * 2 AS quantity
									FROM practicalschedule 
									INNER JOIN trainee ON trainee_id_trainee = id_trainee
									INNER JOIN login ON login_id_login = id_login
									WHERE email = '$email' AND
									date < NOW()");
	
									if($data = mysqli_fetch_array($records))
									{
										$practicalHours = $data['quantity'];										
									}
									echo $practicalHours;	
								?>
							/30</label>
						</div>
					</div>					
					<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: <?php echo $practicalHours/30*100?>%" aria-valuenow="<?php echo $practicalHours/30*100?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
				<div class="d-flex justify-content-between w-100">
						<div class="d-flex justify-content-start ">
							<label>Liczba godzin teoretycznych</label>
						</div>
						<div class="d-flex justify-content-end ">
							<label>
								<?php  
									$practicalHours = 0;
									$email = $_SESSION['login'];
									include('dbConnect.php');
									$records = mysqli_query($con,"SELECT COUNT(1) * 2 AS quantity
									FROM trainee_has_teoreticalschedule 
									INNER JOIN trainee ON trainee_id_trainee = id_trainee
									INNER JOIN login ON login_id_login = id_login
									INNER JOIN teoreticalschedule ON teoreticalSchedule_id_teoreticalShedule = id_teoreticalShedule
									WHERE email = '$email' AND
									date < NOW()");
	
									if($data = mysqli_fetch_array($records))
									{
										$practicalHours = $data['quantity'];										
									}
									echo $practicalHours;	
								?>
							/20</label>
						</div>
					</div>					
					<div class="progress">
						<div class="progress-bar" role="progressbar" style="width: <?php echo $practicalHours/20*100?>%" aria-valuenow="<?php echo $practicalHours/20*100?>" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</div>
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
