<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'wpl', 3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete product
$query = "DELETE FROM products WHERE id = '$id'";

if (mysqli_query($conn, $query)) {
    mysqli_close($conn);
    header('Location: table.php');
    exit();
} else {
    echo "Error deleting product: " . mysqli_error($conn);
    mysqli_close($conn);
}