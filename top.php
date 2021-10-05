<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = “UFT-8”>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>入力内容確認画面</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="php.css">
        <link rel="stylesheet" href="responsive.css">
    </head> 
    <body>


        <header>
            <div class="header-container">
                <div class="header-left">
                    <p>Portfolio</p>
                </div>
                <div class="header-right">
                    <ul>
                        <li><a class="about" href="top.html#about"><span class="far fa-address-card"></span>About</a></li>
                        <li><a class="works" href="top.html#works"><span class="fas fa-calculator"></span>Works</a></li>
                        <li><a class="contact" href="top.html#contact"><span class="far fa-envelope"></span>Contact</a></li>
                    </ul>
                </div>
                <div class="menu">
                    <span class="fas fa-bars menu-icon"></span>
                    <div class="menu-mordal open">
                        <div class="mordal-container">
                            <ul>
                                <li><a class="about" href="top.html#about">About</a></li>
                                <li><a class="works" href="top.html#works">Works</a></li>
                                <li><a class="contact" href="top.html#contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>  
        </header>
        <div class="main">
            <div class="main-container">
                <div class="thankyou">
                    <h3>入力内容を確認してください</h3>
                </div>
            </div>
            <?php require_once("method.php") ?>
            <form class="form-box" method="POST" action="thank.php">
                <div class="form-box-container">
                    <?php if($isError): ?>
                    <h4>未入力の箇所があります。確認して送信し直してください</h4>
                    <?php endif; ?>

                    <p>Name　：　<?php echo $name ?></p>
                    <p>E-mail　：　<?php echo $email ?></p>
                    <p>Message　：　<?php echo $message ?></p>
                </div>
                <div class="form-btn">
                    <?php if($isError): ?>
                    <input id="submit" type="button" onclick="history.back()"  value="Back">
                    <?php else: ?>
                    <input id="submit" type="button" value="Send" onclick="location.href='thank.php'">
                    <?php endif; ?>
                </div>
            </form>

        </div>
        <footer>
            <div class="footer-container">
                <p>&copy;2021　Misato Yashiro</p>
            </div>
        </footer>
    </body>
</html>
