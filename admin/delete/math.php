<?php
require_once "../../db.php";

session_start();
if (isset($_POST['delete']) && isset($_GET['auto_id'])) {
    $sql = "DELETE FROM questionb WHERE auto_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':zip' => $_GET['auto_id']));
    $_SESSION['success'] = "Question deleted";
    header('Location: ../questions/math.php') ;
        return;
}

$stmt = $conn->prepare("SELECT * FROM questionb where auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/index.css">
</head>
<body>
  <div class="header">
    <h1>Delete</h1>
  </div>
    <div class="container">
  <p>Confirm: Question to Delete Question: <?= htmlentities($row['qnum']) ?></p>
    <form method="POST">
    <input type="submit" class="btn btn-danger"  value="Delete" name="delete" href="math.php">
    <a href="../questions/math.php" class="btn btn-info">Cancel</a>
    </form>
    </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
