<?php
session_start();

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirmpw = isset($_POST['confirmpw']) ? $_POST['confirmpw'] : '';

if (isset($_POST['registerStudent-submit'])) {
    require '../db.php';

    if (empty($name) || empty($email) || empty($password) || empty($confirmpw)) {
        header("Location:signup.php?error=emptyfields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid Email";
    } elseif ($password !== $confirmpw) {
        $_SESSION['error'] = "Password does not match";
    } else {
        $sql = $conn->prepare("SELECT COUNT(email) AS num FROM student WHERE email =:email");
        $sql->bindParam(":email", $email);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $hashPW = password_hash($password, PASSWORD_DEFAULT);

        if ($result['num'] > 0) {
            $_SESSION['error'] = "Email is already exists";
        } else {
            $sql = $conn->prepare("INSERT INTO student (name, email, password) VALUES (:name, :email, :pw)");
            $sql->bindParam(":name", $name);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":pw", $hashPW);

            if ($sql->execute()) {
                $_SESSION['success'] = "You're good to go!";
            } else {
                $_SESSION['error'] = "Oh no, e r r o r";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>User Registration</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <style media="screen">
    body {
      margin: 0;
    }

    .icon-bar {
      overflow: auto;
      width: 100%;
      background-color: #7B241C;
    }

    .icon-bar a {
      float: left;
      width: 33%;
      padding: 12px 0;
      transition: all 0.3s ease;
      text-align: center;
      color: white;
      font-size: 36px;
    }

    .icon-bar a:hover {
      background-color: #000;
    }

    .active {
      background-color: #D35400;
    }

    p {

      font-size: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>
  <div class="jumbotron">
    <div class="container text-center">
      <h1>C L A S S F U N !</h1>
      <h3><em>Wanna Test Your General Knowledge ??</em></h3>
    </div>
  </div>

  <div class="icon-bar">
    <a href="../index.php"><i class="fa fa-home"></i></a>
    <a href="../information.php"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
    <a class="active" href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
  </div>

  <div class="right-banner">
    <div class="header">
      <h1>Sign Up</h1>
    </div>

    <br>
    <form class="signup-form" method="post">

      <div class="container">
        <img src="https://img.icons8.com/clouds/2x/add-user-male.png" alt="">
        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" class="form-control" id="email" name="email" required>
          <div id="name" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" id="password" class="form-control" name="password" required>
        </div>

        <div class="mb-3">
          <label for="confirmpw" class="form-label">Confirm Password:</label>
          <input type="password" name="confirmpw" class="form-control" id="confirmpw" required>
        </div>

        <?php
        if (isset($_SESSION['error'])) {
            echo('<p style= "color: red;text-align: center;">'.htmlentities($_SESSION['error'])."</p>\n");
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success'])) {
            echo('<p style= "color: green;text-align: center;">'.htmlentities($_SESSION['success'])."</p>\n");
            unset($_SESSION['success']);
        }
         ?>
        <input type="submit" class="btn btn-primary" name="registerStudent-submit" value="Register">
        <a href="../index.php" type="submit" name="login-button" class="btn btn-warning">Cancel</a>
        <br><br>
        <p>Already have an account? <a href="login.php">Log In</a></p>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
