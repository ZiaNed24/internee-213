<?php

session_start();
include("../model/crud.php");
include("../model/helpermethod.php");
if (!isset($_SESSION["admin"])) {
    redirect("login.php");
}

include("headerlinks.php") ?>

<body>

    <?php include("header.php") ?>


    <main class="main-wrap">
        <?php include("headerr.php") ?>

        <section class="content-main">
            <div class="content-header">
                <h2 class="content-title"> Dashboard </h2>
                <div>
                    <a href="index.php" class="btn btn-primary">Backup Database</a>
                </div>

            </div>
            <div class="content-header">
                <form class="form-inline" method="post" action="generate_pdf.php">
                    <button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden=" true"></i>
                        Generate Report Of Makeup</button>
                </form>
                <form class="form-inline" method="post" action="jew_report.php">
                    <button type="submit" id="pdf" name="jew_report" class="btn btn-primary"><i class="fa fa-pdf"" aria-hidden=" true"></i>
                        Generate Report Of jewelery</button>
                </form>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                            <div class="text">
                                <h6 class="mb-1">Total Sales</h6> <span>$19,626,058.20</span>
                            </div>
                        </article>

                    </div> <!-- card  end// -->
                </div> <!-- col end// -->
                <div class="col-lg-4">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                            <div class="text">
                                <h6 class="mb-1">Total Orders</h6> <span>87790</span>
                            </div>
                        </article>
                    </div> <!-- card end// -->
                </div> <!-- col end// -->
                <div class="col-lg-4">
                    <div class="card card-body mb-4">
                        <article class="icontext">
                            <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-shopping_basket"></i></span>
                            <div class="text">
                                <h6 class="mb-1">Total Products</h6> <span>5678</span>
                            </div>
                        </article>
                    </div> <!--  end// -->
                </div> <!-- col end// -->
            </div> <!-- row end// -->


            <div class="row">
                <div class="col-xl-8 col-lg-12">
                    <div class="card mb-4">
                        <article class="card-body">
                            <h5 class="card-title">Sale statistics</h5>
                            <canvas height="120" id="myChart"></canvas>
                        </article> <!-- card-body end// -->
                    </div> <!-- card end// -->
                </div> <!-- col end// -->
                <div class="col-xl-4 col-lg-12">
                    <div class="card mb-4">
                        <article class="card-body">

                            <h5 class="card-title">Marketing</h5>


                            <span class="text-muted">Facebook page</span>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 15%">15%
                                </div>
                            </div>

                            <span class="text-muted">Instagram page</span>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 65%">65% </div>
                            </div>

                            <span class="text-muted">Google search</span>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 51%"> 51% </div>
                            </div>


                            <span class="text-muted">Other links</span>
                            <div class="progress mb-3">
                                <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" style="width: 80%"> 80%</div>
                            </div>
                            <br>
                            <a href="#" class="btn btn-light">Open analytics <i class="material-icons md-open_in_new"></i> </a>
                        </article> <!-- card-body end// -->
                    </div> <!-- card end// -->
                </div> <!-- col end// -->
            </div> <!-- row end// -->

 <!-- card end// -->

        </section> <!-- content-main end// -->
    </main>
    <?php include("footerlinks.php") ?>

</body>

</html>