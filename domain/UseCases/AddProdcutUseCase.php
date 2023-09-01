<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain\Repository\Repository.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'data/Requests/ProdcutRequest.php'; 
 class AddProductUseCase {
    private Repository $repository;
      function __construct(){
        $this->repository = new Repository(); 
    }
    public function execute(AddProductUseCaseInput $product){
        $this->repository->addProduct(new ProductRequest($product->name,$product->price,$product->image,)) ; 
    }
 }

class AddProductUseCaseInput {
    public $name;
    public $price;
    public $image;
    function __construct($name,$price,$image)
    {
        $this->name = $name; 
        $this->price = $price; 
        $this->image = $image;
    }
}

?>