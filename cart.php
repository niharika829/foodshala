<?php
session_save_path("C:/xampp/tmp");
session_start();
$conn = mysqli_connect("localhost", "root", "", "foodshala");
$img = $_SESSION['img'];
if (!$conn) {
    die("connection failed<br>" . mysqli_connect_error());
}
if ($_POST["submit_to_cart"]) {
    $cart_item_id = $_POST["submit_to_cart"];
    $sqltb_add_to_cart = "SELECT * FROM menu WHERE id=$cart_item_id";
    $res = mysqli_query($conn, $sqltb_add_to_cart);
    if (mysqli_num_rows($res) === 1) {
        while ($row = mysqli_fetch_assoc($res)) {
            $sqltb_insert_to_cart = "INSERT INTO cart(menuid,userid,useremail,name,img,price,category) VALUES ('$row[id]','$_SESSION[id]','$_SESSION[email]','$row[name]','$row[img]','$row[price]','$row[category]')";
            if (mysqli_query($conn, $sqltb_insert_to_cart)) {
                header('Location:account.php');
            } else {
                echo "error" . $sqltb1 . "<br>" . mysqli_error($conn);
            }
        }
    }
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
    <title>FoodShala-My Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <button class="btn btn-danger disabled">total items:-<?php echo $count ?> </button>
                </li>
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                <li class="nav-item">
                    <a href="account.php" class="btn btn-danger ">
                        back to menu
                    </a>
                </li>
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                <li class="nav-item">
                    <form action="delete_item.php" method="post">
                        <button class="btn btn-danger " name="clear_cart">
                            clear cart
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>


    <div class="container-fluid" style="margin-top:15%">

        <?php
        echo "<div class='row'>";
        $sqltb_show_cart_items = "SELECT * FROM cart WHERE useremail='$_SESSION[email]'";
        $res = mysqli_query($conn, $sqltb_show_cart_items);
        $order_items = "";
        $total_amount = 0;
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $order_items .= $row['name'] . " , ";
                $total_amount += $row['price'];

        ?>


                <div data-aos="zoom-in-down" class="card border-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header badge badge-pill badge-danger"><?php echo $row['category'] ?></div>
                    <div class=" card-body text-dark">
                        <img class="card-img-top" src="images/<?php echo $row['img'] ?>" alt="Card image cap" style="width:250px;height:250px;">
                        <h5 class="card-title"><?php echo $row['name'] ?></h5>
                        <p class="card-text">&#36;<?php echo $row['price'] ?></p>
                        <p class="card-text">
                            <form action="delete_item.php" method="post">
                                <button class="btn btn-danger" name="delete_from_cart" value="<?php echo $row['id']; ?>">delete </button>
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
        <center>
            <form action="payment.php" method="post">
                <?php
                $_SESSION['total'] = $total_amount;
                $_SESSION['orderitems'] = $order_items;
                ?>
                <button name="order_now" class="btn btn-success">total payable amount is
                    <?php echo $total_amount ?> for <?php echo $order_items ?>
                </button>
            </form>
        </center>
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>