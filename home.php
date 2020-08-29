<?php
if (isset($_POST['menu_items'])) {
  header('Location:menu_items.php');
}
if (isset($_POST['submit_login'])) {
  header('Location:login.php');
}
?>
<html>

<head>
  <title>FoodShala||Home Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
    }

    .parallax_one {
      background-image: url("images/rest_6.jpg");
      min-height: 400px;
      margin: 5%;
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>

<body>

  <?php require 'header.php'; ?>
  <section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>


      <div class="carousel-inner">
        <div class="item active">
          <img src="images/rest_1.jpg" alt="Los Angeles" style="width:100%;height:100%;">
          <div class="carousel-caption">
            <h3>Smart Look</h3>
            <p>We pride ourselves on our high quality work and attention to detail. The Restaurant we use are of top quality branded products.</p>
          </div>
        </div>

        <div class="item">
          <img src="images/rest_2.jpg" alt="Chicago" style="width:100%;height:100%;">
          <div class="carousel-caption">
            <h3>Natural Benefits</h3>
            <p>We provides huge facilities with advanced technology equipments and best quality service. Here we offer best treatment that you might have never experienced before.</p>
          </div>
        </div>

        <div class="item">
          <img src="images/rest_3.jpg" alt="New York" style="width:100%;height:100%;">
          <div class="carousel-caption">
            <h3> Customer Care</h3>
            <p>We focuses on providing best services beacause your care is our need.</p>
          </div>
        </div>

      </div>


      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <br>
  <div class="parallax_one">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div data-aos="fade-right" style="margin-top:25%;">
            <form method="post">
              <div style="background:transparent url('images/rest_5.jpg') no-repeat center center /cover ">
                <br><br> <br><br>
                <div data-aos="fade-down-left">
                  <input style="width:60%;font-size:30px;" class="btn btn-danger" type="submit" name="menu_items" value="MENU"></div>
                <br><br> <br><br>
                <div data-aos="fade-down-right">
                  <input style="width:60%;font-size:30px;" class="btn btn-danger" type="submit" name="submit_login" value="LOGIN"></div>
                <br><br> <br><br>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div data-aos="fade-left"><img src="images/rest_4.jpg" style="margin-top:15%;width:100%;height:80%"></div>
        </div>
      </div>
    </div>
  </div>


  <br>

  <?php require 'footer.php'; ?>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>


</html>