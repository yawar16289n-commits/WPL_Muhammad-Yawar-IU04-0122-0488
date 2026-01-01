<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'signup_db';
$port = 3307;

$conn = new mysqli($host, $user, $pass, $db, $port);

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO snapchat_users (firstname, lastname, email, username, password) VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

$conn->query($sql);


$conn->close();
?>
