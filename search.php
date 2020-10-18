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
    .containermain{
      min-height: 100vh;
    }
  </style>
</head>

<body>
  <?php include "includes/_dbconnect.php"; ?>
  <?php include "includes/_header.php"; ?>

  <!-- search result start from here -->
  <div class="container containermain my-3">
    <h1>search Results for <em>"<?php echo $_GET['search']; ?>"</em></h1>
    <?php 
        $noResult = true;
        $query = $_GET["search"];
        $sql = "SELECT * FROM threads WHERE MATCH (thread_subject, thread_desc) against ('$query')";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_assoc($result)){
          $title = $row['thread_subject'];
          $desc = $row['thread_desc'];
          $thread_id = $row['thread_id'];
          $url = "thread.php?threadid=". $thread_id;
          $noResult = false;
          //displaying search result

            echo '
                  <div class="result">
                  <h3><a class="text-dark" href="'.$url.'">'.$title.'</a></h3>
                  <p>'.$desc.'</p>
                  </div>
                ';
        }
        if($noResult){
          echo '
                <div class="jumbotron jumbotron-fluid">
                  <div class="container">
                    <h1 class="display-4">No result found.</h1>
                    <p class="lead">Suggestions:<ul>
                          <li>Try different keywords.</li>
                          <li>Make sure that all all words are spelled correctly.</li>
                          <li>Try more general keywords.</li></ul>
                    </p>
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