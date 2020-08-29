<?php
session_save_path("C:/xampp/tmp");
session_start();
$conn = mysqli_connect("localhost", "root", "", "foodshala");
$img = $_SESSION['img'];
if (!$conn) {
    die("connection failed<br>" . mysqli_connect_error());
}

$sqltb_show_cartitems = "SELECT * FROM orders WHERE email='$_SESSION[email]'";
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
    <title>FoodShala-My Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
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
                    <button class="btn btn-danger disabled">total orders:-<?php echo $count ?> </button>
                </li>
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                <li class="nav-item">
                    <a href="account.php" class="btn btn-danger ">
                        back to menu
                    </a>
                </li>

            </ul>
        </div>
    </nav>

    <center>
        <div class="container-fluid table-responsive" style="margin-top:20%;">
            <?php
            $email =  $_SESSION['email'];

            echo "<table border='1' class='table table-dark table-hover'><thead>
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

            $sqltb1 = "SELECT * FROM orders WHERE email='$email'";
            $res = mysqli_query($conn, $sqltb1);
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
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
            echo "</table>";
            ?>

        </div>
    </center>
</body>

</html>