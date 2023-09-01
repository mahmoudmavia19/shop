<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'data/Requests/ProdcutRequest.php'; 
require_once $_SERVER['DOCUMENT_ROOT'].'/shop/'.'core/config/config.php'; 

interface BaseRemoteDataSource {
   public function AddProduct(ProductRequest $product); 
   public function getProducts(); 
   public function getProduct($id); 
   public function deleteProduct($id); 
   public function editProduct($id,ProductRequest $product,bool $selectedFile); 

}

class RemoteDataSourceImpl implements BaseRemoteDataSource {
    private $conn ; 
    function __construct()
    {
         $this->conn = MysqlConnection::getConnection(); 
    }
   public function AddProduct(ProductRequest $product){
    $name = $product->name;
    $price = $product->price;
    $image = $product->image;
    // Prepare and bind the INSERT statement
    $stmt = $this->conn ->prepare("INSERT INTO products (name, price, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $price, $image);
    $stmt->execute();
    header("location:../../../index.php") ; 
    // Close the statement
    $stmt->close();
    // Close the connection
    $this->conn ->close();
    }

     public function getProducts() {
        // Retrieve products from the database
        $sql = "SELECT * FROM products";
        $result = $this->conn ->query($sql);
        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        return $products;
     }

        public function deleteProduct($ID){
            mysqli_query($this->conn,"DELETE FROM products WHERE id = $ID");
           header("location:../presentation/screens/get_products.php") ; 
            $this->conn->close();
        }

        public function editProduct($id,ProductRequest $product,bool $selectedFile){    
            $ID = $id ; 
            $name = $product->name;
            $price =  $product->price;
            $image =  $product->image;
            if($selectedFile){
            $update = "UPDATE products SET name='$name' , price='$price' , image='$image'  WHERE id=$ID" ; 
            }else {
            $update = "UPDATE products SET name='$name' , price='$price'  WHERE id=$ID" ; 
            }
            $result = mysqli_query($this->conn,$update); 
                if($result){
                       header('location:../presentation/screens/get_products.php') ; 
                }else {
                    echo "ERROR when try edit data "; 
                }

        }

        public function getProduct($id){
           $ID = $id ; 
          $up = mysqli_query($this->conn,"SELECT * FROM products WHERE id = $ID") ; 
          return  mysqli_fetch_array($up);     
        }
}
?>