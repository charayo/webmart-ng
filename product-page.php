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
    include('db-querier.php');
    $data = new Access;
    $products = $data->fetch();
    for($i = 0; $i < count($products); $i++){
        if($products[$i]['id'] == $theID){
            $discount = (($products[$i]['product_cost_price'] - $products[$i]['product_sales_price']) / $products[$i]['product_cost_price']) *100;
            // $product = $products[$i]
            echo '
                    <div class="nav p-2" id="path-link">
                        <span class="mr-3"><a class="text-black path-link" href="index.php">Home</a><span class="ml-1 myIcon">>></span></span>
                        <span class="mr-3"><a class="text-black path-link" href="'.$products[$i]['product_category'].'.php">'.$products[$i]['product_category'].'</a><span class="ml-1 myIcon">>></span></span>
                    </div>
                    <div class="pt-4 mb-2 pb-3 mt-3 card w-100 container">
                
                        <div class="row">
                            <div class="col-4 text-center bordker">
                                <img id="imageId" class="w-75 mt-4 prod-img" src="'. $products[$i]['product_image'].'" alt="">
                            </div>
                            <div class="col-8">
                                <h4 id="itemName">'. $products[$i]['product_name'].'</h4>
                                <span class="d-block" id="productBrand">Brand: </span>
                                <span><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-warning">star</i><i class="material-icons text-grey">star</i></span><span class="d-block">(4 ratings)</span>
                                <hr>
                                <h1 id="itemPrice">₦'. $products[$i]['product_sales_price'].'</h1>
                                <span><del id="slashPrice">₦'. $products[$i]['product_cost_price'].'</del></span><span class="bg-warning ml-1">-'.$discount.'%</span>
                                <hr>
                                <!-- <span>SELECT VARIATION</span> -->
                                <!-- <div class="mt-2">
                                    <button class=" btn btn-default border">Maroon</button>
                                    <button class=" btn btn-default border">Black</button>
                                    <button class=" btn btn-default border">Brown</button>
                                    <button class=" btn btn-default border">Blue</button>
                                </div> -->
                                <div class="" id="addToCartDiv" name="">
                                    <input type="button" id="addToCart" value="ADD TO CART" class="btn mybg mt-2 form-control text-white ">
                                </div>
                                <div id="cartCtrl" class="d-none mt-2">
                                    <button id="minusBtn" disabled class="btn btn-default minusBtn border mr-1 mybg ">&minus;</button><span id="itemNum" class="border pt-1 pr-2 pl-2 pb-2 mt-3 rounded font-weight-bold">1</span><button id="plusBtn" class="btn btn-default border ml-1 mybg plusBtn">&plus;</button>
                                    <div class="d-none" name="" id="theCodeName">codename</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card container w-100 mb-4">
                        <h4>Product details</h4>
                        <p class="" id="product-details">'. $products[$i]['product_description'].'</p>
                    </div>
            
            ';
        }
    }    

    ?>
    
    <?php
    include("footer.php");

    ?>


    <script>
        (function($) {
            // let username = localStorage.getItem('presentUser')
            // let product;
            // if (localStorage.getItem('products')) {
            //     product = JSON.parse(localStorage.getItem('products'));
            //     $('#slashPrice').html(product.costPrice);
            //     $('#itemPrice').html(product.salesPrice);
            //     $('#imageId').attr('src', product.imgUrl);
            //     $('#prodPath').html(product.product);
            //     $('#itemName').html(product.product);
            //     $('#addToCartDiv').attr('name', `${product.product}`);
            //     $('#theCodeName').attr('name', `${product.product}`);
            // }
            // if (localStorage.getItem(`${product.product}`)) {
            //     let cartQty = localStorage.getItem(`${product.product}`);
            //     $('#itemNum').html(cartQty);
            //     $('#addToCartDiv').addClass('d-none');
            //     $('#cartCtrl').removeClass('d-none')
            // }
        })(jQuery)
    </script>


    <!-- <script src="main.js"></script> -->
</body>

</html>