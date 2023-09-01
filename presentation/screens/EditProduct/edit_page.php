<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Include Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../core/style/index.css">
</head>
<body>
  <center>
        <h1>Edit Product</h1>
            <?php
                require_once 'EditProductViewModel.php' ; 
                $product = (new EditProductViewModel())->getProduct(); 
            ?> 
        <form action="../../../actions/EditProductAction.php? id=<?php echo $product->id; ?>" method="post" enctype="multipart/form-data">
            <img src="<?php echo '../' ; echo $product->image; ?>" style="min-height: 12rem;" id="selectedImage" class="card-img-top" alt="<?php echo $product->name;?>">

            <label for="productName">Product Name:</label>. 
            <input type="text" id="productName" name="productName" required value="<?php echo $product->name; ?>"><br><br>
            
            <label for="productPrice">Product Price:</label>
            <input type="number" id="productPrice" name="productPrice" step="0.01" required value="<?php echo $product->price; ?>"><br><br>
            
            <label for="productImage">Product Image:</label>
            <input type="file" id="productImage" name="productImage" accept="image/*" ><br><br> 
            
            <button type="submit">Edit Product</button>
            <br/>
           <a class="link" href="../get_products.php"> show all products</a>
          
        </form> 
    </center>
     <script src="../../../js/changeImage.js"></script>
</body>
</html>




