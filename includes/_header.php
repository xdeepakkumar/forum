
<?php
include '_dbconnect.php';
session_start();
  echo '
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/forum">iCorona</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/forum">Home <span class="sr-only">(current)</span></a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Top Category
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql = "SELECT `category_name`, `category_id` FROM `categories` LIMIT 6";
          $result = mysqli_query($con,$sql);
          while($row = mysqli_fetch_assoc($result)){
            echo '<a class="dropdown-item" href="/forum/threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a>';
            echo '<div class="dropdown-divider"></div>';
          }
        echo '</div>
      </li>             
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cases.php">Covid19India</a>
      </li>
      </ul>
      <div class="row mx-2">';
      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
        echo '<form class="form-inline my-2 my-lg-0" action="search.php" method="get">
        <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
        <p class="text-light my-0 px-2"> Welcome <b>'.$_SESSION['user_name'].'</b></p>
        <a href="includes/_logout.php" class="btn btn-success btn-sm ml-2">Logout</a>
        </form>';
      }else{
        echo '
            <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-danger my-2 my-sm-0" type="submit">Search</button>
            </form>
            <button class="btn btn-success btn-sm ml-2"  data-toggle="modal" data-target="#loginModal">Login</button>
            <button class="btn btn-primary btn-sm mx-2"  data-toggle="modal" data-target="#signupModal">SignUp</button>
          '; 
      }
  echo ' </div>
  </div>
</nav>';
  include 'includes/_signupModal.php';
  include 'includes/_loginModal.php';
  if(isset($_GET['signupSuccess']) && $_GET['signupSuccess']=="true"){
    echo '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success! </strong> You can now login using your email and password.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
  }else if(isset($_GET['signupSuccess']) && $_GET['signupSuccess']=="false"){
    echo '
    <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
      <strong>Error! </strong> User exist with same email. Please Try again...
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ';
  }
  if(isset($_GET['signinSuccess']) && $_GET['signinSuccess']=="true"){
    echo '
        <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success! </strong> You are logged in.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        ';
  }else if(isset($_GET['signinSuccess']) && $_GET['signinSuccess']=="false"){
    echo '
    <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
      <strong>Error! </strong> Invalid Credentials. Please Try again...
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ';
  }
?>
