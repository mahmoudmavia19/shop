<?php
    require_once '../domain/UseCases/DeleteProductUseCase.php'; 
    (new DeleteProductUseCase())->execute($_GET['id']); 
?> 