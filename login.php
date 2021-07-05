<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Choose Which One Are You</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">

  <style media="screen">
    p {
      font-size: 20px;
    }

    .feature-title {
      font-size: 30px;
    }

    h1 {
      font-size: 40px;
    }
  </style>
</head>

<body>
  <br>
  <div class="header">
    <h1>Click your role to login!</h1>
  </div>

  <div class="container">

    <div class="container features">
      <table class="row">
        <tr class="column">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h3 class="feature-title">USER</h3>
            <a href="user/login.php"> <img src="image/student.png" class="img-fluid" width="300" height="400">
              <p>If you are a user , Click Here!!</p>
          </div>
        </tr>

        <tr class="column">
          <div class="col-lg-4 col-md-2 col-sm-12">
            <a href="information.php"> <img src="image/q.png" class="img-fluid" width="200" height="200">

              <br>
              <br>
              <a href="index.php" class="btn btn-warning" name="cancel" role="button">Cancel</a>
          </div>
        </tr>

        <tr class="column">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <h3 class="feature-title">ADMIN</h3>
            <a href="admin/login.php"> <img src="image/boyt.png" class="img-fluid" width="300" height="400">
              <p>Special for admin ! </p>
          </div>
        </tr>
      </table>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <script src="js/main.js"></script>
</body>

</html>
