<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>About CLASSFUN</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">

  <style media="screen">
    body {
      margin: 0;
    }

    .icon-bar {
      overflow: auto;
      width: 100%;
      background-color: #7B241C;
    }

    .icon-bar a {
      float: left;
      width: 33%;
      padding: 12px 0;
      transition: all 0.3s ease;
      text-align: center;
      color: white;
      font-size: 36px;
    }

    .icon-bar a:hover {
      background-color: #000;
    }

    .active {
      background-color: #D35400;
    }

    p {
      background-color: #FAD7A0;
      font-size: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body>

  <div class="jumbotron">
    <div class="container text-center">
      <h1>C L A S S F U N !</h1>
      <h3><em>Wanna Test Your General Knowledge ??</em></h3>
    </div>
  </div>

  <div class="icon-bar">
    <a href="index.php"><i class="fa fa-home"></i></a>
    <a class="active" href="information.php"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
    <a href="user/signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
  </div>

  <div class="container">
    <h1>WHAT IS CLASSFUN ?</h1>
    <br>
    <p>CLASSFUN is the quiz games for elementary school students to test their basic knowledge and have fun in the same time. We provide them with graphics and lay with colours so that
      they will always have positive vibes during answer all the questions.</p>
  </div>

  <div class="container">
    <h1>HOW MARKS ARE CALCULATED ?</h1>
    <br>
    <table>
      <tr>
        <th>SECTION</th>
        <th>MARKS</th>
      </tr>
      <tr>
        <td>Section A</td>
        <td>Marks</td>
      </tr>
      <tr>
        <td>Section B</td>
        <td>Marks</td>
      </tr>
      <tr>
        <td>Section C</td>
        <td>Marks</td>
      </tr>
      <tr>
        <td>Section D</td>
        <td>Marks</td>
      </tr>
      <tr>
        <td colspan="2">Total Marks = sum of all sections</td>
      </tr>
    </table>
    <br>
    <br>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <script src="../js/main.js"></script>

</body>

</html>
