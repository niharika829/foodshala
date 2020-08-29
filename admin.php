<html>

<head>
  <title>FoodShala-Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .bottom-left {
      position: absolute;
      top: 17%;
      bottom: 18px;
      left: 16px;
    }

    .about {
      font-size: 80px;
      font-weight: 30%;
      color: white;
    }

    .form1 {
      width: 40%;
    }

    .rotate {
      animation: rotation 4s infinite linear;
    }

    @keyframes rotation {
      from {
        transform: rotate(0deg);
      }

      to {
        transform: rotate(359deg);
      }
    }
  </style>
</head>

<body>
  <section class="hero-wrap hero-wrap-2" style="background-image: url('images/rest_admin.jpg');height:70%;" data-stellar-background-ratio="0.5">
    <div data-aos="fade-right">
      <h2 class="about" style="color:white"><i>Welcome Admin</i></h2>
      <p style="font-size:30px;color:white"><span><a href="home.php"><b>Home</b></a></span>><span class="small" style="color:white">Admin</span></p>
    </div>

    <form method="post">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Total Orders" name="total">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Pending Orders" name="pending">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Confirmed Orders" name="confirmed">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Cancelled Orders" name="cancelled">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="All Users" name="users">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Food Items" name="allitems">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Add Items" name="newitems">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" class="btn btn-danger" type="submit" value="Update Account" name="update_account">
      <input style="width:17%;font-size:1.5vw;" class="btn btn-danger" type="submit" value="Logout" name="logout">
    </form>
  </section>

  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
<?php
$conn = mysqli_connect("localhost", "root", "", "foodshala");

if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
}


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////total orders//////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['total'])) {
  echo "<form method='post' data-aos='flip-left'>
  <b>Enter Order Id:-</b><br><input type='number' name='info_id'>
  <input style='width:20%;font-size:2vw;'class='btn btn-danger'type='submit' name='search' value='search'>
  </form>";
  $count = 0;

  echo "  <div class='container-fluid table-responsive'>
  <table border='1' class='table table-dark table-hover'><thead>
  <tr>
  <th></th>
  <th>registered email</th>
  <th>order items</th>
  <th>total amount</th>
  <th>time</th>
  <th>date</th>
  <th>orderid</th>
  <th>status</th>
</tr></thead>";
  $sqltb1 = "SELECT * FROM orders";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $count++;
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['email'] . "</td>";
      echo "   <td>" . $row['userorder'] . "</td>";
      echo "   <td>" . $row['amount'] . "</td>";
      echo "  <td>" . $row['entry_time'] . "</td>";
      echo "  <td>" . $row['entry_date'] . "</td>";
      echo "  <td>" . $row['orderid'] . "</td>";
      echo "  <td>" . $row['action'] . "</td>";
      echo " </tr></tbody>";
    }
  }
  echo "</table></div>";
  echo "<b>total appointments- " . $count . "</b>";
}


if (isset($_POST['search'])) {
  $order_user_id = $_POST['info_id'];
  $sqltb1 = "SELECT * FROM orders WHERE orderid='$order_user_id'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {

      echo "  <div class='container-fluid table-responsive'>
      <table border='1' class='table table-dark table-hover'><thead>
      <tr>
      <th></th>
      <th>registered email</th>
      <th>order items</th>
      <th>total amount</th>
      <th>time</th>
      <th>date</th>
      <th>orderid</th>
      <th>status</th>
    </tr></thead>";
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['email'] . "</td>";
      echo "   <td>" . $row['userorder'] . "</td>";
      echo "   <td>" . $row['amount'] . "</td>";
      echo "  <td>" . $row['entry_time'] . "</td>";
      echo "  <td>" . $row['entry_date'] . "</td>";
      echo "  <td>" . $row['orderid'] . "</td>";
      echo "  <td>" . $row['action'] . "</td>";
      echo " </tr></tbody></table></div>";
    }
  } else {
    echo "<script>alert('invalid order id');</script>";
  }
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
////////////////////pending orders//////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

if (isset($_POST['pending'])) {
  $count = 0;
  echo "<form method='post' data-aos='flip-left'>
  <b>enter order id:-</b><br><input type='number' name='info_id'><br>
  <b>enter action:-</b><br/>
  <select name='a1'>
  <option value='confirmed'>confirmed</option><br/>
  <option value='cancelled'>cancelled</option><br/>
  </select><br>
  <input style='width:20%;font-size:2vw;'class='btn btn-danger'type='submit' name='action' value='action'>
  </form>";
  echo "  <div class='container-fluid table-responsive'>
  <table border='1' class='table table-dark table-hover'><thead>
  <tr>
  <th></th>
  <th>registered email</th>
  <th>order items</th>
  <th>total amount</th>
  <th>time</th>
  <th>date</th>
  <th>orderid</th>
  <th>status</th>
</tr></thead>";
  $sqltb1 = "SELECT * FROM orders WHERE action = 'wait for the response'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $count++;
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['email'] . "</td>";
      echo "   <td>" . $row['userorder'] . "</td>";
      echo "   <td>" . $row['amount'] . "</td>";
      echo "  <td>" . $row['entry_time'] . "</td>";
      echo "  <td>" . $row['entry_date'] . "</td>";
      echo "  <td>" . $row['orderid'] . "</td>";
      echo "  <td>" . $row['action'] . "</td>";
      echo " </tr></tbody>";
    }
  }
  echo "</table></div>";
  echo "<b>total pending appointments- " . $count . "</b>";
}

if (isset($_POST['action'])) {
  if ($_POST["info_id"]) {
    $orderid = $_POST["info_id"];
    $orderaction = $_POST["a1"];
    $sqltb1 = "SELECT * FROM orders WHERE orderid='$orderid'";
    $res = mysqli_query($conn, $sqltb1);
    if (mysqli_num_rows($res) > 0) {
      while ($row = mysqli_fetch_assoc($res)) {
        if ($row['action'] === "wait for the response") {
          $sqlt = "UPDATE orders SET action='$orderaction' WHERE orderid='$orderid'";
          if (mysqli_query($conn, $sqlt)) {
            echo "<script>alert('status updated suceessfully')</script>";
          }
        } else {
          echo "<script>alert('status is already confirmed or cancelled')</script>";
        }
      }
    } else {
      echo "<script>alert('invalid id')</script>";
    }
  } else {
    echo "<script>alert('enter all the fields')</script>";
  }
}


/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
////////////////////confirmed orders//////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['confirmed'])) {
  $count = 0;

  echo "  <div class='container-fluid table-responsive' style='margin-top:5%'>
  <table border='1' class='table table-dark table-hover'><thead>
  <tr>
  <th></th>
  <th>registered email</th>
  <th>order items</th>
  <th>total amount</th>
  <th>time</th>
  <th>date</th>
  <th>orderid</th>
  <th>status</th>
</tr></thead>";
  $sqltb1 = "SELECT * FROM orders WHERE action LIKE 'confirm%'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $count++;
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['email'] . "</td>";
      echo "   <td>" . $row['userorder'] . "</td>";
      echo "   <td>" . $row['amount'] . "</td>";
      echo "  <td>" . $row['entry_time'] . "</td>";
      echo "  <td>" . $row['entry_date'] . "</td>";
      echo "  <td>" . $row['orderid'] . "</td>";
      echo "  <td>" . $row['action'] . "</td>";
      echo " </tr></tbody>";
    }
  }
  echo "</table></div>";
  echo "<b>total confirmed appointments- " . $count . "</b>";
}

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
////////////////////cancelled orders//////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////


if (isset($_POST['cancelled'])) {
  $count = 0;
  echo "  <div class='container-fluid table-responsive' style='margin-top:5%'>
  <table border='1' class='table table-dark table-hover'><thead>
  <tr>
  <th></th>
  <th>registered email</th>
  <th>order items</th>
  <th>total amount</th>
  <th>time</th>
  <th>date</th>
  <th>orderid</th>
  <th>status</th>
</tr></thead>";
  $sqltb1 = "SELECT * FROM orders WHERE action LIKE 'cancel%'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $count++;
      echo " <tbody><tr >";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['email'] . "</td>";
      echo "   <td>" . $row['userorder'] . "</td>";
      echo "   <td>" . $row['amount'] . "</td>";
      echo "  <td>" . $row['entry_time'] . "</td>";
      echo "  <td>" . $row['entry_date'] . "</td>";
      echo "  <td>" . $row['orderid'] . "</td>";
      echo "  <td>" . $row['action'] . "</td>";
      echo " </tr></tbody>";
    }
  }
  echo "</table></div>";
  echo "<b>total cancelled appointments- " . $count . "</b>";
}

/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////all users//////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['users'])) {
  echo "<form method='post' data-aos='flip-left'>
 <b> enter user id:-</b><br><input type='number' name='userid'><br><br>
  <input style='width:20%;font-size:2vw;'class='btn btn-danger' type='submit' name='usersearch' value='search account'>
  <input style='width:20%;font-size:2vw;'class='btn btn-danger'type='submit' name='userdelete' value='delete account'>
  </form>";
  echo "  <div class='container-fluid table-responsive' style='margin-top:5%'>
  <table border='1' class='table table-dark table-hover'><thead>
  <tr>
  <th></th>
  <th>user id</th>
  <th>firstname</th>
  <th>lastname</th>
  <th>email</th>
  <th>address</th>
  <th>telephone</th>
  <th>profile</th>
</tr></thead>";
  $sqltb1 = "SELECT * FROM userdata";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
      </span>
      </td>";
      echo "    <td>" . $row['id'] . "</td>";
      echo "   <td>" . $row['firstname'] . "</td>";
      echo "   <td>" . $row['lastname'] . "</td>";
      echo "  <td>" . $row['email'] . "</td>";
      echo "  <td>" . $row['address'] . "</td>";
      echo "  <td>" . $row['telephone'] . "</td>";
      echo "  <td><img src='pic/" . $row['img'] . "' width='100px' heigth='120px'/></td>";
      echo " </tr></tbody>";
    }
  }
  echo "</table></div>";
}


if (isset($_POST['usersearch'])) {
  $order_user_id = $_POST['userid'];
  $sqltb1 = "SELECT * FROM userdata WHERE id='$order_user_id'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      echo "  <div class='container-fluid table-responsive' style='margin-top:5%'>
      <table border='1' class='table table-dark table-hover'><thead>
      <tr>
      <th></th>
      <th>user id</th>
      <th>firstname</th>
      <th>lastname</th>
      <th>email</th>
      <th>address</th>
      <th>telephone</th>
      <th>profile</th>
    </tr></thead>";
      echo " <tbody><tr>";
      echo "   <td><span><i class='fa fa-snowflake-o rotate' style='font-size:50px'></i>
    </span>
    </td>";
      echo "    <td>" . $row['id'] . "</td>";
      echo "   <td>" . $row['firstname'] . "</td>";
      echo "   <td>" . $row['lastname'] . "</td>";
      echo "  <td>" . $row['email'] . "</td>";
      echo "  <td>" . $row['address'] . "</td>";
      echo "  <td>" . $row['telephone'] . "</td>";
      echo "  <td><img src='pic/" . $row['img'] . "' width='100px' heigth='120px'/></td>";
      echo " </tr></tbody></table></div>";
    }
  } else {
    echo "invalid order id" . mysqli_error($conn);
  }
}

if (isset($_POST['userdelete'])) {
  $order_user_id = $_POST['userid'];
  $sqltb1 = "SELECT * FROM userdata WHERE id='$order_user_id'";
  $res = mysqli_query($conn, $sqltb1);
  if (mysqli_num_rows($res) > 0) {
    $sqltb1 = "DELETE FROM userdata WHERE id='$order_user_id'";
    $sqltb2 = "DELETE FROM orders WHERE id='$order_user_id'";
    $sqltb3 = "DELETE FROM cart WHERE userid='$order_user_id'";
    if (mysqli_query($conn, $sqltb1)) {
      if (mysqli_query($conn, $sqltb2)) {
        if (mysqli_query($conn, $sqltb3)) {
          echo "<script>alert('successfully deleted')</script>";
        }
      }
    }
  } else {
    echo "invalid id" . mysqli_error($conn);
  }
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////all food items//////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['allitems'])) {
  echo "<div class='container'><div class='row'>";
  $sqltb_show = "SELECT * FROM menu";
  $res = mysqli_query($conn, $sqltb_show);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) { ?>
      <div class="card border-dark mb-3" style="max-width: 18rem;" data-aos="zoom-in-down">
        <div class="card-header badge badge-pill badge-danger"><?php echo $row['category'] ?></div>
        <div class=" card-body text-dark">
          <img class="card-img-top" src="images/<?php echo $row['img'] ?>" alt="Card image cap" style="width:250px;height:250px;">
          <h5 class="card-title"><?php echo $row['name'] ?></h5>
          <p class="card-text">&#36;<?php echo $row['price'] ?></p>
          <form action='delete_item.php' method='post'>
            <button name='delete_food_item' class="btn btn-success" value=' <?php echo $row['id'] ?>'>delete </button>
          </form>
        </div>
      </div>
      &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;




<?php
    }
  }
  echo "</div></div>";
}


//////////////////////////////////////////////////////////////////////////////////
/////////////////////////add items//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['newitems'])) {
  echo "<center>  <br>
  <form method='post' data-aos='zoom-out-up' enctype='multipart/form-data'  style='background-color:black;color:white'class='form1'>
  <br>
    name:-<br><input type='text' name='itemname'><br>
      price:-<br><input type='text' name='itemprice'><br>
      category:-<br/><select name='a1'>
      <option value='veg'>veg</option><br/>
      <option value='nonveg'>non-veg</option><br/>
      </select><br>
      <p>
      <p style=' color:white;'>picture:
      </p><br>
      <input type='file' name='img1' style='color:white;'>
    </p><br>
          <input style='width:50%;font-size:2vw;'class='btn btn-danger' type='submit' name='submit_food_item' value='add to menu'><br><br><br>
  </form>  <br></center>";
}

if (isset($_POST['submit_food_item'])) {

  $name = $_POST['itemname'];
  $price = $_POST['itemprice'];
  $category = $_POST['a1'];
  $img = $_FILES['img1']['name'];
  $temp_name = $_FILES['img1']['tmp_name'];
  $filepath = "images/$img";
  $file_type = $_FILES['img1']['type'];
  if ($file_type != "image/jpeg") {
    echo "<script>alert('uploaded image shd be in jpg/jpeg type');</script>";
  } else {

    if ($file_type == "image/jpeg") {
      move_uploaded_file($temp_name, $filepath);
    }
    if ($name && $price && $category && $img) {
      $sqltb1 = "INSERT INTO menu(name,img,price,category) VALUES('$name','$img','$price','$category')";
      if (mysqli_query($conn, $sqltb1)) {
        echo "<script>alert('added successfully');</script>";
      }
    } else {
      echo "<script>alert('enter all fields');</script>";
    }
  }
}



//////////////////////////////////////////////////////////////////////////////////
/////////////////////////update account//////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['update_account'])) {
  echo "<center>  <br>
  <form method='post'data-aos='fade-up' style='background-color:black;color:white'class='form1'>
  <br>
    email:-<br><input type='email' name='admin_mail'><br>
      password:-<br><input type='password' name='admin_password'><br>
      confirm password:-<br><input type='password' name='admin_confirm'><br>
     
          <input style='width:50%;font-size:2vw;'class='btn btn-danger' type='submit' name='update_admin_account' value='update'><br><br><br>
  </form>  <br></center>";
}
if (isset($_POST['update_admin_account'])) {

  $email = $_POST['admin_mail'];
  $pswd = $_POST['admin_password'];
  $confirm = $_POST['admin_confirm'];
  if ($email) {
    $sqlt = "UPDATE admin SET email='$email'";
    if (mysqli_query($conn, $sqlt)) {
      echo "<script>alert('email updated successfully');</script>";
    }
  }


  if ($pswd) {
    if (!preg_match("/^[A-Z][a-zA-Z@0-9]+$/", $pswd)) {
      $regErr = "please follow a correct format for password(first letter should be capital followed by any combination of a-z,A-Z,0-9,@)";
      echo "<script>alert('" . $regErr . "');</script>";
    } else {
      if (empty($confirm)) {
        $confirmErr = "confirm password is Missing";
        echo $confirmErr;
        echo "<script>alert('" . $confirmErr . "');</script>";
      } else {
        if ($pswd === $confirm) {
          $sqlt = "UPDATE admin SET password='$pswd'";
          if (mysqli_query($conn, $sqlt)) {
            echo "<script>alert('password updated successfully');</script>";
          }
        } else {
          echo "<script>alert('passwords does not match');</script>";
        }
      }
    }
  }
}
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////logout////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['logout'])) {
  header('Location:login.php');
}

?>