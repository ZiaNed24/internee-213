<?php
session_start();
require_once("../model/crud.php");
require_once("../model/helpermethod.php");
if (isset($_POST["submit"])) {
    $var_p_name = $_POST["p_name"];
    $var_p_brand = $_POST["p_brand"];
    $var_p_discount = $_POST["p_discount"];
    $query = "INSERT INTO `jewelery_sub`( `jewelery_name`, `jewelery_brand`, `jew_discount`) VALUES ('$var_p_name','$var_p_brand','$var_p_discount')";
    $result = query_exec($query);
    if ($result) {
        redirect("categories_jew.php");
    } else {
        echo "error";
    }
}


if (isset($_GET["id"])) {

    $var_id = $_GET["id"];
    $query = "DELETE FROM `jewelery_sub` WHERE id='$var_id'";
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
                <h2 class="content-title">Categories</h2>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form method="post" action="categories_jew.php">
                                <div class="mb-4">
                                    <input type="hidden" value="<?php echo $rows['id']; ?>" name="p_id" />

                                    <label for="product_name" class="form-label">Name</label>
                                    <input type="text" name="p_name" placeholder="Type here" class="form-control" id="product_name" autocomplete="off" />
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Brand</label>
                                    <input type="text" name="p_brand" placeholder="Type here" class="form-control" id="product_name" autocomplete="off" />
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Discount</label>
                                    <input type="text" name="p_discount" placeholder="Type here" class="form-control" id="product_name" autocomplete="off" />
                                </div>
                                <div class="d-grid">
                                    <button type="submit" name="submit" class="btn btn-primary">Create category</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Brand</th>
                                        <th>Discount</th>

                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $query = "SELECT * FROM `jewelery_sub`";
                                    $result = query_exec($query);
                                    while ($rows = mysqli_fetch_array($result)) { ?>
                                        <tr>

                                           
                                            <td><?php echo $rows["id"] ?></td>
                                            <td><b><?php echo $rows["jewelery_name"] ?></b></td>
                                            <td><?php echo $rows["jewelery_brand"] ?></td>
                                            <td><?php echo $rows["jew_discount"] ?></td>
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <i class="material-icons md-more_horiz"></i> </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="jewellery_update.php?u_id=<?php echo $rows['id'] ?>">Edit info</a>
                                                        <a class="dropdown-item text-danger" href="categories_jew.php?id=<?php echo $rows['id'] ?>">Delete</a>
                                                    </div>
                                                </div>
                                                <!-- dropdown //end -->
                                            </td>
                                        <?php } ?>
                                </tbody>
                            </table>

                        </div> <!-- .col// -->
                    </div> <!-- .row // -->
                </div> <!-- card body .// -->
            </div> <!-- card .// -->
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

<!-- Mirrored from www.ecommerce-admin.com/demo/page-categories.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:01 GMT -->

</html>