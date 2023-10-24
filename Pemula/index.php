<?php
// Create database connection using config file
include_once("../config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM menu ORDER BY id DESC");
?>
 

<html>
<head>
    <title>Pemesanan</title>
</head>
<body>
    <h3>Menu</h3>
    <a href="penjual.php">penjual</a><br>
    <a href="menu.php">pemesanan</a>
</body>
</html>