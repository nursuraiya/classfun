<?php
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "pcrat";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dBName", "$dBUsername", "$dBPassword");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: ".mysqli_connect_error());
}
