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
        $sql = $conn->prepare("SELECT COUNT(email) AS num FROM users WHERE email =:email");
        $sql->bindParam(":email", $email);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        $hashPW = password_hash($password, PASSWORD_DEFAULT);

        if ($result['num'] > 0) {
            $_SESSION['error'] = "Email is already exists";
        } else {
            $sql = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :pw)");
            $sql->bindParam(":name", $name);
            $sql->bindParam(":email", $email);
            $sql->bindParam(":pw", $hashPW);

            if ($sql->execute()) {
                $_SESSION['success'] = "You're good to go!";
                header("Location: signup.php");
                return;
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <title>User Registration</title>
</head>

<body>
  <div class="right-banner">
    <div class="header">
      <h1>Admin Sign Up</h1>
    </div>

    <form class="signup-form" method="post">
      <div class="container">
        <img src="https://img.icons8.com/clouds/2x/add-user-male.png" alt="">

        <div class="mb-3">
          <label for="name" class="form-label">Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="<?= htmlentities($name) ?>" required>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email:</label>
          <input type="text" class="form-control" id="email" name="email" value="<?= htmlentities($email) ?>" required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password" value="<?= htmlentities($password) ?>" required>
        </div>

        <div class="mb-3">
          <label for="confirmpw" class="form-label">Confirm Password:</label>
          <input type="password" class="form-control" id="confirmpw" name="confirmpw" value="<?= htmlentities($confirmpw) ?>" required>
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
        <a href="login.php" type="submit" name="login-button" class="btn btn-warning">Cancel</a>
        <br><br>
        <p>Already have an account? <a href="login.php">Log In</a></p>
        <br>
        <br>
        </div>
    </form>
  </div>

</body>

</html>
