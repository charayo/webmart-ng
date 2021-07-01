<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include("head-meta.php");
    ?>
</head>

<body>
    <style>
        #passwrap {
            position: relative;
        }

        .eye-tog {
            position: absolute;
            top: 10px;
            right: 20px;
            /* color: #333; */
        }

        .bg-side {
            background-image: url(./images/ecombg2.jpg);
            background-size: cover;
            background-position: center;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            border-radius: 25px 0px 0px 25px
        }

        .overlay-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1;
            height: auto;
        }
        
        .border-round {
            border-radius: 25px;
        }
    </style>
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

    <body class="">
        <div class="p-5">
            <div class="row m-5 mx-auto p-0 shadow-lg border-round sm-user-account">

                <div class="d-none d-md-flex col-md-6 bg-side">
                    <a class="mytkx text-white font-weight-bolder" style="font-size:50px; text-decoration: none !important; z-index:2;" href="index.php">WEB-MART<i class="material-icons text-white ml-1" aria-hidden="true">shopping_cart</i></a>
                    <div class="overlay-bg" style="border-radius: 25px 0px 0px 25px">

                    </div>
                </div>
                <div class="col-md-6 m-0 p-0 w-100">
                    <div class="w-100 m-0 p-0 d-none" id="signUpForm">
                        <form class="container needs-validation  mx-auto bg-dkark pt-5" method="post" action="account-processing.php">

                            <div class="alert alert-success alert-dismissible d-none" id="wrongPassAlert">
                                <a href="#" class="close" data-dismiss='alert' aria-label="close">&times;</a>
                                <strong class="text-danger">Incorrect Password</strong> <span class=""> it should contain at least: 8
                                    char, '@' or '_' or '-' an uppercase, lowercase and number.</span>
                            </div>
                            <div class="py-4">
                                <h1>Sign Up</h1>
                                <p>Please fill in this form to create an account.</p>
                                <hr>

                                <label for="email"><b>Email</b></label>
                                <input type="text" placeholder="Enter Email" name="email" class="form-control " id="userEmail" required>

                                <label for="username"><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="username" class="form-control" id="userId" required>

                                <label for="psw"><b>Password</b></label>
                                <div id="passwrap"><input type="password" placeholder="Enter Password" name="password" class="form-control userPass" required ><i class="fa fa-eye-slash text-dark eye-tog" ></i></div>

                                <a class=" loginLink" href="" style="text-decoration: none;" >already have an account? sign in</a>


                                <p>By creating an account you agree to our <a href="#" class="" style="text-decoration: none;">Terms &
                                        Privacy</a>.</p>

                                <div class="">
                                    <input type="submit" value="SIGN UP" name="signup" class="btn btn-primary signup-btn" id="formSignupBtn">
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- login switch -->
                    <div class="w-100 m-0 p-0" id="loginForm">
                        <form class="container needs-validation  mx-auto pt-5" method="post" action="account-processing.php">

                            <div class="alert alert-success alert-dismissible d-none" id="wrongPassAlert">
                                <a href="#" class="close" data-dismiss='alert' aria-label="close">&times;</a>
                                <strong class="text-danger">Incorrect Password</strong> <span class=""> it should contain at least: 8
                                    char, '@' or '_' or '-' an uppercase, lowercase and number.</span>
                            </div>
                            <div class="py-4">
                                <h1>Log In</h1>
                                <p>Please fill in your details to log in.</p>
                                <hr>

                                <label for="email"><b>Email/Username</b></label>
                                <input type="text" placeholder="Enter Email/Username" name="access" class="form-control " required>

                                <label for="psw"><b>Password</b></label>
                                <div id="passwrap"><input type="password" placeholder="Enter Password" name="password" class="form-control userPass" required ><i class="fa fa-eye-slash text-dark eye-tog"></i></div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><input type="checkbox" /> Remember me</span><strong class="text-danger"><a href="/user-account/recovery" style="text-decoration: none;">Reset Password?</a></strong>
                                </div>
                                <div class="text-center mt-3">
                                    <span class="mt-3">Don't have an account yet?</span>
                                    <strong><a href="" style="text-decoration: none;" class="signUpLink">Create Account</a></strong>
                                   
                                </div>

                                <div class="mt-2">
                                    <input type="submit" value="Log in" name="login" class="btn btn-primary login-btn" id="formSignInBtn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function($) {
                $('.eye-tog').on('click', () => {
                    if ($('.userPass').attr('type') == 'password') {
                        $('.userPass').attr('type', 'text')
                        $('.eye-tog').removeClass('fa-eye-slash')
                        $('.eye-tog').addClass('fa-eye')
                    } else {
                        $('.userPass').attr('type', 'password')
                        $('.eye-tog').removeClass('fa-eye')
                        $('.eye-tog').addClass('fa-eye-slash')
                    }

                })
                $('body').on('click', (e)=>{
                    
                    if(e.target.classList.contains('signUpLink')){
                        $('#signUpForm').removeClass('d-none');
                        $('#loginForm').addClass('d-none');
                        e.preventDefault();
                    } else if(e.target.classList.contains('loginLink')){
                        $('#signUpForm').addClass('d-none');
                        $('#loginForm').removeClass('d-none');
                        e.preventDefault();
                    }
                })
            })(jQuery)
        </script>
        <script src="main.js"></script>
    </body>

</html>