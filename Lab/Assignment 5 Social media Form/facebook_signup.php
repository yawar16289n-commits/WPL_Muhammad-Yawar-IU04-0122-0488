<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup_db';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);

$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO facebook_users (firstname, surname, email, password) VALUES ('$firstname', '$surname', '$email', '$password')";

$conn->query($sql);

echo "Facebook signup successful!";
$conn->close();
?>
