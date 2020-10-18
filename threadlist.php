<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>iCorona - let's Discuss on Covid19</title>
  <style>
  .ques-height {
    min-height: 433px;
  }
  </style>
</head>

<body>
<?php include "includes/_dbconnect.php"; ?>
  <?php include "includes/_header.php"; ?>
  
  <?php $id = $_GET['catid']; 
    $sql = "SELECT * FROM `categories` WHERE category_id = $id";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_assoc($result)){
      $catname = $row['category_name'];
      $catdesc = $row['category_description'];
    }
  
  ?>

  <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
      if($method == 'POST'){
        //insert thread into db
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_subject`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `dt`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($con,$sql);
        $showAlert = true;
        if($showAlert){
          echo '
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success! </strong> Your thread has been added. Please wait for community to respond.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              ';
        }
    
      }
  ?>

  <!-- category container start from here -->
  <div class="container">
    <div class="jumbotron my-4">
      <h1 class="display-4"><?php echo $catname; ?></h1>
      <p class="lead"><?php echo $catdesc;   ?></p>
      <hr class="my-4">
      <p>Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
        questions.
        Do not PM users asking for help. Remain respectful of other members at all times.</p>
      <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
    </div>
  </div>
  <?php 
   if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '
    <div class="container">
        <h3 class="py-2">Start a Discussion</h3>
          <form action="'.$_SERVER["REQUEST_URI"].'" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Problem Title</label>
              <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
              <small id="emailHelp" class="form-text text-muted">Keep your title as crisp and short as possible.</small>
            </div>
            <input type="hidden" name="sno" value="'. $_SESSION["sno"].'">
            <div class="form-group">
              <label for="desc">Ellaborate your concern </label>
              <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
          </form>
      </div>
  ';
   }else{
     echo '
      <div class="container">
      <h3 class="py-2">Start a Discussion</h3>
        <p class="lead">You are not loggedin.Please loginto able to start discussion</p>
      </div>
     ';
   }
  ?>
  <div class="container ques-height">
    <h3 class="py-3">Browse Questions</h3>
    <?php 
      $id = $_GET['catid']; 
      $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id";
      $result = mysqli_query($con,$sql);
      $noResult = true;
      while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $id = $row['thread_id'];
        $thread_title = $row['thread_subject'];
        $thread_desc = $row['thread_desc'];
        $thread_time = $row['dt'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 = "SELECT `user_name` FROM `users` WHERE sno = '$thread_user_id'";
        $result2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '
        <div class="media my-3">
          <img src="images/userDefault.png" width="58px" class="mr-3" alt="...">
          <div class="media-body">
            <p class="font-weight-bold my-0"> '. $row2['user_name'].' @ '.$thread_time.'</p>
            <h5 class="mt-0"><a href="thread.php?threadid='.$id.'">'.$thread_title.'</a></h5>
              '.$thread_desc.'
          </div>
        </div>
        ';
      }
      // echo var_dump($noResult);
      if($noResult){
        echo '
        <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <p class="display-4">No Threads Found</p>
        <p class="lead"><b>Be the first person to ask a question</b></p>
      </div>
        </div>
        ';
      }
    ?>
  </div>
  <?php include "includes/_footer.php"; ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>

</body>

</html>