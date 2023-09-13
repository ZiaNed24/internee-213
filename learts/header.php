<?php

require_once("model/crud.php");
require_once("model/helpermethod.php");
$sub_total = 0;
$error_msg2 = "";
$error_msg = "";
$discount = 0;
$id = 0;

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
    } else {

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













$result = query_exec("SELECT category_type FROM makeup_category");
if ($result->num_rows > 0) {
    $options = mysqli_fetch_all($result, MYSQLI_ASSOC);
}



?>

<div class="topbar-section section border-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col d-none d-md-block">
                <div class="topbar-menu">
                    <ul>
                        <li><a href="contact.php"><i class="fa fa-map-marker-alt"></i>Store Location</a></li>
                        <li><a href="account.php"><i class="fa fa-truck"></i>Order Status</a></li>
                    </ul>
                </div>
            </div>
            <div class="col d-md-none d-lg-block">
                <p class="text-center my-2">Free shipping for orders over $59 !</p>
            </div>

            <!-- Header Language & Currency Start -->
            <div class="col d-none d-md-block">
                <ul class="header-lan-curr text-white justify-content-end">
                    <li><a href="#">English</a>
                        <ul class="curr-lan-sub-menu">
                            <li><a href="#">Français</a></li>
                            <li><a href="#">Deutsch</a></li>
                        </ul>
                    </li>
                    <li><a href="#">USD</a>
                        <ul class="curr-lan-sub-menu">
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">GBP</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Header Language & Currency End -->
        </div>
    </div>
</div>
<!-- Topbar Section End -->
<!-- Header Section Start -->
<div class="header-section section bg-white d-none d-xl-block">
    <div class="container">
        <div class="row justify-content-between align-items-center">

            <!-- Header Logo Start -->
            <div class="col-auto">
                <div class="header-logo justify-content-center">
                    <a href="home.php"><img src="assets/images/logo/logo.webp" alt="Learts Logo"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Search Start -->
            <div class="col">
                <div class="header6-search">

                    <div class="row g-0">
                        <form action="product.php" action="post">
                            <div class="col-auto">
                                <select name="category_type" class="search-select select2-basic" onchange="location = this.value;">
                                    <option value="0">All Categories</option>
                                    <?php

                                    foreach ($options as $option) {
                                    ?>
                                        <option value="product.php?drpdwn=<?php echo $option['category_type'] ?>">
                                            <?php echo $option['category_type']; ?></option>



                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </form>
                        <form class="searchform" method="post" action="jew_product.php">
                            <div class="col">
                                <input type="text" name="search" placeholder="Search Jewelery Products..." autocomplete="off">
                            </div>
                            <button type="submit" name="submit"></button>
                        </form>

                    </div>


                </div>
            </div>
            
            <!-- Header Search End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">

                    <div class="header-login">
                        <a href="account.php"><i class="fal fa-user"></i></a>
                    </div>
                    <div class="header-wishlist">
                        <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle">
                            <?php if (empty($_SESSION["cart"])) { ?>
                                <span class="cart-count">0</span><i class="fal fa-shopping-cart"></i></a>
                    <?php } else { ?>

                        <span class="cart-count"><?php echo count($_SESSION["cart"]) ?></span><i class="fal fa-shopping-cart"></i></a>

                    <?php } ?>

                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>

    <!-- Site Menu Section Start -->
    <div class="site-menu-section section border-top">
        <div class="container">
            <div class="header-categories">
                <button class="category-toggle"><i class="fal fa-bars"></i> Browse Categories</button>
                <ul class="header-category-list">
                    <li><a href="product.php"><img src="assets/images/icons/cat-icon-1.webp" alt="">Face lifting</a></li>
                    <li><a href="product.php"><img src="assets/images/icons/cat-icon-2.webp" alt=""> Face care</a></li>
                    <li><a href="product.php"><img src="assets/images/icons/cat-icon-3.webp" alt="">Lip care</a></li>
                    <li><a href="product.php"><img src="assets/images/icons/cat-icon-4.webp" alt="">Luxury Beauty</a></li>
                    <li><a href="jewelery_home.php"><img src="assets/images/icons/cat-icon-5.webp" alt=""> Necklaces</a></li>
                </ul>
            </div>
            <nav class="site-main-menu justify-content-center menu-height-60">
                <ul>
                    <li><a href="home.php"><span class="menu-text">Home</span></a>

                    </li>
                    <li class="has-children"><a href="product.php"><span class="menu-text"> Makeup World</span></a>
                        <ul class="sub-menu mega-menu">
                            <li>
                                <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Face Care</span></a>
                                <ul>
                                    <?php

                                    $query = "select * from makeup_category where category_type IN ('Concealer', 'Foundation', 'Priemer','Moisturizer','Serums','sunscreens')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li>
                                <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Luxury
                                        Beauty</span></a>
                                <ul>
                                    <?php

                                    $query = "select * from makeup_category where category_type IN ('Eye Shadow Palate', 'Highlighter', 'Makeup set','perfume','Brushes set','Setting Spray')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li>
                                <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Beauty items
                                    </span></a>
                                <ul>
                                    <?php

                                    $query = "select * from makeup_category where category_type IN ('Lipsticks', 'Eye liner', 'Mascara','eyelashes','Lip liner')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>


                                </ul>
                            </li>
                            <li class="align-self-center">
                                <a href="product.php" class="menu-banner"><img src="assets/images/banner/menu-banner-2.webp" alt="Shop Menu Banner"></a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-children"><a href="jewelery_home.php"><span class="menu-text">Jewelry Bag</span></a>
                        <ul class="sub-menu mega-menu">
                            <li>
                                <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Party Wearing</span></a>
                                <ul>
                                    <?php

                                    $query = " select * from jewelery_sub where jewelery_brand IN ('Gucci', 'Chopard', 'Graff','Buccellati','Graffio.','max')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li>
                                <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Antique Jewelry</span></a>
                                <ul>
                                    <?php


                                    $query = " select * from jewelery_sub where jewelery_brand IN ('Tiffani', 'Cartier', 'Bulgari','Harry Winston','Foundrae','Co.')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>
                            <li>
                                <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Aesthetic Stuff</span></a>
                                <ul>
                                    <?php


                                    $query = "  select * from jewelery_sub where jewelery_brand IN ('Channel', 'Dior', 'Bvlgari.','David Yurman','Chopardioksa.','sheen')";
                                    $result = query_exec($query);
                                    while ($rows_cat = mysqli_fetch_array($result)) {
                                    ?>
                                        <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                        </li>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li><a href="blog.php"><span class="menu-text">Blog</span></a>

                    </li>
                    <li><a href="contact.php"><span class="menu-text">Contact Us</span></a>

                    </li>
                </ul>
            </nav>
            <div class="header-call">
                <p><i class="fa fa-phone"></i> 0918 206 263</p>
            </div>
        </div>
    </div>
    <!-- Site Menu Section End -->

</div>
<!-- Header Section End -->

<!-- Header Sticky Section Start -->
<div class="sticky-header header-menu-center section bg-white d-none d-xl-block">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="home.php"><img src="assets/images/logo/logo-2.webp" alt="Learts Logo"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Search Start -->
            <div class="col d-none d-xl-block">
                <nav class="site-main-menu justify-content-center">
                    <ul>
                        <li><a href="home.php"><span class="menu-text">Home</span></a>

                        </li>
                        <li class="has-children"><a href="product.php"><span class="menu-text"> Makeup World</span></a>
                            <ul class="sub-menu mega-menu">
                                <li>
                                    <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Face Care</span></a>
                                    <ul>
                                        <?php

                                        $query = "select * from makeup_category where category_type IN ('Concealer', 'Foundation', 'Priemer','Moisturizer','Serums','sunscreens')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li>
                                    <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Luxury
                                            Beauty</span></a>
                                    <ul>
                                        <?php

                                        $query = "select * from makeup_category where category_type IN ('Eye Shadow Palate', 'Highlighter', 'Makeup set','perfume','Brushes set','Setting Spray')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li>
                                    <a href="product.php" class="mega-menu-title"><span class="menu-text">MARIAJ. Beauty items
                                        </span></a>
                                    <ul>
                                        <?php

                                        $query = "select * from makeup_category where category_type IN ('Lipsticks', 'Eye liner', 'Mascara','eyelashes','Lip liner')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>


                                    </ul>
                                </li>
                                <li class="align-self-center">
                                    <a href="product.php" class="menu-banner"><img src="assets/images/banner/menu-banner-2.webp" alt="Shop Menu Banner"></a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-children"><a href="jewelery_home.php"><span class="menu-text">Jewelry Bag</span></a>
                            <ul class="sub-menu mega-menu">
                                <li>
                                    <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Party Wearing</span></a>
                                    <ul>
                                        <?php

                                        $query = " select * from jewelery_sub where jewelery_brand IN ('Gucci', 'Chopard', 'Graff','Buccellati','Graffio.','max')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li>
                                    <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Antique Jewelry</span></a>
                                    <ul>
                                        <?php


                                        $query = " select * from jewelery_sub where jewelery_brand IN ('Tiffani', 'Cartier', 'Bulgari','Harry Winston','Foundrae','Co.')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>
                                <li>
                                    <a href="jew_product.php" class="mega-menu-title"><span class="menu-text">Aesthetic Stuff</span></a>
                                    <ul>
                                        <?php


                                        $query = "  select * from jewelery_sub where jewelery_brand IN ('Channel', 'Dior', 'Bvlgari.','David Yurman','Chopardioksa.','sheen')";
                                        $result = query_exec($query);
                                        while ($rows_cat = mysqli_fetch_array($result)) {
                                        ?>
                                            <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                            </li>

                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </li>

                            </ul>
                        </li>
                        </li>
                        <li><a href="blog.php"><span class="menu-text">Blog</span></a>

                        </li>
                        <li><a href="contact.php"><span class="menu-text">Contact Us</span></a>

                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Search End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="header-login">
                        <a href="account.php"><i class="fal fa-user"></i></a>
                    </div>

                    <div class="header-wishlist">
                        <a href="#offcanvas-wishlist" class="offcanvas-toggle">
                            <span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle">
                            <?php if (empty($_SESSION["cart"])) { ?>
                                <span class="cart-count">0</span><i class="fal fa-shopping-cart"></i></a>
                    <?php } else {


                    ?>

                        <span class="cart-count"><?php echo count($_SESSION["cart"]) ?></span><i class="fal fa-shopping-cart"></i></a>

                    <?php } ?>
                    </div>
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>

</div>
<!-- Header Sticky Section End -->
<!-- Mobile Header Section Start -->
<div class="mobile-header bg-white section d-xl-none">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="home.php"><img src="assets/images/logo/logo-2.webp" alt="Learts Logo"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="header-login d-none d-sm-block">
                        <a href="account.php"><i class="fal fa-user"></i></a>
                    </div>

                    <div class="header-wishlist d-none d-sm-block">
                        <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle">
                            <?php if (empty($_SESSION["cart"])) { ?>
                                <span class="cart-count">0</span><i class="fal fa-shopping-cart"></i></a>
                    <?php } else { ?>

                        <span class="cart-count"><?php echo count($_SESSION["cart"]) ?></span><i class="fal fa-shopping-cart"></i></a>

                    <?php } ?>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>
</div>
<!-- Mobile Header Section End -->

<!-- Mobile Header Section Start -->
<div class="mobile-header sticky-header bg-white section d-xl-none">
    <div class="container">
        <div class="row align-items-center">

            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="home.php"><img src="assets/images/logo/logo-2.webp" alt="Learts Logo"></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Tools Start -->
            <div class="col-auto">
                <div class="header-tools justify-content-end">
                    <div class="header-login d-none d-sm-block">
                        <a href="my-account.html"><i class="fal fa-user"></i></a>
                    </div>

                    <div class="header-wishlist d-none d-sm-block">
                        <a href="#offcanvas-wishlist" class="offcanvas-toggle"><span class="wishlist-count">3</span><i class="fal fa-heart"></i></a>
                    </div>
                    <div class="header-cart">
                        <a href="#offcanvas-cart" class="offcanvas-toggle">
                            <?php if (empty($_SESSION["cart"])) { ?>
                                <span class="cart-count">0</span><i class="fal fa-shopping-cart"></i></a>
                    <?php } else { ?>

                        <span class="cart-count"><?php echo count($_SESSION["cart"]) ?></span><i class="fal fa-shopping-cart"></i></a>

                    <?php } ?>
                    </div>
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" class="top"></path>
                                <path d="M300,320 L540,320" class="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" class="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Header Tools End -->

        </div>
    </div>
</div>
<!-- Mobile Header Section End -->
<!-- OffCanvas Search Start -->
<div id="offcanvas-search" class="offcanvas offcanvas-search">
    <div class="inner">
        <div class="offcanvas-search-form">
            <button class="offcanvas-close">×</button>
            <form action="#">
                <div class="row mb-n3">
                    <div class="col-lg-8 col-12 mb-3"><input type="text" placeholder="Search Products..."></div>
                    <div class="col-lg-4 col-12 mb-3">
                        <select name="category_type" class="search-select select2-basic" onchange="location = this.value;">
                            <option value="0">All Categories</option>
                            <?php

                            foreach ($options as $option) {
                            ?>
                                <option value="product.php?drpdwn=<?php echo $option['category_type'] ?>">
                                    <?php echo $option['category_type']; ?></option>



                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <p class="search-description text-body-light mt-2"> <span># Type at least 1 character to search</span> <span>#
                Hit enter to search or ESC to close</span></p>

    </div>
</div>
<!-- OffCanvas Search End -->

<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
    <div class="inner">
        <div class="head">
            <span class="title">Wishlist</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-1.webp" alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Walnut Cutting Board</a>
                        <span class="quantity-price">1 x <span class="amount">$100.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-2.webp" alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Lucky Wooden Elephant</a>
                        <span class="quantity-price">1 x <span class="amount">$35.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
                <li>
                    <a href="product-details.html" class="image"><img src="assets/images/product/cart-product-3.webp" alt="Cart product Image"></a>
                    <div class="content">
                        <a href="product-details.html" class="title">Fish Cut Out Set</a>
                        <span class="quantity-price">1 x <span class="amount">$9.00</span></span>
                        <a href="#" class="remove">×</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="foot">
            <div class="buttons">
                <a href="wishlist.html" class="btn btn-dark btn-hover-primary">view wishlist</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Wishlist End -->

<!-- OffCanvas Cart Start -->

<div id="offcanvas-cart" class="offcanvas offcanvas-cart">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <?php if (empty($_SESSION["cart"])) { ?>
            <?php echo  "your shopping cart is empty" ?>
        <?php } else {
        ?>

            <div class="body customScroll">
                <ul class="minicart-product-list">
                    <?php
                    $_index_val = 1;
                    $sub_total = 0;
                    //$session_cart = $_SESSION["cart"];
                    foreach ($_SESSION["cart"] as $value_data) {
                        $total =    $value_data["price"] * $value_data["quantity"];
                        // $total =    $value_data["jew_price"] * $value_data["quantity"];
                        $sub_total = $sub_total + $total;
                    ?>
                        <li>
                            <a href="#" class="image"><img src="<?php echo $value_data['images'] ?>" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="#" class="title"><?php echo $value_data["product_name"] ?></a>
                                <span class="quantity-price">1 x <span class="amount"><?php echo $value_data["price"] ?></span></span>
                                <form method="get" action="header.php">
                                    <input type="hidden" name="index_value" value="<?php echo $_index_val ?>">
                                    <a class="remove"><button class="btn" type="submit">×</button></a>
                                </form>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="foot">
                <div class="sub-total">
                    <strong>Subtotal :</strong>
                    <span class="amount">Rs: <?php echo $sub_total; ?>/=</span>
                </div>
                <div class="buttons">
                    <a href="cart.php" class="btn btn-dark btn-hover-primary">view cart</a>
                </div>
                <p class="minicart-message">Free Shipping on All Orders Over $100!</p>
            </div>
        <?php } ?>
    </div>
</div>
<!-- OffCanvas Cart End -->

<!-- OffCanvas Search Start -->
<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <div class="inner customScroll">

        <div class="offcanvas-menu">
            <ul>
                <li><a href="home.php"><span class="menu-text">Home</span></a>

                </li>
                <li><a href="product.php"><span class="menu-text">Makeup World</span></a>
                    <ul class="sub-menu ">
                        <li>
                            <a href="product.php"><span class="menu-text">MARIAJ. Face Care</span></a>
                            <ul>
                                <?php

                                $query = "select * from makeup_category where category_type IN ('Concealer', 'Foundation', 'Priemer','Moisturizer','Serums','sunscreens')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li>
                            <a href="product.php"><span class="menu-text">MARIAJ. Luxury
                                    Beauty</span></a>
                            <ul>
                                <?php

                                $query = "select * from makeup_category where category_type IN ('Eye Shadow Palate', 'Highlighter', 'Makeup set','perfume','Brushes set','Setting Spray')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li>
                            <a href="product.php"><span class="menu-text">MARIAJ. Beauty items
                                </span></a>
                            <ul>
                                <?php

                                $query = "select * from makeup_category where category_type IN ('Lipsticks', 'Eye liner', 'Mascara','eyelashes','Lip liner')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="product.php?category=<?php echo $rows_cat['category_type'] ?>"><?php echo $rows_cat['category_type'] ?></a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>


                            </ul>
                        </li>

                    </ul>
                </li>
                <li><a href="jewelery_home.php"><span class="menu-text">Jewelry Bag </span></a>
                    <ul class="sub-menu ">
                        <li>
                            <a href="jew_product.php"><span class="menu-text">Party Wearing</span></a>
                            <ul>
                                <?php

                                $query = " select * from jewelery_sub where jewelery_brand IN ('Gucci', 'Chopard', 'Graff','Buccellati','Graffio.','max')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li>
                            <a href="jew_product.php"><span class="menu-text">Antique Jewelry</span></a>
                            <ul>
                                <?php


                                $query = " select * from jewelery_sub where jewelery_brand IN ('Tiffani', 'Cartier', 'Bulgari','Harry Winston','Foundrae','Co.')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>
                        <li>
                            <a href="jew_product.php"><span class="menu-text">Aesthetic Stuff</span></a>
                            <ul>
                                <?php


                                $query = "  select * from jewelery_sub where jewelery_brand IN ('Channel', 'Dior', 'Bvlgari.','David Yurman','Chopardioksa.','sheen')";
                                $result = query_exec($query);
                                while ($rows_cat = mysqli_fetch_array($result)) {
                                ?>
                                    <li><a href="jew_product.php?category=<?php echo $rows_cat['jewelery_brand'] ?>"><?php echo $rows_cat['jewelery_name'] ?>(<?php echo $rows_cat['jewelery_brand'] ?>)</a><span class="menu-text"></span></a>
                                    </li>

                                <?php
                                }
                                ?>

                            </ul>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
        <div class="offcanvas-buttons">
            <div class="header-tools">
                <div class="header-login">
                    <a href="account.php"><i class="fal fa-user"></i></a>
                </div>
                <div class="header-wishlist">
                    <a href="wishlist.html"><span>3</span><i class="fal fa-heart"></i></a>
                </div>
                <div class="header-cart">
                    <a href="#offcanvas-cart" class="offcanvas-toggle">
                        <?php if (empty($_SESSION["cart"])) { ?>
                            <span class="cart-count">0</span><i class="fal fa-shopping-cart"></i></a>
                <?php } else { ?>

                    <span class="cart-count"><?php echo count($_SESSION["cart"]) ?></span><i class="fal fa-shopping-cart"></i></a>

                <?php } ?>
                </div>
            </div>
        </div>
        <div class="offcanvas-social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
</div>
<!-- OffCanvas Search End -->

<div class="offcanvas-overlay"></div>