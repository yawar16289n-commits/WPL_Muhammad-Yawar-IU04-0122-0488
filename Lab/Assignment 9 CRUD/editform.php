<?php
$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'root', '', 'wpl', 3307);

$query = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    die("Product not found!");
}

$product = mysqli_fetch_assoc($result);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>
  <div class="container mt-4">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h4>Edit Product</h4>
          </div>
          <div class="card-body">
            <form method="post" action="editSubmit.php">
              <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
              
              <div class="form-group mb-3">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" 
                       value="<?php echo htmlspecialchars($product['product_name']); ?>" 
                       placeholder="Enter product name" required>
              </div>
              
              <div class="form-group mb-3">
                <label for="product_category">Product Category</label>
                <input type="text" class="form-control" name="product_category" id="product_category" 
                       value="<?php echo htmlspecialchars($product['product_category']); ?>" 
                       placeholder="Enter product category" required>
              </div>
              
              <div class="form-group mb-3">
                <label for="product_price">Product Price</label>
                <input type="number" step="0.01" class="form-control" name="product_price" id="product_price" 
                       value="<?php echo $product['product_price']; ?>" 
                       placeholder="Enter product price" required>
              </div>
              
              <div class="form-group mb-3">
                <label for="product_quantity">Product Quantity</label>
                <input type="number" class="form-control" name="product_quantity" id="product_quantity" 
                       value="<?php echo $product['product_quantity']; ?>" 
                       placeholder="Enter product quantity" required>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="table.php" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
