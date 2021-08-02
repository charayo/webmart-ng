<?php
include("db-querier.php");
if (isset($_GET['paymentRequest'])){
    // echo 'payment about to start';
    $requirements = [
        'pkey' => 'pk_test_f4a57370f401e372127b5402878564ea2a17ee7e',
        'user' => $_SESSION['userDetails']['username'],
        'email' => $_SESSION['userDetails']['userEmail'],
    ];
    echo json_encode($requirements);
}
if (isset($_GET['paymentSuccess'])){
    $receipt  = $_GET['paymentSuccess'];
    $data = new Access();
    $cartItems = $data->loadCart($_SESSION['userId']);
    $data->updatePayment($_SESSION['userId'],$receipt['refDet'],$receipt['amount']);
    $data->updatePayment($cartItems[$i]['user_id'],$receipt['refDet'],$receipt['amount']);
    for($i = 0; $i < count($cartItems); $i++ ){
        $data->pushOrder($cartItems[$i]['product_id'], $cartItems[$i]['user_id'],$cartItems[$i]['quantity'], $cartItems[$i]['price']);
        $data->deleteProductFromCart($cartItems[$i]['product_id'],$cartItems[$i]['user_id']);
    }
   
//    echo json_encode( $receipt['amount']);
    // echo 'payment successful and order placed';
}

?>