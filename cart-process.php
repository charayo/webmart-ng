<?php
     include("db-querier.php");
     $handle = new Access;
     $clickedProducts = [];
     if(isset($_GET['pId'])){
          $sent = $_GET['pId'];          
          $clickedProducts[] = $sent;
          $_SESSION['clicked'] =$clickedProducts;
          $res = $handle->loadProdDet($sent);
          $response = $handle->addToCart($sent,1,$res['product_sales_price']);
          header('location: cart.php');
     }
     if(isset($_GET['qtyUpd'])){
          $data = $_GET['qtyUpd'];
          $qty = $data['qty'];
          $prodId = $data['pId'];
          $res = $handle->updateCart($prodId, $qty);
     }
     if(isset($_GET['rmvFromCart'])){
          $prodId = $_GET['rmvFromCart'];
          $res = $handle->deleteProductFromCart($prodId);
     }
