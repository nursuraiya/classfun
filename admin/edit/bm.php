<?php
require_once "../../db.php";

session_start();

if (isset($_POST['question']) && isset($_POST['answer1']) && isset($_POST['qnum']) && isset($_POST['auto_id'])) {
    if ((strlen($_POST['mark1'])!= 0) &&(!is_numeric($_POST['mark1']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark2'])!= 0) &&(!is_numeric($_POST['mark2']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark3'])!= 0) &&(!is_numeric($_POST['mark3']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark4'])!= 0) &&(!is_numeric($_POST['mark4']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark5'])!= 0) &&(!is_numeric($_POST['mark5']))) {
        $name_error = "Marks must be numeric";
    } else {
        $sql = "UPDATE questionA SET
  question = :question, answer1 = :answer1, answer2 = :answer2, answer3 = :answer3, answer4 = :answer4, answer5 = :answer5,
  qnum = :qnum,
  mark1 = :mark1, mark2 = :mark2, mark3 = :mark3, mark4 = :mark4, mark5 = :mark5  WHERE auto_id = :auto_id";
        echo "<pre>\n$sql\n</pre>\n";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(
    ':question' => $_POST['question'],
    ':answer1' => $_POST['answer1'],
    ':answer2' => $_POST['answer2'],
    ':answer3' => $_POST['answer3'],
    ':answer4' => $_POST['answer4'],
    ':answer5' => $_POST['answer5'],
    ':mark1' => $_POST['mark1'],
    ':mark2' => $_POST['mark2'],
    ':mark3' => $_POST['mark3'],
    ':mark4' => $_POST['mark4'],
    ':mark5' => $_POST['mark5'],
    ':qnum' => $_POST['qnum'],
    ':auto_id' => $_POST['auto_id']));
        $_SESSION['success'] = "Question updated";
        header('Location: ../questions/bm.php') ;
        return;
    }
}

$stmt = $conn->prepare("SELECT * FROM questionA where auto_id = :xyz");
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$question = htmlentities($row['question']);
$answer1 = htmlentities($row['answer1']);
$answer2 = htmlentities($row['answer2']);
$answer3 = htmlentities($row['answer3']);
$answer4 = htmlentities($row['answer4']);
$answer5 = htmlentities($row['answer5']);
$mark1 = htmlentities($row['mark1']);
$mark2 = htmlentities($row['mark2']);
$mark3 = htmlentities($row['mark3']);
$mark4 = htmlentities($row['mark4']);
$mark5 = htmlentities($row['mark5']);
$qnum = htmlentities($row['qnum']);
$auto_id = $row['auto_id'];
?>

<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/index.css">

  <style>
    .resizedTextbox {
      width: 50px;
      height: 20px
    }
    
    .form_error span {
      width: 80%;
      height: 35px;
      margin: 3px 10%;
      color: #D83D5A;
      font-size: 1.1em;
    }

    .form_error input {
      border: 1px solid #D83D5A;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>Edit Question</h1>
  </div>

  <div class="left">

    <form method="post">
      <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?>>
        <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span>
        <?php endif ?>
        <p>Question number:<input type="text" class="resizedTextbox" name="qnum" value="<?= $qnum ?>" readonly></p>
        <p>Question:<br></br><textarea name="question" rows="10" cols="50"><?= $question ?></textarea></p>
        <p>Answer 1:<br><textarea name="answer1" rows="3" cols="50"><?= $answer1 ?></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark1" value="<?= $mark1 ?>"></p>
        <p>Answer 2:<br><textarea name="answer2" rows="3" cols="50"><?= $answer2 ?></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark2" value="<?= $mark2 ?>"></p>
        <p>Answer 3:<br><textarea name="answer3" rows="3" cols="50"><?= $answer3 ?></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark3" value="<?= $mark3 ?>"></p>
        <p>Answer 4:<br><textarea name="answer4" rows="3" cols="50"><?= $answer4 ?></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark4" value="<?= $mark4 ?>"></p>
        <p>Answer 5:<br><textarea name="answer5" rows="3" cols="50"><?= $answer5 ?></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark5" value="<?= $mark5 ?>"></p>
        <input type="hidden" name="auto_id" value="<?= $auto_id ?>">
      </div>

      <p><input class="btn btn-info" type="submit" value="Update" />
        <a href="../questions/bm.php" class="btn btn-info" role="button">Cancel</a>
      </p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
