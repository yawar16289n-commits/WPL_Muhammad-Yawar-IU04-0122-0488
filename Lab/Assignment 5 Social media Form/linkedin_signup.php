<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup_db';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO linkedin_users (fullname, email, password) VALUES ('$fullname', '$email', '$password')";

$conn->query($sql);

echo "LinkedIn signup successful!";
$conn->close();
?>
