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
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Formularz dodawania pojazdów</h1>
				<form action="dbAddCar.php" method="post">
					<input type="text" name="brand" placeholder="Marka" class="short">
					<input type="text" name="model" placeholder="Model" class="short">
					<input type="text" name="productionYear" placeholder="Rok Produkcji" class="short">
					<input type="text" name="regNumber" placeholder="Numer Rejestracyjny" class="short">
					<input type="text" name="mileage" placeholder="Przebieg" class="short">					
					<input type="text" name="serviceDate" placeholder="Data Serwisowania" class="short" onfocus="(this.type='date')">					
					<input type="text" name="ocDate" placeholder="Data OC" class="short" onfocus="(this.type='date')">				
					<input type="text" name="acDate" placeholder="Data AC" class="short" onfocus="(this.type='date')">										
					<input type="submit" value="Dodaj pojazd!" class="long button">
				</form>
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