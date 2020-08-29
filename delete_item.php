<?php
session_save_path("C:/xampp/tmp");
session_start();
$conn = mysqli_connect("localhost", "root", "", "foodshala");
if (!$conn) {
    die("connection failed<br>" . mysqli_connect_error());
}
if ($_POST["delete_from_cart"]) {
    $email = $_SESSION['email'];
    echo $email;
    $cart_item_id = $_POST["delete_from_cart"];
    echo $cart_item_id;

    $sqltb_delete_cart_items = "DELETE FROM cart WHERE id='$cart_item_id' AND useremail='$email'";
    if (mysqli_query($conn, $sqltb_delete_cart_items)) {
        header('Location:account.php');
    }
}

if (isset($_POST["clear_cart"])) {
    $email = $_SESSION['email'];
    echo $email;

    $sqltb_delete_cart = "DELETE FROM cart WHERE useremail='$email'";
    if (mysqli_query($conn, $sqltb_delete_cart)) {
        header('Location:account.php');
    }
}

if ($_POST["delete_food_item"]) {
    $food_item_id = $_POST["delete_food_item"];
    echo $food_item_id;

    $sqltb_delete_food_items = "DELETE FROM menu WHERE id='$food_item_id'";
    if (mysqli_query($conn, $sqltb_delete_food_items)) {
        header('Location:admin.php');
    }
}
