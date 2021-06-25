<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webmart-ng</title>
    <?php
    include("head-meta.php");
    ?>
</head>

<body>
    <?php
    include("topbar.php");
    ?>
    <?php
    include("card-style.php");
    ?>
    <!-- Men Section -->
    <div class="mt-2" id="flash-sales">
        <div class="text-center">
            <h2 class="text-danger">Men</h2>
        </div>
        <div class="px-5 container">
            <div class="a-row container card-deck mx-auto p-5">
                <?php
                include('db-querier.php');
                $data = new Access;

                $products = $data->fetch();
                $count = 0;
                for ($i = 0; $i < count($products); $i++) {
                    if ($products[$i]['product_category'] == 'men') {
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
                                    <a href="product-page.php?id=' . $products[$i]["id"] . '" class="btn btn-danger checkBtn" id=" ' . $products[$i]['id'] . '">Check</a>
                                    
                                </div>
                            </div>
                        ';
                        $count++;
                    }
                }
                ?>

            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>