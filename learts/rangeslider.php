<?php
$con = mysqli_connect("localhost", "root", "", "e_project");


/* Range */
$min = $_POST['min'];
$max = $_POST['max'];

/* Query */
$query = 'select * from makeup_products where price>='.$min.' and price<='.$max.' limit 12';
$result = mysqli_query($con, $query);

$html = '';
while( $row=mysqli_fetch_array($result) ){



  echo  "<li class='product' id='js-add'  data-product=" . $row['product_name'] . " data-price=" . $row['price']  . ">";
  echo "<div class=thumbnail'>";
      echo"<img src=../learts/products-images/".$row['images']." height='100px' width='100px'>";

    echo "</div>";
   echo"<div class='content'>";
   echo "<h6 class='title' style='text-transform: capitalize;'>" ."&nbsp". $row['product_name'] . "</h6>";
   echo "<span class='price'>"
     ."&nbsp"."Rs: ". $row['price']."/=".
       "</span>";
       if ($row['status'] == 'sale') {

        echo  "<div class='product-buttons' style='padding-left:20px;color:red;'>";
        
       echo "<a href='cart.php?id=".$row['id']."' class='product-button hintT-top' data-hint='Add to Cart'><i
                class='fal fa-shopping-cart'></i></a>";
                echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>";

        "</div>";
        
    } else if ($row['status'] == 'out') {
       echo "<div class='product-buttons' style='padding-left:20px;color:red;'>
        <a class='product-button hintT-top' data-hint='Not Accessible'><i
                class='fal fa-frown'></i></a>";
                echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>

       
        
        </div>";
         }
        else {
        echo "<div class='product-buttons' style='padding-left:20px;color:red'>
       
        <a href='cart.php?id=".$row['id']."' class='product-button hintT-top' data-hint='Add to Cart'><i
                class='fal fa-shopping-cart'></i></a>";
                echo "<a href='single.php?id=".$row['id']."' class='product-button hintT-top' data-hint='More'><i class='fal fa-random'></i></a>

        
        </div>";
        }


    echo "</div>";
     echo"</li>";



}






















