<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COFFEE TIME</title>
    <meta name="description" content="COFFEE TIME Menu">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="./img/coffee.png" type="image/x-icon" />
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <script>
        function changeNum(menu, op){
            var num = document.getElementById(menu).getAttribute("value")*1;
            if(op == "+"){
                num = num + 1;
            }else if(op == "-"){
                if(num > 0){
                    num = num - 1;
                }
            }

            document.getElementById(menu).setAttribute("value", num);
        }
    </script>
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
    
        $customer_no = "";
        $name = "";
        $email = "";
        $phone = "";
        $address = ""; 

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $type = $_POST["type"];
            $login_email = htmlspecialchars($_POST["login_email"]);    
            $flag = true;

            // sign up
            if ($type == "sign_up"){
                $name = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $phone = htmlspecialchars($_POST["phone"]);
                $address = htmlspecialchars($_POST["address"]);

                if ($name == "" || $email == "" || $phone == ""){
                    $flag = false;
                    echo ("<script>window.alert('The name, email and phone are required.'); history.go(-1);</script>");
                } else{
                    // connect database
                    $conn = OpenCon();
                    // select customer information
                    $sql = "SELECT * FROM CUSTOMER_INFO WHERE email = '$email'";
                    $result = $conn->query($sql);
                    // if the customer email exists
                    if ($result->num_rows > 0) {
                        $flag = false;
                        echo ("<script>window.alert('This email has already registered.'); history.go(-1);</script>");
                    }
                    // if the customer email does not exist
                    else{
                        // insert the customer information
                        $sql = "INSERT INTO CUSTOMER_INFO (name, email, phone, address)
                        VALUES ('$name', '$email', '$phone', '$address')";
                        
                        if (mysqli_query($conn, $sql)) {
                            //echo "created new record successfully ";
                            // select customer information
                            $sql = "SELECT * FROM CUSTOMER_INFO WHERE email = '$email'";
                            $result = $conn->query($sql);
                        } else {
                            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            $flag = false;
                        }
                    }
                    // close connect database
                    CloseCon($conn);
                }
            }
            // login or history
            else {
                // connect database
                $conn = OpenCon();
                // select customer information
                $sql = "SELECT * FROM CUSTOMER_INFO WHERE email = '$login_email'";
                $result = $conn->query($sql);
                // close connect database
                CloseCon($conn);
            }

            if($flag){
                // if the customer email exists
                if ($result->num_rows > 0) {
                    // output data of each row
                    $row = $result->fetch_assoc();
                    $customer_no = $row["customer_no"];
                    $name = $row["name"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];    
                    //echo "customer_no: " . $row["customer_no"]. " - Name: " . $row["name"]. " " . $row["email"]. " " . $row["phone"]. " " . $row["address"]. "<br>";
                } 
                // if the customer email does not exist
                else {
                    echo ("<script>window.alert('This email has not been registered.'); history.go(-1);</script>");
                }
            }
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
        <section class="menu" id="menu">
            <div>
                <h2>MENU</h2>
            </div>
            <form method="post" action="order_info.php">
            <div>
                <h3>HOT</h3>
            </div>
            <div class="menu-items">
                <div class="item">
                    <h4>Espresso</h4>
                    <label for="num_espresso"><img src="./img/espresso.jpg" alt="espresso"></label>
                    <p>$ 3.95</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_espresso', '-')"> - </button>
                        <input type="text" name="num_espresso" id="num_espresso" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_espresso', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Americano</h4>
                    <label for="num_americano"><img src="./img/americano.jpg" alt="americano"></label>
                    <p>$ 4.15</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_americano', '-')"> - </button>
                        <input type="text" name="num_americano" id="num_americano" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_americano', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Black</h4>
                    <label for="num_black"><img src="./img/black.jpg" alt="black"></label>
                    <p>$ 3.35</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_black', '-')"> - </button>
                        <input type="text" name="num_black" id="num_black" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_black', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Cappuccino</h4>
                    <label for="num_cappuccino"><img src="./img/cappuccino.jpg" alt="cappuccino"></label>
                    <p>$ 4.95</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_cappuccino', '-')"> - </button>
                        <input type="text" name="num_cappuccino" id="num_cappuccino" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_cappuccino', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Latte</h4>
                    <label for="num_latte"><img src="./img/latte.jpg" alt="latte"></label>
                    <p>$ 4.95</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_latte', '-')"> - </button>
                        <input type="text" name="num_latte" id="num_latte" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_latte', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Mocha</h4>
                    <label for="num_mocha"><img src="./img/mocha.jpg" alt="mocha"></label>
                    <p>$ 5.25</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_mocha', '-')"> - </button>
                        <input type="text" name="num_mocha" id="num_mocha" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_mocha', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Affogato</h4>
                    <label for="num_affogato"><img src="./img/affogato.jpg" alt="affogato"></label>
                    <p>$ 5.95</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_affogato', '-')"> - </button>
                        <input type="text" name="num_affogato" id="num_affogato" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_affogato', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Irish</h4>
                    <label for="num_irish"><img src="./img/irish.jpg" alt="irish"></label>
                    <p>$ 5.95</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_irish', '-')"> - </button>
                        <input type="text" name="num_irish" id="num_irish" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_irish', '+')"> + </button>
                    </div>
                </div>
            </div>
            <div>
                <h3>ICED</h3>
            </div>
            <div class="menu-items">
                <div class="item">
                    <h4>Iced Coffee</h4>
                    <label for="num_icedCoffee"><img src="./img/icedCoffee.jpg" alt="iced coffee"></label>
                    <p>$ 3.75</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_icedCoffee', '-')"> - </button>
                        <input type="text" name="num_icedCoffee" id="num_icedCoffee" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_icedCoffee', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Iced Espresso</h4>
                    <label for="num_icedEspresso"><img src="./img/icedEspresso.jpg" alt="iced espresso"></label>
                    <p>$ 4.35</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_icedEspresso', '-')"> - </button>
                        <input type="text" name="num_icedEspresso" id="num_icedEspresso" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_icedEspresso', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Cold Brew</h4>
                    <label for="num_coldBrew"><img src="./img/coldBrew.jpg" alt="cold brew"></label>
                    <p>$ 4.75</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_coldBrew', '-')"> - </button>
                        <input type="text" name="num_coldBrew" id="num_coldBrew" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_coldBrew', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Frappuccino</h4>
                    <label for="num_frappuccino"><img src="./img/frappuccino.jpg" alt="frappuccino"></label>
                    <p>$ 6.25</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_frappuccino', '-')"> - </button>
                        <input type="text" name="num_frappuccino" id="num_frappuccino" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_frappuccino', '+')"> + </button>
                    </div>
                </div>
                <div class="item">
                    <h4>Mazagran</h4>
                    <label for="num_mazagran"><img src="./img/mazagran.jpg" alt="mazagran"></label>
                    <p>$ 6.25</p>
                    <div class="btn-container">
                        <button type="button" onclick="changeNum('num_mazagran', '-')"> - </button>
                        <input type="text" name="num_mazagran" id="num_mazagran" placeholder="0" value="0">
                        <button type="button" onclick="changeNum('num_mazagran', '+')"> + </button>
                    </div>
                </div>
            </div>
            <div class="submit_btn">
                <input type="submit" id="order" value="ORDER">
            </div>
            <input type="hidden" name="price_espresso" value="3.95"/>
            <input type="hidden" name="price_americano" value="4.15"/>
            <input type="hidden" name="price_black" value="3.35"/>
            <input type="hidden" name="price_cappuccino" value="4.95"/>
            <input type="hidden" name="price_latte" value="4.95"/>
            <input type="hidden" name="price_mocha" value="5.25"/>
            <input type="hidden" name="price_affogato" value="5.95"/>
            <input type="hidden" name="price_irish" value="5.95"/>
            <input type="hidden" name="price_icedCoffee" value="3.75"/>
            <input type="hidden" name="price_icedEspresso" value="4.35"/>
            <input type="hidden" name="price_coldBrew" value="4.75"/>
            <input type="hidden" name="price_frappuccino" value="6.25"/>
            <input type="hidden" name="price_mazagran" value="6.25"/>
            <input type="hidden" name="customer_no" value="<?php echo $customer_no ?>"/>
            <input type="hidden" name="name" value="<?php echo $name ?>"/>
            <input type="hidden" name="email" value="<?php echo $email ?>"/>
            <input type="hidden" name="phone" value="<?php echo $phone ?>"/>
            <input type="hidden" name="address" value="<?php echo $address ?>"/>
            </form>
        </section>
    </main>
</body>
</html>