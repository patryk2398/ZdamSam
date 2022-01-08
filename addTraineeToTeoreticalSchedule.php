<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zdamsam";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

var_dump($_POST);

foreach ($_POST['trainee'] as $value)
{
	$id_trainee = $value;
	$sql = "
INSERT INTO trainee_has_teoreticalschedule(
    `trainee_id_trainee`,
    `teoreticalSchedule_id_teoreticalShedule`) 
VALUES (
    '$id_trainee',
    (SELECT id_teoreticalShedule FROM teoreticalschedule ORDER BY id_teoreticalShedule DESC LIMIT 1)
    )";
	$result = mysqli_query($conn, $sql);
	if ( false===$result ) {
  printf("error: %s\n", mysqli_error($conn));
}
else {
  echo 'done.';
}
}



$conn->close();
?> 