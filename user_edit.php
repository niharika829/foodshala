<?php
session_save_path("C:/xampp/tmp");
session_start();
$conn = mysqli_connect("localhost", "root", "", "foodshala");
$img = $_SESSION['img'];
if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
}

?>
<html>

<head>
  <title>FoodShala-Edit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="styles.css">
</head>

<body>


  <a href="account.php" class="btn btn-success" style="border-radius:15%;position:fixed;">
    back to menu
  </a>


  <center>

    <form data-aos="zoom-in" method="post" enctype="multipart/form-data" style="background-color:maroon;width:50%;">
      <div class="jumbotron">
        <p>
          <p>first:</p>
          <input name="first" type="text">
        </p>
        <p>
          <p>last:</p>
          <input name="last" type="text">
        </p>
        <p>
          <p>email:</p>
          <input name="email" type="email">
        </p>
        <p>
          <p>address:</p>
          <input name="address" type="text">
        </p>
        <p>
          <p>password:</p>
          <input name="password" type="password">
        </p>
        </p>
        <p>
          <p>confirm:</p>
          <input name="confirm" type="password">
        </p>
        <p>
          <p>age:</p>
          <input name="age" type="number">
        </p>
        <p>
          <p>number:</p>
          <input name="tel" type="tel">
        </p>
        <p>
          <p>what do you prefer more:</p>
          <input type="radio" name="veg" value="veg"><span style=" margin-right:50px">veg</span>
          <input type="radio" name="nonveg" value="nonveg"><span>non-veg</span>

        </p>
        <p>
          <p>upload a picture:</p>
          <input type="file" name="img1">
        </p>

        <input type="submit" class="btn btn-danger" style="border-radius:15%;" name="submitedit" value="edit details">
        <div>
    </form>
  </center>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</html>







<?php

if (isset($_POST['submitedit'])) {

  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pass = $_POST['password'];
  $confirm = $_POST['confirm'];
  $age = $_POST['age'];
  $tel = $_POST['tel'];
  $img = $_FILES['img1']['name'];
  $temp_name = $_FILES['img1']['tmp_name'];
  $filepath = "pic/$img";
  $file_type = $_FILES['img1']['type'];

  $firstErr = $lastErr = $addrErr = $emailErr = $passErr = $confirmErr = $ageErr = $telErr = '';
  $id = $_SESSION['id'];
  if ($_POST["first"]) {
    $f = $_POST["first"];
    $sqlt = "UPDATE userdata SET firstname='$f' WHERE id='$id'";
    if (mysqli_query($conn, $sqlt)) {
      echo "<nav aria-label='breadcrumb'>
  <ol class='breadcrumb'>
    <li class='breadcrumb-item active' aria-current='page'> firstname updated successfully<br></li>
  </ol>
</nav>";

      header('refresh:2; url=login.php');
    }
  }
  if ($_POST["last"]) {
    $f = $_POST["last"];
    $sqlt = "UPDATE userdata SET lastname='$f' WHERE id='$id'";
    if (mysqli_query($conn, $sqlt)) {
      echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> lastname updated successfully<br></li>
            </ol>
          </nav>";

      header('refresh:2; url=login.php');
    }
  }
  if ($_POST["email"]) {
    $f = $_POST["email"];
    $sqlt = "UPDATE userdata SET email='$f' WHERE id='$id'";
    $sqlt1 = "UPDATE orders SET email='$f' WHERE id='$id'";
    $sqlt2 = "UPDATE cart SET useremail='$f' WHERE userid='$id'";
    if (mysqli_query($conn, $sqlt)) {
      if (mysqli_query($conn, $sqlt1)) {
        if (mysqli_query($conn, $sqlt2)) {
          echo "<nav aria-label='breadcrumb'>
                    <ol class='breadcrumb'>
                      <li class='breadcrumb-item active' aria-current='page'> email updated successfully<br></li>
                    </ol>
                  </nav>";

          header('refresh:2; url=login.php');
        }
      }
    }
  }
  if ($_POST["address"]) {
    $f = $_POST["address"];
    $sqlt = "UPDATE userdata SET address='$f' WHERE id='$id'";
    $sqlt1 = "UPDATE orders SET address='$f' WHERE id='$id'";
    if (mysqli_query($conn, $sqlt)) {
      if (mysqli_query($conn, $sqlt1)) {
        echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> address updated successfully<br></li>
            </ol>
          </nav>";

        header('refresh:2; url=login.php');
      }
    }
  }


  if ($_POST["password"]) {
    if (!preg_match("/^[A-Z][a-zA-Z@0-9]+$/", $_POST["password"])) {
      $regErr = "please follow a correct format for password(first letter should be capital followed by any combination of a-z,A-Z,0-9,@)<br>";
      echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> " . $regErr . "<br></li>
            </ol>
          </nav>";
    } else {
      if (empty($_POST["confirm"])) {
        $confirmErr = "confirm password is Missing";
        echo "<nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                  <li class='breadcrumb-item active' aria-current='page'> " . $confirmErr . "<br></li>
                </ol>
              </nav>";

        echo "<br>";
      } else {
        if ($_POST["password"] === $_POST["confirm"]) {
          $f = $_POST['password'];
          $sqlt = "UPDATE userdata SET password='$f' WHERE id='$id'";
          if (mysqli_query($conn, $sqlt)) {
            echo "<nav aria-label='breadcrumb'>
                        <ol class='breadcrumb'>
                          <li class='breadcrumb-item active' aria-current='page'> password updated successfully<br></li>
                        </ol>
                      </nav>";

            header('refresh:2; url=login.php');
          }
        } else {
          echo "<nav aria-label='breadcrumb'>
                    <ol class='breadcrumb'>
                      <li class='breadcrumb-item active' aria-current='page'> passwords does not match<br></li>
                    </ol>
                  </nav>";
        }
      }
    }
  }

  if (!empty($_POST["veg"]) && !empty($_POST["nonveg"])) {
    echo  "<nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> please choose one preference <br></li>
    </ol>
  </nav>";
  } else {
    if (!empty($_POST["veg"])) {
      $f = $_POST["veg"];
      $sqlt = "UPDATE userdata SET preference='$f' WHERE id='$id'";
      if (mysqli_query($conn, $sqlt)) {
        echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> preference updated successfully<br></li>
            </ol>
          </nav>";

        header('refresh:2; url=login.php');
      }
    } elseif (!empty($_POST["nonveg"])) {
      $f = $_POST["nonveg"];
      $sqlt = "UPDATE userdata SET preference='$f' WHERE id='$id'";
      if (mysqli_query($conn, $sqlt)) {
        echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> preference updated successfully<br></li>
            </ol>
          </nav>";

        header('refresh:2; url=login.php');
      }
    } else {
      echo "<script>console.log('no preference edited');</script>";
    }
  }

  if ($_POST["age"]) {
    $f = $_POST["age"];
    $sqlt = "UPDATE userdata SET age='$f' WHERE id='$id'";
    if (mysqli_query($conn, $sqlt)) {
      echo "<nav aria-label='breadcrumb'>
            <ol class='breadcrumb'>
              <li class='breadcrumb-item active' aria-current='page'> age updated successfully<br></li>
            </ol>
          </nav>";

      header('refresh:2; url=login.php');
    }
  }
  if ($_POST["tel"]) {
    $f = $_POST["tel"];
    $sqlt = "UPDATE userdata SET telephone='$f' WHERE id='$id'";
    $sqlt1 = "UPDATE orders SET tel='$f' WHERE id='$id'";
    if (mysqli_query($conn, $sqlt)) {
      if (mysqli_query($conn, $sqlt1)) {
        echo "<nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                  <li class='breadcrumb-item active' aria-current='page'> number updated successfully<br></li>
                </ol>
              </nav>";

        header('refresh:2; url=login.php');
      }
    }
  }
  if ($temp_name || $img) {
    if ($file_type == "image/jpeg") {
      move_uploaded_file($temp_name, $filepath);
      $sqlt = "UPDATE userdata SET img='$img' WHERE id='$id'";
      if (mysqli_query($conn, $sqlt)) {
        echo "<nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                  <li class='breadcrumb-item active' aria-current='page'> profile picture updated successfully<br></li>
                </ol>
              </nav>";

        header('refresh:2; url=login.php');
      }
    } else {
      echo "<nav aria-label='breadcrumb'>
                <ol class='breadcrumb'>
                  <li class='breadcrumb-item active' aria-current='page'> format not supported for profile picture<br></li>
                </ol>
              </nav>";
    }
  }
}
