<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain/UseCases/EditProductUseCase.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain/UseCases/GetProductUseCase.php'; 
 class EditProductViewModel {
   private $ID ; 
   private $name ; 
   private $price ; 
   private $image ; 
   function __construct(){

        $this->ID = $_GET["id"];
   }
   function editProduct(){
    $this->name = $_POST["productName"];
        $this->price = $_POST["productPrice"];
     $imageName = $this->image = $_FILES["productImage"]["name"];
        // Move uploaded image to a folder
        $targetDir = "../../assets/";
       $this->image = $targetFilePath = $targetDir . $this->image ; 
       $selectedFile =  move_uploaded_file($_FILES["productImage"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'].'/shop/assets/'.$imageName);   
         
    (new EditProductUseCase())->execute(new Product($this->ID, $this->name, $this->price, $this->image),  $selectedFile); 
   }
   function getProduct(){
    return (new GetProductUseCase())->execute($this->ID); 
   }

}

?>