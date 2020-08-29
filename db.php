<?php
$servername = "localhost"; //"localhost:8080"
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
} else {
  echo "connected<br>";
}


$sql = "CREATE DATABASE foodshala";
if (mysqli_query($conn, $sql)) {
  echo "db created<br>";
} else {
  echo "not created<br>" . mysqli_error($conn) . "<br>";
}


$conn = mysqli_connect($servername, $username, $password, "foodshala");

if (!$conn) {
  die("connection failed<br>" . mysqli_connect_error());
} else {
  echo " database connected<br>";
}



$sql_user_table = "CREATE TABLE userdata(
id INT(6) PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
address VARCHAR(50) NOT NULL,
password VARCHAR(30) NOT NULL,
preference VARCHAR(30) NOT NULL,
age INT(20) NOT NULL,
telephone INT(10) NOT NULL,
img VARCHAR(100) NOT NULL
) ";
//time
if (mysqli_query($conn, $sql_user_table)) {
  echo "USER TABLE created<br>";
} else {
  echo "USER TABLE not created<br>" . mysqli_error($conn);
}









$sql_order_table = "CREATE TABLE orders(
id INT(6),
email VARCHAR(30) NOT NULL,
tel INT(10) NOT NULL,
address VARCHAR(50) NOT NULL,
userorder  VARCHAR(70) NOT NULL,
amount INT(50) NOT NULL,
orderid INT(50) NOT NULL,
action VARCHAR(50) NOT NULL
)";
//entry_date,entry_time,time,cardholder,cardnumber
if (mysqli_query($conn, $sql_order_table)) {
  echo "ORDERS TABLE created<br>";
} else {
  echo "ORDERS TABLE not created<br>" . mysqli_error($conn);
}






$sql_admin_table = "CREATE TABLE admin(
  id INT(50),
  email VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
 )";

if (mysqli_query($conn, $sql_admin_table)) {
  echo "ADMIN TABLE created<br>";
} else {
  echo "ADMIN TABLE not created<br>" . mysqli_error($conn);
}



$sql_menu_items_table = "CREATE TABLE menu(
  id INT(50) PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  img VARCHAR(100) NOT NULL,
  price INT(50) NOT NULL,
  category VARCHAR(100) NOT NULL
 )";

if (mysqli_query($conn, $sql_menu_items_table)) {
  echo "MENU TABLE created<br>";
} else {
  echo "MENU TABLE not created<br>" . mysqli_error($conn);
}




$sql_cart_items_table = "CREATE TABLE cart(
  id INT(50),
  name VARCHAR(30) NOT NULL,
  img VARCHAR(100) NOT NULL,
  price INT(50) NOT NULL,
  category VARCHAR(100) NOT NULL
 )";

if (mysqli_query($conn, $sql_cart_items_table)) {
  echo "CART TABLE created<br>";
} else {
  echo "CART TABLE not created<br>" . mysqli_error($conn);
}
mysqli_close($conn);
