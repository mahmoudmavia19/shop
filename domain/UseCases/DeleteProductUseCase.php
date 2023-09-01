<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain\Repository\Repository.php'; 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'data/Requests/ProdcutRequest.php'; 
 class DeleteProductUseCase {
    private Repository $repository;
      function __construct(){
        $this->repository = new Repository(); 
    }
    public function execute($ID){
        $this->repository->deleteProduct($ID) ; 
    }
 }
?>