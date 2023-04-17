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

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $customer_no = (int)$_POST["customer_no"];
        $items = htmlspecialchars($_POST["items"]);
        $tot_price = number_format((double)$_POST["tot_price"], 2, '.', '0');
        $card_no = htmlspecialchars($_POST["card_no"]);
        $card_name = htmlspecialchars($_POST["card_name"]);
        $expiration_date = htmlspecialchars($_POST["expiration_date"]);
        $security_code = htmlspecialchars($_POST["security_code"]);

        // connect database
        $conn = OpenCon();
        $sql = "";
        
        // insert the order information
        $sql = "INSERT INTO ORDER_INFO (items, tot_price, order_date)
        VALUES ('$items', '$tot_price', now())";

        if (mysqli_query($conn, $sql)) {
            // get order_no
            // select the max order_no
            $sql = "SELECT MAX(ORDER_NO) order_no FROM ORDER_INFO";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_assoc();
                $order_no = $row["order_no"];
            } else {
                //echo "0 results";
            }

            // insert the customer's order
            $sql = "INSERT INTO CUSTOMER_ORDER (customer_no, order_no)
            VALUES ('$customer_no', '$order_no')";

            if (mysqli_query($conn, $sql)) {
                // select the customer and order information
                $sql = "SELECT name, items, order_date
                FROM CUSTOMER_INFO CI, ORDER_INFO OI, CUSTOMER_ORDER CO
                WHERE CI.CUSTOMER_NO = CO.CUSTOMER_NO
                AND OI.ORDER_NO = CO.ORDER_NO
                AND CI.CUSTOMER_NO = $customer_no
                AND OI.ORDER_NO = $order_no";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $name = $row["name"];
                    $items = $row["items"];
                    $order_date = $row["order_date"];
                } else {
                    //echo "0 results";
                }
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // close connect database
        CloseCon($conn);
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
        <section class="order_confirm">
            <div>
                <h2>THANK YOU!</h2>
                <div>
                    <h3>Order No. <?php echo $order_no; ?>
                    </h3>
                    <h3>
                    <?php echo $name; ?>
                    </h3>
                   <h3>
                        <?php echo $order_date. "\n"; ?>
                    </h3>
                </div>
                <div>
                    <textarea rows="15"><?php echo $items; ?></textarea>
                </div>
                <input type="button" value="DONE" onClick="location.href='index.php'">
            </div>
        </section>
    </main>
</body>
</html>