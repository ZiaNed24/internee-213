<?php
$text = $_REQUEST["name"];
$con = mysqli_connect("localhost", "root", "", "e_project");
$query = "SELECT * FROM `makeup_products` WHERE product_name like '%$text%'";
$result = mysqli_query($con, $query);
if (isset($_REQUEST["name"])) {

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            echo"
            <div class='grid-item col category'>";
            echo "<div class='product'>";
   echo "<div class='product-thumb'>";
   " <a href='product-details.html' class='image'>";
   echo"<img src=../learts/products-images/".$row['images']. " height='250px' width='300px' >";
   echo    "</a>";
   echo "</div>";
   echo "<div class='product-info'>";
   echo    "<h6 class='title'>" ."&nbsp". $row['product_name'] ."</h6>";
   echo    "<span class='price'>"
     ."&nbsp"."Rs: ". $row['price']."/=".
         "</span>";


         if ($row['status'] == 'sale') {

     echo    "<div class='product-buttons'>";
      echo  " <a href='cart.php?id=".$row['id']."' class='product-button hintT-top' data-hint='Add to Cart'><i class='fal fa-shopping-cart'></i></a>";
      echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>

      </div>";
         }
         else if ($row['status'] == 'out') {
            echo "<div class='product-buttons'>
             <a class='product-button hintT-top' data-hint='Not Accessible'><i
                     class='fal fa-frown'></i></a>";
            echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>

             
             </div>";
              }
              else {
                echo "<div class='product-buttons'>
               
                <a href='cart.php?id=".$row['id']."' class='product-button hintT-top' data-hint='Add to Cart'><i
                        class='fal fa-shopping-cart'></i></a>";
                        echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>

                
                </div>";
                }

     echo " </div>";
     echo"</div>";
     echo"</div>";


        }

    } else {
        echo "<td></td><td>No Products found!</td><td></td>";
    }
}
else{
    $query = "SELECT * FROM `makeup_products limit 6`";
    $result = mysqli_query($con, $query);
   

}