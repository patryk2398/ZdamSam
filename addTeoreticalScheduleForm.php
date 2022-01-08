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
						<li class="active"><a href="addPracticalScheduleForm.php">Dodaj zajęcia</a></li>
						<li><a href="instructor_form.php">Dodaj instruktora</a></li>
						<li><a href="student_form.php">Dodaj kursanta</a></li>
						<li><a href="car_list.php">Lista samochodów</a></li>
						<li><a href="learning_materials.php">Materiały szkoleniowe</a></li>
						<li><a href="schedule.php">Terminarz</a></li>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Dodaj zajęcia </h1>
				<h2><a style="opacity: 0.4;" href="addPracticalScheduleForm.php">praktyczne</a> <a href="addTeoreticalScheduleForm.Php">teoretyczne</a></h2>
				<form action="addTeoreticalSchedule.php" method="post">
					<input autocomplete="off" list="instructor" placeholder="Instruktor" class="long" name="instructor">
					<datalist id="instructor">
						<?php
							session_start();							
							$email = $_SESSION['login'];
							include('dbConnect.php');
							$records = mysqli_query($con,"SELECT name, surname FROM instructor;");

							while($data = mysqli_fetch_array($records))
							{
								$instructor .= $data['name'];
								$instructor .= " ";
								$instructor .= $data['surname'];

								echo "<option value='". $instructor ."'>";
								$instructor = '';
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