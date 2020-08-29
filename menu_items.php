<?php
$conn = mysqli_connect("localhost", "root", "", "foodshala");
if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
}
if (isset($_POST['order_now'])) {
  header('Location:login.php');
}
?>
<html>

<head>
  <title>FoodShala-Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


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
      bottom: 18px;
      left: 16px;
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


    .items {
      padding-left: 20px;
      letter-spacing: 3px;
    }

    .head {
      color: white;
      font-size: 30px;
      line-height: 40px;

      transform: translateY(40px);
      transition: all 0.7s;

    }



    .bottom-left {
      position: absolute;
      top: 55%;
    }



    #panel,
    #flip {
      padding: 5px;
      text-align: center;
      background-color: #e5eecc;
      border: solid 1px #c3c3c3;
    }

    #panel {
      padding: 50px;
      display: none;
    }
  </style>

</head>

<body>
  <?php require 'header.php'; ?>
  <div class="container-fluid">
    <img src="images/rest_1.jpg" alt="Snow" style="width:100%;height:80%;">
    <div class="bottom-left">
      <div data-aos="fade-right">
        <h2 class="about" style="color:white"><i>Menu</i></h2>
        <p style="font-size:30px;color:white"><span><a href="home.php"><b>Home</b></a></span>><span class="small" style="color:white">Menu</span></p>

      </div>
    </div>

  </div>
  <br>
  <section>
    <div class="container-fluid">
      <h2><i>Veg >>> </i></h2>
      <?php
      echo "<div class='row'>";
      $sqltb_show_vegmenu = "SELECT * FROM menu WHERE category='veg'";
      $res = mysqli_query($conn, $sqltb_show_vegmenu);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
      ?>
          <div class="card border-dark mb-5" style="max-width: 18rem;">
            <div class="card-header badge badge-pill badge-danger"><?php echo $row['category'] ?></div>
            <div class=" card-body text-dark">
              <img class="card-img-top" src="images/<?php echo $row['img'] ?>" alt="Card image cap" style="width:250px;height:250px;">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <p class="card-text">&#36;<?php echo $row['price'] ?></p>

            </div>
          </div>
          &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;


      <?php
        }
      }
      echo "</div>";
      ?>



      <br><br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <div id="flip">
            <h2><i>Non Veg >>> </i></h2>
          </div>
          <div id="panel">
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <div class="container-fluid">
              <?php
              echo "<div class='row'>";
              $sqltb_show_vegmenu = "SELECT * FROM menu WHERE category='nonveg'";
              $res = mysqli_query($conn, $sqltb_show_vegmenu);
              if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
              ?>
                  <div class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header badge badge-pill badge-danger"><?php echo $row['category'] ?></div>
                    <div class=" card-body text-dark">
                      <img class="card-img-top" src="images/<?php echo $row['img'] ?>" alt="Card image cap" style="width:250px;height:250px;">
                      <h5 class="card-title"><?php echo $row['name'] ?></h5>
                      <p class="card-text">&#36;<?php echo $row['price'] ?></p>

                    </div>
                  </div>
                  &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;




              <?php
                }
              }
              echo "</div>";
              ?>






            </div>

          </div>
        </div>
        <div class="col-md-1"></div>
      </div><br><br>
    </div>
    <form method="post">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

          </div>
          <div class="col-md-8">
            <input style="width:50%;font-size:30px;" type="submit" class="btn btn-warning" name="order_now" value="order now">
          </div>
          <div class="col-md-4">

          </div>
        </div>
      </div>
    </form>
  </section>






  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

  <script>
    $(document).ready(function() {
      $("#flip").click(function() {
        $("#panel").slideToggle("slow");
      });
    });
  </script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</body>

</html>