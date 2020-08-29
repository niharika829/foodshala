<?php
if (isset($_POST['submit'])) {
  filter_list();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $pass = $_POST['password'];
  $confirm = $_POST['confirm'];
  $age = $_POST['age'];
  $tel = $_POST['tel'];
  $prefer_veg = $_POST['veg'];
  $prefer_non_veg = $_POST['nonveg'];
  $img = $_FILES['img1']['name'];
  $temp_name = $_FILES['img1']['tmp_name'];
  $filepath = "pic/$img";
  $file_type = $_FILES['img1']['type'];

  $conn = mysqli_connect($servername, $username, $password, "foodshala");
  if (!$conn) {
    die("connection failed<br>" . mysqli_connect_error());
  }

  $firstErr = $lastErr = $addrErr = $emailErr = $passErr = $confirmErr = $ageErr = $telErr = $preferErr = $prefer = '';

  if (empty($_POST["first"])) {
    $firstErr = "first name is Missing";
    echo $firstErr;
    echo "<br>";
  } elseif (empty($_POST["last"])) {
    $lastErr = "last name is Missing";
    echo $lastErr;
    echo "<br>";
  } elseif (empty($_POST["email"])) {
    $emailErr = "email is Missing";
    echo $emailErr;
    echo "<br>";
  } elseif (empty($_POST["address"])) {
    $addErr = "address is Missing";
    echo $addErr;
    echo "<br>";
  } elseif (empty($_POST["password"])) {
    $passErr = "password is Missing";
    echo $passErr;
    echo "<br>";
  } elseif (!preg_match("/^[A-Z][a-zA-Z@0-9]+$/", $_POST["password"])) {
    $regErr = "please follow a correct format for password(first letter should be capital followed by any combination of a-z,A-Z,0-9,@)<br>";
    echo $regErr;
  } elseif (empty($_POST["confirm"])) {
    $confirmErr = "confirm password is Missing";
    echo $confirmErr;
    echo "<br>";
  } elseif (empty($_POST["age"])) {
    $ageErr = "age is Missing";
    echo $ageErr;
    echo "<br>";
  } elseif (empty($_POST["tel"])) {
    $telErr = "telephone no. is Missing";
    echo $telErr;
    echo "<br>";
  } elseif (empty($_POST["veg"]) && empty($_POST["nonveg"])) {
    $preferErr = "preference is Missing";
    echo $preferErr;
    echo "<br>";
  } elseif ($file_type != "image/jpeg") {
    echo "uploaded image shd be in jpg/jpeg type";
  } else {

    if ($file_type == "image/jpeg") {
      move_uploaded_file($temp_name, $filepath);
    }
    if ($pass === $confirm) {
      $email = filter_var($email, FILTER_SANITIZE_EMAIL);
      if (!empty($_POST["veg"]) && !empty($_POST["nonveg"])) {
        echo "please choose one preference";
      } else {
        if (!empty($_POST["veg"])) {
          $prefer = "veg";
        } else {
          $prefer = "nonveg";
        }
        $sqltb = "SELECT * FROM userdata WHERE email='$email'";
        $res = mysqli_query($conn, $sqltb);
        if (mysqli_num_rows($res) == 0) {


          $sqltb1 = "INSERT INTO userdata(firstname,lastname,email,address,password,preference,age,telephone,img) VALUES('$first','$last','$email','$address','$pass','$prefer','$age','$tel','$img')";
          if (mysqli_query($conn, $sqltb1)) {
            header('Location:login.php');
          } else {
            echo "error" . $sqltb1 . "<br>" . mysqli_error($conn);
          }
        } else {
          echo "simillar account with " . $email . " already exists";
        }
        //
      }
    } else {
      echo "password and confirm pass word are not same";

      mysqli_close($conn);
    }
  }
}
