<!DOCTYPE html>
<html class="no-js" lang="en">


<head>
    <?php include("headerlinks.php"); ?>

</head>

<body>

    <?php include("header.php") ?>

    <!-- Slider main container Start -->
    <?php include("slider.php") ?>
    <!-- Slider main container End -->

    <!-- Category Banner Section Start -->
    <div class="section section-fluid learts-pt-30">
        <div class="container">
            <div class="category-banner1-carousel">

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="product.php" class="image"><img src="../learts/images/Category-01.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="product.php">Luxury Beauty</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="product.php" class="image"><img src="../learts/images/Category-02.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="product.php">Face Care</a>
                                    <span class="number">16</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="product.php" class="image"><img src="../learts/images/Category-03.jpg" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="product.php">Fragrances</a>
                                    <span class="number">6</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="product.php" class="image"><img src="../learts/jewellery images/tops.png" alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="product.php">Tops</a>
                                    <span class="number">15</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="jew_product.php" class="image"><img src="../learts/jewellery images/bangles.png"
                                    alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="jew_jew_product.php">Antique Bangles</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="category-banner1">
                        <div class="inner">
                            <a href="jew_product.php" class="image"><img src="../learts/jewellery images/pendent.png"
                                    alt=""></a>
                            <div class="content">
                                <h3 class="title">
                                    <a href="jew_product.php">Aesthetic Pendents</a>
                                    <span class="number">4</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category Banner Section End -->

    <!-- Product Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="row learts-mb-50">
                <div class="col">
                    <!-- Section Title Start -->
                    <div class="section-title text-center mb-0">
                        <h3 class="sub-title">Just for you</h3>
                        <h2 class="title title-icon-both">Makeup world</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <!-- Product Tab List Start -->
            <div class="row learts-mb-40">
                <div class="col">
                    <ul class="nav text-uppercase justify-content-center mx-n1 mb-n2">
                        <li class="nav-item mx-1 mb-2"><a href="#product-all" data-bs-toggle="tab"
                                class="btn btn-md btn-light btn-hover-primary active">All</a></li>
                        <li class="nav-item mx-1 mb-2"><a href="#face-care" data-bs-toggle="tab"
                                class="btn btn-md btn-light btn-hover-primary">Makeup Items</a></li>
                        <li class="nav-item mx-1 mb-2"><a href="#makeup-items" data-bs-toggle="tab"
                                class="btn btn-md btn-light btn-hover-primary">Gift Ideas</a></li>
                        <li class="nav-item mx-1 mb-2"><a href="#sale" data-bs-toggle="tab"
                                class="btn btn-md btn-light btn-hover-primary">Sale</a></li>
                    </ul>
                </div>
            </div>
            <!-- Product Tab List End -->

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-all">
                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        <?php
                        $done = 0;

                        $query = "select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id LIMIT 12";
                        $result = query_exec($query);
                        while ($rows_cat = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="product-details.html" class="image">
                                        <?php
                                            if ($rows_cat["status"] == "sale") {
                                            ?>
                                        <span class="product-badges">
                                            <span
                                                class="onsale"><?php echo round($rows_cat["discount"] * 100) . "%" ?></span>
                                        </span>
                                        <?php } else if ($rows_cat["status"] == "out") { ?>
                                        <span class="product-badges">
                                            <span class="onsale"
                                                style="color:white;background-color:#c61932;">Out</span>
                                        </span>

                                        <?php  } else { ?>
                                        <span class="product-badges">
                                            <span><?php echo $rows_cat['status'] ?></span>
                                        </span>


                                        <?php } ?>

                                        <img src="../learts/products-images/<?php echo $rows_cat["images"]  ?>"
                                            height="300px" width="300px" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left"
                                        data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                </br>
                                <h6 class="title"><a href="product-details.html"
                                        style="letter-spacing:1px;"><?php echo $rows_cat["product_name"] ?></a></h6>
                                <div class="product-info">
                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                            $done = $rows_cat["price"] - ($rows_cat["price"] * $rows_cat["discount"])

                                        ?>
                                    <span class="price">
                                        <span class="old"> <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="letter-spacing:1px;color:red">Rs:
                                            <?php echo $done ?> </span>
                                    </span>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <span class="price">
                                        <span class="old" style="letter-spacing:1px;color:black">Rs:
                                            <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="color: red;">Rs: <?php echo $done ?>/=</span></span>
                                    </br>

                                    </span>

                                    <?php  } else { ?>
                                    <span class="price">

                                        <span style="letter-spacing:1px ;">Rs: <?php echo $rows_cat['price'] ?>/=</span>
                                    </span>


                                    <?php } ?>



                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                        ?>
                                    <div class="product-buttons">
                                       
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <div class="product-buttons">
                                        <a class="product-button hintT-top" data-hint="Not Accessible"><i
                                                class="fal fa-frown"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>

                                    </div>

                                    <?php  } else { ?>
                                    <div class="product-buttons">
                                       
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>


                                    <?php } ?>














                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>

                    <!-- Products End -->
                </div>
                <div class="tab-pane fade" id="face-care">
                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        <?php
                        $done = 0;
                        $query = "select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_category.category_type in ( 'Eye liner', 'Mascara','eyelashes','Lip liner','Concealer','Moisturizer','Serums','sunscreens')LIMIT 12";
                        $result = query_exec($query);
                        while ($rows_cat = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="product-details.html" class="image">
                                        <?php
                                            if ($rows_cat["status"] == "sale") {
                                            ?>
                                        <span class="product-badges">
                                            <span
                                                class="onsale"><?php echo ($rows_cat["discount"] * 100) . "%" ?></span>
                                        </span>
                                        <?php } else if ($rows_cat["status"] == "out") { ?>
                                        <span class="product-badges">
                                            <span class="onsale"
                                                style="color:white;background-color:#c61932;">Out</span>
                                        </span>

                                        <?php  } else { ?>
                                        <span class="product-badges">
                                            <span><?php echo $rows_cat['status'] ?></span>
                                        </span>


                                        <?php } ?>

                                        <img src="../learts/products-images/<?php echo $rows_cat["images"]  ?>"
                                            height="300px" width="300px" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left"
                                        data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                </br>
                                <h6 class="title"><a href="product-details.html"
                                        style="letter-spacing:1px;"><?php echo $rows_cat["product_name"] ?></a></h6>
                                <div class="product-info">
                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                            $done = $rows_cat["price"] - ($rows_cat["price"] * $rows_cat["discount"])

                                        ?>
                                    <span class="price">
                                        <span class="old"> <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="letter-spacing:1px;color:red">Rs:
                                            <?php echo $done ?> </span>
                                    </span>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <span class="price">
                                        <span class="old" style="letter-spacing:1px;color:black">Rs:
                                            <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="color: red;">Rs: <?php echo $done ?>/=</span></span>
                                    </br>

                                    </span>

                                    <?php  } else { ?>
                                    <span class="price">

                                        <span style="letter-spacing:1px ;">Rs: <?php echo $rows_cat['price'] ?>/=</span>
                                    </span>


                                    <?php } ?>



                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                        ?>
                                    <div class="product-buttons">
                                       
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <div class="product-buttons">
                                        <a class="product-button hintT-top" data-hint="Not Accessible"><i
                                                class="fal fa-frown"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>

                                    </div>

                                    <?php  } else { ?>
                                    <div class="product-buttons">
                                      
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>


                                    <?php } ?>














                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>
                    <!-- Products End -->
                </div>
                <div class="tab-pane fade" id="makeup-items">
                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        <?php
                        $done = 0;
                        $query = "select makeup_products.*, makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_category.category_type in ('Eye Shadow Palate', 'Highlighter', 'Makeup set','perfume','Brushes set') LIMIT 8";
                        $result = query_exec($query);
                        while ($rows_cat = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="product-details.html" class="image">
                                        <?php
                                            if ($rows_cat["status"] == "sale") {
                                            ?>
                                        <span class="product-badges">
                                            <span
                                                class="onsale"><?php echo ($rows_cat["discount"] * 100) . "%" ?></span>
                                        </span>
                                        <?php } else if ($rows_cat["status"] == "out") { ?>
                                        <span class="product-badges">
                                            <span class="onsale"
                                                style="color:white;background-color:#c61932;">Out</span>
                                        </span>

                                        <?php  } else { ?>
                                        <span class="product-badges">
                                            <span><?php echo $rows_cat['status'] ?></span>
                                        </span>


                                        <?php } ?>

                                        <img src="../learts/products-images/<?php echo $rows_cat["images"]  ?>"
                                            height="300px" width="300px" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left"
                                        data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                </br>
                                <h6 class="title"><a href="product-details.html"
                                        style="letter-spacing:1px;"><?php echo $rows_cat["product_name"] ?></a></h6>
                                <div class="product-info">
                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                            $done = $rows_cat["price"] - ($rows_cat["price"] * $rows_cat["discount"])

                                        ?>
                                    <span class="price">
                                        <span class="old"> <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="letter-spacing:1px;color:red">Rs:
                                            <?php echo $done ?> </span>
                                    </span>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <span class="price">
                                        <span class="old" style="letter-spacing:1px;color:black">Rs:
                                            <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="color: red;">Rs: <?php echo $done ?>/=</span></span>
                                    </br>

                                    </span>

                                    <?php  } else { ?>
                                    <span class="price">

                                        <span style="letter-spacing:1px ;">Rs: <?php echo $rows_cat['price'] ?>/=</span>
                                    </span>


                                    <?php } ?>



                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                        ?>
                                    <div class="product-buttons">
                                        
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <div class="product-buttons">
                                        <a class="product-button hintT-top" data-hint="Not Accessible"><i
                                                class="fal fa-frown"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>

                                    </div>

                                    <?php  } else { ?>
                                    <div class="product-buttons">
                                       
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>


                                    <?php } ?>














                                </div>
                            </div>
                        </div>
                        <?php } ?>


                    </div>





                </div>
                <div class="tab-pane fade" id="sale">
                    <!-- Products Start -->
                    <div class="products row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                        <?php

                        $done = 0;
                        $query = "select makeup_products.*,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_products.status='sale' limit 12";
                        $result = query_exec($query);
                        while ($rows_cat = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="product-details.html" class="image">
                                        <?php
                                            if ($rows_cat["status"] == "sale") {
                                            ?>
                                        <span class="product-badges">
                                            <span
                                                class="onsale"><?php echo ($rows_cat["discount"] * 100) . "%" ?></span>
                                        </span>
                                        <?php } else if ($rows_cat["status"] == "out") { ?>
                                        <span class="product-badges">
                                            <span class="onsale"
                                                style="color:white;background-color:#c61932;">Out</span>
                                        </span>

                                        <?php  } else { ?>
                                        <span class="product-badges">
                                            <span><?php echo $rows_cat['status'] ?></span>
                                        </span>


                                        <?php } ?>

                                        <img src="../learts/products-images/<?php echo $rows_cat["images"]  ?>"
                                            height="300px" width="300px" alt="Product Image">
                                    </a>
                                    <a href="wishlist.html" class="add-to-wishlist hintT-left"
                                        data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                                </div>
                                </br>
                                <h6 class="title"><a href="product-details.html"
                                        style="letter-spacing:1px;"><?php echo $rows_cat["product_name"] ?></a></h6>
                                <div class="product-info">
                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                            $done = $rows_cat["price"] - ($rows_cat["price"] * $rows_cat["discount"])

                                        ?>
                                    <span class="price">
                                        <span class="old"> <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="letter-spacing:1px;color:red">Rs:
                                            <?php echo $done ?> </span>
                                    </span>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <span class="price">
                                        <span class="old" style="letter-spacing:1px;color:black">Rs:
                                            <?php echo $rows_cat["price"] ?>/=</span>
                                        <span class="new" style="color: red;">Rs: <?php echo $done ?>/=</span></span>
                                    </br>

                                    </span>

                                    <?php  } else { ?>
                                    <span class="price">

                                        <span style="letter-spacing:1px ;">Rs: <?php echo $rows_cat['price'] ?>/=</span>
                                    </span>


                                    <?php } ?>



                                    <?php
                                        if ($rows_cat["status"] == "sale") {
                                        ?>
                                    <div class="product-buttons">
                                        
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>
                                    <?php } else if ($rows_cat["status"] == "out") { ?>
                                    <div class="product-buttons">
                                        <a class="product-button hintT-top" data-hint="Not Accessible"><i
                                                class="fal fa-frown"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>

                                    </div>

                                    <?php  } else { ?>
                                    <div class="product-buttons">
                                      
                                        <a href="cart.php?id=<?php echo $rows_cat['id'] ?>" class="product-button hintT-top" data-hint="Add to Cart"><i
                                                class="fal fa-shopping-cart"></i></a>
                                        <a href="single.php?id=<?php echo $rows_cat['id'] ?>"
                                            class="product-button hintT-top" data-hint="More"><i
                                                class="fal fa-random"></i></a>
                                    </div>


                                    <?php } ?>














                                </div>
                            </div>
                        </div>
                        <?php } ?>



                    </div>
                </div>
                <!-- Products End -->
            </div>
            <!-- Products End -->
        </div>

        < </div>

    </div>
    </div>
    <!-- Product Section End -->

    <!-- Product/Sale Banner Section Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-1 learts-mb-n30">

                <div class="col learts-mb-30">
                    <div class="sale-banner8">
                        <img src="../learts/images/slide-2.jpg" alt="Sale Banner Image">
                        <div class="content">
                            <h2 class="title">Little simple <br> things</h2>
                            <a href="#" class="link">shop now</a>
                        </div>
                    </div>
                </div>

                <div class="col learts-mb-30">
                    <div class="sale-banner8">
                        <img src="../learts/images/slide-1.jpg" height="260px" alt="Sale Banner Image">
                        <div class="content">
                            <h2 class="title">Holiday <br> Gifts</h2>
                            <a href="#" class="link">shop now</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Product/Sale Banner Section End -->

    <!-- Deal of the Day Section Start -->
    <div class="section section-fluid section-padding" data-bg-color="#f4f3ec">
        <div class="container">
            <div class="row align-items-center learts-mb-n30">

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-image text-center">
                        <img src="../learts/jewellery images/pendent.png" alt="">
                    </div>
                </div>

                <div class="col-lg-6 col-12 learts-mb-30">
                    <div class="product-deal-content">
                        <h2 class="title">Deal of the day</h2>
                        <div class="desc">
                            <p>Years of experience brought about by our skilled craftsmen could ensure that every piece
                                produced is a work of art. Our focus is always the best quality possible.</p>
                        </div>
                        <div class="countdown1" data-countdown="2022/01/01"></div>
                        <a href="shop.html" class="btn btn-dark btn-hover-primary">Shop Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Deal of the Day Section End -->

    <!-- List Product Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 learts-mb-n30">

                <!-- New arrivals Start -->
                <div class="col learts-mb-30">
                    <div class="block-title">
                        <h3 class="title">New arrivals</h3>
                    </div>

                    <div class="product-list-slider">
                        <?php
                        $query = "select makeup_products.*,makeup_category.category_type from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id order by makeup_products.datetime DESC LIMIT 9";
                        $result = query_exec($query);
                        while ($arrival = mysqli_fetch_array($result)) {
                        ?>
                        <div class="list-product">
                            <div class="thumbnail">
                                <a href="product-details.html"><img
                                        src="../learts/products-images/<?php echo $arrival["images"] ?>"
                                        alt="List product"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a
                                        href="product-details.html"><?php echo $arrival["product_name"] ?></a></h6>
                                <?php
                                    if ($arrival["status"] == "sale") {
                                    ?>
                                <span class="price">
                                    <span style="color:green">Sale</span>
                                    <span class="new" style="letter-spacing:1px;color:red">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                </span>
                                <?php } else if ($arrival["status"] == "out") { ?>
                                <span class="price">
                                    <span class="old" style="letter-spacing:1px;color:black">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                    <span class="new" style="color: red;">Out Of Stock</span></span>
                                </span>

                                <?php  } else { ?>
                                <span class="price">

                                    <span style="letter-spacing:1px ;">Rs: <?php echo $arrival['price'] ?>/=</span>
                                </span>


                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>


                    </div>

                </div>
                <!-- New arrivals End -->

                <!-- Top rate Start -->
                <div class="col learts-mb-30">

                    <div class="block-title">
                        <h3 class="title">Top rate</h3>
                    </div>

                    <div class="product-list-slider">
                        <?php
                        $query = "select makeup_products.*,makeup_category.category_type from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id WHERE makeup_products.status='sale' order by makeup_products.price ASC LIMIT 9";
                        $result = query_exec($query);
                        while ($arrival = mysqli_fetch_array($result)) {
                        ?>
                        <div class="list-product">
                            <div class="thumbnail">
                                <a href="product-details.html"><img
                                        src="../learts/products-images/<?php echo $arrival["images"] ?>"
                                        alt="List product"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a
                                        href="product-details.html"><?php echo $arrival["product_name"] ?></a></h6>
                                <?php
                                    if ($arrival["status"] == "sale") {
                                    ?>
                                <span class="price">
                                    <span style="color:green">Sale</span>
                                    <span class="new" style="letter-spacing:1px;color:red">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                </span>
                                <?php } else if ($arrival["status"] == "out") { ?>
                                <span class="price">
                                    <span class="old" style="letter-spacing:1px;color:black">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                    <span class="new" style="color: red;">Out Of Stock</span></span>
                                </span>

                                <?php  } else { ?>
                                <span class="price">

                                    <span style="letter-spacing:1px ;">Rs: <?php echo $arrival['price'] ?>/=</span>
                                </span>


                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>


                    </div>

                </div>
                <!-- Top rate End -->

                <!-- Sale items Start -->
                <div class="col learts-mb-30">

                    <div class="block-title">
                        <h3 class="title">Sale items</h3>
                    </div>
                    <div class="product-list-slider">
                        <?php
                        $query = "select makeup_products.*,makeup_category.category_type from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id WHERE makeup_products.status='sale' LIMIT 9";
                        $result = query_exec($query);
                        while ($arrival = mysqli_fetch_array($result)) {
                        ?>
                        <div class="list-product">
                            <div class="thumbnail">
                                <a href="product-details.html"><img
                                        src="../learts/products-images/<?php echo $arrival["images"] ?>"
                                        alt="List product"></a>
                            </div>
                            <div class="content">
                                <h6 class="title"><a
                                        href="product-details.html"><?php echo $arrival["product_name"] ?></a></h6>
                                <?php
                                    if ($arrival["status"] == "sale") {
                                    ?>
                                <span class="price">
                                    <span style="color:green">Sale</span>
                                    <span class="new" style="letter-spacing:1px;color:red">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                </span>
                                <?php } else if ($arrival["status"] == "out") { ?>
                                <span class="price">
                                    <span class="old" style="letter-spacing:1px;color:black">Rs:
                                        <?php echo $arrival["price"] ?>/=</span>
                                    <span class="new" style="color: red;">Out Of Stock</span></span>
                                </span>

                                <?php  } else { ?>
                                <span class="price">

                                    <span style="letter-spacing:1px ;">Rs: <?php echo $arrival['price'] ?>/=</span>
                                </span>


                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>


                    </div>


                </div>
                <!-- Sale items End -->

            </div>
        </div>
    </div>
    <!-- List Product Section End 



    <!-- Gallery Section Start -->
    <div class="section section-fluid section-padding pt-0">
        <div class="container">

            <!-- Section Title Start -->
            <div class="section-title2 text-center">
                <h3 class="sub-title">Follow us on Instagram</h3>
                <h2 class="title">@learts_shop</h2>
            </div>
            <!-- Section Title End -->

            <div id="instafeed" class="instafeed instafeed-carousel instafeed-carousel1"></div>

        </div>
    </div>
    <!-- Gallery Section End -->
    <div class="quickViewModal modal fade" id="quickViewModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button class="close" data-bs-dismiss="modal">&times;</button>
                <div class="row learts-mb-n30">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-30">
                        <div class="product-images">
                            <div class="product-gallery-slider-quickview">
                                <div class="product-zoom"
                                    data-image="assets/images/product/single/1/product-zoom-1.webp">
                                    <img src="assets/images/product/single/1/product-1.webp" alt="">
                                </div>
                                <div class="product-zoom"
                                    data-image="assets/images/product/single/1/product-zoom-2.webp">
                                    <img src="assets/images/product/single/1/product-2.webp" alt="">
                                </div>
                                <div class="product-zoom"
                                    data-image="assets/images/product/single/1/product-zoom-3.webp">
                                    <img src="assets/images/product/single/1/product-3.webp" alt="">
                                </div>
                                <div class="product-zoom"
                                    data-image="assets/images/product/single/1/product-zoom-4.webp">
                                    <img src="assets/images/product/single/1/product-4.webp" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 overflow-hidden position-relative learts-mb-30">
                        <div class="product-summery customScroll">
                            <div class="product-ratings">
                                <span class="star-rating">
                                    <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                <a href="#reviews" class="review-link">(<span class="count">3</span> customer
                                    reviews)</a>
                            </div>
                            <h3 class="product-title">Cleaning Dustpan & Brush</h3>
                            <div class="product-price">£38.00 – £50.00</div>
                            <div class="product-description">
                                <p>Easy clip-on handle – Hold the brush and dustpan together for storage; the dustpan
                                    edge is serrated to allow easy scraping off the hair without entanglement.
                                    High-quality bristles – no burr damage, no scratches, thick and durable, comfortable
                                    to remove dust and smaller particles.</p>
                            </div>
                            <div class="product-variations">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>Size</span></td>
                                            <td class="value">
                                                <div class="product-sizes">
                                                    <a href="#">Large</a>
                                                    <a href="#">Medium</a>
                                                    <a href="#">Small</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Color</span></td>
                                            <td class="value">
                                                <div class="product-colors">
                                                    <a href="#" data-bg-color="#000000"></a>
                                                    <a href="#" data-bg-color="#ffffff"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Quantity</span></td>
                                            <td class="value">
                                                <div class="product-quantity">
                                                    <span class="qty-btn minus"><i class="ti-minus"></i></span>
                                                    <input type="text" class="input-qty" value="1">
                                                    <span class="qty-btn plus"><i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="product-buttons">
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i
                                        class="fal fa-heart"></i></a>
                                <a href="#" class="btn btn-dark btn-outline-hover-dark"><i
                                        class="fal fa-shopping-cart"></i> Add to Cart</a>
                                <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark"><i
                                        class="fal fa-random"></i></a>
                            </div>
                            <div class="product-brands">
                                <span class="title">Brands</span>
                                <div class="brands">
                                    <a href="#"><img src="assets/images/brands/brand-3.webp" alt=""></a>
                                    <a href="#"><img src="assets/images/brands/brand-8.webp" alt=""></a>
                                </div>
                            </div>
                            <div class="product-meta mb-0">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="label"><span>SKU</span></td>
                                            <td class="value">0404019</td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Category</span></td>
                                            <td class="value">
                                                <ul class="product-category">
                                                    <li><a href="#">Kitchen</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Tags</span></td>
                                            <td class="value">
                                                <ul class="product-tags">
                                                    <li><a href="#">handmade</a></li>
                                                    <li><a href="#">learts</a></li>
                                                    <li><a href="#">mug</a></li>
                                                    <li><a href="#">product</a></li>
                                                    <li><a href="#">learts</a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="label"><span>Share on</span></td>
                                            <td class="va">
                                                <div class="product-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-google-plus-g"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                    <a href="#"><i class="fal fa-envelope"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>
    <!-- Modal -->


    <?php include("footerlinks.php") ?>

</body>


<!-- Mirrored from template.hasthemes.com/learts/learts/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:19:05 GMT -->

</html>