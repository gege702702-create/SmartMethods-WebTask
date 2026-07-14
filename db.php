<?php

$servername = "sql105.infinityfree.com";
$username = "if0_42405310";
$password = "gursioAtnQgauT";
$dbname = "if0_42405310_web_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

?>