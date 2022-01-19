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

$id = $_POST['id'];
$internalTeoreticalPass = isset($_POST['internalTeoreticalPass']) ? 1 : 0;
$internalPracticalPass = isset($_POST['internalPracticalPass']) ? 1 : 0;
$externalTeoreticalPass = isset($_POST['externalTeoreticalPass']) ? 1 : 0;
$externalPracticalPass = isset($_POST['externalPracticalPass']) ? 1 : 0;
$isArchive = isset($_POST['isArchive']) ? 1 : 0;

$sql = "
UPDATE trainee SET 
internalTeoreticalPass=$internalTeoreticalPass,
internalPracticalPass=$internalPracticalPass,
externalTeoreticalPass=$externalTeoreticalPass,
externalPracticalPass=$externalPracticalPass,
isArchive=$isArchive
WHERE id_trainee = $id";

if ($conn->query($sql) === TRUE) 
{
  header('Location: studentList.php');
} 

$conn->close();
?> 