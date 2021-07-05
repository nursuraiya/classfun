<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
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
  </style>
</head>

<body>

  <div class="jumbotron">
    <div class="container text-center">
      <h1>C L A S S F U N !</h1>
      <p><em>Wanna Test Your General Knowledge ??</em></p>
    </div>
  </div>

  <div class="icon-bar">
    <a class="active" href="#myCarousel"><i class="fa fa-home"></i></a>
    <a href="information.php"><i class="fa fa-info-circle" aria-hidden="true"></i></a>
    <a href="user/signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
  </div>

  <header class="page-header header container-fluid">

    <div class="container-fluid">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="https://images.unsplash.com/photo-1522211988038-6fcbb8c12c7e?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8a25vd2xlZGdlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80" alt="Los Angeles" style="width:100%;">
          </div>

          <div class="item">
            <img src="https://wallpaperaccess.com/full/1471691.jpg" alt="Chicago" style="width:100%;">
          </div>

          <div class="item">
            <img src="https://wallpapercave.com/wp/wp2003323.jpg" alt="New york" style="width:100%;">
          </div>
        </div>

        <!-- Left and right controls -->
        <div class="overlay"></div>
        <div class="description">
          <h1>Test Your Basic Knowledge!</h1>
          <br>
          <p>Lets have fun with us!
            <br>
            <br>
            <a href="login.php" class="btn btn-light btn-lg" role="button">Login Here !</a>
          </p>
        </div>
      </div>
    </div>

  </header>

  <div class="container">
    <h2>FOR MORE INFORMATION ..</h2>
    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
      Reach Me Here !
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Contact me for more details..</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <p>
              <a href="https://www.instagram.com/yayastapha/" target="_blank">
                <img border="0" alt="instagram" src="https://www.freepnglogos.com/uploads/download-instagram-png-logo-20.png" width="100" height="100">
              </a>

              <a href="https://twitter.com/nursuraiyaaa" target="_blank">
                <img border="0" alt="twitter" src="https://pngimg.com/uploads/twitter/twitter_PNG95259.png" width="100" height="100">
              </a>

              <a href="https://wa.me/601117950194" target="_blank">
                <img border="0" alt="whatsapp" src="http://assets.stickpng.com/images/580b57fcd9996e24bc43c543.png" width="100" height="100">
              </a>

              <a href="https://shopee.com.my/suraiyanur" target="_blank">
                <img border="0" alt="shopee" src="https://www.freepnglogos.com/uploads/shopee-logo/shopee-circle-logo-design-shopping-bag-13.png" width="100" height="100">
              </a>
            </p>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>
  <br>

  <!-- Footer -->

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  <script src="../js/main.js"></script>

</body>

</html>
