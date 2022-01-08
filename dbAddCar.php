<?php

$con=mysqli_connect("localhost","root","","zdamsam");

$user_info = "INSERT INTO cars (brand, model, productionYear, regNumber, mileage, serviceDate, ocDate, acDate) VALUES ('$_POST[brand]', '$_POST[model]','$_POST[productionYear]','$_POST[regNumber]','$_POST[mileage]','$_POST[serviceDate]','$_POST[ocDate]','$_POST[acDate]')"; 

mysqli_query($con, $user_info);
echo "Dodano pojazd do bazy";

mysqli_close($con);  
?>
<html>
<p>Za chwilę zostaniesz przeniesiony</p>
<meta http-equiv="refresh" content="0;url=car_form.php" />
</html>
