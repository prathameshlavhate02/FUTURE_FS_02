<?php
include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exists!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password does not match!';
      } else {
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$pass', '$user_type')") or die('query failed');
         $message[] = 'Registered successfully!';
         header('location:login.php');
      }
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register - Royal Paytan</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/auth.css">
</head>
<body>

<?php if (isset($message)) foreach ($message as $msg): ?>
   <div class="message"><span><?= $msg ?></span><i class="fas fa-times" onclick="this.parentElement.remove();"></i></div>
<?php endforeach; ?>

<div class="auth-wrapper">
   <div class="auth-left">
      <img src="images/logo.jpg" alt="Register Image">
   </div>
   <div class="auth-right">
      <form action="" method="post" class="auth-form">
         <h3>Register Now</h3>
         <input type="text" name="name" placeholder="Enter your name" required class="box">
         <input type="email" name="email" placeholder="Enter your email" required class="box">
         <input type="password" name="password" placeholder="Enter your password" required class="box">
         <input type="password" name="cpassword" placeholder="Confirm your password" required class="box">
         <select name="user_type" class="box">
            <option value="user">User</option>
            <!-- <option value="admin">Admin</option> -->
         </select>
         <input type="submit" name="submit" value="Register Now" class="btn">
         <p>Already have an account? <a href="login.php">Login Now</a></p>
      </form>
   </div>
</div>

</body>
</html>