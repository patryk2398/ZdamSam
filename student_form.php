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
						<li class="active"><a href="student_form.php">Dodaj kursanta</a></li>
						<li><a href="car_list.php">Lista samochodów</a></li>
						<li><a href="learning_materials.php">Materiały szkoleniowe</a></li>
						<li><a href="schedule.php">Terminarz</a></li>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
				<h1>Formularz dodawania kursantów</h1>
				<form action="student_add.php" method="post">
				
					<input type="text" placeholder="Imię" class="short" name="name">
					<input type="text" placeholder="Nazwisko" class="short" name="surname">
					<input type="text" placeholder="PESEL" class="long" name="pesel">
					<input type="email" placeholder="Adres e-mail" class="short" name="email">
					<input type="tel" placeholder="Numer telefonu" class="short" name="tel">
					<select placeholder="Instruktor" class="long" name="instructor">
						<option disabled selected value>Wybierz instruktora</option>
						<?php
							$connect = mysqli_connect("localhost","root","","zdamsam");
							
							foreach (mysqli_query($connect, "SELECT id_instructor, name, surname FROM instructor") as $row)
							{
								echo  "<option value=".$row['id_instructor'].">".$row['name']."&nbsp;".$row['surname']."</option>"; // Format for adding options 
							}
							
							/*while($numrows > 0)
							{
								while ($row = mysqli_fetch_assoc($query))
								{
									$instructorName = $row['name'];
									$instructorSurname = $row['surname'];
								}
								echo "<option value=".$instructorName." ".$instructorSurname.">";
								$numrows -= 1;
							}*/
						?>
					</select>
					<input type="password" placeholder="Hasło" class="short" name="password">
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
