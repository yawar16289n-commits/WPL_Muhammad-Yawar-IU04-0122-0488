<?php
$conn = mysqli_connect('localhost', 'root', '', 'wpl',3307);
$query = "select * from products";
$result = mysqli_query($conn, $query);

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
    <div class="container mt-3">

    <table class="table table-bordered table-hover">
        <thead>
            <th>Sr</th>
            <th>Product Category</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($data); $i++) {
                ?>
                <tr>
                    <td><?php echo $data[$i]['id'] ?></td>
                    <td><?php echo $data[$i]['product_category'] ?></td>
                    <td><?php echo $data[$i]['product_name'] ?></td>
                    <td><?php echo $data[$i]['product_price'] ?></td>
                    <td><?php echo $data[$i]['product_quantity'] ?></td>
                    <td>
                        <a href="editform.php?id=<?php echo $data[$i]['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $data[$i]['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        <a href="form.php" class="btn btn-primary mb-3">Create</a>
    </div>
</body>

</html>