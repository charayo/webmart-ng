<?php
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
    public function signup($username, $email, $password)
    {
        $sql = "INSERT into users (username,password,email) values('$username', '$password','$email')";
        $save = $this->conn->query($sql);
        if ($save) {
            echo "successfully saved";
        } else {
            echo "something went wrong";
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
    }
    public function login($access, $password)
    {
        $sql = "SELECT * from users where  username = '$access' or email = '$access' and password = '$password' ";
        $verify = $this->conn->query($sql);
        if ($verify->num_rows > 0) {
            echo "Logged in";
        } else {
            echo "Not Found";
        }
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
    }
}
