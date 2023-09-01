<?php
require_once '../../../domain//UseCases/AddProdcutUseCase.php'; 
class AddProductViewModel {
   private $name ; 
   private $price ; 
   private $image ; 

   function __construct(){

        $this->name = $_POST["productName"];
        $this->price = $_POST["productPrice"];
        $imageName = $this->image = $_FILES["productImage"]["name"];

        // Move uploaded image to a folder
        $targetDir = "../../assets/";
       $this->image = $targetFilePath = $targetDir . $this->image ; 
        move_uploaded_file($_FILES["productImage"]["tmp_name"],  $_SERVER['DOCUMENT_ROOT'].'/shop/assets/'.$imageName);

        
   }
   function addProduct(){
    (new AddProductUseCase())->execute(new AddProductUseCaseInput($this->name,$this->price,$this->image,)); 
   }

}

 (new AddProductViewModel())->addProduct(); 

?>