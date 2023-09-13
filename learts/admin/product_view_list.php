<?php
session_start();
include("../model/crud.php");
include("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
    redirect("login.php");
}

if (isset($_GET["id"])) {

    $var_id = $_GET["id"];
    $query = "DELETE from jewelery_products where jewelery_products.id='$var_id'";
    $result = query_exec($query);
}

?>




<?php include("headerlinks.php") ?>

<body>

    <?php include("header.php") ?>


    <main class="main-wrap">
        <?php include("headerr.php") ?>

        <section class="content-main">

            <div class="content-header">
                <h2 class="content-title">Products list </h2>
                <div>
                    <a href="jew_product_insert.php" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
                </div>
            </div>

            <div class="card mb-4">
                <form class="searchform" method="post" action="product_view_list.php">
                    <header class="card-header">
                        <div class="row gx-3">
                            <div class="col-lg-4 col-md-6 me-auto">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search Product" autocomplete="off">
                                    <button class="btn btn-light bg" name="submit" type="submit"> <i class="material-icons md-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6 col-md-3">
                                <div class="input-group">
                                    <select class="form-select" name="status">
                                        <option value="">Status</option>
                                        <option value="sale">Sale</option>
                                        <option value="out">Out</option>
                                    </select>
                                    <button class="btn btn-light bg" name="fetch" type="submit"> <i class="material-icons md-search"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </header>
                </form>

                <div class="card-body">
                    <?php
                    $num_rec_per_page = 20;
                    $done = 0;
                    $result = "";

                    if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                    } else {
                        $page = 1;
                    }
                    $start_from = ($page - 1) * $num_rec_per_page;
                    $result = query_exec("select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id LIMIT $start_from, $num_rec_per_page");
                    if (isset($_POST["submit"]) && $_POST["search"] != "") {
                        $text = $_POST["search"];
                        $query = "select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id WHERE jewelery_products.name like '%$text%'";
                        $result = query_exec($query);
                    } else if (isset($_POST["fetch"]) && $_POST["status"] != "") {
                        $get = $_POST["status"];
                        $query = "select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id where jewelery_products.jew_status='$get'";
                        $result = query_exec($query);
                    } else {
                        $query = "select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id ";
                        $result = query_exec($query);
                    }
                    while ($rows_cat = mysqli_fetch_array($result)) {

                    ?>
                        <article class="itemlist">
                            <div class="row align-items-center">

                                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="jewellery images/<?php echo $rows_cat["jew_images"] ?>" class="img-sm img-thumbnail" alt="Item">
                                        </div>
                                        <div class="info">
                                            <h6 class="mb-0"><?php echo $rows_cat["name"] ?></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-price"> <span>Rs: <?php echo $rows_cat["jew_price"] ?></span> </div>


                                <?php
                                if ($rows_cat["jew_status"] == "sale") {
                                ?>
                                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                                        <span class="badge rounded-pill alert-success">Sale</span>
                                    </div>
                                <?php } else if ($rows_cat["jew_status"] == "out") {
                                ?>
                                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                                        <span class="badge rounded-pill alert-danger">Out</span>
                                    </div>


                                <?php } else { ?>

                                    <div class="col-lg-2 col-sm-2 col-4 col-status">
                                        <span class="badge rounded-pill alert-danger">Not</span>
                                    </div>

                                <?php } ?>




                                <div class="col-lg-2 col-sm-2 col-4 col-date">
                                    <span><?php echo $rows_cat["jewelery_name"] ?> &nbsp;(<?php echo $rows_cat["jewelery_brand"] ?>)</span>
                                </div>

                                <div class="col-lg-1 col-sm-2 col-4 col-action">
                                    <div class="dropdown float-end">
                                        <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="jew_update.php?u_id=<?php echo $rows_cat['id'] ?>">Edit info</a>
                                            <a class="dropdown-item text-danger" href="product_view_list.php?id=<?php echo $rows_cat['id'] ?>">Delete</a>
                                        </div>
                                    </div> <!-- dropdown // -->
                                </div>
                            </div> <!-- row .// -->
                        </article>
                    <?php } ?>


                    <?php
                    $sql = "select jewelery_products.*,jewelery_sub.jewelery_name,jewelery_sub.jewelery_brand,jewelery_sub.jew_discount from jewelery_products inner join jewelery_sub on jewelery_products.jew_sub_id = jewelery_sub.id";

                    $conn = mysqli_connect('localhost', 'root', '', 'e_project');

                    $rs_result = mysqli_query($conn, $sql); //run the query
                    $total_records = mysqli_num_rows($rs_result);  //06
                    $total_pages = ceil($total_records / $num_rec_per_page);

                    ?>

                    <div class="text-center learts-mt-70">
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<a href='product_view_list.php?page=" . $i . "' class='btn btn-sm btn-primary' >" . $i . "</a> ";
                        };
                        ?>
                    </div>

                </div> <!-- card-body end// -->
            </div> <!-- card end// -->


        </section> <!-- content-main end// -->
    </main>


    <script>
        if (localStorage.getItem("darkmode")) {
            var body_el = document.body;
            body_el.className += 'dark';
        }
    </script>

    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="js/scriptc619.js?v=1.0"></script>

</body>

<!-- Mirrored from www.ecommerce-admin.com/demo/page-products-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:01 GMT -->

</html>