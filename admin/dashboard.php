<?php
session_start();
include "../db.php";

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

$id = $_SESSION['id'];
 ?>
 <!DOCTYPE html>
 <html>

 <head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="../css/questiontab.css">
   <style media="screen">
     p {
       font-size: 20px;
     }
   </style>
 </head>

 <body>
   <div class="header">
     <h2>ADMIN:QUESTION TAB ! </h2>
   </div>
   <div class="container">

     <p>You can edit or delete questions.</p>

     <div class="row">
       <div class="column">
         <div class="card1">
           <img src="https://www.shareicon.net/data/2016/09/02/823786_multimedia_512x512.png" alt="maths" width="200" height="200">
           <h3>Mathematics</h3>
           <p>Basic calculations for you</p>
           <a href="questions/math.php" class="btn btn-info" role="button">Go Maths!</a>
         </div>
       </div>

       <div class="column">
         <div class="card2">
           <img src="../image/bm.png" alt="science" width="200" height="200">
           <h3>Bahasa Melayu</h3>
           <p>Bahasa Melayu bahasa kebangsaan</p>
           <a href="questions/bm.php" class="btn btn-info" role="button">Ayuh Melayu</a>
         </div>
       </div>

       <div class="column">
         <div class="card3">
           <img src="http://cdn.onlinewebfonts.com/svg/img_504332.png" alt="science" width="200" height="200">
           <h3>Science</h3>
           <p>Life and experiments for you to explore</p>
           <a href="questions/science.php" class="btn btn-info" role="button">Science</a>

         </div>
       </div>

       <div class="column">
         <div class="card4">
           <img src=" https://images.vexels.com/media/users/3/206026/isolated/preview/7f033fd498f162ff782c44a5b1c8b2f2-english-in-board-doodle-by-vexels.png" <img src="http://cdn.onlinewebfonts.com/svg/img_504332.png" alt="science" width="200"
             height="200">
           <h3>English</h3>
           <p>Go ahead, make my day. Happy with English</p>
           <a href="questions/english.php" class="btn btn-info" role="button">Come On!</a>
         </div>
       </div>

       <div class="column">
         <div class="card5">
           <h3>Attendance</h3>
           <p>Please record your attendance for today</p>
           <a href="adminAttendance.php?id=<?php echo $id ?>" class="btn btn-info" role="button">Come On!</a>
         </div>
       </div>

       <br><br><br>
     </div>
     <form method="post">
       <button type="submit" name="logout" class="btn btn-warning">Log Out</button>
     </form>

   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>

 </html>
