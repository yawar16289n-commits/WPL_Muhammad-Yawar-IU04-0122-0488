<?php
$conn = mysqli_connect('localhost', 'root', '', 'wpl', 3307);

$id = $_POST['id'];
$product_name = $_POST['product_name'];
$product_category = $_POST['product_category'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];

$query = "UPDATE products SET product_name = '$product_name', product_category = '$product_category', product_price = '$product_price', product_quantity = '$product_quantity' WHERE id = '$id'";

mysqli_close($conn);
header('Location: table.php');

?>
