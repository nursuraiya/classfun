<?php
require_once "../../db.php";
session_start();
$_POST['attemptid']= $_SESSION['attemptid'];
?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
  <div class="header">
    <h1>Summary</h1>
  </div>

  <div class="container">
    <form method="post">
      <p>Check your total marks here !</p>
    </form>

    <?php
    if (isset($_POST['attemptid'])) {
    $attemptid = $_POST['attemptid'];
    $stmt = $conn->query("SELECT auto_id, attemptid, mark FROM marka where attemptid = '$attemptid'");
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt2 = $conn->query("SELECT auto_id, attemptid, mark FROM markb where attemptid = '$attemptid'");
    $row2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

    $stmt3 = $conn->query("SELECT auto_id, attemptid, mark FROM markc where attemptid = '$attemptid'");
    $row3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

    $stmt4 = $conn->query("SELECT auto_id, attemptid, mark FROM markd where attemptid = '$attemptid'");
    $row4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);

    $sum=0;
    foreach ($row as $row) {
        echo "Section A marks: ".$row['mark']."<br>";
        $mark = $row['mark'];
        $sum = $sum+$mark;
    }

    foreach ($row2 as $row) {
        echo "Section B marks: ".$row['mark']."<br>";
        $mark = $row['mark'];
        $sum = $sum+$mark;
    }

    foreach ($row3 as $row) {
        echo "Section C marks: ".$row['mark']."<br>";
        $mark = $row['mark'];
        $sum = $sum+$mark;
    }

    foreach ($row4 as $row) {
        echo "Section D marks: ".$row['mark']."<br>";
        $mark = $row['mark'];
        $sum = $sum+$mark;
    }
    echo "Total marks: ".$sum."<br>";
}

echo '<a  class="btn btn-warning" href="../categories.php?attemptid='.urlencode($_SESSION['attemptid']).'">Home</a>';
?>
    <br><br>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
