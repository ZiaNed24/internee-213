<?php
session_start();
include("../model/crud.php");
include("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
  redirect("login.php");
}
?>
<?php include("headerlinks.php") ?>

<body>

  <?php include("header.php") ?>

  <main class="main-wrap">

    <?php include("headerr.php") ?>
    <section class="content-main">

      <div class="content-header">
        <h2 class="content-title">Users list</h2>
        <div>
          <a href="#" class="btn btn-primary"><i class="material-icons md-plus"></i> Create new</a>
        </div>
      </div>

      <div class="card mb-4">
        <header class="card-header">
          <div class="row gx-3">
            <div class="col-lg-4 col-md-6 me-auto">
              <input type="text" placeholder="Search..." class="form-control">
            </div>
            <div class="col-lg-2 col-md-3 col-6">
              <select class="form-select">
                <option>Status</option>
                <option>Active</option>
                <option>Disabled</option>
                <option>Show all</option>
              </select>
            </div>
            <div class="col-lg-2 col-md-3 col-6">
              <select class="form-select">
                <option>Show 20</option>
                <option>Show 30</option>
                <option>Show 40</option>
              </select>
            </div>
          </div>
        </header> <!-- card-header end// -->
        <div class="card-body">

          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Seller</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Registered</th>
                  <th class="text-end"> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = query_exec("select * from registration_tb where role='0'");
                while ($rows_cat = mysqli_fetch_array($result)) {
                ?>


                  <tr>
                    <td width="40%">
                      <a href="#" class="itemside">
                        <div class="left">
                          <img src="images/people/avatar1.jpg" class="img-sm img-avatar" alt="Userpic">
                        </div>
                        <div class="info pl-3">
                          <h6 class="mb-0 title"><?php echo $rows_cat["u_f_name"] ?></h6>
                          <small class="text-muted">User ID: <?php echo $rows_cat["id"] ?></small>
                        </div>
                      </a>
                    </td>
                    <td><?php echo $rows_cat["email_address"] ?></td>
                    <td><span class="badge rounded-pill alert-success">Active</span></td>
                    <td>08.07.2020</td>
                    <td class="text-end">
                      <a href="#" class="btn btn-light">View</a>
                    </td>
                  </tr>
                <?php } ?>

              </tbody>
            </table> <!-- table-responsive.// -->
          </div>

        </div> <!-- card-body end// -->
      </div> <!-- card end// -->


    </section> <!-- content-main end// -->
  </main>

  <script type="text/javascript">
    if (localStorage.getItem("darkmode")) {
      var body_el = document.body;
      body_el.className += 'dark';
    }
  </script>

  <script src="js/jquery-3.5.0.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- Custom JS -->
  <script src="js/scriptc619.js?v=1.0" type="text/javascript"></script>

</body>

<!-- Mirrored from www.ecommerce-admin.com/demo/page-sellers-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 May 2022 13:57:03 GMT -->

</html>