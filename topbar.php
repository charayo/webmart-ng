<?php
$data = new Access;
$cartCount = 0;
// $tempCart;
if (isset($_SESSION['userId'])) {
    $cartItems = $data->loadCart($_SESSION['userId']);
    if (count($cartItems) > 0) {
        for ($i = 0; $i < count($cartItems); $i++) {
            $cartCount += $cartItems[$i]['quantity'];
        }
    }
} else {
    if (isset($_SESSION['tempCart'])) {
        $tempCart = $_SESSION['tempCart'];
        $cartCount = 0;
        for ($count = 0; $count < count($tempCart); $count++) {
            $cartCount += $tempCart[$count]->quantity;
        }
    }
}

?>

<div class="fixed-top mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container-fluid">
            <a class=" mytxt font-weight-bolder h2 logotxt" href="index.php">WEB-MART<i class="material-icons text-white ml-1" aria-hidden="true">shopping_cart</i></a>
            <button class="navbar-toggler ml-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="flashsales.php">Flash Sales</a>
                    </li>
                    <li class="nav-item dropdown">
                        <?php
                        if (isset($_SESSION['logged'])) {
                            echo '
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">' . $_SESSION["presentUser"] . '</a>

                                <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown" id="userTarg">
                                    <li id="signOut" class=""><a class=""><input class="btn mybg text-white"
                                                type="button" value="Sign out" id="signOutBtn"></a>
                                    </li>
                                    <hr class="dropdown-divider">
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item mytxt" href="#">Support Center</a></li>
                                </ul>
                                ';
                        } else {
                            echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Login</a>
                                <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown" id="userTarg">
                                    <li id="indexLogin"><a class="dropdown-item"><input class="btn mybg text-white"
                                                type="button" value="LOGIN" data-toggle="modal" data-target="#myModal"></a>
                                    </li>
                                    <hr class="dropdown-divider">
                                    <li id="indexCrtAcc"><a class="dropdown-item" href="user-account.php"><input class="btn btn-dark"
                                                type="button" value="CREATE AN ACCOUNT" id="crtAccBtn"></a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item mytxt" href="#">Support Center</a></li>
                                </ul>
                            ';
                        }
                        ?>


                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Sell on
                            WEB-MART</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav font-weight-bolder d-md-none">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="women.php">Women</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="men.php">Men</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="electronics.php">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="phones-tablet.php">Phones & Tablet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="health-beauty.php">Health & Beauty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="order.php" id="orderPageLink">My Order</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="cart.php">
                    <i class="material-icons text-white ml-1" aria-hidden="true">shopping_cart</i>
                </a><sup id="cartUpdate" class="badge badge-danger badge-pill  ">
                    <?php
                    echo $cartCount;
                    ?>
                </sup>
            </div>

        </div>
    </nav>
    <style>
        @media only screen and (max-width: 768px) {

            /* For mobile phones: */
            .org-header {
                display: none;
                /* margin-bottom: 70px; */
            }
            .allowance-ay{
                margin-bottom: 70px;
            }
        }
        @media only screen and (min-width: 769px) {

            /* lg: */
            .allowance-ay{
                margin-top: 120px;
            }

        }
    </style>
    <header class="org-header">
        <nav class="navbar navbar-expand-sm navbar-light mybg  justify-content-center">
            <ul class="navbar-nav font-weight-bolder">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="women.php">Women</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="men.php">Men</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="electronics.php">Electronics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="phones-tablet.php">Phones & Tablet</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="health-beauty.php">Health & Beauty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order.php" id="orderPageLink">My Order</a>
                </li>
            </ul>
        </nav>
    </header>
</div>
<div class="allowance-ay"></div>

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
            <form class="modal-body" method="post" action="account-processing.php">
                <input type="text" class="form-control mb-2" name="access" placeholder="username/email here" required id="userIdInp">
                <input type="password" class="form-control mb-2" name="password" placeholder="password" required id="passInp">
                <label>
                    <input type="checkbox" checked="checked" name="remember" id="remMe">
                    Remember me <a href="forgot-pass.html" style="text-decoration: none;" id="fgtPass"><small> Forgot Password</small></a><a style="text-decoration: none;" href="signup.html"><small> or sign up</small></a>
                </label>
                <input type="submit" class="btn mybg text-white mt-1 d-block" name="login" value="LOGIN" id="loginBtn">
            </form>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script>
    (function($) {
        $('#signOutBtn').on('click', () => {

            // console.log('signOut');
            $.get('cart-process.php', {
                signOut: true
            }, function(res) {
                console.log(res);
                location.href = 'user-account.php';

            })
        })
    })(jQuery)
</script>