<?php
include("db-querier.php");
$handle = new Access;
$clickedProducts = [];
$tempCart = [];
if (isset($_SESSION['tempCart'])) {
     $tempCart = $_SESSION['tempCart'];
}
if (isset($_GET['pId'])) {
     $sent = $_GET['pId'];
     $clickedProducts[] = $sent;
     // $_SESSION['clicked'] =$clickedProducts;
     $res = $handle->loadProdDet($sent);
     if (isset($_SESSION['userId'])) {
          $userId = $_SESSION['userId'];
          $response = $handle->addToCart($sent, $userId, 1, $res['product_sales_price']);
     } else {
          $product = (object)[
               'productId' => $sent,
               'quantity' => 1
          ];
          $tempCart[] = $product;
          // $tempCart[]= [
          //      'productId' => $sent,
          //      'quantity' => 1
          // ];
          $_SESSION['tempCart'] = $tempCart;
     }

     header('location: cart.php');
}
if (isset($_GET['qtyUpd']) && isset($_SESSION['userId'])) {
     $data = $_GET['qtyUpd'];
     $qty = $data['qty'];
     $prodId = $data['pId'];
     $res = $handle->updateCart($prodId, $qty, $_SESSION['userId']);
} else if (isset($_GET['qtyUpd']) && isset($_SESSION['tempCart'])) {
     $data = $_GET['qtyUpd'];
     $qty = $data['qty'];
     $prodId = $data['pId'];
     $myArray = [];
     for($i = 0; $i < count($tempCart); $i++){
          if($tempCart[$i]->productId != $prodId){
               array_push($myArray,$tempCart[$i]);
          }
          
     }
     $product = (object)[
          'productId' => $prodId,
          'quantity' => $qty
     ];
     $myArray[] = $product;
     $_SESSION['tempCart'] = $myArray;
     // echo json_encode($myArray);
} 

if (isset($_GET['rmvFromCart']) && isset($_SESSION['userId'])) {
     $prodId = $_GET['rmvFromCart'];
     $res = $handle->deleteProductFromCart($prodId, $_SESSION['userId']);
} else if  (isset($_GET['rmvFromCart']) && isset($_SESSION['tempCart'])){
     $prodId = $_GET['rmvFromCart'];

     $myArray = [];
     for($i = 0; $i < count($tempCart); $i++){
          if($tempCart[$i]->productId != $prodId){
               array_push($myArray,$tempCart[$i]);
          }
          
     }
     $_SESSION['tempCart'] = $myArray;
}
if (isset($_GET['signOut'])) {
     $handle->signOut();
}
