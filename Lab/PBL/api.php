<?php
header('Content-Type: application/json');

$conn = mysqli_connect('localhost', 'root', '', 'wpl', 3307);


$action = $_REQUEST['action'] ?? '';

if ($action == 'read') {
    $read = "SELECT * FROM products";
    $result = mysqli_query($conn, $read);
    
    if ($result) {
        echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    } else {
        echo json_encode(['error' => mysqli_error($conn)]);
    }
}

if ($action == 'fetch') { 
    $id = $_GET['id'];
    $stmt = mysqli_prepare($conn, "SELECT * FROM products WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    
    if ($result) {
        echo json_encode(mysqli_fetch_assoc($result));
    } else {
        echo json_encode(['error' => mysqli_error($conn)]);
    }
    mysqli_stmt_close($stmt);
}

if ($action == 'create') {
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    
    $stmt = mysqli_prepare($conn, "INSERT INTO products(product_name, product_category, product_price, product_quantity) VALUES(?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssdi", $product_name, $product_category, $product_price, $product_quantity);
    
    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['msg' => 'Product created successfully', 'id' => mysqli_insert_id($conn)]);
    } else {
        echo json_encode(['error' => mysqli_error($conn)]);
    }
    mysqli_stmt_close($stmt);
}

if ($action == 'update') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    
    $stmt = mysqli_prepare($conn, "UPDATE products SET product_name = ?, product_category = ?, product_price = ?, product_quantity = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssdii", $product_name, $product_category, $product_price, $product_quantity, $product_id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['msg' => 'Product updated successfully']);
    } else {
        echo json_encode(['error' => mysqli_error($conn)]);
    }
    mysqli_stmt_close($stmt);
}

if ($action == 'delete') {
    $id = $_POST['id'];
    $stmt = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(['msg' => 'Product deleted successfully']);
    } else {
        echo json_encode(['error' => mysqli_error($conn)]);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>
