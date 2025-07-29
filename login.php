<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $row = mysqli_fetch_assoc($select_users);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');
         exit;
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');
         exit;
      }
   } else {
      $message[] = 'Incorrect email or password!';
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Royal Paytan</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<?php if (isset($message)) foreach ($message as $msg): ?>
   <div class="message"><span><?= $msg ?></span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>
<?php endforeach; ?>

<div class="auth-wrapper">
   <div class="auth-left">
      <img src="images/logo.jpg" alt="Login Image">
   </div>
   <div class="auth-right">
      <form action="" method="post" class="auth-form">
         <h3>Login Now</h3>
         <input type="email" name="email" required placeholder="Enter your email" class="box">
         <input type="password" name="password" required placeholder="Enter your password" class="box">
         <input type="submit" name="submit" value="Login Now" class="btn">
         <p>Don't have an account? <a href="register.php">Register Now</a></p>
      </form>
   </div>
</div>

</body>
</html>