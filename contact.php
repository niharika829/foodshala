<html>

<head>
  <title>FoodShala-Contact</title>
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
  <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



  <style>
    ion-icon {
      font-size: 50px;
      color: black;
    }

    .about {
      font-size: 80px;
      font-weight: 30%;
      color: black;
    }

    .small {

      color: black;
    }

    .sticky {
      position: fixed;
      top: 0;
      width: 100%;
    }

    .bottom-left {
      position: absolute;
      top: 50%;
    }

    .big {
      font-family: Impact, Charcoal, sans-serif;
      color: grey;
      font-size: 80px;
      font-weight: 30%;
    }

    .sub {
      font-family: Impact, Charcoal, sans-serif;
      color: black;
      font-size: 30px;
      font-weight: 30%;
    }
  </style>

</head>

<body>
  <?php require 'header.php'; ?>
  <div class="container-fluid">
    <img src="images/rest_6.jpg" alt="Snow" style="width:100%;height:80%;">
    <div class="bottom-left">
      <div data-aos="fade-right">
        <h2 class="about" style="color:white"><i>Contact Us</i></h2>
        <p style="font-size:30px;color:white"><span><a href="home.php"><b>Home</b></a></span>><span class="small" style="color:white">contact</span></p>
      </div>
    </div>

  </div>

  <br>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">

      </div>
      <div class="col-md-2">
        <div data-aos="fade-right">
          <ion-icon name="home"></ion-icon>
          <h1>address</h1>
          <p>address.</p>
        </div>
      </div>
      <div class="col-md-2">
        <div data-aos="fade-down">
          <ion-icon name="call"></ion-icon>
          <h1>Contact</h1>
          <p>000-000-0000</p>
        </div>
      </div>
      <div class="col-md-2">
        <div data-aos="fade-up">
          <ion-icon name="mail"></ion-icon>
          <h1>Email Address</h1>
          <p>test@test.com</p>
        </div>
      </div>
      <div class="col-md-2">
        <div data-aos="fade-left">
          <ion-icon name="alarm"></ion-icon>
          <h1>Timings</h1>
          <p>10:30 am to 7:30 pm</p>
        </div>
      </div>
      <div class="col-md-2">

      </div>
    </div>
  </div>


  <br>
  <?php require 'footer.php'; ?>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>