<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1; // Default quantity

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($check_cart_numbers) > 0) {
      $message[] = 'already added to cart!';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php include 'header.php'; ?>

   <section class="home right">
      <div class="banner-container">
         <img src="images/banner1.jpg" class="banner active" alt="Banner 1">
         <img src="images/banner2.webp" class="banner" alt="Banner 2">
         <img src="images/banner3.avif" class="banner" alt="Banner 3">
      </div>

      <div class="content">
         <h1>KOLHAPUR CHHAPAL : ROYAL PAYTAN</h1>
         <p>Experience the unmatched essence of Kolhapur. Where tradition meets taste—every bite is a legacy of flavor.
            Discover the purity, embrace the heritage, and elevate your plate with Royal Paytan.</p>
         <a href="shop.php" class="white-btn">Explore More</a>
      </div>
   </section>

   <!-- Latest Products Section -->
   <section class="products">
      <h1 class="title">Latest Products</h1>

      <div class="box-container">
         <?php
         $select_products = mysqli_query($conn, "SELECT * FROM `products` ORDER BY id DESC LIMIT 6") or die('query failed');

         if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_products = mysqli_fetch_assoc($select_products)) {

               $price = $fetch_products['price'];
               $discount = $fetch_products['discount_percent'];
               $old_price = ($discount > 0) ? round($price / (1 - $discount / 100)) : 0;
               $is_popular = $fetch_products['is_popular'];
               $is_bestseller = $fetch_products['is_bestseller'];
         ?>
               <form action="" method="post" class="box">
                  <div class="product-card">
                     <div class="image-wrapper">
                        <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">

                        <?php if ($discount > 0): ?>
                           <span class="badge discount">Save <?php echo $discount; ?>%</span>
                        <?php endif; ?>

                        <?php if ($is_popular): ?>
                           <span class="badge popular">Popular</span>
                        <?php endif; ?>

                        <?php if ($is_bestseller): ?>
                           <span class="badge bestseller">Best Seller</span>
                        <?php endif; ?>
                     </div>

                     <div class="info">
                        <h3 class="name"><?php echo $fetch_products['name']; ?></h3>

                        <div class="price-block">
                           <span class="new-price">₹<?php echo $price; ?>.00</span>
                           <?php if ($discount > 0): ?>
                              <span class="old-price">₹<?php echo $old_price; ?>.00</span>
                           <?php endif; ?>
                        </div>

                        <!-- Removed quantity input -->
                        <input type="hidden" name="product_quantity" value="1">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $price; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                        <input type="submit" value="Add to Cart" name="add_to_cart" class="btn">
                     </div>
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">No products added yet!</p>';
         }
         ?>
      </div>
   </section>

   <section class="collections">
      <h1 class="title">Our Collections</h1>

      <div class="collections-container">

         <div class="collection-box">
            <a href="shop.php?category=antique">
               <img src="images/collection/collection1.webp" alt="Antique Kolhapuri Collection">
               <h3>Antique Kolhapuri Collection</h3>
            </a>
         </div>

         <div class="collection-box">
            <a href="shop.php?category=antique">
               <img src="images/collection/collection2.jpeg" alt="Kolhapuri for Men">
               <h3>Kolhapuri for Men</h3>
            </a>
         </div>

         <div class="collection-box">
            <a href="shop.php?category=antique">
               <img src="images/collection/collection3.jpg" alt="Pure Leather Kolhapuri">
               <h3>Explore Authentic Pure Leather<br>Kolhapuri Chappals</h3>
            </a>
         </div>

         <div class="collection-box">
            <a href="shop.php?category=antique">
               <img src="images/collection/collection4.webp" alt="Casual Kolhapuri Collection">
               <h3>Casual Kolhapuri Collection</h3>
            </a>
         </div>

         <div class="collection-box">
            <a href="shop.php?category=antique">
               <img src="images/collection/collection5.jpeg" alt="Cross Belt Kolhapuri">
               <h3>Cross Belt Kolhapuri Chappal<br>for Men</h3>
            </a>
         </div>

      </div>
   </section>

   <section class="about">
   <div class="flex">
      <div class="image">
         <img src="images/about.jpg" alt="Royal Paytan">
      </div>

      <div class="content">
         <h3>About Royal Paytan</h3>
         <p>"Welcome to Royal Paytan – your trusted destination for authentic Kolhapuri Paytan products. Rooted in tradition and crafted with passion, we bring you the finest selection of Paytan blends, flavors, and ready-to-eat delights. At Royal Paytan, we believe in preserving cultural taste while delivering unmatched quality and freshness. Whether you're a food lover or a curious explorer of regional cuisines, experience the richness of Kolhapur in every bite."</p>
         <a href="about.php" class="btn">Read More</a>
      </div>
   </div>
</section>


   <section class="home-contact">
      <div class="content">
         <h3>have any questions?</h3>
         <p>If you have any question about the items then you are free to contact to our managing team i.e. given below.</p>
         <a href="contact.php" class="white-btn">contact us</a>
      </div>
   </section>

   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>
   <script>
      let currentBanner = 0;
      const banners = document.querySelectorAll('.banner');

      setInterval(() => {
         banners[currentBanner].classList.remove('active');
         currentBanner = (currentBanner + 1) % banners.length;
         banners[currentBanner].classList.add('active');
      }, 4000);
   </script>

</body>

</html>
