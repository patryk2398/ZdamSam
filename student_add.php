<?php
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
$password = $_POST['password'];
$email = $_POST['email'];
$instructor = $_POST['instructor'];


$sql = "INSERT INTO `login`(`email`, `password`, `accountType`) VALUES ('$email', '$password', 2);";

if ($conn->query($sql) === TRUE) {
    echo "New records created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 
$last_id = $conn->insert_id;
$sql2= "INSERT INTO `trainee`(`pesel`, `name`, `surname`, `telephone`, `instructor_id_instructor`, `login_id_login`) VALUES ('$pesel','$name','$surname','$telephone','$instructor', '$last_id')";

if ($conn->query($sql2) === TRUE) {
  echo "New records created successfully";
  // header("Location:instructor_form.html");
} else {
  echo "Error: " . $sql2 . "<br>" . $conn->error;
}


$conn->close();
?> 