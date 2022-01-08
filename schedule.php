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
						<li><a href="addPracticalScheduleForm.php">Dodaj zajęcia</a></li>
						<li><a href="instructor_form.php">Dodaj instruktora</a></li>
						<li><a href="student_form.php">Dodaj kursanta</a></li>
						<li><a href="car_list.php">Lista samochodów</a></li>
						<li><a href="#">Materiały szkoleniowe</a></li>
						<li class="active"><a href="schedule.php">Terminarz</a></li>
						<li><a href="progress.php">Postępy</a></li>
						<li><a href="logout.php">Wyloguj się</a></li>
					</ul>
				</nav>
			</header>
			<main>
			<h1>Terminarz zajęć</h1>			
			<table class="table table-bordered">
				<thead>
					<tr>
						<?php 
							if (empty($_GET)) {
								$date = date("Y/m/d");
							}
							else{
								$date = $_GET['date'];
							}
							
							$day = date('w');
							$week_start = date('d-m-Y', strtotime($date .'-'.$day.' days'));
						?>
						<?php for ($i = 0; $i < 6; $i++): ?>
							<td>
								<?php 
								if($i != 0)
									echo date('d-m-Y', strtotime($week_start. "+$i days"));
								 ?>
							</td>
						<?php endfor; ?>
					</tr>
				</thead>
				<tbody>
					<?php for ($i = 0; $i < 8; $i+=2): ?>
						<tr></tr>
						<th scope="row"><?php echo((8 + $i). ":00-". (10 + $i). ":00")?></th>
						<?php for ($j = 1; $j < 6; $j++): ?>
							<?php 
								$email = $_SESSION['login'];
								$date = date('Y-m-d H:i:s', strtotime($week_start. "+$j days +". (8 + $i). "hours"));
								include('dbConnect.php');
								$records = mysqli_query($con,"SELECT t.name, t.surname 
								FROM trainee t
								INNER  JOIN practicalschedule ps ON t.id_trainee = ps.trainee_id_trainee
								INNER JOIN instructor i ON ps.instructor_id_instructor = i.id_instructor
								INNER JOIN login l ON i.login_id_login = l.id_login
								WHERE l.email = '$email'
								AND ps.date = '$date'
								LIMIT 1");

								if($data = mysqli_fetch_array($records))
								{
									$trainee = "";
									$trainee .= $data['name'];
									$trainee .= " ";
									$trainee .= $data['surname'];
									echo "<td class=\"bg-warning\">$trainee</td>";
								}
								else
								{
									echo "<td class=\"bg-success\"></td>";
								}							
							?>							
						<?php endfor; ?>
					<?php endfor; ?>		
				</tbody>
				</table>
				<div class="d-flex justify-content-between w-100">
					<div class="d-flex justify-content-start ">
						<a href="schedule.php?date=<?php echo date('d-m-Y', strtotime($date . '-6 days')); ?>" class="btn btn-primary"><</a>
					</div>
					<div class="d-flex justify-content-end ">
						<a href="schedule.php?date=<?php echo date('d-m-Y', strtotime($date . '+8 days')); ?>" class="btn btn-primary">></a>
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
