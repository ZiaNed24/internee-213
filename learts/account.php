<?php
session_start();
error_reporting(0);
require_once("model/crud.php");
require_once("model/helpermethod.php");
if (!isset($_SESSION["user"])) {
    redirect("login.php");
}
if (isset($_GET["status"]) && isset($_SESSION["cart"]) && count($_SESSION['cart']) > 0) {



    $total_amount = array_reduce($_SESSION['cart'], function ($prev, $curr) {
        return $prev + ($curr["price"] * $curr["quantity"]);
    });

    $invoice_no = generate_invoice_no("orders");
    $order_id = insert_row("orders", array("invoice_no" => $invoice_no, "user_id" => $_SESSION["id"], "no_items" => count($_SESSION['cart']), "total_amount" => $total_amount, "status" => "pending"));

    if ($order_id) {

        $order_data = "";

        foreach ($_SESSION['cart'] as  $insert_value) {

            $array = array("price" => $insert_value["price"], "quantity" => $insert_value["quantity"], "total_amount" => $insert_value["price"] * $insert_value["quantity"], "order_id" => $order_id, "Courier_company" => "TCS");

            if ($insert_value["type"] == 0) {
                $array["m_id"] = $insert_value["id"];
            } else if ($insert_value["type"] == 1) {
                $array["j_id"] = $insert_value["id"];
            }

            $order_data .= create_insert_query("order_details", $array) . ";";
        }



        insert_mul_row($order_data);
        unset($_SESSION["cart"]);
        //redirect("home.php");
    }
} else {
    $error_msg = "empty cart";
}
?>

<?php include("headerlinks2.php") ?>

<body>
    <?php include("header.php") ?>

    <div class="page-title-section section" data-bg-image="assets/images/bg/page-title-1.webp">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">My Account</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                         
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- My Account Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12 learts-mb-30">
                    <div class="myaccount-tab-list nav">
                        <a href="#dashboad" class="active" data-bs-toggle="tab">Dashboard <i class="far fa-home"></i></a>
                        <a href="#orders" data-bs-toggle="tab">Orders <i class="far fa-file-alt"></i></a>
                        <a href="#address" data-bs-toggle="tab">address <i class="far fa-map-marker-alt"></i></a>
                        <a href="logout.php">Logout <i class="far fa-sign-out-alt"></i></a>
                    </div>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12 learts-mb-30">
                    <div class="tab-content">

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad">
                                <p>Hello <strong><?php echo $_SESSION["user"] ?></strong> (not <strong><?php echo $_SESSION["user"] ?></strong>? <a href="logout.php">Log out</a>)</p>
                                <p>From your account dashboard you can view your <span>recent orders</span></p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="orders">
                            <div class="myaccount-content order">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $user=  $_SESSION["id"];
                                        $query = "select orders.*,registration_tb.u_f_name from orders inner join registration_tb on orders.user_id = registration_tb.id where orders.user_id='$user'";

                                        $result = query_exec($query);
                                        while ($row = mysqli_fetch_array($result)) {

                                        ?>
                                            <tbody>


                                                <tr>
                                                    <td><?php echo $row["invoice_no"] ?></td>
                                                    <td><?php echo $row["order_date"] ?></td>
                                                    <?php
                                                    if ($row["status"] == "dispatch") {
                                                    ?>
                                                        <td><span class="badge rounded-pill bg-danger"><?php echo $row["status"] ?></span>
                                                        </td>
                                                    <?php
                                                    } else if ($row["status"] == "Receiving") {
                                                    ?>
                                                        <td><span class="badge rounded-pill bg-success"><?php echo $row["status"] ?></span>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td><span class="badge rounded-pill bg-warning"><?php echo $row["status"] ?></span>
                                                        </td>


                                                    <?php
                                                    }
                                                    ?>

                                                    <td>Rs: <?php echo $row["total_amount"] ?></td>
                                                </tr>

                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="download">
                            <div class="myaccount-content download">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Expire</th>
                                                <th>Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Haven - Free Real Estate PSD Template</td>
                                                <td>Aug 22, 2018</td>
                                                <td>Yes</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                            <tr>
                                                <td>HasTech - Profolio Business Template</td>
                                                <td>Sep 12, 2018</td>
                                                <td>Never</td>
                                                <td><a href="#"><i class="far fa-arrow-to-bottom mr-1"></i> Download File</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="address">
                            <div class="myaccount-content address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row learts-mb-n30">
                                    <div class="col-md-6 col-12 learts-mb-30">
                                        <h4 class="title">Billing Address <a href="#" class="edit-link">edit</a></h4>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                    </div>
                                    <div class="col-md-6 col-12 learts-mb-30">
                                        <h4 class="title">Shipping Address <a href="#" class="edit-link">edit</a></h4>
                                        <address>
                                            <p><strong>Alex Tuntuni</strong></p>
                                            <p>1355 Market St, Suite 900 <br>
                                                San Francisco, CA 94103</p>
                                            <p>Mobile: (123) 456-7890</p>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                    <form action="#">
                                        <div class="row learts-mb-n30">
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="first-name">First Name <abbr class="required">*</abbr></label>
                                                    <input type="text" id="first-name">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label for="last-name">Last Name <abbr class="required">*</abbr></label>
                                                    <input type="text" id="last-name">
                                                </div>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="display-name">Display Name <abbr class="required">*</abbr></label>
                                                <input type="text" id="display-name" value="didiv91396">
                                                <p>This will be how your name will be displayed in the account section and in reviews</p>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <label for="email">Email Addres <abbr class="required">*</abbr></label>
                                                <input type="email" id="email" value="didiv91396@ismailgul.net">
                                            </div>
                                            <div class="col-12 learts-mb-30 learts-mt-30">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="row learts-mb-n30">
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="current-pwd">Current password (leave blank to leave unchanged)</label>
                                                            <input type="password" id="current-pwd">
                                                        </div>
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="new-pwd">New password (leave blank to leave unchanged)</label>
                                                            <input type="password" id="new-pwd">
                                                        </div>
                                                        <div class="col-12 learts-mb-30">
                                                            <label for="confirm-pwd">Confirm new password</label>
                                                            <input type="password" id="confirm-pwd">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <button class="btn btn-dark btn-outline-hover-dark">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
    <!-- My Account Section End -->

    <div class="footer2-section section section-padding">
        <div class="container">
            <div class="row learts-mb-n40">

                <div class="col-lg-6 learts-mb-40">
                    <div class="widget-about">
                        <img src="assets/images/logo/logo-2.webp" alt="">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod itaque recusandae commodi mollitia facere iure nisi, laudantium quis quas perferendis a minus dolores.</p>
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


<!-- Mirrored from template.hasthemes.com/learts/learts/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:21:10 GMT -->

</html>