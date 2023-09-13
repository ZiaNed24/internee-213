<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include("headerlinks2.php") ?>

</head>
<style>
    #item {
        background-repeat: no-repeat;
        background-size: cover;


        background-image: url('../learts/jewellery images/ring.jpg');
    }
</style>

<body>

    <?php include("header.php") ?>


    <!-- Page Title/Header Start -->
    <div class="page-title-section section" id="item">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="jewelery_home.php">Home</a></li>
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
        <div class="shop-toolbar border-bottom">
            <div class="container">
                <div class="row learts-mb-n20">

                    <!-- Isotop Filter Start -->
                    <div class="col-md col-12 align-self-center learts-mb-20">
                        <div class="isotope-filter shop-product-filter" data-target="#shop-products">
                            <button class="active" data-filter="*">all</button>
                            <button data-filter=".featured">Hot Products</button>
                            <button data-filter=".new">New Products</button>
                        </div>
                    </div>
                    <!-- Isotop Filter End -->

                    <div class="col-md-auto col-12 learts-mb-20">
                        <ul class="shop-toolbar-controls">

                            <li>
                                <div class="product-sorting">
                                    <select class="nice-select">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by latest</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div class="product-column-toggle d-none d-xl-flex">
                                    <button class="toggle active hintT-top" data-hint="5 Column" data-column="5"><i class="ti-layout-grid4-alt"></i></button>
                                    <button class="toggle hintT-top" data-hint="4 Column" data-column="4"><i class="ti-layout-grid3-alt"></i></button>
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

        <div class="section learts-mt-70">
            <div class="container">
                <!-- Products Start -->
                <div id="shop-products" class="products isotope-grid row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                    <div class="grid-sizer col-1"></div>
                    <?php

                    $done = 0;
                    $result = "";

                    if (isset($_GET["category"])) {
                        $jew_name = $_GET["category"];
                        $result = query_exec("select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id where jewelery_sub.jewelery_brand ='$jew_name'");
                    } else if (isset($_POST["submit"]) && $_POST["search"] != "") {
                        $var_search = $_POST["search"];
                        $query = "select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id WHERE jewelery_products.name like '%$var_search%'";
                        $result = query_exec($query);
                    } else {
                        $result = query_exec("select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id");
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="grid-item col new hot">

                            <div class="product">
                                <div class="product-thumb">
                                    <a href="product-details.html" class="image">
                                        <?php
                                        if ($rows["jew_status"] == "sale") {
                                        ?>
                                            <span class="product-badges">
                                                <span class="onsale"><?php echo round($rows["jew_discount"] * 100) . "%" ?></span>
                                            </span>
                                        <?php } else if ($rows["jew_status"] == "out") { ?>
                                            <span class="product-badges">
                                                <span class="onsale" style="color:white;background-color:#c61932;">Out</span>
                                            </span>

                                        <?php  } else { ?>
                                            <span class="product-badges">
                                                <span><?php echo $rows['jew_status'] ?></span>
                                            </span>


                                        <?php } ?>

                                        <img src="../learts/jewellery images/<?php echo $rows["jew_images"]  ?>" height="300px" width="300px" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>

                                <h6 class="title"><a href="product-details.html" style="letter-spacing:1px;"><?php echo $rows["name"] ?></a></h6>
                                <div class="product-info">
                                    <?php
                                    if ($rows["jew_status"] == "sale") {
                                        $done = $rows["jew_price"] - ($rows["jew_price"] * $rows["jew_discount"])

                                    ?>
                                        <span class="price">
                                            <span class="old"> Rs:<?php echo $rows["jew_price"] ?>/=</span>
                                            <span class="new" style="letter-spacing:1px;color:red">Rs:
                                                <?php echo round($done) ?> /=</span>
                                        </span>
                                    <?php } else if ($rows["jew_status"] == "out") {
                                        $done = $rows["jew_price"] - ($rows["jew_price"] * $rows["jew_discount"])
                                    ?>
                                        <span class="price">
                                            <span class="old" style="letter-spacing:1px;color:black">Rs:
                                                <?php echo $rows["jew_price"] ?>/=</span>
                                            <span class="new" style="color: red;">Rs:
                                                <?php echo round($done) ?>/=</span></span>
                                        </br>

                                        </span>

                                    <?php  } else { ?>
                                        <span class="price">

                                            <span style="letter-spacing:1px ;">Rs: <?php echo $rows['jew_price'] ?>/=</span>
                                        </span>


                                    <?php } ?>



                                    <?php
                                    if ($rows["jew_status"] == "sale") {
                                    ?>
                                        <div class="product-buttons">
                                            <a href="cart.php?j_id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="j_single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>
                                        </div>
                                    <?php } else if ($rows["jew_status"] == "out") { ?>
                                        <div class="product-buttons">
                                            <a class="product-button hintT-top" data-hint="Not Accessible"><i class="fal fa-frown"></i></a>
                                            <a href="j_single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>

                                        </div>

                                    <?php  } else { ?>
                                        <div class="product-buttons">
                                            <a href="cart.php?j_id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                            <a href="j_single.php?id=<?php echo $rows['id'] ?>" class="product-button hintT-top" data-hint="More"><i class="fal fa-random"></i></a>
                                        </div>


                                    <?php } ?>














                                </div>
                            </div>

                        </div>
                    <?php } ?>
                </div>
                <!-- Products End -->
                <div class="text-center learts-mt-70">
                    <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="ti-plus"></i> More</a>
                </div>
            </div>
        </div>

    </div>
    <!-- Shop Products Section End -->

    <?php include("footer.php") ?>
    <?php include("footrlinks2.php") ?>

</body>


</html>