<?php
 require_once 'D:\laravel\htdocs\shop\data/Requests/ProdcutRequest.php'; 
  require_once 'D:\laravel\htdocs\shop\data/RemoteDataSource/RemoteDataSource.php'; 
  require_once 'D:\laravel\htdocs\shop\domain/Entities/Product.php'; 

 interface BaseRepository {
     public function addProduct(ProductRequest $product); 
     public function getProducts(); 
     public function getProduct($ID); 
     public function deleteProduct($ID); 
     public function editProduct($ID, ProductRequest $product,bool $selectedFile); 
 }

class Repository implements BaseRepository {
     private RemoteDataSourceImpl $source;

    public function __construct() {
        $this->source = new RemoteDataSourceImpl();
    }

    public function addProduct(ProductRequest $product){
       $this->source->addProduct($product);
    }

     public function getProducts(){
        $listOfProducts = [] ; 
         $products =  $this->source->getProducts();
         foreach($products as $product){
            $listOfProducts[] = new Product($product['id'],$product['name'],$product['price'],$product['image']); 
         }
         return $listOfProducts ; 
     }

     public function getProduct($ID){
      $product = $this->source->getProduct($ID) ; 
      return new Product($product['id'],$product['name'],$product['price'],$product['image']) ; 
     }

     public function deleteProduct($ID){
        $this->source->deleteProduct($ID);
     }

      public function editProduct($ID, ProductRequest $product,bool $selectedFile){
          $this->source->editProduct($ID, $product, $selectedFile); ; 
      }
}
?>