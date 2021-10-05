<?php 
require_once("forThankMethod.php");
session_start();
session_regenerate_id(true);
$error = [];
if(!empty($_SESSION['name']) && !empty($_SESSION['email']) && !empty($_SESSION['message'])) {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $message = $_SESSION['message'];
} else {
    $error[] = "セッションエラー";
}
killSession();

    //メモ機能用
    $date = date("Y/n/j G:i:s", time());
    $writedata = "-----".PHP_EOL.$date.PHP_EOL.$name.PHP_EOL.$email.PHP_EOL.$message.PHP_EOL;
    $filename = "form.text";
    
    try {
        $fileObj = new SplFileObject($filename, "a+b");
    } catch(Exception $e) {
        echo '<span>エラー</span><br>';
        echo $e ->getMessage();
        exit();
    }

    $fileObj ->flock(LOCK_EX);
    $result = $fileObj ->fwrite($writedata);
    $fileObj ->flock(LOCK_UN);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = “UFT-8”>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>送信完了画面</title>
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
                    <h3>Thank You!</h3>
                    <h3>お問い合わせありがとうございました</h3>
                    
                </div>
            </div>
            <div class="form-box">
                <div class="form-box-container">
                    <p>Name　：　<?php echo $name ?></p>
                    <p>E-mail　：　<?php echo $email ?></p>
                    <p>Message　：　<?php echo $message ?></p>
                </div>
                <div class="form-btn">
                    <input id="submit" type="button" onclick="location.href='/miss-snow.github.io/index.html'"  value="Topへ">
                </div>
            </div>

        </div>
        <footer>
            <div class="footer-container">
                <p>&copy;2021　Misato Yashiro</p>
            </div>
        </footer>
    </body>
</html>
