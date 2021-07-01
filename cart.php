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
    $data = new Access;
    $cartItems = $data->loadCart();
    $cartCount = count($cartItems);
    $_SESSION['cart'] = $cartItems;
    ?>
    <?php
    echo '<div id="cartJsTarg">
        <h3 class="text-center">Your Cart - <span class="">' . $cartCount . ' item(s)</span></h3>
        <hr>'
    ?>
    <?php
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
    $amount = $data->CurrencyFormat($amount);

    ?>
    <?php
    echo '</div>
    <div class="container text-center mt-2 mb-2 ">
        <div class="shadow form-control">
            <span class="float-left font-weight-bold">Total</span><span id="totalCost" class="float-right font-weight-bold">' . $amount . 'NGN</span>
        </div>
        <br>
        <a class="btn mybg text-white " href="payment.html" >Continue to Checkout</a>
    </div>';

    ?>
    <?php
    include('footer.php');
    ?>
    <script>
        (function($) {
            $('.itemNum').each((i, Element) => {
                if ($(Element).html() > 1) {
                    $(Element).prev().attr('disabled', false)
                }
            })

            $('.plusBtn').on('click', (e) => {
                let Qty = $(e.target).prev().html();
                let prodId = e.target.getAttribute('id');
                Qty = Number(Qty);
                Qty++;
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