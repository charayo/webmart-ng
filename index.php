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

    <!-- my login modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content bg-dark card shadow text-white">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Welcome Back!</h4>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" class="form-control mb-2" placeholder="username here" required id="userIdInp">
                    <input type="password" class="form-control mb-2" placeholder="password" required id="passInp">
                    <label>
                        <input type="checkbox" checked="checked" name="remember" id="remMe">
                        Remember me <a href="forgot-pass.html" style="text-decoration: none;" id="fgtPass"><small> Forgot Password</small></a><a style="text-decoration: none;" href="signup.html"><small> or sign up</small></a>
                    </label>
                    <input type="button" class="btn mybg text-white mt-1 d-block" value="LOGIN" id="loginBtn">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
    <!-- carousel -->
    <div id="demo" class="carousel slide text-center" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner mt-2">
            <div class="carousel-item active">
                <img class="img-thumbnail" src="./images/slider2.jpg" alt="slider2">
            </div>
            <div class="carousel-item">
                <img class="img-thumbnail" src="./images/slider1.jpg" alt="slider1">
            </div>
            <div class="carousel-item">
                <img class="img-thumbnail" src="./images/slider3.jpg" alt="slider3">
            </div>
            <div class="carousel-item">
                <img class="img-thumbnail" src="./images/slider4.jpg" alt="slider4">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>

    </div>
    <hr>
    <?php
    include("card-style.php");
    ?>
    <!-- Flash Sales Section -->
    <div class="" id="flash-sales">
        <div class="text-center">
            <h2 class="text-danger">Flash Sales!</h2>
        </div>
        <div class="px-5 container">
            <div class="a-row container card-deck mx-auto p-5">
                <?php
                include('db-querier.php');
                $data = new Access;

                $products = $data->fetch();
                $count = 0;
                for ($i = 0; $i < count($products); $i++) {
                    if($products[$i]['flash_sales']=='true'){
                        echo '
                            <div class="card text-center shadow mx-auto">
                                <div class="w-50 border-none text-center mx-auto">
                                    <a>
                                        <img src="' . $products[$i]['product_image'] . '" class="mt-1 img-thumbnail" alt="' . $products[$i]['product_name'] . '">
                                    </a>
                                </div>    
                                <div class="card-body">
                                    <h5 class="card-title"> ' . $products[$i]['product_name'] . ' </h5>
                                    <del class="card-text text-mute">₦' . $products[$i]['product_cost_price'] . '</del>
                                    <p class="card-text text-danger">₦' . $products[$i]['product_sales_price'] . '</p>
                                </div>
                                <div class="card-footer bg-transparent border-light">
                                    <a href="product-page.php?id='.$products[$i]["id"].'" class="btn btn-danger checkBtn" id=" '.$products[$i]['id'].'">Check</a>
                                    
                                </div>
                            </div>
                        ';
                        $count++;
                    }
                    if($count==3){
                        break;
                    }
                }
                ?>

            </div>
        </div>
        <div class="container text-center">
            <a href="flashsales.php" class="btn text-danger  font-weight-bold">View more <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>
    <hr>
    <!-- categories section -->
    <div class=" m-5" >
        <div class="text-center" style="padding: 0;">
            <h2 class="text-danger">Categories</h2>
        </div>
        <div class="row " style="padding: 0;">
            <div class="col-md-6 " style="padding: 0px;">
                <div class="row">
                    <div class="col-8  float-right" style="padding: 0;">
                        <a href="women.html"><img class="w-100" src="images/front-women-clothing.jpg" alt=""></a>
                    </div>
                    <div class="col-4 float-left" style="padding: 0;">
                        <a href=""><img class="w-100" src="images/front-women-shoes.jpg" alt=""></a>
                        <a href="bags-category.html"><img class="w-100" src="images/front-women-bags.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 " style="padding: 0px;">
                <div class="row">
                    <div class="col-8  float-right" style="padding: 0;">
                        <a href=""><img class="w-100" src="images/front-men-clothing.jpg" alt=""></a>
                    </div>
                    <div class="col-4 float-left" style="padding: 0;">
                        <a href=""><img class="w-100" src="images/front-men-shoes.jpg" alt=""></a>
                        <a href=""><img class="w-100" src="images/front-men-accessories.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row " style="padding: 0;">
            <div class="col-md-6" style="padding: 0px;">
                <div class="row con">
                    <div class="col-8  float-right" style="padding: 0;">
                        <a href="phones&tablets.html"><img class="w-100" src="images/front-phones.jpg" alt=""></a>                        
                    </div>
                    <div class="col-4 float-left" style="padding: 0;">
                        <a href="phones&tablets.html"><img class="w-100" src="images/front-phone-cases.jpg" alt=""></a>
                        <a href=""><img class="w-100" src="images/front-laptops.jpg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 " style="padding: 0px;">
                <div class="row">
                    <div class="col-8  float-right" style="padding: 0;">
                        <a href="health&beauty.html"><img class="w-100" src="images/front-health-skincare.jpg" alt=""></a>
                    </div>
                    <div class="col-4 float-left" style="padding: 0;">
                        <a href=""><img class="w-100" src="images/front-health-fragrance.jpg" alt=""></a>
                        <a href="health&beauty.html"><img class="w-100" src="images/front-health-makeup.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Trending now section -->
    <div class="">
        <div class="text-center">
            <h2 class="text-danger">Trending Now</h2>
        </div>
        <div class="px-5 container">
            <div class="a-row container card-deck mx-auto p-5">
                <?php
                $count = 0;
                for ($i = 0; $i < count($products); $i++) {
                    if($products[$i]['trending']=='true'){
                        echo '
                            <div class="card text-center shadow mx-auto">
                                <div class="w-50 border-none text-center mx-auto">
                                    <a>
                                        <img src="' . $products[$i]['product_image'] . '" class="mt-1 img-thumbnail" alt="' . $products[$i]['product_name'] . '">
                                    </a>
                                </div>    
                                <div class="card-body">
                                    <h5 class="card-title"> ' . $products[$i]['product_name'] . ' </h5>
                                    <del class="card-text text-mute">₦' . $products[$i]['product_cost_price'] . '</del>
                                    <p class="card-text text-danger">₦' . $products[$i]['product_sales_price'] . '</p>
                                </div>
                                <div class="card-footer bg-transparent border-light">
                                    <a href="product-page.php?id='.$products[$i]["id"].'" class="btn btn-danger checkBtn" id=" '.$products[$i]['id'].'">Check</a>
                                    
                                </div>
                            </div>
                        ';
                        $count++;
                    }
                    if($count==3){
                        break;
                    }
                }
                ?>

            </div>
        </div>
        <div class="container text-center">
            <a href="trending.php" class="btn text-danger  font-weight-bold">View more <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>

    <?php
    include("footer.php");

    ?>


    <script>
        (($) => {
            $(window).on('load', function() {
                $('#preloader-active').delay(1550).fadeOut('slow');
                $('body').delay(450).css({
                    'overflow': 'visible'
                });
            });

            // let salesPrice, costPrice, imageSrc, productName;
            // let getProductBtn = () => {
            //     let objOfProducts = {
            //         salesPrice: salesPrice,
            //         costPrice: costPrice,
            //         product: productName,
            //         imgUrl: imageSrc,
            //     }
            //     // localStorage.setItem('products', JSON.stringify(objOfProducts));
            //     console.log(objOfProducts);
            //     window.location.href = '/webmart-ng/product-page.php';
            // }
            // console.log('index');
            
        })(jQuery)
    </script>
    <!-- <script src="./main.js"></script> -->
    <script src="/webmart-ng/main.js"></script>
</body>

</html>