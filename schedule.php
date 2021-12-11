<?php
	if(!isset($_SESSION['login']));
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
						<li><a href="#">Dodaj zajęcia</a></li>
						<li><a href="instructor_form.php">Dodaj instruktora</a></li>
						<li class="active"><a href="student_form.php">Dodaj kursanta</a></li>
						<li><a href="car_list.php">Lista samochodów</a></li>
						<li><a href="#">Materiały szkoleniowe</a></li>
						<li><a href="#">Terminarz</a></li>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Formularz dodawania kursantów</h1>
				<form>
					<input type="text" placeholder="Nazwa użytkownika" class="long">
					<input type="text" placeholder="Imię" class="short">
					<input type="text" placeholder="Nazwisko" class="short">
					<input type="email" placeholder="Adres e-mail" class="short">
					<input type="tel" placeholder="Numer telefonu" class="short">
					<input list="instructors" placeholder="Instruktor" class="long">
					<datalist id="instructors">
						<option value="Test1">
						<option value="Test2">
						<option value="Test3">
					  </datalist>
					<input type="password" placeholder="Hasło" class="short">
					<input type="password" placeholder="Powtórz hasło" class="short">
					<input type="submit" value="Dodaj kursanta!" class="long button">
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
