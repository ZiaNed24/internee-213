<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Script -->

    <?php include("headerlinks2.php") ?>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js">
    </script>
    <!-- CSS -->


</head>
<script>
    $(document).ready(function(e) {
        $("#search").keydown(function(e) {

            if (e.keyCode == 13) {

                var search = $("#search").val();

                $.ajax({
                    url: "loadproducts.php",

                    data: {
                        name: search,

                    },
                    success: function(ajaxresult) {
                        $("#searching").html(ajaxresult);
                    }
                });


            }


        });
    });
    $(document).ready(function() {
        // Initializing slider
        $("#slider").slider({
            range: true,
            min: 0,
            max: 10000,
            values: [0, 10000],
            slide: function(event, ui) {

                // Get values
                var min = ui.values[0];
                var max = ui.values[1];
                $('#range').text(min + ' - ' + max);

                // AJAX request
                $.ajax({
                    url: 'rangeslider.php',
                    type: 'post',
                    data: {
                        min: min,
                        max: max
                    },
                    success: function(response) {

                        // Updating table data

                        $('#products').html(response);
                    }
                });
            }
        });
    });
</script>
<style>
    #item {
        background-repeat: no-repeat;
        background-size: cover;


        background-image: url('../learts/products-images/category.jpg');
    }
</style>

<body>
    <?php include("header.php");


    ?>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" id="item">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>




    <!-- Page Title/Header End -->

    <!-- Shop Products Section Start -->
    <div class="section section-padding pt-0">

        <!-- Shop Toolbar Start -->
        <div class="shop-toolbar section-fluid border-bottom">
            <div class="container">
                <div class="row learts-mb-n20">

                    <!-- Isotop Filter Start -->

                    <!-- Isotop Filter End -->

                    <div class="col-md-auto col-12 learts-mb-20">
                        <ul class="shop-toolbar-controls">


                            <li>
                                <div class="product-column-toggle d-none d-xl-flex">
                                    <button class="toggle hintT-top" data-hint="5 Column" data-column="5"><i class="ti-layout-grid4-alt"></i></button>
                                    <button class="toggle active hintT-top" data-hint="4 Column" data-column="4"><i class="ti-layout-grid3-alt"></i></button>
                                    <button class="toggle hintT-top" data-hint="3 Column" data-column="3"><i class="ti-layout-grid2-alt"></i></button>
                                </div>
                            </li>


                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <!-- Shop Toolbar End -->

        <!-- Product Filter Start -->

        <!-- Product Filter End -->

        <div class="section section-fluid learts-mt-70">
            <div class="container">
                <div class="row learts-mb-n50">

                    <div class="col-lg-9 col-12 learts-mb-50 order-lg-2">
                        <!-- Products Start -->

                        <div id="searching" class="products isotope-grid row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1" id="searching">

                            <div class="grid-sizer col-1"></div>


                            <?php
                            $num_rec_per_page = 16;
                            $done = 0;
                            $result = "";

                            if (isset($_GET["page"])) {
                                $page  = $_GET["page"];
                            } else {
                                $page = 1;
                            }
                            $start_from = ($page - 1) * $num_rec_per_page;
     
                            if (isset($_GET["category"])) {
                                $category_name = $_GET["category"];
                                $result = query_exec("select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_category.category_type = '$category_name' order by makeup_products.datetime DESC");
                            } elseif (isset($_GET["drpdwn"])) {
                                $drpdwn = $_GET["drpdwn"];
                                $result = query_exec("select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_category.category_type = '$drpdwn' order by makeup_products.datetime DESC");
                            } else {
                                $result = query_exec("select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id order by makeup_products.datetime DESC LIMIT $start_from, $num_rec_per_page ");
                            }
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>




                                <div class="grid-item col category">



                                    <div class="product">
                                        <div class="product-thumb">
                                            <a href="product-details.html" class="image">
                                                <?php
                                                if ($rows["status"] == "sale") {
                                                ?>
                                                    <span class="product-badges">
                                                        <span class="onsale"><?php echo ($rows["discount"] * 100) . "%" ?></span>
                                                    </span>
                                                <?php } else if ($rows["status"] == "out") { ?>
                                                    <span class="product-badges">
                                                        <span class="onsale" style="color:white;background-color:#c61932;">Out</span>
                                                    </span>

                                                <?php  } else { ?>
                                                    <span class="product-badges">
                                                        <span><?php echo $rows['status'] ?></span>
                                                    </span>


                                                <?php } ?>

                                                <img src="../learts/products-images/<?php echo $rows["images"]  ?>" height="300px" width="300px" alt="Product Image">
                                            </a>
                                            <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                        </div>

                                        <h6 class="title"><a href="product-details.html" style="letter-spacing:1px;"><?php echo $rows["product_name"] ?></a></h6>
                                        <div class="product-info">
                                            <?php
                                            if ($rows["status"] == "sale") {
                                                $done = $rows["price"] - ($rows["price"] * $rows["discount"])

                                            ?>
                                                <span class="price">
                                                    <span class="old"> Rs:<?php echo $rows["price"] ?>/=</span>
                                                    <span class="new" style="letter-spacing:1px;color:red">Rs:
                                                        <?php echo round($done) ?> /=</span>
                                                </span>
                                            <?php } else if ($rows["status"] == "out") {
                                                $done = $rows["price"] - ($rows["price"] * $rows["discount"])
                                            ?>
                                                <span class="price">
                                                    <span class="old" style="letter-spacing:1px;color:black">Rs:
                                                        <?php echo $rows["price"] ?>/=</span>
                                                    <span class="new" style="color: red;">Rs:
                                                        <?php echo round($done) ?>/=</span></span>
                                                </br>

                                                </span>

                                            <?php  } else { ?>
                                                <span class="price">

                                                    <span style="letter-spacing:1px ;">Rs: <?php echo $rows['price'] ?>/=</span>
                                                </span>


                                            <?php } ?>



                                            <?php
                                            if ($rows["status"] == "sale") {
                                            ?>
                                                <div class="product-buttons">
                                                    <a href="#quickViewModal" data-bs-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                    <a href="cart.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                                    <a href="single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>
                                                </div>
                                            <?php } else if ($rows["status"] == "out") { ?>
                                                <div class="product-buttons">
                                                    <a class="product-button hintT-top" data-hint="Not Accessible"><i class="fal fa-frown"></i></a>
                                                    <a href="single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>

                                                </div>

                                            <?php  } else { ?>
                                                <div class="product-buttons">
                                                    <a href="#quickViewModal" data-bs-toggle="modal" class="product-button hintT-top" data-hint="Quick View"><i class="fal fa-search"></i></a>
                                                    <a href="cart.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                                    <a href="single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>
                                                </div>


                                            <?php } ?>














                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                        </div>

                        <?php
                        $sql = "select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id";
                        $conn = mysqli_connect('localhost', 'root', '', 'e_project');

                        $rs_result = mysqli_query($conn, $sql); //run the query
                        $total_records = mysqli_num_rows($rs_result);  //06
                        $total_pages = ceil($total_records / $num_rec_per_page);

                        ?>

                        <div class="text-center learts-mt-70">
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='product.php?page=" . $i . "' class='btn btn-sm btn-primary' >" . $i . "</a> ";
                            };
                            ?>
                        </div>

                    </div>

                    <div class="col-lg-3 col-12 learts-mb-10 order-lg-1">

                        <!-- Search Start -->
                        <div class="single-widget learts-mb-40">
                            <div class="widget-search">

                                <input type="text" name="search" id="search" placeholder="Search products...." autocomplete="off" />



                            </div>
                        </div>
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Filters by price</h3>
                            <div class="widget-price-range">
                                <div id="slider"></div><br />
                                Range: <span id='range'></span>
                            </div>
                        </div>
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Products</h3>
                            <ul class="widget-products" id="products">

                            </ul>
                        </div>

                        <!-- Search End -->


                        <!-- Categories Start -->
                        <div class="single-widget learts-mb-40">
                            <h3 class="widget-title product-filter-widget-title">Product categories</h3>
                            <ul class="widget-list">
                                <li><a href="#">Gift ideas</a> <span class="count">16</span></li>
                                <li><a href="#">Home Decor</a> <span class="count">16</span></li>
                                <li><a href="#">Kids &amp; Babies</a> <span class="count">6</span></li>
                                <li><a href="#">Kitchen</a> <span class="count">15</span></li>
                                <li><a href="#">Kniting &amp; Sewing</a> <span class="count">4</span></li>
                                <li><a href="#">Pots</a> <span class="count">4</span></li>
                                <li><a href="#">Toys</a> <span class="count">6</span></li>
                            </ul>
                        </div>
                        <!-- Categories End -->

                        <!-- Price Range Start -->

                        <!-- Price Range End -->

                        <!-- List Product Widget Start -->

                        <!-- List Product Widget End -->


                        <!-- Tags End -->

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- Shop Products Section End -->
    <?php include("footer.php") ?>
    <?php include("footrlinks2.php") ?>



    <script>
        // function myFunction() {
        //   var x = document.getElementById("myDIV");
        //   if (x.style.display === "none") {
        //     x.style.display = "block";
        //   } else {
        //     x.style.display = "none";
        //   }
        // }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</body>


</html>