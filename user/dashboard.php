<?php
require_once "../db.php";
session_start();

$id = $_SESSION['id'];
// Check user login or not
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}
// logout
if (isset($_POST['logout'])) {
    session_destroy();

    // Remove cookie variables
    $days = 30;
    setcookie("rememberme", "", time() - ($days * 24 * 60 * 60 * 1000));
    header('Location: ../index.php');
}


?>
<html>

<head>
  <title>User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/index.css">

  <style media="screen">
    .button {
      display: inline-block;
      padding: 15px 32px;
      cursor: pointer;
      -webkit-transition-duration: 0.4s;
      /* Safari */
      transition-duration: 0.4s;
      text-align: left;
      text-decoration: none;
      color: black;
      /* Green */
      border: none;
      background-color: #F1C40F;
      font-size: 16px;
    }

    .button2:hover {
      box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
    }

    #table {
      width: 100%;
      text-align: center;
      border-collapse: collapse;
      font-family: Arial, Helvetica, sans-serif;
    }

    #table td,
    #table th {
      padding: 8px;
      text-align: center;
      border: 1px solid #ddd;
    }

    #table td:nth-child(even) {
      background-color: #D5F5E3;
    }

    #table td:nth-child(odd) {
      background-color: #D5F5E3;
    }

    #table tr:hover {
      background-color: #ddd;
    }

    #table th:hover {
      background-color: #ddd;
    }

    #table th {
      padding-top: 20px;
      padding-bottom: 12px;
      text-align: center;
      color: white;
      background-color: #04AA6D;
    }

    .center {
      width: 50%;
      margin: auto;
      padding: 10px;
      border: 3px solid white;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>Attempt</h1>
  </div>

  <div class="container">

    <?php
    if (isset($_SESSION['success'])) {
        echo('<p style= "color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
    }

    $stmt = $conn->query("SELECT attemptid, date FROM attempt where emailid = '$id'");
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);


    echo '<div class="center" id="table"><table border="1"><tr><th>ID</th><th>Date</th><th>Action</th></tr>';
    foreach ($row as $row) {
        echo "<tr><td>".$row['attemptid']."</td><td>".$row['date']."</td><td>";
        echo '<a href="categories.php?attemptid='.urlencode($row['attemptid']).'">Enter</a>';
        echo "</td></tr>\n";
    }

    echo "</table>";
    echo "</div>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <p><a href="addattempt.php" class="button button2">Add New Attempt</a>
    <form method="post">
      <button type="submit" name="logout" class="button button2">Log Out</button>
    </form>
  </div>

</body>

</html>
