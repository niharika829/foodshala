<html>

<head>
  <title>FoodShala-About Us</title>
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
    <img src="images/rest_2.jpg" alt="Snow" style="width:100%;height:80%;">
    <div class="bottom-left">
      <div data-aos="fade-right">
        <h2 class="about" style="color:white"><i>About Us</i></h2>
        <p style="font-size:30px;color:white"><span><a href="home.php"><b>Home</b></a></span>><span class="small" style="color:white">About</span></p>
      </div>
    </div>

  </div>

  <br>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div data-aos="fade-up-right">
            <div style="background-image: url(images/rest_7.jpg);height:100%;position:relative;bottom:3%;">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div data-aos="fade-up-left">
            <div>
              <h1 class="big"><span class="aboutanimate" data-aos="fade-up" data-aos-duration="3000">About</span><sub class="sub" data-aos="fade-up" data-aos-duration="4000">about</sub></h1>
            </div>
            <div>
              <p data-aos="fade-up" data-aos-duration="5000">Our main focus is on quality and hygiene.
                Our Restaurant is well equipped with advanced technology equipments and provides best quality services.
                Our staff is well trained and experienced, offering advanced services in food that will leave you
                feeling relaxed and stress free. The specialities in the restaurant are, apart from regular
                ones..</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>
  <?php require 'footer.php'; ?>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>



</body>

</html>