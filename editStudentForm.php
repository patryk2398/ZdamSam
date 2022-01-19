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
								echo "<li><a href='studentList.php'>Kursanci</a></li>";
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
				<h1>Profil kursanta</h1>
				<form action="editStudent.php" method="post">	
                    <?php 
                        $id = $_GET['id'];
                        
                        include('dbConnect.php');
						$student = mysqli_query($con,
                            "SELECT 
                            name, 
                            surname,
                            internalTeoreticalPass,
                            internalPracticalPass,
                            externalTeoreticalPass,
                            externalPracticalPass,
                            isArchive
							FROM trainee 
							WHERE id_trainee = '$id'");

                        if($data = mysqli_fetch_array($student))
                        {
                            $trainee = "";
                            $trainee .= $data['name'];
                            $trainee .= " ";
                            $trainee .= $data['surname'];
                            echo '<h3 class="mb-3">'.$trainee.'</h3>';

                            $internalTeoreticalPass = $data['internalTeoreticalPass'];
                            $internalPracticalPass = $data['internalPracticalPass'];
                            $externalTeoreticalPass = $data['externalTeoreticalPass'];
                            $externalPracticalPass = $data['externalPracticalPass'];
                            $isArchive = $data['isArchive'];
                        }
                    ?>
                    <input type="hidden" value="<?php echo $id ?>" name="id" >
                    
                    <div class="form-check mb-2">
                        <input class="form-check-input p-0" type="checkbox" value="1" name="internalTeoreticalPass" 
                        <?php if($internalTeoreticalPass == 1) echo "checked"?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Egzamin teoretyczny wewnętrzny
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input p-0" type="checkbox" value="1" name="internalPracticalPass" 
                        <?php if($internalPracticalPass == 1) echo "checked"?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Egzamin praktyczny wewnętrzny
                        </label>
                    </div>	

                    <div class="form-check mb-2">
                        <input class="form-check-input p-0" type="checkbox" value="1" name="externalTeoreticalPass" 
                        <?php if($externalTeoreticalPass == 1) echo "checked"?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Egzamin teoretyczny państwowy
                        </label>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input p-0" type="checkbox" value="1" name="externalPracticalPass" 
                        <?php if($externalPracticalPass == 1) echo "checked"?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Egzamin praktyczny państwowy
                        </label>
                    </div>

                    <div class="form-check ">
                        <input class="form-check-input p-0" type="checkbox" value="1" name="isArchive" 
                        <?php if($isArchive == 1) echo "checked"?>>
                        <label class="form-check-label" for="flexCheckDefault">
                            Archwialny
                        </label>
                    </div>

					<input type="submit" value="Zapisz" class="long button">
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
