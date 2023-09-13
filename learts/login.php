<?php
session_start();

require_once("model/crud.php");
require_once("model/helpermethod.php");
$error_msg = "";
if (isset($_POST["submit"])) {

    $var_email = $_POST["email"];
    $var_password = $_POST["password"];

    $login_result = fetch_row("registration_tb", array("email_address" => $var_email, "password" => $var_password,"role"=>"0"));
    $rows = mysqli_fetch_assoc($login_result);

    if (mysqli_num_rows($login_result) > 0) {
        if ($rows["email_address"] == $var_email && $rows["password"] == $var_password) {
            $_SESSION["id"] = $rows['id'];
            $_SESSION["user"] = $rows["email_address"];
            if($rows["role"]=="0"){
				redirect("account.php");
			}else{
				redirect("login.php");	
			}


            // $_SESSION["user"] = array("id"=> $rows["id"], "email_address" => $rows["email_address"]);
            // if($rows["role"]=="0"){
            // 	redirect("home.php");
            // }else{
            // 	redirect("admin/order.php");	
            // }
        
        }
    } else {
        //alert_message("Invalid username or password");
        $error_msg = "incorrect username or password";
    }
}
//  if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["remember"])){
//     $var_email = $_POST["email"];
//     $var_password = $_POST["password"];
// setcookie('username', $var_email,time()+100);
// setcookie('password',$var_password ,time()+20);
// setcookie('checkbox','checked',time()+100);
// header(('location:home.php'));


//  }








?>



<?php include("headerlinks2.php") ?>

<body>

    <center>


        <!-- Login & Register Section Start -->
        <div class="section section-padding">
            <div class="container">
                <div class="row g-0">
                    <div class="col-lg-12">
                        <div class="user-login-register bg-light">
                            <div class="login-register-title">
                                <h2 class="title">Login</h2>
                                <p class="desc">Great to have you back!</p>
                            </div>
                            <div class="login-register-form">
                                <form action="login.php" method="post">
                                    <div class="row learts-mb-n50">
                                        <div class="col-12 learts-mb-50">
                                            <input type="email" name="email"
                                                value="<?php if(isset($_COOKIE["username"])){echo $_COOKIE["username"];}?>"
                                                placeholder="Username or email address" autocomplete="off" required>
                                        </div>
                                        <div class="col-12 learts-mb-50">
                                            <input type="password"
                                                value="<?php if(isset($_COOKIE["password"])){echo $_COOKIE["password"];}?>"
                                                name="password" placeholder="Password" autocomplete="off" require>
                                        </div>
                                        <h5 style="color:red"><?php echo $error_msg ?></h5>
                                        <br>
                                        <div class="col-12 text-center learts-mb-50">
                                            <button type="submit" name="submit"
                                                class="btn btn-dark btn-outline-hover-dark">login</button>
                                        </div>
                                        <div class="col-12 learts-mb-50">
                                            <div class="row learts-mb-n20">
                                                <div class="col-12 learts-mb-20">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="remember"
                                                            value="<?php if(isset($_COOKIE["checkbox"])){echo $_COOKIE["checkbox"];}?>"
                                                            class="form-check-input" id="rememberMe" checked>
                                                        <label class="form-check-label" for="rememberMe">Remember
                                                            me</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 learts-mb-20">
                                                    <a href="registration.php" class="fw-400">Don't Register
                                                        Account???</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </center>
    <!-- Login & Register Section End -->

    <?php include("footer.php") ?>

    <?php include("footerlinks.php") ?>


</body>


</html>