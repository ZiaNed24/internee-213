<?php
session_start();
require_once("../model/crud.php");
require_once("../model/helpermethod.php");

if (isset($_GET["u_id"])) {
    $id =$_GET["u_id"];
    $result = query_exec("select * from makeup_category WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
} else {
    redirect("categories_add.php");
}






 if (isset($_POST["submit"])) {
    $id =$_POST["p_id"];
    $var_name=$_POST["p_name"];
    $var_disc=$_POST["discount"];
    $result = query_exec("UPDATE `makeup_category` SET `category_type`='$var_name',`discount`='$var_disc' WHERE id='$id'");
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

            <div class="card mb-4">
                <form method="post" action="mak_update.php">


                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>1. General info</h6>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-4">
                                <input type="hidden" name="p_id" value="<?php echo $row["id"] ?>" placeholder="Type here" class="form-control">

                                    <label class="form-label">Product title</label>
                                    <input type="text" name="p_name" value="<?php echo $row["category_type"] ?>" placeholder="Type here" class="form-control">
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
                                    <label class="form-label">Discount </label>
                                    <input type="text" name="discount" value="<?php echo $row["discount"] ?>" placeholder="00.0" class="form-control">
                                </div>
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->



                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-light">Save as draft</button>
                            <button  name="submit" type="submit" class="btn btn-primary">Save and activate </button>
                        </div>
                    </div>
                </form>
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

<!-- Mirrored from www.ecommerce-admin.com/demo/page-form-product-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:03 GMT -->

</html>