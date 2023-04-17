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
    <header>
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
            <form method="post" action="order.php">
            <div>
                <h3>HOT</h3>
            </div>
            <div class="menu-items">
                <div class="item">
                    <h4>Espresso</h4>
                    <label for="num_espresso"><img src="./img/espresso.jpg" alt="espresso"></label>
                    <p>$ 3.95</p>
                </div>
                <div class="item">
                    <h4>Americano</h4>
                    <label for="num_americano"><img src="./img/americano.jpg" alt="americano"></label>
                    <p>$ 4.15</p>
                </div>
                <div class="item">
                    <h4>Black</h4>
                    <label for="num_black"><img src="./img/black.jpg" alt="black"></label>
                    <p>$ 3.35</p>
                </div>
                <div class="item">
                    <h4>Cappuccino</h4>
                    <label for="num_cappuccino"><img src="./img/cappuccino.jpg" alt="cappuccino"></label>
                    <p>$ 4.95</p>
                </div>
                <div class="item">
                    <h4>Latte</h4>
                    <label for="num_latte"><img src="./img/latte.jpg" alt="latte"></label>
                    <p>$ 4.95</p>
                </div>
                <div class="item">
                    <h4>Mocha</h4>
                    <label for="num_mocha"><img src="./img/mocha.jpg" alt="mocha"></label>
                    <p>$ 5.25</p>
                </div>
                <div class="item">
                    <h4>Affogato</h4>
                    <label for="num_affogato"><img src="./img/affogato.jpg" alt="affogato"></label>
                    <p>$ 5.95</p>
                </div>
                <div class="item">
                    <h4>Irish</h4>
                    <label for="num_irish"><img src="./img/irish.jpg" alt="irish"></label>
                    <p>$ 5.95</p>
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
                </div>
                <div class="item">
                    <h4>Iced Espresso</h4>
                    <label for="num_icedEspresso"><img src="./img/icedEspresso.jpg" alt="iced espresso"></label>
                    <p>$ 4.35</p>
                </div>
                <div class="item">
                    <h4>Cold Brew</h4>
                    <label for="num_coldBrew"><img src="./img/coldBrew.jpg" alt="cold brew"></label>
                    <p>$ 4.75</p>
                </div>
                <div class="item">
                    <h4>Frappuccino</h4>
                    <label for="num_frappuccino"><img src="./img/frappuccino.jpg" alt="frappuccino"></label>
                    <p>$ 6.25</p>
                </div>
                <div class="item">
                    <h4>Mazagran</h4>
                    <label for="num_mazagran"><img src="./img/mazagran.jpg" alt="mazagran"></label>
                    <p>$ 6.25</p>
                </div>
            </div>
            <input type="button" value="ORDER" onClick="location.href='regi_login.php'">
        </section>
    </main>
</body>
</html>