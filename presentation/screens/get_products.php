<?php
require_once '../../domain/UseCases/GetProductsUseCase.php' ; 
$listProducts =   (new GetProductsUseCase())->execute() ;  
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="../../core/style/index.css">
<title>Get Products</title>
</head>
<body>
     <center>
    <h1>Products List</h1>
    <div class="container">
  <div class="d-flex flex-row overflow-auto mt-4">
    <?php foreach ($listProducts as $product) : ?>
      <div class="card mx-3" style="width: 15rem; height:20.5rem">
        <img src="<?php echo $product->image;?>" style="min-height: 12rem;" class="card-img-top" alt="<?php echo $product->name; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $product->name; ?></h5>
          <p class="card-text">Price: <?php echo $product->price; ?>$</p>
        </div>
          <div class="btnCon">
              <a href="../screens/EditProduct/edit_page.php? id='<?php echo $product->id; ?>'"  class="btn btn-primary">Edit</a>
              <a href="../../actions/DeleteProductAction.php? id='<?php echo$product->id; ?>'" class="btn btn-danger">Delete</a>
            </div>
      </div>
    <?php endforeach; ?>
  </div>
    </div>
    </center>
</body>
</html>
 