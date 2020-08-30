<?php
session_save_path("C:/xampp/tmp");
session_start();

$conn = mysqli_connect("localhost", "root", "", "foodshala");

if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
}

if (isset($_POST['myaccount'])) {

  echo '<script type="text/javascript">';
  echo 'window.location.href="account.php";';
  echo '</script>';
}
$total = $_SESSION['total'];
$amount = $_SESSION['orderitems'];
$id = $_SESSION['id'];
$email = $_SESSION['email'];
$tel = $_SESSION['tel'];
$address = $_SESSION['address'];
echo "<html><head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
  <title>FoodShala-Payment</title>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='https://unpkg.com/aos@next/dist/aos.css' />
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>

<style>

body{

   background: url('images/pay.jpg');
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-position: center center;
   background-size: cover;
   margin: 0 !important;
   background-size: 100% cover!important;

}
.mydiv{width:40%;
  background-color:white;
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
.myform {
width:40%;
background-color:white;}
input {
  width: 80%;
  padding: 12px 20px;

  display: inline-block;
}
input[type=email] {
  width: 80%;
  padding: 12px 20px;

  display: inline-block;


}
 input[type=password]{
   width: 75%;
   padding: 12px 20px;

   display: inline-block;

 }



@media screen and (max-width: 300px) {

  input[type=submit] {
     width: 100%;
  }
}

</style>

</head><body><form method='post'><input style='width:20%;font-size:1vw;' class='btn btn-warning'
type='submit' name='myaccount' value='back to my account'></form><center><div class='mydiv' id='division'>";

echo "id :- " . $id . "<br>";
echo "email :- " . $email . "<br>";

echo "payable amount :- " . $total . "<br>";
echo "your choices :- " . $amount;
echo "
<form method='post' class='myform'>

        time:<br><input type='time' name='usertime'><br>
        date:<br><input type='date' name='userdate'><br>
     


      <div class='col-50'>

           Accepted Cards
           <div class='icon-container'>
             <i class='fa fa-cc-amex' style='color:blue;'></i>
             <i class='fa fa-cc-mastercard' style='color:red;'></i>
             <i class='fa fa-cc-discover' style='color:orange;'></i>
           </div>
           <label for='cname'>Name on Card</label>
           <input type='text' id='cname' name='cardname' placeholder='John More Doe'>
           <label for='ccnum'>Credit card number</label>
           <input type='text' id='ccnum' name='cardnumber' placeholder='1111-2222-3333-4444'>
           <label for='expmonth'>Exp Month</label>
           <input type='text' id='expmonth' name='expmonth' placeholder='September'>
         
               <label for='expyear'>Exp Year</label><br>
               <input type='text' id='expyear' name='expyear' placeholder='2018'>
        
               <label for='cvv'>CVV no.</label><br>
               <input type='text' id='cvv' name='cvv' placeholder='352'>
            
           
         </div>
      <input type='submit' style='font-size:2vw;' name='final_in_order' value='done'>
      </form></div></center></body></html>";

if (isset($_POST['final_in_order'])) {
  ///////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////
  //////error will be displayed at the bottom//////
  /////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////
  if ($_POST["usertime"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> please specify the time<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["userdate"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> please specify the date<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["cardname"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> card holder name missing<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["cardnumber"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> card number missing<br></li>
    </ol>
  </nav></center>";
  } elseif (!preg_match("/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}+$/", $_POST["cardnumber"])) {
    $numErr = "write in aparticular format 0000-0000-0000-0000<br>";
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> " . $numErr . "<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["expmonth"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> expiry month  missing<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["expyear"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> expiry year  missing<br></li>
    </ol>
  </nav></center>";
  } elseif ($_POST["cvv"] == "") {
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> cvv number missing<br></li>
    </ol>
  </nav></center>";
  } elseif (!preg_match("/^[0-9]{3,4}+$/", $_POST["cvv"])) {
    $numErr = "please consider the exact length of cvv number<br>";
    echo "<center><nav aria-label='breadcrumb'>
    <ol class='breadcrumb'>
      <li class='breadcrumb-item active' aria-current='page'> " . $numErr . "<br></li>
    </ol>
  </nav></center>";
  } else {
    $added_time = $_POST["usertime"];
    $added_date = $_POST["userdate"];
    $cardholder = $_POST["cardname"];
    $cardnumber = $_POST["cardnumber"];

    $random = rand(1000, 9999);
    $sql_query = "INSERT INTO orders(id,email,tel,address,entry_date,entry_time,cardholder,cardnumber,userorder,amount,orderid,action)VALUES('$id','$email','$tel','$address','$added_date','$added_time','$cardholder','$cardnumber','$amount','$total','$random','wait for the response')";
    if (mysqli_query($conn, $sql_query)) {

      $_SESSION['orderid'] = $random;
      echo "<center><nav aria-label='breadcrumb'>
      <ol class='breadcrumb'>
        <li class='breadcrumb-item active' aria-current='page'> your order id is " . $random . "<br></li>
      </ol>
    </nav>";
      echo "<form method='post' action='account.php'>
            <input type='submit' style='font-size:2vw;' name='final_in_order' value='back to my account'>
            </form></center>";
    } else {
      die('error!!!' . mysqli_error($conn));
    }
  }
}
