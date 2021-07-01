<?php
if(!session_start()){
session_start();
}
class Access
{
    public $conn;
    public $host = "localhost";
    public $db = "webmart-ng";
    public $username = "root";
    public $password = "";
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            echo "Error in Connection";
            return $this->conn;
        } else {
            // echo "successful";
        }
    }
   
    public function adminSignup($username, $email, $password)
    {
        $sql = "INSERT into admins (username,password,email) values('$username', '$password','$email')";
        $save = $this->conn->query($sql);
        if ($save) {
            echo "successfully saved";
        } else {
            echo "something went wrong";
        }
        $this->conn->close();
    }
    public function login($access, $password)
    {
        $sql = "SELECT * from users where  username = '$access' or email = '$access' and password = '$password' ";
        $verify = $this->conn->query($sql);
        if ($verify->num_rows > 0) {
            $user = $verify->fetch_assoc();
            $_SESSION['presentUser'] = $user['username'];
            $_SESSION['userId'] = $user['id'];
            $_SESSION['logged'] = true;
            // echo $user['username'];
            // echo $_SESSION['presentUser'];
            // echo "Logged in";            
            header('location:index.php');
        } else {
            echo "Not Found";
        }
        $this->conn->close();
    }
    public function signup($username, $email, $password)
    {
        $sql = "INSERT into users (username,password,email) values('$username', '$password','$email')";
        $save = $this->conn->query($sql);
        if ($save) {
            // $login($email, $password);
            // $_SESSION['logged'];
            header('location:index.php');
            // echo "successfully saved";
        } else {
            echo "something went wrong";
        }
        $this->conn->close();
    }
    public function fetch()
    {
        $sql = "SELECT * from products";
        $myArrayOfProdt = $this->conn->query($sql);
        $products = [];
        while ($data = $myArrayOfProdt->fetch_assoc()) {
            $products[] = $data;
        }
        return $products;
        $this->conn->close();
    }
    
    public function loadProdDet($id)
    {
        $sql = "SELECT * from products where id = '$id'";
        $Prodt = $this->conn->query($sql);
        // $products = [];
        // while ($data = $Prodt->fetch_assoc()) {
        //     $products[] = $data;
        // }
        $data = $Prodt->fetch_assoc();
        return $data;
        $this->conn->close();
    }
    public function loadCart(){
        $sql = "SELECT  * from products p  JOIN cart c On c.product_id = p.id";
        $cart = $this->conn->query($sql);
        if ($cart){
            $cartItems = [];
            while ($data = $cart->fetch_assoc()) {
            $cartItems[] = $data;
             }
             return $cartItems;
             $this->conn->close();
            // echo 'cart retrieved';
            // $cartItems = $cart->fetch_all();
            // return $cartItems;
        }
        
        $this->conn->close();
        // $sql = "SELECT * from cart where user_id = '$id'";
    }
    public function addProduct($productName, $productPrice, $salesPrice, $status, $productImg, $productCate, $productDescr, $flashsale, $trending)
    {
        // echo $productName,$productCate,$productImg;
        $sql = "INSERT into products (product_name,product_cost_price,product_sales_price,product_status,product_image,product_category,product_description,flash_sales ,trending) values('$productName', '$productPrice', '$salesPrice', '$status', '$productImg', '$productCate','$productDescr','$flashsale','$trending')";
        $add = $this->conn->query($sql);
        echo json_decode($add);
        if ($add) {
            echo "success";
            header("location: dashboard.php");
        } else {
            echo $this->conn->connect_error;
            echo "Something went wrong!";
        }
        $this->conn->close();
    }
    public function addToCart($productId, $quantity, $price){
        $sql = "INSERT into cart (product_id,quantity,price) VALUES ('$productId','$quantity','$price')";
        $add = $this->conn->query($sql);
        if($add){
            // echo 'success';
            // header('location: cart.php');
        }else{
            echo 'failed to add to cart';
        }
    }
    public function deleteProduct($id)
    {
        $sql = "DELETE from products where id ='$id'";
        $deleted = $this->conn->query($sql);
        if ($deleted) {
            echo "deletion successful";
            header("location: ../dashboard.php");
        } else {
            echo "couldn't delete";
        }
        $this->conn->close();
    }

    public function updateProducts($id, $productName, $productPrice, $salesPrice, $status, $productCate, $productDescr, $flashsale, $trending)
    {
        $sql = "UPDATE products  set  product_name= '$productName',product_cost_price = '$productPrice',product_sales_price = '$salesPrice',product_status = '$status',product_category = '$productCate',product_description = '$productDescr',flash_sales = '$flashsale',trending = '$trending' where id = '$id'";
        $updated = $this->conn->query($sql);
        if ($updated) {
            header('location:dashboard.php');
        } else {
            echo "Failed to update";
        }
        $this->conn->close();
    }
    public function updateCart($id, $qty)
    {
        $sql = "UPDATE cart set quantity = '$qty' WHERE product_id = '$id'";
        $done = $this->conn->query($sql);
        if ($done) {
            header('location:cart.php');
        } else {
            echo "Failed to update Cart";
        }
        $this->conn->close();
    }
    public function deleteProductFromCart($id)
    {
        $sql = "DELETE from cart where product_id ='$id'";
        $deleted = $this->conn->query($sql);
        if ($deleted) {
            echo "product removed from cart";
            header("location: cart.php");
        } else {
            echo "couldn't delete";
        }
        $this->conn->close();
    }
    public function CurrencyFormat($number){
        $decimalPlaces = 0;
        $decimalChar = '.';
        $thousandSeparator = ',';
        return number_format($number, $decimalPlaces,$decimalChar,$thousandSeparator);
    }
}
