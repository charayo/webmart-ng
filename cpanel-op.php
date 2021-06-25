<?php
include('db-querier.php');
$handle = new Access;
if (isset(($_POST['login']))) {
    if (!empty($_POST['access'] && $_POST['access_password'])) {
        $handle->login($_POST['access'], $_POST['access_password']);
        // header('location:dashboard.php');
        echo "Success";
    } else{
        echo "Incorrect login details";
        // header('location:index.php');
    }
}
if (isset($_POST['adminSignup'])) {
    if (!empty($_POST['username'] && $_POST['email'] && $_POST['password'])) {
        echo $_POST['username'];
        $handle->adminSignup($_POST['username'], $_POST['email'], $_POST['password']);
        header('location:dashboard.php');
    } else{
        echo "Please fill form properly";
        // header('location:index.php');
    }
}