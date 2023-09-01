<?php 
 require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'domain\Repository\Repository.php'; 
 class GetProductUseCase {
    private Repository $repository;
      function __construct(){
        $this->repository = new Repository(); 
    }
    public function execute($id){
       return  $this->repository->getProduct($id) ; 
    }
 }
 
?>