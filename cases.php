<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>eForum - let's Discuss on Corona</title>
  <style>
    .containermain{
      min-height: 100vh;
    }
  </style>
</head>

<body onload="fetch()">
  <?php include "includes/_dbconnect.php"; ?>
  <?php include "includes/_header.php"; ?>
  <section class="container">
    <div class="card card-body">
    <h4 class="text-center p-2 text-warning">Live COVID19 Cases in INDIA</h4>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered table-striped text-center">
        <tr>
          <th>Last Update</th>
          <th>State</th>
          <th>Total Confirmed</th>
          <th>Total Deadths</th>
          <th>Total recovered</th>
          <th>Active</th>
        </tr>
        <?php 
          $data = file_get_contents('https://api.covid19india.org/data.json');
          $coronaData = json_decode($data, true);
          $stateCount = count($coronaData['statewise']);
          $i = 1;
          while ($i < $stateCount) {
            ?>
            <tr>
              <td>
                <?php echo $coronaData['statewise'][$i]['lastupdatedtime']; ?>
              </td>
              <td>
                <?php echo $coronaData['statewise'][$i]['state']; ?>
              </td>
              <td>
                <?php echo $coronaData['statewise'][$i]['confirmed']; ?>
              </td>
              <td>
                <?php echo $coronaData['statewise'][$i]['deaths']; ?>
              </td>
              <td>
                <?php echo $coronaData['statewise'][$i]['recovered']; ?>
              </td>
              <td>
                <?php echo $coronaData['statewise'][$i]['active']; ?>
              </td>
            </tr>
            <?php 
            $i++;
          }
         ?>
      </table>
    </div>
  </section>

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