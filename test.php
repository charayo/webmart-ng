<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <?php
    include('head-meta.php');
    ?>
</head>
<style>
    .a-row {
        display: grid;
        grid-template-columns: auto auto auto;
        /* gap: 10px; */
        row-gap: 30px;
    }

    .img-thumbnail {
        border: none;
    }
    .card {
            width: 90% !important;
        }
    /* mobile screen view */
    @media only screen and (max-width : 768px) {
        .a-row {
            grid-template-columns: auto;
        }

        .card {
            width: 100% !important;
        }
    }
</style>

<body>
    <div class="px-5 container">
        <div class="a-row container card-deck mx-auto p-5">
            <?php
            include('db-querier.php');
            $data = new Access;

            $products = $data->fetch();
            $count = 1;
            for ($i = 0; $i < 6; $i++) {
                echo '
                            <div class="card text-center shadow mx-auto">
                                <div class="w-50 border-none text-center mx-auto">
                                    <a>
                                        <img src="' . $products[$i]['product_image'] . '" class="mt-1 img-thumbnail" alt="' . $products[$i]['product_name'] . '">
                                    </a>
                                </div>    
                                <div class="card-body">
                                    <h5 class="card-title"> ' . $products[$i]['product_name'] . ' </h5>
                                    <del class="card-text text-mute">N' . $products[$i]['product_cost_price'] . '</del>
                                    <p class="card-text text-danger">N' . $products[$i]['product_sales_price'] . '</p>
                                </div>
                                <div class="card-footer bg-transparent border-light">
                                    <a class="btn btn-danger checkBtn">Check</a>
                                </div>
                            </div>
                        ';
                $count++;
            }
            ?>

        </div>
    </div>

</body>

</html>