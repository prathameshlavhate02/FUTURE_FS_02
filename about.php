<?php

include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>About Us - Royal Paytan</title>

   <!-- font awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="flex">

      <div class="image">
         <img src="images/about.jpg" alt="Royal Paytan Kolhapuri Products">
      </div>

      <div class="content">
         <h3>Why Choose Royal Paytan?</h3>
         <p>
            1. <strong>Authentic Kolhapuri Taste:</strong> At Royal Paytan, we bring you the bold, rich, and spicy essence of Kolhapur through our specially crafted Paytan products.<br>
            2. <strong>Premium Ingredients:</strong> Our products are made with handpicked, high-quality ingredients and traditional recipes passed down through generations.<br>
            3. <strong>Hygienic & Fresh:</strong> Every product is prepared and packed under strict hygiene standards to maintain freshness and flavor.<br>
            4. <strong>Fast & Reliable Delivery:</strong> Get your favorite Paytan items delivered to your doorstep quickly and safely.<br>
         </p>
         <a href="contact.php" class="btn">Contact Us</a>
      </div>

   </div>

</section>
<section class="reviews">

   <h1 class="title">What Our Customers Say</h1>

   <div class="box-container">

      <div class="box">
         <p>"Royal Paytan’s taste took me straight to Kolhapur! The mutton paytan was so flavorful and authentic. Packaging and delivery were spot on. Highly recommended!"</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
         </div>
         <h3>Rajesh Chaudhary</h3>
      </div>

      <div class="box">
         <p>"I loved the spice blend. Truly authentic Kolhapuri heat and aroma. The Paytan Masala is a must-buy for anyone who craves real flavors."</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Vatsal Bhavsar</h3>
      </div>

      <div class="box">
         <p>"Royal Paytan has become a staple in my kitchen. The Kolhapuri tambda and pandhra rassa masalas are incredibly flavorful. 5/5 for taste and quality."</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Vishvendra Pratap Singh</h3>
      </div>

      <div class="box">
         <p>"The packaging could be improved, but the product quality is undeniably excellent. You won’t find this level of flavor in regular stores."</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Ravnit Singh</h3>
      </div>

      <div class="box">
         <p>"Loved the fast delivery and authenticity of taste. Would love to see more variety in non-veg gravies and dry masalas. Keep up the good work!"</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Aashish Mishra</h3>
      </div>

      <div class="box">
         <p>"Royal Paytan brings Kolhapur to your kitchen. Every spice blend I’ve tried so far is a flavor bomb. Perfect for home cooks who want that dhaba-style touch."</p>
         <div class="stars">
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
            <i class="fas fa-star"></i><i class="fas fa-star"></i>
         </div>
         <h3>Sudhanshu Ranjan</h3>
      </div>

   </div>

</section>


<?php include 'footer.php'; ?>

<!-- custom js -->
<script src="js/script.js"></script>

</body>
</html>
