<?php
require_once "../../db.php";

if (isset($_SESSION['success'])) {
    echo '<p style="color:green">'.$_SESSION['success']."</p>\n";
    unset($_SESSION['success']);
}

session_start();
$db = mysqli_connect('localhost', 'root', '', 'pcrat');
$qnumber = "";
if (isset($_POST['question']) && isset($_POST['answer1']) && isset($_POST['qnum'])) {
    $qnumber= $_POST['qnum'];

    $sql_u = "SELECT * FROM questiond WHERE qnum='$qnumber'";
    $res_u = mysqli_query($db, $sql_u);
    if ((!is_numeric($_POST['qnum']))) {
        $name_error = "Question number must be numeric";
    } elseif ((strlen($_POST['mark1'])!= 0) &&(!is_numeric($_POST['mark1']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark2'])!= 0) &&(!is_numeric($_POST['mark2']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark3'])!= 0) &&(!is_numeric($_POST['mark3']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark4'])!= 0) &&(!is_numeric($_POST['mark4']))) {
        $name_error = "Marks must be numeric";
    } elseif ((strlen($_POST['mark5'])!= 0) &&(!is_numeric($_POST['mark5']))) {
        $name_error = "Marks must be numeric";
    } elseif (mysqli_num_rows($res_u) > 0) {
        $name_error = "Sorry... question number already exist";
    } else {
        $sql = "INSERT INTO questiond (question, answer1, answer2, answer3, answer4, answer5, mark1, mark2, mark3, mark4, mark5, qnum)
               VALUES (:question, :answer1, :answer2, :answer3, :answer4, :answer5, :mark1, :mark2, :mark3, :mark4, :mark5, :qnum)";
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
        ':qnum' => $_POST['qnum']
      ));
        $_SESSION['success'] = "New question added";
        header('Location: ../questions/english.php');
            return;
    }
}

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
    <h1>Add New Question</h1>
  </div>

  <div class="left">

    <p>Note: Only fill the answer box and marks if it is needed. Leave the unused box blank </p>
    <form method="post">
      <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?>>
        <p>Question number:<input type="text" name="qnum" class="resizedTextbox" value="<?php echo $qnumber; ?>"></p>
        <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span>
        <?php endif ?>


        <p>Question:<br></br><textarea name="question" rows="10" cols="50"></textarea></p>
        <p>Answer 1:<br><textarea name="answer1" rows="3" cols="50"></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark1"></p>
        <p>Answer 2:<br><textarea name="answer2" rows="3" cols="50"></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark2"></p>
        <p>Answer 3:<br><textarea name="answer3" rows="3" cols="50"></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark3"></p>
        <p>Answer 4:<br><textarea name="answer4" rows="3" cols="50"></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark4"></p>
        <p>Answer 5:<br><textarea name="answer5" rows="3" cols="50"></textarea><br>Mark:<input type="text" class="resizedTextbox" name="mark5"></p>
      </div>
      <p><input type="submit" class="btn btn-info" value="Add New" />
        <a class="btn btn-info" href="../questions/english.php">Cancel</a>
      </p>

    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
