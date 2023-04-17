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
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $customer_no = (int)$_POST["customer_no"];
            $name = htmlspecialchars($_POST["name"]);
            $email = htmlspecialchars($_POST["email"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $address = htmlspecialchars($_POST["address"]);    
            $num_espresso = (int)$_POST["num_espresso"];
            $num_americano = (int)$_POST["num_americano"];
            $num_black = (int)$_POST["num_black"];
            $num_cappuccino = (int)$_POST["num_cappuccino"];
            $num_latte = (int)$_POST["num_latte"];
            $num_mocha = (int)$_POST["num_mocha"];
            $num_affogato = (int)$_POST["num_affogato"];
            $num_irish = (int)$_POST["num_irish"];
            $num_icedCoffee = (int)$_POST["num_icedCoffee"];
            $num_icedEspresso = (int)$_POST["num_icedEspresso"];
            $num_coldBrew = (int)$_POST["num_coldBrew"];
            $num_frappuccino = (int)$_POST["num_frappuccino"];
            $num_mazagran = (int)$_POST["num_mazagran"];
            $price_espresso = number_format((double)$_POST["price_espresso"]*$num_espresso, 2, '.', '0');
            $price_americano = number_format((double)$_POST["price_americano"]*$num_americano, 2, '.', '0');
            $price_black = number_format((double)$_POST["price_black"]*$num_black, 2, '.', '0');
            $price_cappuccino = number_format((double)$_POST["price_cappuccino"]*$num_cappuccino, 2, '.', '0');
            $price_latte = number_format((double)$_POST["price_latte"]*$num_latte, 2, '.', '0');
            $price_mocha = number_format((double)$_POST["price_mocha"]*$num_mocha, 2, '.', '0');
            $price_affogato = number_format((double)$_POST["price_affogato"]*$num_affogato, 2, '.', '0');
            $price_irish = number_format((double)$_POST["price_irish"]*$num_irish, 2, '.', '0');
            $price_icedCoffee = number_format((double)$_POST["price_icedCoffee"]*$num_icedCoffee, 2, '.', '0');
            $price_icedEspresso = number_format((double)$_POST["price_icedEspresso"]*$num_icedEspresso, 2, '.', '0');
            $price_coldBrew = number_format((double)$_POST["price_coldBrew"]*$num_coldBrew, 2, '.', '0');
            $price_frappuccino = number_format((double)$_POST["price_frappuccino"]*$num_frappuccino, 2, '.', '0');
            $price_mazagran = number_format((double)$_POST["price_mazagran"]*$num_mazagran, 2, '.', '0');
            $tot_price = number_format($price_espresso+$price_americano+$price_black+$price_cappuccino+$price_latte+$price_mocha+$price_affogato+$price_irish+$price_icedCoffee+$price_icedEspresso+$price_coldBrew+$price_frappuccino+$price_mazagran, 2, '.', '0');

            if($tot_price == 0.00){
                echo ("<script>window.alert('Select your items.'); history.go(-1);</script>");
            }

            $items = "";
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
        <section class="order">
            <div>
                <h2>Order Information</h2>
                <table>
                    <thead>
                        <tr><th>Memu</th><th>Quantity</th><th>Price</th></tr>
                    </thead>
                    <tbody>
                        <!-- print if the item number is greater than 0 -->
                        <?php if($num_espresso > 0){ 
                                $items = $items. "Espresso (". $num_espresso. ")\t\t$ ".$price_espresso. "\n";
                        ?>
                        <tr>
                            <td>Espresso</td>
                            <td><?php echo $num_espresso ?></td>
                            <td>$ <?php echo $price_espresso ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_americano > 0){ 
                                $items = $items. "Americano (". $num_americano. ")\t\t\$ ".$price_americano. "\n";
                        ?>
                        <tr>
                            <td>Americano</td>
                            <td><?php echo $num_americano ?></td>
                            <td>$ <?php echo $price_americano ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_black > 0){ 
                            $items = $items. "Black (". $num_black. ")\t\t\$ ".$price_black. "\n";
                        ?>
                        <tr>
                            <td>Black</td>
                            <td><?php echo $num_black ?></td>
                            <td>$ <?php echo $price_black ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_cappuccino > 0){ 
                            $items = $items. "Cappuccino (". $num_cappuccino. ")\t\t\$ ".$price_cappuccino. "\n";
                        ?>
                        <tr>
                            <td>Cappuccino</td>
                            <td><?php echo $num_cappuccino ?></td>
                            <td>$ <?php echo $price_cappuccino ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_latte > 0){ 
                            $items = $items. "Latte (". $num_latte. ")\t\t\$ ".$price_latte. "\n";
                        ?>
                        <tr>
                            <td>Latte</td>
                            <td><?php echo $num_latte ?></td>
                            <td>$ <?php echo $price_latte ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_mocha > 0){ 
                            $items = $items. "Mocha (". $num_mocha. ")\t\t\$ ".$price_mocha. "\n";
                        ?>
                        <tr>
                            <td>Mocha</td>
                            <td><?php echo $num_mocha ?></td>
                            <td>$ <?php echo $price_mocha ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_affogato > 0){ 
                            $items = $items. "Affogato (". $num_affogato. ")\t\t\$ ".$price_affogato. "\n";
                        ?>
                        <tr>
                            <td>Affogato</td>
                            <td><?php echo $num_affogato ?></td>
                            <td>$ <?php echo $price_affogato ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_irish > 0){ 
                            $items = $items. "Irish (". $num_irish. ")\t\t\$ ".$price_irish. "\n";
                        ?>
                        <tr>
                            <td>Irish</td>
                            <td><?php echo $num_irish ?></td>
                            <td>$ <?php echo $price_irish ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_icedCoffee > 0){ 
                            $items = $items. "Iced Coffee (". $num_icedCoffee. ")\t\t\$ ".$price_icedCoffee. "\n";
                        ?>
                        <tr>
                            <td>Iced Coffee</td>
                            <td><?php echo $num_icedCoffee ?></td>
                            <td>$ <?php echo $price_icedCoffee ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_icedEspresso > 0){ 
                            $items = $items. "Iced Espresso (". $num_icedEspresso. ")\t\$ ".$price_icedEspresso. "\n";
                        ?>
                        <tr>
                            <td>Iced Espresso</td>
                            <td><?php echo $num_icedEspresso ?></td>
                            <td>$ <?php echo $price_icedEspresso ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_coldBrew > 0){ 
                            $items = $items. "Cold Brew (". $num_coldBrew. ")\t\t\$ ".$price_coldBrew. "\n";
                        ?>
                        <tr>
                            <td>Cold Brew</td>
                            <td><?php echo $num_coldBrew ?></td>
                            <td>$ <?php echo $price_coldBrew ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_frappuccino > 0){ 
                            $items = $items. "Frappuccino (". $num_frappuccino. ")\t\t\$ ".$price_frappuccino. "\n";
                        ?>
                        <tr>
                            <td>Frappuccino</td>
                            <td><?php echo $num_frappuccino ?></td>
                            <td>$ <?php echo $price_frappuccino ?></td>
                        </tr>
                        <?php } ?>
                        <?php if($num_mazagran > 0){ 
                            $items = $items. "Mazagran (". $num_mazagran. ")\t\t\$ ".$price_mazagran. "\n";
                        ?>
                        <tr>
                            <td>Mazagran</td>
                            <td><?php echo $num_mazagran ?></td>
                            <td>$ <?php echo $price_mazagran ?></td>
                        </tr>
                        <?php } 
                            $items = $items. "Total Price \t\t\$ ".$tot_price;
                        ?>
                        <tr><td></td><td></td><td>$ <?php echo $tot_price ?></td></tr>
                    </tbody>
                </table>
            </div>
        </section>
        <section class="customer_info">
            <div>
                <h2>Customer Information</h2>
                <table>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $name ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $phone ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $email ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $address ?></td>
                    </tr>
                </table>
            </div>
        </section>
        <section class="payment_info">
        <form method="post" action="order_confirm.php">
            <div>
                <h2>Payment Information</h2>
                <h3>Credit card</h3>
                <input type="text" name="card_no" placeholder="Card number" required>
                <input type="text" name="card_name" placeholder="Name on card" required>
                <input type="text" name="expiration_date" placeholder="Expiration date (MM / YY)" required>
                <input type="text" name="security_code" placeholder="Security code" required>
            </div>
            <div class="submit_btn">
                <input type="submit" id="payment" value="PAY NOW">
            </div>
            <input type="hidden" name="customer_no" value="<?php echo $customer_no ?>"/>
            <input type="hidden" name="items" value="<?php echo $items ?>"/>
            <input type="hidden" name="tot_price" value="<?php echo $tot_price ?>"/>
        </form>
        </section>
    </main>
</body>
</html>