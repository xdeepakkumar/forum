<?php
  $showError = "false";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $user_name = $_POST['signupName'];
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupCpassword'];

    //checking existance of the email
    $existSql = "SELECT * FROM `users` WHERE `user_email` ='$user_email'";
    $result = mysqli_query($con, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
      $showError = "Email exists, Please use another email..";
    }else{
      if($pass == $cpass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_pass`, `timestamp`) VALUES ('$user_name','$user_email', '$hash', current_timestamp())";
        $result = mysqli_query($con, $sql);
        if($result){
          $showAlert = true;
          header('location:/forum/index.php?signupSuccess=true');
          exit;
        }
      }else{
        $showError = "Password do not match.";
      }
    }
   header('location:/forum/index.php?signupSuccess=false&error=$showError');

  }

?>