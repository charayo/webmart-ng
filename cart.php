<?php
include('cart-process.php');
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
    if (isset($_SESSION['userId'])) {
        $cartItems = $data->loadCart($_SESSION['userId']);
        $cartCount = 0;
        for ($count = 0; $count < count($cartItems); $count++) {
            $cartCount += $cartItems[$count]['quantity'];
        }
        $_SESSION['cart'] = $cartItems;
        echo '<div id="cartJsTarg">
        <h3 class="text-center">Your Cart - <span class="">' . $cartCount . ' item(s)</span></h3>
        <hr>';

        $amount = 0;
        for ($i = 0; $i < count($cartItems); $i++) {
            $amount += $cartItems[$i]['price'] * $cartItems[$i]['quantity'];
            $price = $data->CurrencyFormat($cartItems[$i]['price']);
            echo '
            <div class="container card mt-2 mb-3 shadow-sm w-50" id="cartCard${index}">
            <div class="row mb-2 text-center">
                <div class="col-md-4 text-cen" id="imageTarget">
                    <img id="imageId" class="w-75 mt-4" src="' . $cartItems[$i]['product_image'] . '" alt="product-image">
                </div>
                <div class="col-md-8" id="descrTarget">
                    <div class="pt-4">
                        <h4 class="">' . $cartItems[$i]['product_name'] . '</h4>
                        <p class="">₦' . $price . '</p>
                        <hr>
                        <span hidden>' . $cartItems[$i]['product_id'] . '</span>
                        <button id="' . $cartItems[$i]['product_id'] . '" disabled class="btn btn-default minusBtn border mr-1 mybg">&minus;</button><span class="itemNum border pt-1 pr-2 pl-2 pb-2 mt-3 rounded font-weight-bold">' . $cartItems[$i]['quantity'] . '</span><button id="' . $cartItems[$i]['product_id'] . '" class="btn btn-default border ml-1 mybg plusBtn">&plus;</button>
                        <div class="w-100 rmvPar" ><input type="button" value="Remove from Cart" class=" mx-auto btn btn-danger removeFromCart form-control d-block mt-1" id="' . $cartItems[$i]['product_id'] . '"></div>
                    </div>                                
                </div>
            </div>
        </div>
            ';
        }
        $paystackAmount = $amount;
        $amount = $data->CurrencyFormat($amount);

    ?>
    <?php
        echo '</div>
    <div class="container text-center mt-2 mb-2 ">
        <div class="shadow form-control">
            <span class="float-left font-weight-bold">Total</span><span id="totalCost" class="float-right font-weight-bold">' . $amount . 'NGN</span>
            <span id = "amount" hidden>' . $paystackAmount . '</span>
        </div>
        <br>
        <form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <button class="btn mybg text-white  type="button" id="pay"> Proceed with Payment </button> 
        </form>
        
    </div>';
    } else {
        // $cartItems = [];
        if (isset($_SESSION['tempCart'])) {
            $tempCart = $_SESSION['tempCart'];
            $cartCount = 0;
            for ($count = 0; $count < count($tempCart); $count++) {
                $cartCount += $tempCart[$count]->quantity;
            }
            echo '
                <div id="cartJsTarg">
                    <h3 class="text-center">Your Cart - <span class="">' . $cartCount . ' item(s)</span></h3>
                <hr>';
            // $tempCart = $_SESSION['tempCart'];
        }

        $products = $data->fetch();
        $amount = 0;
        for ($index = 0; $index < count($tempCart); $index++) {

            for ($c = 0; $c < count($products); $c++) {

                if ($tempCart[$index]->productId == $products[$c]['id']) {
                    // echo json_encode($tempCart[$index]->productId);
                    // $cartItems[] = $products[$c];
                    $qty = $tempCart[$index]->quantity;
                    // echo json_encode($products[$index]);
                    // echo json_encode($tempCart[$index]->productId);
                    $amount += $products[$c]['product_sales_price'] * $qty;
                    $price = $data->CurrencyFormat($products[$c]['product_sales_price']);
                    echo '
                            <div class="container card mt-2 mb-3 shadow-sm w-50" id="cartCard${index}">
                            <div class="row mb-2 text-center">
                                <div class="col-md-4 text-cen" id="imageTarget">
                                    <img id="imageId" class="w-75 mt-4" src="' . $products[$c]['product_image'] . '" alt="product-image">
                                </div>
                                <div class="col-md-8" id="descrTarget">
                                    <div class="pt-4">
                                        <h4 class="">' . $products[$c]['product_name'] . '</h4>
                                        <p class="">₦' . $price . '</p>
                                        <hr>
                                        <span hidden>' . $tempCart[$index]->productId . '</span>
                                        <button id="' . $products[$c]['id'] . '" disabled class="btn btn-default minusBtn border mr-1 mybg">&minus;</button><span class="itemNum border pt-1 pr-2 pl-2 pb-2 mt-3 rounded font-weight-bold">' . $qty . '</span><button id="' . $products[$c]['id'] . '" class="btn btn-default border ml-1 mybg plusBtn">&plus;</button>
                                        <div class="w-100 rmvPar" ><input type="button" value="Remove from Cart" class=" mx-auto btn btn-danger removeFromCart form-control d-block mt-1" id="' . $products[$c]['id'] . '"></div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
            ';
                }
            }
        }
    ?>
    <?php
        $paystackAmount = $amount;
        $amount = $data->CurrencyFormat($amount);
        echo '</div>
        <div class="container text-center mt-2 mb-2 ">
            <div class="shadow form-control">
                <span class="float-left font-weight-bold">Total</span><span id="totalCost" class="float-right font-weight-bold">' . $amount . 'NGN</span>
                <span id = "amount" hidden>' . $paystackAmount . '</span>
            </div>
            <br>
            <form>
                <script src="https://js.paystack.co/v1/inline.js"></script>
                <button class="btn mybg text-white  type="button" id="pay" disabled> Pay </button> 
            </form>
            <!-- <a class="btn mybg text-white " href="#" >Continue to Checkout</a>-->
        </div>';
    }




    ?>
    <?php

    ?>
    <?php
    include('footer.php');
    ?>
    <script>
        (function($) {
            $('#pay').on('click', (e) => {
                e.preventDefault();
                $.get('pay-process.php', {
                    paymentRequest: true,
                }, function(res) {
                    res = JSON.parse(res)
                    let payKey = res.pkey;
                    let username = res.user;
                    let userEmail = res.email;
                    //paystack fetch starts here
                    let today = new Date;
                    let addon = today.getTime()
                    e.preventDefault();
                    // alert(document.getElementById('amount').innerText * 100);
                    var handler = PaystackPop.setup({
                        key: `${payKey}`, // Replace with your public key
                        email: `${userEmail}`,
                        amount: document.getElementById('amount').innerText * 100,
                        currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                        ref: `${username}` + addon, // Replace with a reference you generated
                        callback: function(response) {
                            //this happens after the payment is completed successfully
                            var reference = response.reference;
                            // alert('Payment complete! Reference: ' + reference);
                            $.get('pay-process.php', {
                                paymentSuccess: receipt = {
                                    refDet: `${username}` + addon,
                                    amount: document.getElementById('amount').innerText,
                                },
                            },function(resp){
                                // console.log(resp);
                                location.href = "./order.php";
                            })
                            // Make an AJAX call to your server with the reference to verify the transaction
                        },
                        onClose: function() {
                            alert('Transaction was not completed, window closed.');
                        },

                    });
                    handler.openIframe();
                })
            })
            $('#pa').on('click', (e) => {

            })
            $('.itemNum').each((i, Element) => {
                if ($(Element).html() > 1) {
                    $(Element).prev().attr('disabled', false)
                }
            })

            $('body').on('click', (e) => {
                if (e.target.classList.contains('plusBtn')) {
                    let Qty = $(e.target).prev().html();
                    let prodId = e.target.getAttribute('id');
                    Qty = Number(Qty);
                    Qty++;
                    let data = {
                        qty: Qty,
                        pId: prodId
                    }
                    console.log(data);
                    $.get('cart-process.php', {
                        qtyUpd: data
                    }, function(res) {
                        console.log(res);
                        location.href = 'cart.php';

                    })
                }

            })
            $('.minusBtn').on('click', (e) => {
                let Qty = $(e.target).next().html();
                let prodId = e.target.getAttribute('id');
                Qty = Number(Qty);
                Qty--;
                let data = {
                    qty: Qty,
                    pId: prodId
                }
                console.log(Qty);
                $.get('cart-process.php', {
                    qtyUpd: data
                }, function(res) {
                    console.log(res);
                    location.href = 'cart.php';

                })
            })
            $('.removeFromCart').on('click', (e) => {
                let prodId = e.target.getAttribute('id');
                $.get('cart-process.php', {
                    rmvFromCart: prodId
                }, function(res) {
                    console.log(res);
                    location.href = 'cart.php';

                })
            })


        })(jQuery)
    </script>
</body>

</html>