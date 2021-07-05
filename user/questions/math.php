<!DOCTYPE html>
<?php
require "../../db.php";
session_start();
$userattemptid = "";
$_POST['attemptid']= $_SESSION['attemptid'];

if (isset($_POST['attemptid']) && isset($_POST['mark'])) {
    $userattemptid= $_POST['attemptid'];

    $sql = $conn->prepare("SELECT * FROM markb WHERE attemptid =:attemptid");
    $sql->bindParam(":attemptid", $userattemptid, PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if ($result > 0) {
        $name_error = "Sorry... you already answer the question";
    } else {
        $sql = $conn->prepare("INSERT INTO markb (attemptid, mark) VALUES (:attemptid, :mark)");
        $sql->execute(array(
          ':attemptid' => $_POST['attemptid'],
          ':mark' => $_POST['mark']));
    }
}
?>
<html>

<head>
  <title>Quiz</title>

  <script type="text/javascript" src="../../js/checksection.js"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../../css/index.css">
  <style>
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
    <h1>Question : Mathematics</h1>
  </div>

  <div class="left">
    <?php
  $sql = $conn->query("SELECT * FROM questionb order by qnum");
  $row = $sql->fetchAll(PDO::FETCH_ASSOC);

  echo '<form method="POST" onSubmit="checksection()"> ';
  ?>
    <div <?php if (isset($name_error)): ?> class="form_error" <?php endif ?>>
      <p><input type="hidden" name="attemptid" required value="<?php if (isset($_POST['attemptid'])) {
      echo $_POST['attemptid'];
  } ?>" /> <?php if (isset($name_error)): ?>
        <span><?php echo $name_error; ?></span>
        <?php endif ?>
      </p>
    </div>
    <p>Your total is : <input type="text" name="mark" id="total" value="<?php if (isset($_POST['mark'])) {
      echo $_POST['mark'];
  } ?>" style="background-color:#cbc3e3" />


      <?php
  echo '<a  class="btn btn-warning" name="cancel" role="button" href="../categories.php?attemptid='.urlencode($_SESSION['attemptid']).'">Home</a>';
  ?>
    </p>
    <?php
  foreach ($row as $row) {
      $answername= $row['qnum'];
      echo '<div class= "container">';
      echo '<p>'.$row['qnum'].". ".$row['question'].'</p>';
      if (!strlen($row['answer1']) < 1) {
          echo '<p><input type="radio" class="question" required name="'.$answername.'" value="'.$row['mark1'].'">'.$row['answer1'].'</p>';
      };
      if (!strlen($row['answer2']) < 1) {
          echo '<p><input type="radio" class="question" name="'.$answername.'" value="'.$row['mark2'].'">'.$row['answer2'].'</p>';
      };
      if (!strlen($row['answer3']) < 1) {
          echo '<p><input type="radio" class="question" name="'.$answername.'" value="'.$row['mark3'].'">'.$row['answer3'].'</p>';
      };
      if (!strlen($row['answer4']) < 1) {
          echo '<p><input type="radio" class="question" name="'.$answername.'" value="'.$row['mark4'].'">'.$row['answer4'].'</p>';
      };
      if (!strlen($row['answer5']) < 1) {
          echo '<p><input type="radio" class="question" name="'.$answername.'" value="'.$row['mark5'].'">'.$row['answer5'].'</p>';
      };

      echo "\n";
      echo '</div>';
  }
  ?>
    <input type="submit" class="btn btn-info" value="Calculate Total" name="Submit">

    <?php
  echo '<a  class="btn btn-warning" name="cancel" role="button" href="../categories.php?attemptid='.urlencode($_SESSION['attemptid']).'">Cancel</a>';
  ?>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
