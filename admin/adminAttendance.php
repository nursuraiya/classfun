<?php
    session_start();
    $_POST['id'] = $_SESSION['id'];
    $id = $_POST['id'];

    if (isset($_POST['checkin'])) {
        if (!isset($_SESSION['attendance'])) {
            $_SESSION['attendance'] = array();
        }
        $_SESSION['attendance'] [] = array(
        "admin_name" => $_POST['admin_name'],
        "email" => $_POST['email'],
        "datetime" => $_POST['DateTime']);
        header("Location: adminAttendance.php?id=".$id);
        return;
    }

    if (isset($_POST['reset'])) {
      $_SESSION['attendance'] = Array();
      session_destroy();
      header("Location: adminAttendance.php?id=".$id);
     return;
    }
?>
<html>
    <head>
      <title>Attendance</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/index.css">

      <style>
      body {
        background-color: #FCF3CF;
        padding-top: 40;
        display: block;
        text-align: center;
        font-family: sans-serif;
      }
      form {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
      }
      input {
        width: 100%;
        height: 30px;
        margin-top: 3;
        margin-bottom: 10;
        border-style: none;
        border-radius: 4px;
      }
      button {
        height: 30px;
      }

      .header {
        padding: 20px;
        text-align: center;
        background: #F7DC6F;
        color: white;
        font-size: 20px;
      }
      </style>
      <script type="text/javascript" src="jquery.min.js"></script>
    </head>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
          function updateAttandance() {
              window.console && console.log('Requesting JSON');
              $.getJSON('adminAttendanceList.php', function(rowz){
               window.console && console.log('JSON Received');
                 window.console && console.log(rowz);
                 $('#currentattandancelist').empty();
                for (var i = 0; i < rowz.length; i++) { // loop all entry in $_SESSION['attendance']
                    entry = rowz[i];
                      $('#currentattandancelist').append(
                        '<p>&nbsp;&nbsp;' + (i+1) + '.<br/>&nbsp;&nbsp;Admin Name: '+ entry["admin_name"] +
                        '<br/>&nbsp;&nbsp;Email: '+ entry["email"] +
                        '<br/>&nbsp;&nbsp;Date: '+ entry["datetime"] + "</p>\n");
                 }
                 setTimeout('updateAttandance()', 1000);
            });
        }

        // Make sure JSON requests are not cached
        $(document).ready(function() {
            $.ajaxSetup({ cache:false });
            updateAttandance();
        });
      </script>

        <body>
      <div class="header">
<h1>Attendance Record Application</h1>
</div>
<br>
        <form method="post" action="adminAttendance.php">
            <label>Admin Name: </label><br>
            <input type="text" name="admin_name" /><br> <!-- Input Student Name -->
            <label>Email: </label><br>
            <input type="text" name="email"/><br> <!-- Input Matric Number -->
            <label>Date & Time: </label><br>
            <input type="datetime-local" name="DateTime" /><br><br> <!-- Input Date and Time -->
            <button type="submit" name="checkin" class="btn btn-warning" >Check-in</button>
            <button type="submit" name="reset" class="btn btn-warning" onclick="return confirm('Are you sure want to reset?')" >Reset</button>
            <a href="dashboard.php?id=<?php echo $id ?>" class="btn btn-warning" role="button">Back</a>
        </form>

        <div id="currentattandancelist"> <!-- Show all data in $_SESSION['attendance'] -->
          <img src="https://img.pikbest.com/58pic/35/39/61/62K58PICb88i68HEwVnm5_PIC2018.gif!w340" height="200px" width="200px" alt="Loading..."/>
        </div>



    </body>
</html>
