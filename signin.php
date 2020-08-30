<html>
<?php
if (isset($_POST['myaccount'])) {

  echo '<script type="text/javascript">';
  echo 'window.location.href="login.php";';
  echo '</script>';
}
?>

<head>
  <title>FoodShala-Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    body {

      background: url('images/rest_3.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center center;
      background-size: cover;
      margin: 0 !important;
      background-size: 100% cover !important;

    }

    form {
      width: 40%;
      margin-top: 10%;
    }

    input[type=text] {
      width: 80%;
      padding: 12px 20px;

      display: inline-block;


    }

    input[type=email],
    input[type=tel],
    input[type=number] {
      width: 80%;
      padding: 12px 20px;

      display: inline-block;


    }

    input[type=password] {
      width: 80%;
      padding: 12px 20px;

      display: inline-block;

    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 80%;
      border-radius: 40px;
    }

    input[type=submit]:hover {
      opacity: 0.8;
    }


    @media screen and (max-width: 300px) {

      input[type=submit] {
        width: 100%;
      }
    }
  </style>
</head>

<body>

  <?php require 'header.php'; ?>
  <section>
    <center>


      <form action="dbsigninform.php" method="post" enctype="multipart/form-data" style="background-color:maroon;">
        <p>
          <p style="color:white;"><br>Welcome To Our Family<br>
            <p>
              <p style="color:white;">first name:</p>
              <input name="first" type="text">
            </p>
            <p>
              <p style="color:white;">last name:</p>
              <input name="last" type="text">
            </p>
            <p>
              <p style="color:white;">email id:</p>
              <input name="email" type="email">
            </p>
            <p>
              <p style="color:white;">address:</p>
              <input name="address" type="text">
            </p>
            <p>
              <p style="color:white;">password:</p>
              <input name="password" type="password">
            </p>
            <p>
              <p style="color:white;">confirm:</p>
              <input name="confirm" type="password">
            </p>
            <p>
              <p style="color:white;">your age:</p>
              <input name="age" type="number">
            </p>
            <p>
              <p style="color:white;">tel number:</p>
              <input name="tel" type="tel">
            </p>
            <p>
              <p style="color:white;">what do you prefer more:</p>
              <input type="radio" name="veg" value="veg"><span style="color:white; margin-right:50px">veg</span>
              <input type="radio" name="nonveg" value="nonveg"><span style="color:white">non-veg</span>

            </p>
            <p>
              <p style=" color:white;">picture:
              </p>
              <input type="file" name="img1" style=" color:white;">
            </p>
            <input type="submit" style='font-size:2vw;' name="submit" value="create new account">

      </form>
      <form method='post'><input class='btn btn-warning' type='submit' name='myaccount' value='back to login'></form>
    </center>




</body>

</html>
