<?php
include('db-querier.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web-mart Nigeria</title>
    <?php
    include("head-meta.php");
    ?>

</head>

<!-- <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <h4>WEB-MART</h4>
            </div>
        </div>
    </div>
</div> -->

<body>
    <?php
    include("topbar.php");
    ?>

    <?php
    if (isset($_GET['id'])) {
        $theID = $_GET['id'];
    }

    $data = new Access;

    $products = $data->fetch();
    $carted = false;
    if (isset($_SESSION['userId'])) {
        $cartItems = $data->loadCart($_SESSION['userId']);
        for ($count = 0; $count < count($cartItems); $count++) {
            if ($cartItems[$count]['product_id'] == $theID) {
                $carted = true;
                $qty = $cartItems[$count]['quantity'];
            }
        }
    } else if (isset($_SESSION['tempCart'])) {
        $tempCart = $_SESSION['tempCart'];
        for ($count = 0; $count < count($tempCart); $count++) {
            if ($tempCart[$count]->productId == $theID) {
                $carted = true;
                $qty = $tempCart[$count]->quantity;
            }
        }
    }
    for ($i = 0; $i < count($products); $i++) {
        if ($products[$i]['id'] == $theID) {
            $discount = (($products[$i]['product_cost_price'] - $products[$i]['product_sales_price']) / $products[$i]['product_cost_price']) * 100;
            $discount = round($discount);
            $costPrice = $data->CurrencyFormat($products[$i]['product_cost_price']);
            $salesPrice = $data->CurrencyFormat($products[$i]['product_sales_price']);
            if (!$carted) {
                echo '
                        <div class="nav p-2" id="path-link">
                            <span class="mr-3"><a class="text-black path-link" href="index.php">Home</a><span class="ml-1 myIcon">>></span></span>
                            <span class="mr-3"><a class="text-black path-link" href="' . $products[$i]['product_category'] . '.php">' . $products[$i]['product_category'] . '</a><span class="ml-1 myIcon">>></span></span>
                        </div>
                        <div class="pt-4 mb-2 pb-3 mt-3 card w-100 container">
                            <div class="row">
                                <div class="col-4 text-center bordker">
                                    <img id="imageId" class="w-75 mt-4 prod-img" src="' . $products[$i]['product_image'] . '" alt="">
                                </div>
                                <div class="col-8">
                                    <h4 id="itemName">' . $products[$i]['product_name'] . '</h4>
                                    <span class="d-block" id="productBrand">Brand: </span>
                                    <span><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-grey">star</i></span><span class="d-block">(4 ratings)</span>
                                    <hr>
                                    <h1 id="itemPrice">₦' . $salesPrice . '</h1>
                                    <span><del id="slashPrice">₦' . $costPrice . '</del></span><span class="bg-warning ml-1">-' . $discount . '%</span>
                                    <hr>
                                    <div class="" id="addToCartDiv" name="">
                                        <input type="button" id="' . $products[$i]['id'] . '" value="ADD TO CART" class="btn mybg mt-2 form-control text-white addToCart">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card container w-100 mb-4">
                            <h4>Product details</h4>
                            <p class="" id="product-details">' . $products[$i]['product_description'] . '</p>
                        </div>            
                ';
            } else {
                echo '
                    <div class="nav p-2" id="path-link">
                        <span class="mr-3"><a class="text-black path-link" href="index.php">Home</a><span class="ml-1 myIcon">>></span></span>
                        <span class="mr-3"><a class="text-black path-link" href="' . $products[$i]['product_category'] . '.php">' . $products[$i]['product_category'] . '</a><span class="ml-1 myIcon">>></span></span>
                    </div>
                    <div class="pt-4 mb-2 pb-3 mt-3 card w-100 container">
                        <div class="row">
                            <div class="col-4 text-center bordker">
                                <img id="imageId" class="w-75 mt-4 prod-img" src="' . $products[$i]['product_image'] . '" alt="">
                            </div>
                            <div class="col-8">
                                <h4 id="itemName">' . $products[$i]['product_name'] . '</h4>
                                <span class="d-block" id="productBrand">Brand: </span>
                                <span><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-grey">star</i></span><span class="d-block">(4 ratings)</span>
                                <hr>
                                <h1 id="itemPrice">₦' . $salesPrice . '</h1>
                                <span><del id="slashPrice">₦' . $costPrice . '</del></span><span class="bg-warning ml-1">-' . $discount . '%</span>
                                <hr>
                                <div id="cartCtrl" class="mt-2">
                                    <button id="' . $products[$i]['id'] . '" disabled class="btn btn-default minusBtn border mr-1 mybg ">&minus;</button><span id="itemNum" class="border pt-1 pr-2 pl-2 pb-2 mt-3 rounded font-weight-bold">' . $qty . '  </span><button id="' . $products[$i]['id'] . '" class="btn btn-default border ml-1 mybg plusBtn">&plus;</button>
                                    <div class="d-none" name="" id="theCodeName">codename</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card container w-100 mb-4">
                        <h4>Product details</h4>
                        <p class="" id="product-details">' . $products[$i]['product_description'] . '</p>
                    </div>
            
            ';
            }
        }
    }

    ?>

    <?php
    include("footer.php");

    ?>


    <script>
        (function($) {
            // }
            $('.addToCart').on('click', (e) => {
                let prodId = e.target.getAttribute('id');
                $.get('cart-process.php', {
                    pId: prodId
                }, function(res) {
                    console.log(res);
                    location.href = 'cart.php';

                })

            })
            if ($('#itemNum').html() > 1) {
                $('.minusBtn').attr('disabled', false)
            }
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

        })(jQuery)
    </script>


    <!-- <script src="main.js"></script> -->
</body>

</html>