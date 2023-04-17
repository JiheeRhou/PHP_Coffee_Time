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
<script>
    function setRadioButton(){
        document.getElementById("order").style.display = "none";
        document.getElementById("history").style.display = "none";

        if(window.location.search == "?menu=history"){
            document.getElementById("history").style.display = "";
        }else{
            document.getElementById("order").style.display = "";
        }
    }

    function changeDisplay(target){
        initialize();
        document.getElementById("signup_div").style.display = "none";
        document.getElementById("login_div").style.display = "none";

        document.getElementById(target).style.display = "flex";
    }

    function initialize(){
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("address").value = "";
        document.getElementById("login_email").value = "";
    }
</script>
<body onload="setRadioButton()">
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
        <section id="order" class="customer">
        <form method="post" action="order.php">
            <div id="radio_div">
                <input type="radio" id="radio_login" name="type" value="log_in" onclick="changeDisplay('login_div')" checked>
                <label for="radio_login">LOG IN</label>&nbsp;&nbsp;&nbsp;
                <input type="radio" id="radio_signup" name="type" value="sign_up" onclick="changeDisplay('signup_div')">
                <label for="radio_signup">SIGN UP</label>
            </div>
            <div id="signup_div">
                <h2>Sign up</h2>
                <input type="text" name="name" id="name" placeholder="Name">
                <input type="text" name="phone" id="phone" placeholder="Phone">
                <input type="text" name="email" id="email" placeholder="Email">
                <input type="text" name="address" id="address" placeholder="Address">
                <input type="submit" name="sign_up" value="SIGN UP">
            </div>
            <div id="login_div">
            <h2>Log in</h2>
                <input type="text" name="login_email" id="login_email" placeholder="Email">
                <input type="submit" name="log_in" value="LOG IN">
            </div>
        </form>
        </section>
        <section id="history" class="customer_history">
        <form method="post" action="order_history.php">
            <div>
            <h2>Log in</h2>
                <input type="text" name="login_email" placeholder="Email">
                <input type="submit" name="log_in" value="LOG IN">
            </div>
        </form>
        </section>
    </main>
</body>
</html>