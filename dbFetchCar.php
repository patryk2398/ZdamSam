<?php
echo "<style>";
	echo" li {list-style-type: none;}";
echo "</style>";

while($row = mysqli_fetch_array($result))
{
	echo "<li>" . "Pojazd: " . $row['brand'] . " " . $row['model'] . "</li>";
	echo "<li>" . "Rok produkcji: " . $row['productionYear'] . "</li>";
	echo "<li>" . "Numer rejestracyjny: " . $row['regNumber'] . "</li>";
	echo "<li>" . "Przebieg: " . $row['mileage'] . "</li>";
	echo "<li>" . "Data serwisowania: " . $row['serviceDate'] . "</li>";
	echo "<li>" . "Oc: " . $row['ocDate'] . "</li>";
	echo "<li>" . "Ac: " . $row['acDate'] . "</li>";
}

mysqli_close($con);
?>
