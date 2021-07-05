<?php

require '../db.php';
session_start();

// if login attempts = 3, it locked the submit button for 10 secs
if (isset($_SESSION["locked"])) {
    $difference = time() - $_SESSION["locked"];
    if ($difference > 10) {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

// Encrypt cookie
function encryptCookie($value)
{
    $key = hex2bin(openssl_random_pseudo_bytes(4));

    $cipher = "aes-256-cbc";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);

    $ciphertext = openssl_encrypt($value, $cipher, $key, 0, $iv);

    return(base64_encode($ciphertext . '::' . $iv. '::' .$key));
}

// Decrypt cookie
function decryptCookie($ciphertext)
{
    $cipher = "aes-256-cbc";

    list($encrypted_data, $iv, $key) = explode('::', base64_decode($ciphertext));
    return openssl_decrypt($encrypted_data, $cipher, $key, 0, $iv);
}

// Check if $_SESSION or $_COOKIE already set
if (isset($_SESSION['id'])) {
    header('Location: dashboard.php');
    exit;
} elseif (isset($_COOKIE['rememberme'])) {

   // Decrypt cookie variable value
    $id = decryptCookie($_COOKIE['rememberme']);

    // Fetch records
    $stmt = $conn->prepare("SELECT count(*) as total FROM users WHERE id=:id");
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        $_SESSION['id'] = $id;
        header('Location: dashboard.php?id='.$id);
        exit;
    }
}

$email = isset($_POST['email']) ? $_POST['email'] : '';
$pw = isset($_POST['password']) ? $_POST['password'] : '';

if (isset($_POST['login-button'])) {
    if (empty($email) || empty($pw)) {
        $_SESSION['error'] = "ID and Password are required";
    } else {
        $sql = $conn->prepare("SELECT * FROM users WHERE email =:email");
        $sql->bindParam(":email", $email, PDO::PARAM_STR);
        $sql->execute();
        $result = $sql->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $pwCheck = password_verify($pw, $result['password']);

            //if the input is false, it will add 1 into login attempts
            if ($pwCheck == false) {
                $_SESSION["login_attempts"] += 1;
                $_SESSION['error'] = "Wrong Password";
            } elseif ($pwCheck == true) {
                $id = $result['id'];

                if (isset($_POST['rememberme'])) {
                    $days = 30;
                    $value = encryptCookie($id);
                    setcookie("rememberme", $value, time() + ($days * 24 * 60 * 60 * 1000));
                }

                $_SESSION['id'] = $id;
                $_SESSION['email'] = $email;

                header("Location:dashboard.php?id=".urlencode($id));
                return;
            } else {
                $_SESSION["login_attempts"] += 1;
                $_SESSION['error'] = "Wrong Email or Password";
            }
        } else {
            $_SESSION["login_attempts"] += 1;
            $_SESSION['error'] = "Invalid Email or Password";
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

  <title>Login Admin Page</title>
</head>

<body>
  <div class="right-banner">
    <div class="header">
      <h1>Welcome, Admin!</h1>
    </div>
  </div>
  <br>
  <form class="login-form" method="post">
    <?php
        if (isset($_SESSION['error'])) {
            echo('<p style= "color: red;text-align: center;">'.htmlentities($_SESSION['error'])."</p>\n");
            unset($_SESSION['error']);
        }
         ?>
    <div class="container">

      <img src="https://img.icons8.com/bubbles/2x/ffffff/admin-settings-male.png" alt="admin">
      <form>
        <div class="mb-2">
          <label for="email" class="form-label">Email address:</label>
          <input type="text" class="form-control" id="email" name="email" value="<?= htmlentities($email) ?>" required>
          <div class="form-text">We'll never share your email with anyone else.</div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" name="password" class="form-control" id="password" value="<?= htmlentities($pw) ?>">
        </div>

        <div class="mb-3">
          <input type="checkbox" name="rememberme" value="1" />&nbsp;Remember Me
        </div>

        <?php
        $_SESSION["login_attempts"] = isset($_SESSION["login_attempts"]) ? ($_SESSION["login_attempts"] + 0) : 0;
        if ($_SESSION["login_attempts"] > 2) {
        $_SESSION["locked"] = time();
        echo "<p>Too many failed login attempts. Please wait for 10 seconds</p>";
        } else {
        ?>
        <button type="submit" name="login-button" class="btn btn-primary">Enter</button>

        <?php } ?>
        <a href="../login.php" class="btn btn-warning" name="cancel" role="button">Cancel</a>
        <br><br>
        <p>Don't have an account? <a href="signup.php">Sign up now</a></p>
      </form>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
