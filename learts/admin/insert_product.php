<?php
session_start();
require_once("../model/crud.php");
require_once("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
    redirect("login.php");
}


if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $targetDir = "products-images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    $var_name = $_POST["name"];

    $var_status = $_POST["status"];
    $var_category = $_POST["category"];
    $var_price = $_POST["price"];
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $result = query_exec("INSERT INTO `makeup_products`(`product_name`, `mk_cat_id`,`price`,`status`, `images`) 
    VALUES ('$var_name','$var_category','$var_price','$var_status', '$fileName')");
        };
    };
}





?>


<?php include("headerlinks.php") ?>

<body>

    <?php include("header.php") ?>


    <main class="main-wrap">
        <?php include("headerr.php") ?>


        <section class="content-main" style="max-width: 720px">

            <div class="content-header">
                <h2 class="content-title">Create product </h2>
                <div>
                    <a href="product_view.php" class="btn btn-outline-danger"> &times; Discard</a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="insert_product.php" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Product title</label>
                            <input type="text" placeholder="Type here" name="name" class="form-control" id="product_name" required autocomplete="off">
                        </div>



                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <input class="form-control" name="file" type="file">
                        </div>

                        <div class="mb-4">
                            <label for="product_name" class="form-label">Status</label>
                            <input type="text" name="status" class="form-control" autocomplete="off">
                        </div>

                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category" required autocomplete="off">
                                    <optgroup label="select category">
                                    <option value="0">All Categories</option>
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

                        </div> <!-- row.// -->


                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <div class="row gx-2">
                                <div class="col-4">
                                    <input placeholder="Type" name="price" type="text" class="form-control" required autocomplete="off">
                                </div>

                            </div> <!-- row.// -->
                        </div>

                        <label class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" required>
                            <span class="form-check-label"> Publish on website </span>
                        </label>

                        <button class="btn btn-primary" type="submit" name="submit">Submit item</button>

                    </form>
                </div>
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

<!-- Mirrored from www.ecommerce-admin.com/demo/page-form-product-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:03 GMT -->

</html>