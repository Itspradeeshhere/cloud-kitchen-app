<?php
$host = "sql12.freesqldatabase.com";
$dbname = "sql12771975";
$username = "sql12771975";
$password = "DYPk6Z3QGV";

$conn = new mysqli($host, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
