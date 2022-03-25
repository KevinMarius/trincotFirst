<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../public/css/LineIcons.css">
</head>
<body>
    <header class="header">
        <nav class="navbar container">
            <a class="navbar-logo" href="index.php"></a>

            <button class="navbar-toggler" type="button">
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
                <span class="toggler-icon"></span>
            </button>
    
            <div class="navbar-menu item">
                <ul>
                    <li><a class="item-link" href="index.php#home">Home</a></li>
                    <li><a class="item-link" href="index.php#about">About</a></li>
                    <li><a class="item-link" href="index.php#services">Services</a></li>
                    <li><a class="item-link" href="index.php#blog">Blog</a></li>
                    <li><a class="item-link" href="index.php#contact">Contact</a></li>
                </ul>
            </div>
        </nav>   
    </header>
    <?= $content; ?>
    <footer class="footer">
        <a class="logo" href="index.php"></a>
        <h1>Trincot</h1>
        <div class="social-link">
            <a href="#"><i class="lni-facebook-filled icon"></i></a>
            <a href="#"><i class="lni-linkedin-original icon"></i></a>
            <a href="#"><i class="lni-twitter-original icon"></i></a>
            <a href="#"><i class="lni-instagram-original icon"></i></a>
        </div>
        <span>+237 694 70 32 80</span>
        <span>trincot@info.com</span>
        
        <p>Copyright © 2022. Template Crafted by <strong>Kevin</strong></p>
    </footer>
    <a class="back-to-top" href="#">
        <i class="lni-chevron-up"></i>
    </a>
    <script src="../public/js/main.js"></script>
</body>
</html>