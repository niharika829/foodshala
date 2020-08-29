<?php
if (isset($_POST['newuser'])) {
  header('Location:signin.php');
}

?>
<html>

<head>
  <title>FoodShala-Log In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    body {

      background: url('images/rest_1.jpg');
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

    input[type=email] {
      width: 80%;
      padding: 12px 20px;

      display: inline-block;


    }

    input[type=password] {
      width: 75%;
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


      <form action="dbloginform.php" method="post" style="background-color:maroon;margin-top:20%">
        <p style="color:white;">Log IN</p>
        <p>
          <p style="color:white;">mail-id:</p>
          <input name="email" type="email" value="<?php if (isset($_COOKIE["email"])) {
                                                    echo $_COOKIE["email"];
                                                  } ?>">
        </p>
        <p>
          <p style="color:white;">password:</p>
          <input name="password" type="password" value="<?php if (isset($_COOKIE["password"])) {
                                                          echo $_COOKIE["password"];
                                                        } ?>">
        </p>
        <input type="submit" name="submit" value="login">

      </form>

      <form method="post">
        <input type="submit" style="font-size:2vw;" name="newuser" value="not a member? sign up">
      </form>

    </center>




</body>

</html>