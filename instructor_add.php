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

$pesel = $_POST['pesel'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$telephone = $_POST['tel'];
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];

if($email == "") {
  $_SESSION['error'] = '<span style="color:red; margin-top: -50px">Wystąpił błąd podczas dodawania</span>';
  header('Location: instructor_form.php');
  return;
  }


$sql = "INSERT INTO `login`(`email`, `password`, `accountType`) VALUES ('$email', '$password', 1);";

if ($conn->query($sql) === FALSE) {
  $_SESSION['error'] = '<span style="color:red; margin-top: -50px">Wystąpił błąd podczas dodawania</span>';
  header('Location: instructor_form.php');
  return;
  }
 
$last_id = $conn->insert_id;
$sql2= "INSERT INTO `instructor`(`pesel`, `name`, `surname`, `telephone`, `renevalDate`, `login_id_login`) VALUES ('$pesel','$name','$surname','$telephone','$date', '$last_id')";

if ($conn->query($sql2) === TRUE) {
  $_SESSION['success'] = '<span style="color:green; margin-top: -50px">Pomyślnie dodano</span>';
  header('Location: instructor_form.php');
} else {
  $_SESSION['error'] = '<span style="color:red; margin-top: -50px">Wystąpił błąd podczas dodawania</span>';
  header('Location: instructor_form.php');
}


$conn->close();
?> 