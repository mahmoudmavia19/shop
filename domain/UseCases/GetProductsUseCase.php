<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain\Repository\Repository.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'data/Requests/ProdcutRequest.php'; 
 class GetProductsUseCase {
    private Repository $repository;
      function __construct(){
        $this->repository = new Repository(); 
    }
    public function execute(){
       return  $this->repository->getProducts() ; 
    }
 }


?>