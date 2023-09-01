<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain\Repository\Repository.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'data/Requests/ProdcutRequest.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain/Entities/Product.php'; 
 class EditProductUseCase {
    private Repository $repository;
      function __construct(){
        $this->repository = new Repository(); 
    }
    public function execute(Product $product,bool $selectedFile){
        $this->repository->  editProduct($product->id, 
        new ProductRequest($product->name, $product->price, $product->image),$selectedFile) ; 
    }
 }
?>