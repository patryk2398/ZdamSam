<?php
session_start();
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

var_dump($_POST);

$instructorId = 0;
$trainee = explode(" ", $_POST['trainee']);
$traineeName = $trainee[0];
$traineeSurname = $trainee[1];
$car = explode(" ", $_POST['car']);
$regNumber = $car[count($car)-1];
$email = $_SESSION['login'];
$date = date("Y-m-d H:i:s", strtotime($_POST['date']. "+". substr($_POST['time'], 0, 2). "hours"));

$sql = "
INSERT INTO practicalschedule(
    `date`,
    `trainee_id_trainee`,
    `cars_id_cars`,
    `instructor_id_instructor`) 
VALUES (
    '$date',
    (SELECT id_trainee FROM trainee WHERE name = '$traineeName' AND surname = '$traineeSurname' LIMIT 1),
    (SELECT id_cars FROM cars WHERE regNumber = '$regNumber' LIMIT 1),
    (SELECT id_instructor FROM instructor INNER JOIN login ON login_id_login = id_login WHERE email = '$email')
    )";

if ($conn->query($sql) === TRUE) 
{
  $_SESSION['success'] = '<span style="color:green">Pomyślnie dodano</span>';
  header('Location: addPracticalScheduleForm.php');
} 
else
{
  $_SESSION['error'] = '<span style="color:red">Wystąpił błąd podczas dodawania</span>';
  header('Location: addPracticalScheduleForm.php');
}

$conn->close();
?> 