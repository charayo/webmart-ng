<?php
include('db-querier.php');
$handle = new Access;
if (isset(($_POST['login']))) {
    if (!empty($_POST['access'] && $_POST['password'])) {
        $handle->login($_POST['access'], $_POST['password']);
    } else{
        echo "Incorrect login details";
    }
}
if (isset(($_POST['signup']))) {
    if (!empty($_POST['username'] && $_POST['email'] && $_POST['password'])) {
        echo $_POST['username'], $_POST['email'], $_POST['password'];
        $handle->signup($_POST['username'], $_POST['email'], $_POST['password']);
        
    } else{
        echo "Please fill form properly";
        // header('location:index.php');
    }
}
