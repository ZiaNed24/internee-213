<?php
session_start();
require_once("model/crud.php");
require_once("model/helpermethod.php");
if(isset($_POST["submit"])){
$var_f_name=$_POST["f_name"];
$var_l_name=$_POST["l_name"];
$country=$_POST["country"];
$address=$_POST["address"];
$city=$_POST["city"];
$email_address=$_POST["email"];
$company=$_POST["company"];
$phone=$_POST["phone"];
$password=$_POST["password"];
$query="INSERT INTO `registration_tb`(`u_f_name`, `u_l_name`, `country`, `u_address`, `city`, `email_address`, `company`, `phone_number`, `password` ,'role') 
VALUES ('$var_f_name','$var_l_name','$country','$address','$city','$email_address','$company','$phone','$password','0')";
 $result = query_exec($query);
if($result){
redirect("login.php");}
else{
    echo"error";
}


}


?>

<?php include("headerlinks2.php") ?>

<body>
    <br>
    <center>
    <a href="home.php"><img src="assets/images/logo/logo-2.webp" alt="Learts Logo"></a>

    </center>
    <!-- Page Title/Header Start -->
    
    <!-- Page Title/Header End -->

    <!-- Checkout Section Start -->
    <div class="section section-padding">
        <div class="container">

            <div class="section-title2">
                <h2 class="title">Registration</h2>
            </div>
            <form action="registration.php" method="post" class="checkout-form learts-mb-50">
                <div class="row">
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdFirstName">FIrst Name <abbr class="required">*</abbr></label>
                        <input type="text" name="f_name" id="bdFirstName" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdLastName">Last Name <abbr class="required">*</abbr></label>
                        <input type="text" name="l_name" id="bdLastName"required autocomplete="off">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdCompanyName">Company name (optional)</label>
                        <input type="text" name="company"  id="bdCompanyName" autocomplete="off">
                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdCountry">Country <abbr class="required">*</abbr></label>
                        <input type="text" id="country" name="country" placeholder="Country name"required autocomplete="off">

                    </div>
                    <div class="col-12 learts-mb-20">
                        <label for="bdAddress1">Street address <abbr class="required">*</abbr></label>
                        <input type="text" id="bdAddress1" name="address" placeholder="House number and street name"required autocomplete="off">
                    </div>
                   
                    <div class="col-12 learts-mb-20">
                        <label for="bdTownOrCity">Town / City <abbr class="required">*</abbr></label>
                        <input type="text" name="city" id="bdTownOrCity"required autocomplete="off">
                    </div>
                  
                    <div class="col-md-6 col-12 learts-mb-20">
                        <label for="bdEmail">Email address <abbr class="required">*</abbr></label>
                        <input type="email;" name="email" id="bdEmail" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-12 learts-mb-30">
                        <label for="bdPhone">Phone <abbr class="required">*</abbr></label>
                        <input type="tel" name="phone" id="bdPhone" required autocomplete="off">
                    </div>
                    <div class="col-md-6 col-12 learts-mb-30">
                        <label for="password">password <abbr class="required">*</abbr></label>
                        <input type="password" name="password" id="password" required autocomplete="off">
                    </div>
                    <div class="col-12 learts-mb-40">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1" required >Create an account?</label>
                        </div>
                    </div>
                   
                </div>
                <div class="text-center">
                            <p class="payment-note">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
                            <button type="submit" name="submit" class="btn btn-dark btn-outline-hover-dark">Submit</button>
                        </div>
                        <div class="col-12 learts-mb-20">
                                                    <a href="login.php" class="fw-400">Login</a>
                                                </div>
            </form>
           
            
        </div>
    </div>
    <!-- Checkout Section End -->
    <?php include ("footer.php")?>
<?php include("footrlinks2.php") ?>

    

</body>


<!-- Mirrored from template.hasthemes.com/learts/learts/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Oct 2022 11:21:42 GMT -->
</html>