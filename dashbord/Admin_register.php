<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', 'admin')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:../index.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style-admin.css">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
   <div class="center">

   <form action="" method="post">
   <text align="center" > <h2>Admin Register Form </h2> </text>
      <div class="txt-field"> <input type="text" name="name" placeholder="Enter your name" required class="box"><span></span></div>
      <div class="txt-field"> <input type="email" name="email" placeholder="Enter your email" required class="box"><span></span></div>
      <div class="txt-field"><input type="password" name="password" placeholder="Enter your password" required class="box"><span></span></div>
      <div class="txt-field"><input type="password" name="cpassword" placeholder="Confirm your password" required class="box"><span></span></div>
      
      </select>
     
    
     <button type="submit" class="signupbtn"name="submit" onclick="return validateForm()">Signup</button>
      <div class="sign-up_link">
    

</div>

</body>
</html>