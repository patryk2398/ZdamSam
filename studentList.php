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
								echo "<li><a href='learning_materials.php'>Materiały szkoleniowe</a></li>";
								echo "<li><a href='schedule.php'>Terminarz</a></li>";
                                echo "<li class='active'><a href='studentList.php'>Kursanci</a></li>";
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
            <h1>Kursanci</h1>
                <div style="height: 450px; width: 100%; overflow: auto">
                <?php							
							$email = $_SESSION['login'];
							include('dbConnect.php');
							$records = mysqli_query($con,"SELECT t.name, t.surname, t.id_trainee FROM trainee t
							INNER JOIN instructor i ON instructor_id_instructor = id_instructor
							INNER JOIN login ON i.login_id_login = id_login 
							WHERE email = '$email' AND isArchive = 0");

                            echo '<table class="table table-striped">
                            <tr>
                            <th>Imię</th>
                            <th>Nazwisko</th>
                            <th>Edycja</th>
                            </tr>';

							while($data = mysqli_fetch_array($records))
							{
								echo "<tr>";
                                echo "<td>" . $data['name'] . "</td>";
                                echo "<td>" . $data['surname'] . "</td>";
                                echo "<td>" . '<a href="editStudentForm.php?id='.$data['id_trainee'].'" class="btn btn-primary" role="button">Edytuj</a>' . "</td>";
                                echo "</tr>";
							}	

                            echo "</table>";

                            mysqli_close($con);
						?>  
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
