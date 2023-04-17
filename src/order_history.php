<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFEE TIME</title>
    <meta name="description" content="Enjoy coffee">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="./img/coffee.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
    // connect database
    function OpenCon(){
        $host = "localhost";
        $user = "root";
        $pw = "1234";
        $dbName = "coffee_time";

        $conn = new mysqli($host, $user, $pw, $dbName) or die("Connection failed: ". $conn -> error);
        return $conn;
    }

    // close connect database
    function CloseCon($conn){
        $conn -> close();
        //echo "Closed";
    }    
?>
    <header>
        <!-- hamberger menu -->
        <input id="burger" type="checkbox">
        <label for="burger">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <nav>
            <div>
                <a href="./index.php"><img src="./img/coffee.png" alt="logo">COFFEE TIME</a>
            </div>
            <menu>
                <li><a href="index.php" onclick="document.getElementById('burger').checked = false;">HOME</a></li>
                <li><a href="menu.php" onclick="document.getElementById('burger').checked = false;">MENU</a></li>
                <li><a href="regi_login.php" onclick="document.getElementById('burger').checked = false;">ORDER</a></li>
                <li><a href="regi_login.php?menu=history" onclick="document.getElementById('burger').checked = false;">HISTORY</a></li>
            </menu>
        </nav>
    </header>
    <main>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = htmlspecialchars($_POST["login_email"]);
        }
        ?>
        <section class="order_history">
            <div>
                <h2>Order History</h2>
                <form method="post" action="order.php">
                    <input type="submit" value="ORDER">
                    <input type="hidden" name="type">
                    <input type="hidden" name="login_email" value="<?php echo $email ?>">
                </form>
                <table>
                    <thead>
                        <tr><th>Order No.</th><th>Items</th><th>Date</th></tr>
                    </thead>
                    <tbody>
                    <?php
                        if($email == ""){
                            echo ("<script>window.alert('The email is required.'); history.go(-1);</script>");
                        }else{
                                // connect database
                                $conn = OpenCon();
                                // select the customer's order history
                                $sql = "SELECT OI.order_no, items, order_date
                                FROM CUSTOMER_INFO CI, ORDER_INFO OI, CUSTOMER_ORDER CO
                                WHERE CI.CUSTOMER_NO = CO.CUSTOMER_NO
                                AND OI.ORDER_NO = CO.ORDER_NO
                                AND CI.EMAIL = '$email'";

                                $result = $conn->query($sql);
                                // close connect database
                                CloseCon($conn);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $row = $result->fetch_assoc();
                                    $order_no = $row["order_no"];
                                    $items = $row["items"];
                                    $order_date = $row["order_date"];
                                    // print the order history
                                    echo ("<tr>
                                        <td>$order_no</td>
                                        <td>$items</td>
                                        <td>$order_date</td>
                                    </tr>");
                                }                
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <input type="button" value="DONE" onClick="location.href='index.php'">
        </section>
    </main>
</body>
</html>