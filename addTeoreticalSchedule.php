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

$instructor = explode(" ", $_POST['instructor']);
$instructorName = $trainee[0];
$instructorSurname = $trainee[1];
$date = date("Y-m-d H:i:s", strtotime($_POST['date']. "+". substr($_POST['time'], 0, 2). "hours"));

$sql = "
INSERT INTO teoreticalschedule(
    `date`,
    `instructor_id_instructor`) 
VALUES (
    '$date',
    (SELECT id_instructor FROM instructor WHERE name = '$instructorName' AND surname = '$instructorSurname' LIMIT 1)
    )";

if ($conn->query($sql) === TRUE) 
{
  $_SESSION['success'] = '<span style="color:green">Pomyślnie dodano</span>';
  header('Location: addTeoreticalScheduleForm.php');
} 
else
{
  $_SESSION['error'] = '<span style="color:red">Wystąpił błąd podczas dodawania</span>';
  header('Location: addTeoreticalScheduleForm.php');
}

$conn->close();
?> 