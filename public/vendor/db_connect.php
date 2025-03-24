<?php
$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "diplom_bit_db";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
?>