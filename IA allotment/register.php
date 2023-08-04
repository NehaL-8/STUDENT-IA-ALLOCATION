<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ISA</title>
  <link rel="icon" type="image/x-icon" href="./mitm logo.jpg">

</head>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post" action="register.php">
        <?php include('errors.php'); ?>
        <h3>register here</h3>

      <br>
        
        <input type="text" placeholder="name" name="username" value="<?php echo $username; ?>">
        
      <br><br>
  	  <input type="email" placeholder="email" name="email" value="<?php echo $email; ?>">

      <br><br>
        <input type="password" placeholder="Password" name="password_1">

      <br><br>
  	  <input type="password" placeholder="confirm password" name="password_2">

        <button type="submit"  name="reg_user">register</button>
        <div class="sign-up">
               Already a member?
               <a href="login.php">login</a>
</div>

    </form>
</body>
</html>
<!-- partial -->
  
</body>
</html>
