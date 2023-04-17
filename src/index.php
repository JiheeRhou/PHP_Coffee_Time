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
                <a href="index.php"><img src="./img/coffee.png" alt="logo">COFFEE TIME</a>
            </div>
            <menu>
                <li><a href="#" onclick="document.getElementById('burger').checked = false;">HOME</a></li>
                <li><a href="menu.php" onclick="document.getElementById('burger').checked = false;">MENU</a></li>
                <li><a href="regi_login.php" onclick="document.getElementById('burger').checked = false;">ORDER</a></li>
                <li><a href="regi_login.php?menu=history" onclick="document.getElementById('burger').checked = false;">HISTORY</a></li>
            </menu>
        </nav>
    </header>
    <main>
        <section class="home">
            <div>
                <h1>COFFEE TIME</h1>
                <h2><a href="regi_login.php">ORDER NOW</a></h2>
            </div>
        </section>
    </main>
</body>
</html>