<?php
require_once "../../db.php";
session_start();
$_POST['id'] = $_SESSION['id'];
$id = $_POST['id'];
?>
<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/index.css">
  <style media="screen">
    p{
      font-size: 20px;
    }
  </style>
</head>
<body>
    <div class="header">
    <h1>Edit/delete: Bahasa Melayu</h1>
    </div>

<div class="left">
<?php
if (isset($_SESSION['success'])) {
    echo('<p style= "color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
    unset($_SESSION['success']);
}

$stmt = $conn->query("SELECT * FROM questiona order by qnum");
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<form name="quiz" id="quiz">';
foreach ($row as $row) {
    echo '<div>';
    echo '<p>'.$row['qnum'].". ".$row['question'].'</p>';
    if (!strlen($row['answer1']) < 1) {
        echo '<p><input type="radio" name="'.$row['qnum'].'" value="'.$row['mark1'].'">'.$row['answer1'].'</p>';
    };
    if (!strlen($row['answer2']) < 1) {
        echo '<p><input type="radio" name="'.$row['qnum'].'" value="'.$row['mark2'].'">'.$row['answer2'].'</p>';
    };
    if (!strlen($row['answer3']) < 1) {
        echo '<p><input type="radio" name="'.$row['qnum'].'" value="'.$row['mark3'].'">'.$row['answer3'].'</p>';
    };
    if (!strlen($row['answer4']) < 1) {
        echo '<p><input type="radio" name="'.$row['qnum'].'" value="'.$row['mark4'].'">'.$row['answer4'].'</p>';
    };
    if (!strlen($row['answer5']) < 1) {
        echo '<p><input type="radio" name="'.$row['qnum'].'" value="'.$row['mark5'].'">'.$row['answer5'].'</p>';
    };

    echo '<a class="btn btn-warning" href="../edit/bm.php? auto_id='.urlencode($row['auto_id']).'">Edit</a>';
    echo " ";
    echo '<a class="btn btn-danger" href="../delete/bm.php? auto_id='.urlencode($row['auto_id']).'">Delete</a>';
    echo "\n";
    echo '</div>';
}

echo '</form>';
?>

<a href="../add/bm.php" class="btn btn-info" role="button">Add New Question</a>
<a href="../dashboard.php?id=<?php echo $id ?>" class="btn btn-info" role="button">Cancel</a>


  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
