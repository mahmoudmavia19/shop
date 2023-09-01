<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../core/style/index.css">
    <title>Shop Online</title>
</head>
<body>
    <center>
        <h1>Add Product</h1>
        <form action="AddProductViewModel.php" method="post" enctype="multipart/form-data">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required><br><br>
            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" step="0.01" required><br><br>
            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" accept="image/*" required><br><br>
            <button type="submit">Add Product</button>
            <br/>
           <a class="link" href="../get_products.php"> show all products</a>
        </form> 
    </center>
</body>
</html>