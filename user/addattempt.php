<?php
require_once "../db.php";
session_start();

if (isset($_SESSION['success'])) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

$_POST['id'] = $_SESSION['id'];
$id = $_SESSION['id'];

if (isset($_POST['date']) && isset($_POST['id'])) {
    $sql = "INSERT INTO attempt (date, emailid)
               VALUES (:date, :id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
      ':id' => $_POST['id'],
        ':date' => $_POST['date']));
    $_SESSION['success'] = "New attempt added";
    header("Location:dashboard.php?id=".$id);
        return;
}
?>

<html>

<head>
  <title>Add Attempt</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <style media="screen">
    p {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Add A New Attempt</h1>
  </div>

  <div class="container fluid">
    <form method="post">
      <p>Date: <input type="datetime-local" name="date"></p>
      <p><input class="btn btn-outline-primary" type="submit" value="Add New" />
        <a class="btn btn-outline-primary" href="dashboard.php?id="<?php echo $id ?>">Cancel</a>
      </p>
    </form>
  </div>
</body>

</html>
