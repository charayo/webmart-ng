<?php
include("db-querier.php");
$key = new Access;
// $target_dir = "images/";
// $target_file =$target_dir.basename($_FILES["fileToUpload"]["name"]);
// $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (isset($_GET['id'])) {
    echo $_GET['id'];
    $key->deleteProduct($_GET['id']);
}
if (isset($_GET['prodtId'])) {
    $key->loadProdDet($_GET['prodtId']);
}

if (isset($_POST['addProduct'])) {
    $target_dir = "images/";
    $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File uploaded";
    } else {
        echo "Failed!";
    }
    if (!empty($_POST['prodtName']) && !empty($_POST['prodtPrice']) && !empty($_POST['salesPrice']) && !empty($_POST['status']) && !empty($_POST['category']) && !empty($_POST['prodtDescr'])) {
        $flashsale = 'false';
        $trending = 'false';
        if (isset($_POST['trending'])) {
            $trending = 'true';
        }
        if (isset($_POST['flashsale'])) {
            $flashsale = 'true';
        }
        // echo $_POST['prodtName']."<br>".$target_file."<br>"."trending = ".$trending."<br>"."flashsale = ".$flashsale;
        $key->addProduct($_POST['prodtName'], $_POST['prodtPrice'], $_POST['salesPrice'], $_POST['status'], $target_file, $_POST['category'], $_POST['prodtDescr'], $flashsale, $trending);
    }
    // echo $_POST['prodtName'],$_POST['prodtPrice'],$_POST['salesPrice'];
}

if (isset($_POST['updateProduct'])) {
    $target_dir = "images/";
    $target_file = $target_dir . time() . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File uploaded";
    } else {
        echo "Failed!";
    }
    $flashUp = 'false';
    $trendUp = 'false';
    if (isset($_POST['trendUp'])) {
        $trendUp = 'true';
    }
    if (isset($_POST['flashUp'])) {
        $flashUp = 'true';
    }
    $key->updateProducts($_POST['prodtId'], $_POST['prodtNameUp'], $_POST['prodtPriceUp'], $_POST['salesPriceUp'], $_POST['statusUp'], $_POST['categoryUp'], $_POST['prodtDescrUp'], $flashUp, $trendUp);
}






// if(isset($_GET['id'])){
//     echo $_GET['id'];
//     header("location:prdcache.php");
//     $deleted = $data->deleteProduct($_POST['idNum']);
//     if($deleted){
//         header("location: dashboard.php");
//     }else{
//         echo "product not found";
//     }
// }
// echo $_GET['id'];