<?php
session_start();
include("../model/crud.php");
include("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
	redirect("login.php");
}

if (isset($_GET["id"])) {

	$var_id = $_GET["id"];
	$query = "DELETE from makeup_products where makeup_products.id='$var_id'";
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
				<h2 class="content-title">Products View</h2>
				<div>


					<a href="insert_product.php" class="btn btn-primary">Create new</a>
				</div>
			</div>

			<div class="card mb-4">
				<form class="searchform" method="post" action="product_view.php">
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
				
				<!-- card-header end// -->
				<div class="card-body">

					<div class="row gx-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-5">
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
						$query = "select makeup_products.product_name, makeup_products.id, makeup_products.images, makeup_products.status, makeup_products.price,makeup_category.category_type from makeup_products inner join makeup_category on makeup_products.mk_cat_id = makeup_category.id LIMIT $start_from, $num_rec_per_page";
						$result = query_exec($query);
						if (isset($_POST["submit"]) && $_POST["search"] != "") {
							$text = $_POST["search"];
							$query = "SELECT * FROM `makeup_products`
							 WHERE product_name like '%$text%'";
							$result = query_exec($query);
						} else if (isset($_POST["fetch"]) && $_POST["status"] != "") {
							$get = $_POST["status"];
							$query = "SELECT * FROM `makeup_products`where status='$get'";
							$result = query_exec($query);
						
						} else {
							$query = "SELECT * FROM `makeup_products`";
							$result = query_exec($query);
						}
						while ($rows_cat = mysqli_fetch_array($result)) {

						?>

							<div class="col">
								<div class="card card-product-grid">
									<a href="#" class="img-wrap"> <img src="products-images/<?php echo $rows_cat["images"] ?>" alt="Product"> </a>
									<div class="info-wrap">
										<a href="#" class="title text-truncate"><?php echo $rows_cat["product_name"] ?></a>
										<div class="price mb-2">RS:<?php echo $rows_cat["price"] ?></div> <!-- price.// -->
										<?php
										if ($rows_cat["status"] == "sale") {
										?>
											<div class="price mb-2" style="color:green;font-weight:bold;font-size:20px">
												<?php echo $rows_cat["status"] ?></div>
										<?php } else if ($rows_cat["status"] == "out") {  ?>
											<div class="price mb-2" style="color:red;font-weight:bold;font-size:20px">Out Of
												Stock</div>

										<?php } else { ?>
											<div class="price mb-2"><?php echo $rows_cat["status"] ?></div>

										<?php } ?>
										<!-- price.// -->

										<!-- <a href="product_update.php?u_id=<?php echo $rows_cat["id"] ?>" data-bs-toggle="dropdown" class="btn btn-sm btn-light">
											<i class="material-icons md-edit"></i> Edit
										</a> -->
										<a href="product_update.php?u_id=<?php echo $rows_cat['id'] ?>" class="btn btn-success">Edit Info</a>

										<a href="product_view.php?u_id=<?php echo $rows_cat['id'] ?>" class="btn btn-danger">Delete </a>


									</div>
								</div> <!-- card-product  end// -->
							</div> <!-- col.// -->
						<?php } ?>
					</div> <!-- col.// -->
				</div> <!-- row.// -->



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
						echo "<a href='product_view.php?page=" . $i . "' class='btn btn-sm btn-primary' >" . $i . "</a> ";
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

<!-- Mirrored from www.ecommerce-admin.com/demo/page-products-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:01 GMT -->

</html>