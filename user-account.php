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

        #eye {
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
        .border-round{
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
            <div class="row m-5 mx-auto p-0 shadow-lg border-round">

                <div class="d-none d-md-block col-md-6 bg-side" style="display: flex; justify-content:center; flex-direction:column; align-items:center; border-radius: 25px 0px 0px 25px">
                    <a class="mytxt font-weight-bolder h2" style="text-decoration: none !important; z-index:2;" href="index.html">WEB-MART<i class="material-icons text-white ml-1" aria-hidden="true">shopping_cart</i></a>
                    <div class="overlay-bg" style="border-radius: 25px 0px 0px 25px">

                    </div>
                </div>
                <div class="col-md-6 m-0 p-0 w-100">
                    <div class="w-100 m-0 p-0" id="signUpForm">
                        <form class="container needs-validation  mx-auto bg-dkark pt-5" >
                           
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
                                <div id="passwrap"><input type="password" placeholder="Enter Password" name="psw" class="form-control" id="userPass" required class=""><i class="fa fa-eye-slash text-dark" id="eye"></i></div>

                                <a class="" href="login.html" style="margin-top: -13px; text-decoration: none;">already have an account? sign in</a>


                                <p>By creating an account you agree to our <a href="#" class="" style="text-decoration: none;">Terms &
                                        Privacy</a>.</p>

                                <div class="">
                                    <button type="button" class="btn btn-danger" id="formCancelBtn">CANCEL</button>
                                    <input type="button" value="SIGN UP" class="btn btn-primary" id="formSignupBtn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function($) {
                $('#eye').on('click', () => {
                    if ($('#userPass').attr('type') == 'password') {
                        $('#userPass').attr('type', 'text')
                        $('#eye').removeClass('fa-eye-slash')
                        $('#eye').addClass('fa-eye')
                    } else {
                        $('#userPass').attr('type', 'password')
                        $('#eye').removeClass('fa-eye')
                        $('#eye').addClass('fa-eye-slash')
                    }

                })
            })(jQuery)
        </script>
        <script src="main.js"></script>
    </body>

</html>