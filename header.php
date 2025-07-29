<?php
if (isset($message)) {
   foreach ($message as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


<header class="header">

   <div class="header-2">
      <div class="flex">

         <!-- Logo with text -->
         <a href="home.php" class="logo">
            <img src="images/logo.jpg" alt="Logo" class="logo-img">
            <span class="logo-text">ROYAL PAYTAN</span>
         </a>

         <!-- Search form -->
         <form action="search_page.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search products..." required>
            <button type="submit" class="fas fa-search"></button>
         </form>

       <!-- User info box -->
<div class="user-box" id="user-box" style="display: none;">
   <?php if (isset($_SESSION['user_id'])): ?>
      <p>Username : <span><?php echo $_SESSION['user_name']; ?></span></p>
      <p>Email : <span><?php echo $_SESSION['user_email']; ?></span></p>
      <a href="logout.php" class="delete-btn">Logout</a>
   <?php else: ?>
      <a href="login.php" class="option-btn">Login</a>
      <a href="register.php" class="btn">Register</a>
   <?php endif; ?>
</div>


         <!-- Icons -->
         <div class="icons">
            <div id="user-btn" class="fas fa-user"></div>

            <?php
            $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number);
            ?>
            <a href="cart.php" class="fas fa-shopping-cart">
               <span class="cart-count"><?php echo $cart_rows_number; ?></span>
            </a>
         </div>

        
      </div>
   </div>

</header>
<script>
   const userBtn = document.getElementById('user-btn');
   const userBox = document.getElementById('user-box');

   userBtn.addEventListener('click', () => {
      userBox.style.display = userBox.style.display === 'none' || userBox.style.display === '' ? 'block' : 'none';
   });

   // Optional: hide when clicking outside
   document.addEventListener('click', (e) => {
      if (!userBox.contains(e.target) && !userBtn.contains(e.target)) {
         userBox.style.display = 'none';
      }
   });
</script>
