<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include("headerlinks2.php") ?>

</head>

<body>

    <?php include("header.php") ?>
    <?php



    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "select makeup_products.*,makeup_category.* from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id where makeup_products.id=$id";
        $result = query_exec($query);
        $row = mysqli_fetch_assoc($result);
    } else {
        redirect("product.php");
    }

    ?>

<style>
 #item{
  background-repeat: no-repeat;
background-size: cover;
  
 
  background-image: url('../learts/products-images/category.jpg');
}
</style>

    <!-- Page Title/Header Start -->

    <div class="page-title-section section" id="item">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">Shop</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="product.php">Products</a></li>
                            <li class="breadcrumb-item active"><?php echo $row["category_type"] ?></li>
                            <li class="breadcrumb-item active"><?php echo $row["product_name"] ?></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- Single Products Section Start -->
    <div class="section section-padding border-bottom">
        <div class="container">
            <div class="row learts-mb-n40">

                <!-- Product Images Start -->
                <div class="col-lg-6 col-12 learts-mb-40">






                    <?php
                    if ($row["status"] == "sale") {
                    ?>
                    <div class="center" class="center"
                        style="box-shadow: 0 0 50px cornflowerblue;font-weight:bold;background-color:cornflowerblue;color:white ;width:70px;height:70px;border-radius:50%;display:flex;align-items:center;text-align:center;letter-spacing:1px;">
                        <p style="padding-left:4px;"> 
                        &nbsp; SALE
                        </p>
                    </div>
                    <?php } else if ($row["status"] == "out") { ?>
                    <div class="center" class="center"
                        style="box-shadow: 0 0 50px #c61932;font-weight:bold;background-color:#c61932;color:white ;width:70px;height:70px;border-radius:50%;display:flex;align-items:center;text-align:center;letter-spacing:1px;">
                        <p style="padding-left:10px;"> 
                        &nbsp;OUT
                        </p>
                    </div>

                    <?php  } else { ?>



                    <?php } ?>



                    <div class="product-images">

                        <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "../learts/products-images/<?php echo $row["images"] ?>", "w": 900, "h": 1100}
                        
                            
                        ]'><i class="far fa-expand"></i></button>

                        <div class="product-gallery-slider">

                            <div class="product-zoom" data-image="assets/images/product/single/7/product-zoom-1.webp">
                                <img src="../learts/products-images/<?php echo $row["images"] ?>" alt="">
                            </div>
                            <div class="product-zoom" data-image="assets/images/product/single/7/product-zoom-2.webp">
                                <img style=" transform: rotateY(180deg);"
                                    src="../learts/products-images/<?php echo $row["images"] ?>"" alt="">
                            </div>
                            
                        </div>
                        <div class=" product-thumb-slider">

                                <div class="item">
                                    <img src="../learts/products-images/<?php echo $row["images"] ?>" p" alt="">
                                </div>
                                <div class="item">
                                    <img style=" transform: rotateY(180deg);"
                                        src="../learts/products-images/<?php echo $row["images"] ?>""  alt="">
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- Product Images End -->

                <!-- Product Summery Start -->
                <div class=" col-lg-6 col-12 learts-mb-40">
                                    <div class="product-summery">
                                        <div class="product-nav">
                                            <a href="#"><i class="fal fa-long-arrow-left"></i></a>
                                            <a href="#"><i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                        <div class="product-ratings">
                                            <span class="star-rating">
                                                <span class="rating-active" style="width: 100%;">ratings</span>
                                            </span>
                                            <a href="#reviews" class="review-link">(<span class="count">3</span>
                                                customer reviews)</a>
                                        </div>

                                        <h3 class="product-title"><?php echo $row["product_name"] ?></h3>

                                        </h3>


                                        <?php
                                        $done = 0;
                                        $done = $row["price"] - ($row["price"] * $row["discount"]);
                                        if ($row["status"] == "sale") {


                                        ?>

                                        <div class="product-price">
                                            <span>

                                                <del style="color:red;">Rs: <?php echo $row["price"] ?>/=</del>
                                                </br>
                                                </br>
                                                <h5>Rs: <?php echo $done ?> /=<span
                                                        class="badge rounded-pill bg-success"><?php echo round($row["discount"] * 100) . "%" ?>
                                                        Off</span></h5>
                                            </span>


                                        </div>

                                        <?php } else if ($row["status"] == "out") { ?>
                                        <div class="product-price">
                                            <span>

                                                <del style="color:red;">Rs: <?php echo $row["price"] ?>/=</del>
                                                </br>
                                                </br>
                                                <h5>Rs: <?php echo $done ?>/= <span
                                                        class="badge rounded-pill bg-success"><?php echo round($row["discount"] * 100) . "%" ?>
                                                        Off</span></h5>

                                            </span>



                                        </div>

                                        <?php  } else { ?>
                                        <div class="product-price">
                                            <span>

                                                Rs: <?php echo $row["price"] ?>/=
                                            </span>


                                        </div>


                                        <?php } ?>





                                        <div class="product-description">
                                            <p>
                                                Makeup mainly is used to change or enhance the way we look, to feel more
                                                confident and also to hide our imperfections. Makeup can be termed as a
                                                cosmetic device that is used to prettify or add color to your face.
                                            </p>
                                            <p>Due to the controllability of electric trike is stronger than the normal
                                                electric bike. Please test the bike in the secure room, garden, or
                                                square for 2 hours before rode it on the road, pavement, hills, and
                                                beach etc.</p>
                                        </div>
                                        <div class="product-info">

                                        </div>
                                        



                                        <?php
                                        if ($row["status"] == "sale") {

                                        ?>
                                        <div class="product-buttons">
                                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top"
                                                data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a>
                                            <a href="cart.php?id=<?php echo $rows['id'] ?>" class="btn btn-dark btn-outline-hover-dark"><i
                                                    class="fal fa-shopping-cart"></i> Add to Cart</a>
                                        </div>


                                        <?php } else if ($row["status"] == "out") { ?>

                                        <div class="product-buttons">
                                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top"
                                                data-hint="Add to Wishlist" style="pointer-events: none"><i
                                                    class="fal fa-heart"></i></a>
                                           
                                        </div>
                                        <?php  } else { ?>

                                        <div class="product-buttons">
                                            <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top"
                                                data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a>
                                            <a href="cart.php?id=<?php echo $rows['id'] ?>" class="btn btn-dark btn-outline-hover-dark"><i
                                                    class="fal fa-shopping-cart"></i> Add to Cart</a>
                                        </div>

                                        <?php } ?>





                                        <div class="product-brands">
                                            <span class="title">Brands</span>
                                            <div class="brands">
                                                <a href="#"><img src="assets/images/brands/brand-4.webp" alt=""></a>
                                                <a href="#"><img src="assets/images/brands/brand-6.webp" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="product-meta">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td class="label"><span>Barcode</span></td>
                                                        <td class="value">
                                                            <?php echo $row["datetime"] ?>-<?php echo $row["id"] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label"><span>Category</span></td>
                                                        <td class="value">
                                                            <ul class="product-category">
                                                                <li><a href="#"><?php echo $row["category_type"] ?></a>
                                                                </li>

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
                    <!-- Single Products Section End -->

                    <!-- Single Products Infomation Section Start -->
                    <div class="section section-padding border-bottom">
                        <div class="container">

                            <ul class="nav product-info-tab-list">
                                <li><a class="active" data-bs-toggle="tab" href="#tab-description">Description</a></li>
                                <li><a data-bs-toggle="tab" href="#tab-pwb_tab">Brand</a></li>
                                <li><a data-bs-toggle="tab" href="#tab-additional_information">Additional
                                        information</a></li>
                                <li><a data-bs-toggle="tab" href="#tab-reviews">Reviews (3)</a></li>
                            </ul>
                            <div class="tab-content product-infor-tab-content">
                                <div class="tab-pane fade show active" id="tab-description">
                                    <div class="row">
                                        <div class="col-lg-10 col-12 mx-auto">
                                            <p>With the stability and safety of having a three wheels；durable 6061
                                                aluminum alloy frame; suspension fork cushions the ride when you
                                                encounter bumps. The 750w motor has excellent power to reach speeds up
                                                to 23 mph and with a single charge of the battery the bike can run up to
                                                40-55 miles using level one pedal assist.</p>
                                            <p>It can carry adults weighing close to 350 lbs, making it an ideal option
                                                for larger riders. Oversized rear basket cargo is perfect for picnics,
                                                storing your groceries and shopping duties or giving your favorite pet a
                                                ride. Make your trips more convenient. The front basket gives you more
                                                places to put more items, and you can more easily take out items from
                                                the front basket while riding, making your trip more perfect.</p>
                                            <p>Due to the controllability of electric trike is stronger than the normal
                                                electric bike. Please test the bike in the secure room, garden, or
                                                square for 2 hours before rode it on the road, pavement, hills, and
                                                beach etc.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-pwb_tab">
                                    <div class="row learts-mb-n30">
                                        <div class="col-12 learts-mb-30">
                                            <div class="row learts-mb-n10">
                                                <div class="col-lg-2 col-md-3 col-12 learts-mb-10"><img
                                                        src="assets/images/brands/brand-4.webp" alt=""></div>
                                                <div class="col learts-mb-10">
                                                    <p>Most people are not ready to immediately buy upon seeing an
                                                        online ad or visiting a new website about eCommerce. But that’s
                                                        not the story with us. We are here to take the lead and tackle
                                                        all challenges. By retargeting the subject, we’ve been able to
                                                        reach out to more customers worldwide and become one of the most
                                                        favored brands in the industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 learts-mb-30">
                                            <div class="row learts-mb-n10">
                                                <div class="col-lg-2 col-md-3 col-12 learts-mb-10"><img
                                                        src="assets/images/brands/brand-6.webp" alt=""></div>
                                                <div class="col learts-mb-10">
                                                    <p>We have recently started over a brand’s Facebook Ad campaign, and
                                                        on average we have received a 409% return on our investment.
                                                        Thanks to some Facebook retargeting campaigns, the number is
                                                        reaching up to 777%! We have set an example for other brands
                                                        about how digital marketing has helped to skyrocket the sales in
                                                        the fashion industry.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-additional_information">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-10 col-12 mx-auto">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Size</td>
                                                            <td>Large, Medium, Small</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Color</td>
                                                            <td>Black, White</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-reviews">
                                    <div class="product-review-wrapper">
                                        <span class="title">3 reviews for Motorized Tricycle</span>
                                        <ul class="product-review-list">
                                            <li>
                                                <div class="product-review">
                                                    <div class="thumb"><img src="assets/images/review/review-1.webp"
                                                            alt=""></div>
                                                    <div class="content">
                                                        <div class="ratings">
                                                            <span class="star-rating">
                                                                <span class="rating-active"
                                                                    style="width: 100%;">ratings</span>
                                                            </span>
                                                        </div>
                                                        <div class="meta">
                                                            <h5 class="title">Edna Watson</h5>
                                                            <span class="date">November 27, 2020</span>
                                                        </div>
                                                        <p>Thanks for always keeping your WordPress themes up to date.
                                                            Your level of support and dedication is second to none.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-review">
                                                    <div class="thumb"><img src="assets/images/review/review-2.webp"
                                                            alt=""></div>
                                                    <div class="content">
                                                        <div class="ratings">
                                                            <span class="star-rating">
                                                                <span class="rating-active"
                                                                    style="width: 80%;">ratings</span>
                                                            </span>
                                                        </div>
                                                        <div class="meta">
                                                            <h5 class="title">Scott James</h5>
                                                            <span class="date">November 27, 2020</span>
                                                        </div>
                                                        <p>Thanks for always keeping your WordPress themes up to date.
                                                            Your level of support and dedication is second to none.</p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-review">
                                                    <div class="thumb"><img src="assets/images/review/review-3.webp"
                                                            alt=""></div>
                                                    <div class="content">
                                                        <div class="ratings">
                                                            <span class="star-rating">
                                                                <span class="rating-active"
                                                                    style="width: 60%;">ratings</span>
                                                            </span>
                                                        </div>
                                                        <div class="meta">
                                                            <h5 class="title">Owen Christ</h5>
                                                            <span class="date">November 27, 2020</span>
                                                        </div>
                                                        <p>Good Product!</p>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <span class="title">Add a review</span>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Single Products Infomation Section End -->

                    <!-- Recommended Products Section Start -->
                   
                    <!-- Recommended Products Section End -->
                    < <?php include("footer.php") ?> <!-- Root element of PhotoSwipe. Must have class pswp. -->
                        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                            <!-- Background of PhotoSwipe. 
         It's a separate element as animating opacity is faster than rgba(). -->
                            <div class="pswp__bg"></div>

                            <!-- Slides wrapper with overflow:hidden. -->
                            <div class="pswp__scroll-wrap">

                                <!-- Container that holds slides. 
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
                                <div class="pswp__container">
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                    <div class="pswp__item"></div>
                                </div>

                                <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                <div class="pswp__ui pswp__ui--hidden">

                                    <div class="pswp__top-bar">

                                        <!--  Controls are self-explanatory. Order can be changed. -->

                                        <div class="pswp__counter"></div>

                                        <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                                        <button class="pswp__button pswp__button--share" title="Share"></button>

                                        <button class="pswp__button pswp__button--fs"
                                            title="Toggle fullscreen"></button>

                                        <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                                        <div class="pswp__preloader">
                                            <div class="pswp__preloader__icn">
                                                <div class="pswp__preloader__cut">
                                                    <div class="pswp__preloader__donut"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                        <div class="pswp__share-tooltip"></div>
                                    </div>

                                    <button class="pswp__button pswp__button--arrow--left"
                                        title="Previous (arrow left)">
                                    </button>

                                    <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                                    </button>

                                    <div class="pswp__caption">
                                        <div class="pswp__caption__center"></div>
                                    </div>

                                </div>

                            </div>

                        </div>



                        <?php include("footrlinks2.php") ?>




                        <!-- Mirrored from template.hasthemes.com/learts/learts/product-details-360.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:21:41 GMT -->

</html>