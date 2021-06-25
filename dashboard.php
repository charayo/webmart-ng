<?php
include('db-querier.php');
// $obj=new
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <?php
    include("head-meta.php");
    ?>

    <style>
        .pointer {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- my login modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content card shadow">

                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close modal-close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="" action="/webmart-ng/products-files.php" method="post">
                        <div class="form-group">
                            <input type="hidden" id="prodId" name="prodtId" style="border: none;">
                        </div>
                        <div class="form-group">
                            <div class="input-prepend">
                                <label for="productName">Product Name:</label>
                            </div>

                            <input type="text" class="form-control" name="prodtNameUp" placeholder="Product Name" id="editProdName">
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Price:</label>
                            <input type="text" class="form-control" name="prodtPriceUp" placeholder="Product Price" id="editProdPrice">
                        </div>
                        <div class="form-group">
                            <label for="productName">Discount Price:</label>
                            <input type="text" class="form-control" name="salesPriceUp" placeholder="Discounted Price" id="editSalesPrice">
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Status:</label>
                            <input type="text" class="form-control" name="statusUp" placeholder="Status" id="editProdStatus">
                        </div>
                        <div class="form-group">
                            <select name="categoryUp" id="editCategory" class="form-control bg-secondary text-white w-25">
                                <option value="general">Select Category</option>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="phones/tablet">Phones-tablet</option>
                                <option value="kids">Kids</option>
                                <option value="electronics">Electronics</option>
                            </select>
                            <div class="form-row">
                                <div class="col form-group">
                                    <label for="trending" class="h6"><input class="" name="trendUp" type="checkbox" id="editTrend"> Trending</label>

                                </div>
                                <div class="col form-group">
                                    <label for="flashsale" class="h6"><input class="" name="flashUp" type="checkbox" id="editFlash"> Flashsale</label>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Description:</label>
                            <input type="text" class="form-control" name="prodtDescrUp" placeholder="Product Description" id="editProdDesc">
                        </div>
                        <div class="form-group">
                            <label for="productName">Product Image:</label>
                            <input type="file" class="" name="prodtImgUp" placeholder="Product Image">
                        </div>
                        <button type="submit" name="updateProduct" class="btn btn-primary">Update Product</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger modal-close" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <form class="" action="/webmart-ng/products-files.php" method="post" enctype="multipart/form-data">

        <div class="container mt-3 p-5 card">
            <div class="form-group">
                <input type="text" class="form-control" name="prodtName" placeholder="Product Name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="prodtPrice" placeholder="Product Price">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="salesPrice" placeholder="Discounted Price">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="status" placeholder="Status">
            </div>
            <div class="form-group">
                <select name="category" id="cartegory" class="form-control bg-secondary text-white w-25">
                    <option value="general">Select Category</option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="phones/tablet">Phones-tablet</option>
                    <option value="kids">Kids</option>
                    <option value="electronics">Electronics</option>
                </select>
            </div>
            <div class="form-row">
                <div class="col form-group">
                    <label for="trending" class="h6"><input class="" name="trending" type="checkbox" id="editTrending"> Trending</label>

                </div>
                <div class="col form-group">
                    <label for="flashsale" class="h6"><input class="" name="flashsale" type="checkbox" id="editFlashsale"> Flashsale</label>

                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="prodtDescr" placeholder="Product Description">
            </div>
            <div class="form-group">
                <!-- <input type="file" class="" name="prodtImg" placeholder="Product Image" required> -->
                <input type="file" name="fileToUpload" id="fileToUpload" required>
            </div>
            <button type="submit" name="addProduct" class="btn btn-primary">Add Product</button>
        </div>

    </form>
    <div class="">
        <!-- <input type="button" value="Show"> -->
        <div class=" container mt-3">
            <table class="table table-striped table-dark table-responsive">
                <thead class="thead-light">
                    <tr class="text-left">
                        <th>S/N</th>
                        <th>Product Name</th>
                        <th>Product Cost Price</th>
                        <th>Product Sales Price</th>
                        <th>Product Description</th>
                        <th>Availability</th>
                        <th>Category</th>
                        <th>Flashsale</th>
                        <th>Trending</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody" class="text-left">
                    <?php
                    $data = new Access;



                    // if ($data->fetch()) {

                    // }
                    $products = $data->fetch();
                    $count = 1;
                    for ($i = 0; $i < count($products); $i++) {
                        echo "<tr><td>" . $count . "</td><td hidden> " . $products[$i]['id'] . "</td>
                        <td class='prdtName'>" . $products[$i]['product_name'] . "</td>
                        <td>" . $products[$i]['product_cost_price'] . "</td>
                        <td>" . $products[$i]['product_sales_price'] . "</td>
                        <td>" . $products[$i]['product_description'] . "</td>
                        <td>" . $products[$i]['product_status'] . "</td>
                        <td>" . $products[$i]['product_category'] . "</td>
                        <td>" . $products[$i]['flash_sales'] . "</td>
                        <td>" . $products[$i]['trending'] . "</td>
                        <td class='text-center pointer'><span class = 'fas fa-pen text-primary editBtn'></span></td>
                        <td class='text-center pointer'><button class='btn' type = 'button' name ='delete' ><a href=\"products-files.php\?id={$products[$i]['id']}\"  class = 'fas fa-trash text-danger delBtn'></a></button></td></tr>";
                        $count++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>  
    <script>
        (function($) {
            $('body').on('click', (e) => {
                if (e.target.classList.contains('editBtn')) {
                    $('#prodId').val($(e.target).parent().prev().prev().prev().prev().prev().prev().prev().prev().prev().html());
                    $('#editProdName').val($(e.target).parent().prev().prev().prev().prev().prev().prev().prev().prev().html());
                    $('#editProdPrice').val($(e.target).parent().prev().prev().prev().prev().prev().prev().prev().html());
                    $('#editSalesPrice').val($(e.target).parent().prev().prev().prev().prev().prev().prev().html());
                    $('#editProdDesc').val($(e.target).parent().prev().prev().prev().prev().prev().html());
                    $('#editProdStatus').val($(e.target).parent().prev().prev().prev().prev().html());
                    $('#editCategory').val($(e.target).parent().prev().prev().prev().html());
                    let flashsaleUp = $(e.target).parent().prev().prev().html();
                    let trendingUp = $(e.target).parent().prev().html();
                    if(flashsaleUp=='true'){
                        $('#editFlash').attr('checked', true);
                    }else if(trendingUp=='true'){
                        $('#editTrend').attr('checked', true);
                    }
                    $('#myModal').modal('show');
                }
            });
            // $('.delBtn').on('click', function() {
            //     console.log('delete');
            //     $.post('./products-files.php', {
            //         id: ($(this).attr('id'))
            //     }, function(res) {
            //         console.log(res);
            //         // window.location.href = "products-files.php";    
            //     })
            // })
        })(jQuery)
    </script>
</body>

</html>