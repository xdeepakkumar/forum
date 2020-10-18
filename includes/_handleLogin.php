<?php
  $showError = "false";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $sql = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($con,$sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user_name'] = $row['user_name'];
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['user_email'] = $email;
            echo $_SESSION['user_name'] = $row['user_name'];
            header('location:/forum/index.php');
        }
      }
      header('location:/forum/index.php');
  }
?>