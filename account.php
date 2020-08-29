<?php
session_save_path("C:/xampp/tmp");
session_start();
$conn = mysqli_connect("localhost", "root", "", "foodshala");
if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
}
if (isset($_POST['veg_menu_button'])) {
  header('Location:veg_menu.php');
}
if (isset($_POST['non_veg_menu_button'])) {
  header('Location:non_veg_menu.php');
}
if (isset($_POST['orders'])) {
  header('Location:orders.php');
}
if (isset($_POST['edit'])) {
  header('Location:user_edit.php');
}
if (isset($_POST['logout'])) {
  header('Location:login.php');
}
if (isset($_SESSION['username'])) {
  $name = $_SESSION['username'];
  $first = $_SESSION['first'];
  $last = $_SESSION['last'];
  $id = $_SESSION['id'];
  $email = $_SESSION['email'];
  $tel = $_SESSION['tel'];
  $img = $_SESSION['img'];
}
$sqltb_show_cartitems = "SELECT * FROM cart WHERE useremail='$_SESSION[email]'";
$res = mysqli_query($conn, $sqltb_show_cartitems);
$count = 0;
if (mysqli_num_rows($res) > 0) {
  while ($row = mysqli_fetch_assoc($res)) {
    $count++;
  }
}
?>
<html>

<head>
  <title>FoodShala-My Account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <a class="navbar-brand" href="#">
      <img src="pic/<?php echo $img ?>" alt="Logo" style="width:120px;height:70px;border-radius:50%">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <form method="post">
            <input style="width:100%;font-size:20px;" class="btn btn-danger" type="submit" value="Veg Menu" name="veg_menu_button">
          </form>
        </li>
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        <li class="nav-item">
          <form method="post">
            <input style="width:100%;font-size:20px;" class="btn btn-danger" type="submit" value="Non-Veg Menu" name="non_veg_menu_button">

          </form>
        </li>
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        <li class="nav-item">
          <form method="post">
            <input style="width:100%;font-size:20px;" class="btn btn-danger" type="submit" value="order history" name="orders">

          </form>
        </li>
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        <li class="nav-item">
          <form method="post">
            <input style="width:100%;font-size:20px;" class="btn btn-danger" type="submit" value="edit details" name="edit">

          </form>
        </li>
        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        <li class="nav-item">
          <form method="post">
            <input style="width:100%;font-size:20px;" class="btn btn-danger" type="submit" value="logout" name="logout">

          </form>
        </li>
        <li class="nav-item">
          <form action="cart.php" method="post">
            <button name="submit_to_cart" value="0" style="margin-left:370px;margin-top:6px" class="btn btn-primary">cart <span class="badge badge-light"><?php echo $count ?></span></button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <img src="images/rest_1.jpg" alt="Snow" style="width:100%;height:60%;">
    <div class="bottom-left">
      <div data-aos="fade-right">
        <h2 class="about" style="font-size:5vw;"><i><?php echo "Welcome " . $name; ?></i></h2>

      </div>
    </div>

    <br>

    <div class="container-fluid">
      <h2 style="color:white;"><i>Menu >>> </i></h2>
      <?php
      echo "<div class='row'>";
      $sqltb_show_vegmenu = "SELECT * FROM menu";
      $res = mysqli_query($conn, $sqltb_show_vegmenu);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
      ?>
          <div data-aos="flip-down" class="card border-dark mb-3" style="max-width: 18rem;">
            <div class="card-header badge badge-pill badge-danger"><?php echo $row['category'] ?></div>
            <div class=" card-body text-dark">
              <img class="card-img-top" src="images/<?php echo $row['img'] ?>" alt="Card image cap" style="width:250px;height:250px;">
              <h5 class="card-title"><?php echo $row['name'] ?></h5>
              <p class="card-text">&#36;<?php echo $row['price'] ?></p>
              <p class="card-text">
                <form action="cart.php" method="post">
                  <button name="submit_to_cart" class="btn btn-primary" value="<?php echo $row['id']; ?>">add to cart</button>
                </form>
              </p>
            </div>
          </div>
          &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
      <?php
        }
      }
      echo "</div>";
      ?>
    </div>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

</body>

</html>