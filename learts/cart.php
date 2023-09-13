<?php
session_start();
error_reporting(0);
require_once("model/crud.php");
require_once("model/helpermethod.php");
include("headerlinks2.php");
//session_destroy();
$sub_total = 0;
$error_msg2 = "";
$error_msg = "";
$discount = 0;
$id = 0;
if (!isset($_SESSION["user"])) {
    redirect("login.php");
}
if (!isset($_SESSION["cart"])) {
    $error_msg = "empty cart";
}
if (isset($_GET["index_value"])) {
    $_index_val = $_GET["index_value"];
    unset($_SESSION['cart'][$_index_val - 1]);
    sort($_SESSION['cart']);
    redirect("cart.php");
}


if (isset($_GET["id"])) {
    $i = 0;
    $flag_found = true;
    $var_prod_id = $_GET["id"];
    $results = query_exec("select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_products.id=$var_prod_id");

    // $results = fetch_row("product", array("id" => $var_prod_id));
    $single_row = mysqli_fetch_assoc($results);

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1) {
        $_SESSION["cart"] = array(
            array("id" => $var_prod_id, "product_name" => $single_row["product_name"], "quantity" => "1", "images" =>  "../learts/products-images/" . $single_row['images'], "price" => $single_row["price"], "discount" => $single_row["discount"], "status" => $single_row["status"], "type" => 0),
        );
      
    }
     else {

        foreach ($_SESSION['cart'] as $value) {

            $i++;

            if ($value["id"] == $var_prod_id) {

                array_splice($_SESSION['cart'], $i - 1, 1, array(array("id" => $var_prod_id, "product_name" => $single_row["product_name"], "quantity" => $value["quantity"] + 1, "images" => "../learts/products-images/" . $single_row["images"], "price" => $single_row["price"], "discount" => $single_row["discount"], "status" => $single_row["status"], "type" => 0)));
                $flag_found = false;
                break;
            }
        }

        if ($flag_found == true) {
            array_push($_SESSION["cart"], array("id" => $var_prod_id, "product_name" => $single_row["product_name"], "quantity" => "1", "images" => "../learts/products-images/" . $single_row["images"], "price" => $single_row["price"], "discount" => $single_row["discount"], "status" => $single_row["status"], "type" => 0));
        }
    }
}
//makeup id
if (isset($_GET["j_id"])) {
    $i = 0;
    $flag_found = true;
    $var_prod_id = $_GET["j_id"];
    $results = query_exec("select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id  where jewelery_products.id=$var_prod_id");

    $single_row = mysqli_fetch_assoc($results);

    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) < 1) {
        $_SESSION["cart"] = array(
            array("id" => $var_prod_id, "product_name" => $single_row["name"], "quantity" => "1", "images" => "../learts/jewellery images/" . $single_row["jew_images"], "price" => $single_row["jew_price"], "discount" => $single_row["jew_discount"], "status" => $single_row["jew_status"], "type" => 1),
        );
    } else {
        foreach ($_SESSION['cart'] as $value) {

            $i++;

            if ($value["id"] == $var_prod_id) {

                array_splice($_SESSION['cart'], $i - 1, 1, array(array("id" => $var_prod_id, "product_name" => $single_row["name"], "quantity" => $value["quantity"] + 1, "images" => "../learts/jewellery images/" . $single_row["jew_images"], "price" => $single_row["jew_price"], "discount" => $single_row["jew_discount"], "status" => $single_row["jew_status"], "type" => 1)));
                $flag_found = false;
                break;
            }
        }

        if ($flag_found == true) {
            array_push($_SESSION["cart"], array("id" => $var_prod_id, "product_name" => $single_row["name"], "quantity" => "1", "images" => "../learts/jewellery images/" . $single_row["jew_images"], "price" => $single_row["jew_price"], "discount" => $single_row["jew_discount"], "status" => $single_row["jew_status"], "type" => 1));
        }
    }
}
//jewelery_id
?>





<body>
    <?php include("header.php") ?>
    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Cart</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section Start -->
    <div class="section section-padding">
        <div class="container">
            <form class="cart-form" action="#">
                <table class="cart-wishlist-table table">
                    <thead>
                        <tr>
                            <th class="name" colspan="2">Product</th>
                            <th class="price">Price</th>
                            <th class="Discount">Discount</th>
                            <th class="quantity">Quantity</th>
                            <th class="subtotal">Total</th>
                            <th class="remove">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php



                        if (empty($_SESSION["cart"])) {
                        ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">You have no products added in your
                                Shopping Cart</td>
                        </tr>
                        <?php } else { ?>
                        <?php
                            $_index_val = 1;
                            $done = 0;
                            //$session_cart = $_SESSION["cart"];
                            foreach ($_SESSION["cart"] as $value_data) {
                                $done = $value_data["price"] - ($value_data["price"] * $value_data["discount"]);
                                $total =    $value_data["price"] * $value_data["quantity"];
                                // $total =    $value_data["jew_price"] * $value_data["quantity"];
                                $sub_total = $sub_total + $total;
                            ?>

                        <tr>
                            <td class="thumbnail"><a href="product-details.html"> <img
                                        src="<?php echo $value_data['images'] ?>" alt="Product image">
                                </a></td>
                            <td class="name"> <a
                                    href="product-details.html"><?php echo $value_data["product_name"] ?></a></td>
                            <?php
                                    if ($value_data["status"] == "sale") { ?>

                            <td>Rs: <span class='total'><?php echo $done ?></span></td>

                            <td>- <span><?php echo $value_data["discount"] * 100 ?>%</span></td>



                            <td class="quantity">
                                <div class="product-quantity">

                                    <span class="minus"><i class="ti-minus"></i></span>
                                    <input type="text" data-id=<?= $value_data["id"] ?> class='qty-value' placeholder=''
                                        value="<?= $value_data['quantity'] ?>">
                                    <span class="plus"><i class="ti-plus"></i></span>
                                </div>
                            </td>
                            <td>Rs: <span class="result"><?php echo $done; ?></span></>
                                <form method="get" action="cart.php">
                                    <input type="hidden" name="index_value" value="<?php echo $_index_val ?>">
                            <td class="remove"><button class="btn" type="submit">×</button></td>
            </form>
            <?php } else{ ?>

            <td>Rs: <span class='total'><?php echo $value_data["price"] ?></span></td>
            <td>- <span><?php echo "0" ?>%</span></td>

            <td class="quantity">
                <div class="product-quantity">

                    <span class="minus"><i class="ti-minus"></i></span>
                    <input type="text" data-id=<?= $value_data["id"] ?> class='qty-value' placeholder=''
                        value="<?= $value_data['quantity'] ?>">
                    <span class="plus"><i class="ti-plus"></i></span>
                </div>
            </td>
            <td>Rs: <span class="result"><?php echo $total; ?></span></>
                <form method="get" action="cart.php">
                    <input type="hidden" name="index_value" value="<?php echo $_index_val ?>">
            <td class="remove"><button class="btn" type="submit">×</button></td>
            </form>

            <?php } ?>
            </tr>

            <?php
                            }
                        }
?>

            </tbody>
            </table>
            <div class="row justify-content-between mb-n3">
                <div class="col-auto mb-3">
                    <div class="cart-coupon">
                        <input type="text" placeholder="Enter your coupon code">
                        <button class="btn"><i class="fal fa-gift"></i></button>
                    </div>
                </div>
                <div class="col-auto">
                    <a class="btn btn-light btn-hover-dark mr-3 mb-3" href="product.php">Continue Shopping</a>
                    <!-- <button class="btn btn-dark btn-outline-hover-dark mb-3">Update Cart</button> -->
                </div>
            </div>
            </form>
            <div class="cart-totals mt-5">
                <h2 class="title">Cart totals</h2>
                <table>
                    <tbody>
                        <tr class="subtotal">
                            <th>Subtotal</th>
                            <td>Rs: <span id="subtotal" class="amount"><?php echo $sub_total; ?></span>/=</td>
                        </tr>
                        <tr class="total">
                            <th>Total</th>
                            <td><strong>Rs: <span id="total" class="amount"><?php echo $sub_total; ?></span>/=</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <a href="account.php?status=checkout" class="btn btn-dark btn-outline-hover-dark">Proceed to checkout</a>
            </div>

        </div>

    </div>
    <!-- Shopping Cart Section End -->

    <div class="footer2-section section section-padding">
        <div class="container">
            <div class="row learts-mb-n40">

                <div class="col-lg-6 learts-mb-40">
                    <div class="widget-about">
                        <img src="assets/images/logo/logo-2.webp" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod itaque recusandae commodi
                            mollitia facere iure nisi, laudantium quis quas perferendis a minus dolores.</p>
                    </div>
                </div>

                <div class="col-lg-4 learts-mb-40">
                    <div class="row">
                        <div class="col">
                            <ul class="widget-list">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Store location</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Orders</a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul class="widget-list">
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">Support Policy</a></li>
                                <li><a href="#">Size Guide</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 learts-mb-40">
                    <ul class="widget-list">
                        <li> <i class="fab fa-twitter"></i> <a href="https://www.twitter.com/">Twitter</a></li>
                        <li> <i class="fab fa-facebook-f"></i> <a href="https://www.facebook.com/">Facebook</a></li>
                        <li> <i class="fab fa-instagram"></i> <a href="https://www.instagram.com/">Instagram</a></li>
                        <li> <i class="fab fa-youtube"></i> <a href="https://www.youtube.com/">Youtube</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer2-copyright section">
        <div class="container">
            <p class="copyright text-center">&copy; 2020 learts. All Rights Reserved</p>
        </div>
    </div>


    <head>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js">
        </script>
        <script>
        $(".minus").click(function() {
            var quantity = $(this).parent().find(".qty-value");
            $(quantity).val(parseInt($(quantity).val()) - 1);
            var id = $(quantity).data("id");
            changeProdQauntity(id, parseInt($(quantity).val()));
        });

        $(".plus").click(function() {
            var quantity = $(this).parent().find(".qty-value");
            $(quantity).val(parseInt($(quantity).val()) + 1);
            var id = $(quantity).data("id");
            changeProdQauntity(id, parseInt($(quantity).val()));
        });

        $(".qty-value").keyup(function() {
            var id = $(this).data("id");
            changeProdQauntity(id, parseInt($(this).val()));
        });

        function onQuantityChange(event) {
            var row = $(event).closest("tr");
            var price = row.find(".total")[0];
            var result = row.find(".result")[0];

            var quantityValue = parseInt($(event).val());
            if (!isNaN(quantityValue)) {
                var priceValue = parseInt(price.innerHTML);
                result.innerHTML = priceValue * quantityValue;
                calculateCartTotal();

            }
        }

        function calculateCartTotal() {
            var total = 0;
            $(".cart-wishlist-table tbody tr").each(function(i, e) {
                var result = $(e).find(".result");
                total += parseInt($(result).html());
            });
            $("#total").html(total);
            $("#subtotal").html(total);
        }


        function changeProdQauntity(id, quantity) {
            $.ajax({
                url: "changequantity.php",
                data: {
                    quantity: quantity,
                    id: id
                },
                success: function(a) {
                    var qty = $(".cart-wishlist-table tbody tr .qty-value[data-id='" + id + "']");
                    onQuantityChange(qty);
                },
                error: function(v) {
                    console.log(v);
                }
            });
        }
        </script>
    </head>










    <!-- JS
============================================ -->

    <!-- Vendors JS -->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/plugins/select2.min.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/swiper.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/mo.min.js"></script>
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="assets/js/plugins/jquery.matchHeight-min.js"></script>
    <script src="assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="assets/js/plugins/photoswipe.min.js"></script>
    <script src="assets/js/plugins/photoswipe-ui-default.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/ResizeSensor.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.min.js"></script>
    <script src="assets/js/plugins/product360.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.scrollUp.min.js"></script>
    <script src="assets/js/plugins/scrollax.min.js"></script>
    <script src="assets/js/plugins/instafeed.min.js"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script> -->

    <!-- Main Activation JS -->
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from template.hasthemes.com/learts/learts/shopping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:21:42 GMT -->

</html>