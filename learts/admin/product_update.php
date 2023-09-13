<?php
session_start();
include("../model/crud.php");
include("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
    redirect("login.php");
}
if (isset($_GET["u_id"])) {
    $id = $_GET["u_id"];
    $result = query_exec("select makeup_products.product_name, makeup_products.id, makeup_products.images, makeup_products.status, makeup_products.price,makeup_category.category_type,makeup_category.discount from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id WHERE makeup_products.id='$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    redirect("product_view.php");
}








if (isset($_POST["submit"])) {
    $var_id = $_POST["id"];
    $var_name = $_POST["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
    $location1 = $_FILES["image"]["name"];

    $var_category = $_POST["category"];
    $var_price = $_POST["price"];
    $var_status = $_POST["status"];
    $result = query_exec("
    UPDATE `makeup_products` SET `mk_cat_id`='$var_category',`product_name`='$var_name',`images`='$location1',`price`='$var_price',`status`='$var_status' WHERE id='$var_id'");
    $row = mysqli_fetch_assoc($result);
}



?>




<?php include("headerlinks.php") ?>

<body>

    <?php include("header.php") ?>


    <main class="main-wrap">
        <?php include("headerr.php") ?>


        <section class="content-main" style="max-width:920px">

            <div class="content-header">
                <h2 class="content-title">Add product</h2>
            </div>
            <form method="post" action="product_update.php" enctype="multipart/form-data">

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>1. General info</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <input type="hidden" name="id" value="<?php echo $row["id"] ?>" placeholder="Type here" class="form-control">

                                    <label class="form-label">Product title</label>
                                    <input type="text" name="name" value="<?php echo $row["product_name"] ?>" placeholder="Type here" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <a href="#" name="image_p" class="img-wrap"> <img src="products-images/<?php echo $row["images"] ?>" height="200px" width="200px" alt="Product"> </a>
                                    <input type="file" name="image" style="margin-top:-115px;">

                                </div>
                                <div class="mb-4" style="max-width:250px;">
                                    <select class="form-select" name="category" required autocomplete="off">
                                        <optgroup label="select category">
                                            <option value="<?php echo $row["id"] ?>"><?php echo $row["category_type"] ?></option>
                                            <?php
                                            $cat_query = "select * from makeup_category";
                                            $result = query_exec($cat_query);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($cat_row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $cat_row["id"] ?>"><?php echo $cat_row["category_type"] ?></option>
                                            <?php
                                                }
                                            }



                                            ?>



                                        </optgroup>
                                    </select>

                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->

                        <hr class="mb-4 mt-0">

                        <div class="row">
                            <div class="col-md-4">
                                <h6>2. Pricing</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4" style="max-width:250px;">
                                    <label class="form-label">Cost in USD</label>
                                    <input name="price" type="text" value="<?php echo $row["price"] ?>" placeholder="00.0" class="form-control">
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->

                        <hr class="mb-4 mt-0">

                        <div class="row">
                            <div class="col-md-4">
                                <h6>2. Status</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4" style="max-width:250px;">
                                    <label class="form-label">Status</label>
                                    <input name="status" type="text" value="<?php echo $row["status"] ?>" placeholder="00.0" class="form-control">
                                </div>
                            </div> <!-- col.// -->
                        </div>
                        <! <hr class="mb-4 mt-0">

                            <!-- <div class="row">
                            <div class="col-md-4">
                                <h6>4. Media</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label class="form-label">Images</label>
                                    <input class="form-control" type="file">
                                </div>
                            </div> 
                        </div> -->
                            <!-- .row end// -->
                            <hr class="mb-4 mt-0">

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-light">Save as draft</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save and activate </button>
                            </div>
                    </div>
                </div> <!-- card end// -->


            </form>
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

<!-- Mirrored from www.ecommerce-admin.com/demo/page-form-product-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:03 GMT -->

</html>