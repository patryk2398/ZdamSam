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
$date = $_POST['date'];
$password = $_POST['password'];
$email = $_POST['email'];


$sql = "INSERT INTO `login`(`email`, `password`, `accountType`) VALUES ('$email', '$password', 1);";
$last_id = $conn->insert_id;
$sql .= "INSERT INTO `instructor`(`pesel`, `name`, `surname`, `telephone`, `renevalDate`, `login_id_login`) VALUES ('$pesel','$name','$surname','$telephone','$date', '$last_id')";

if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
    header("Location:instructor_form.html");
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

$conn->close();
?> 