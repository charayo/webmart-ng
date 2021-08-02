<?php
include('db-querier.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-mart Nigeria</title>
    <?php
    include('head-meta.php');
    
    ?>
</head>

<body>
    <?php
    include('topbar.php');
    
    $data = new Access();
    $orderList =  $data->loadOrder($_SESSION['userDetails']['userId']);
    for ($i = 0; $i < count($orderList); $i++) {
        $price = $data->CurrencyFormat($orderList[$i]['price']);
        echo '
        <div class="container card mt-2 mb-3 shadow-sm w-50" id="cartCard${index}">
            <div class="row mb-2 text-center">
                <div class="col-md-4 text-cen" id="imageTarget">
                    <img id="imageId" class="w-75 mt-4" src="' . $orderList[$i]['product_image'] . '" alt="product-image">
                </div>
                <div class="col-md-8" id="descrTarget">
                    <div class="pt-4">
                        <h4 class="">' . $orderList[$i]['product_name'] . '</h4>
                        <p class="">₦' . $price . ' per unit</p>
                        <hr>
                        <strong>Quantity: '.$orderList[$i]['quantity'].'</strong><br>
                        <span hidden>' . $orderList[$i]['product_id'] . '</span>
                        <small>Date: '. $orderList[$i]['order_date'] .'</small>                         
                    </div>                                
                </div>
            </div>
        </div>
        ';
    }
    ?>

</body>

</html>