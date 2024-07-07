
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>AKKHOR | Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->Url->webroot('img/') ?>favicon.png">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>
    <?= $this->fetch('meta') ?>
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/main.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('font/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/style.css') ?>">
    <script src="<?= $this->Url->webroot('js/modernizr-3.6.0.min.js') ?>"></script>
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- Login Page Start Here -->
    <div class="login-page-wrap" style="background-image:url(<?= $this->Url->webroot('img/figure/login-bg.jpg') ?>)">
        <div class="login-page-content">
            <div class="login-box">
                <div class="item-logo">
                    <img src="<?= $this->Url->webroot('img/') ?>logo2.png" alt="logo">
                </div>
                <form action="https://www.radiustheme.com/demo/html/psdboss/akkhor/akkhor/index.html" class="login-form">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" placeholder="Enter usrename" class="form-control">
                        <i class="far fa-envelope"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" placeholder="Enter password" class="form-control">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="form-group d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember-me">
                            <label for="remember-me" class="form-check-label">Remember Me</label>
                        </div>
                        <a href="#" class="forgot-btn">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="login-btn">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Login Page End Here -->
    <!-- jquery-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- Custom Js -->
    <script src="js/main.js"></script>
    <script src="<?= $this->Url->webroot('js/jquery-3.3.1.min.js') ?>"></script>
    <!-- Plugins js -->
    <script src="<?= $this->Url->webroot('js/plugins.js') ?>"></script>
    <!-- Popper js -->
    <script src="<?= $this->Url->webroot('js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?= $this->Url->webroot('js/bootstrap.min.js') ?>"></script>
    <!-- Scroll Up Js -->
    <script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
    <!-- Custom Js -->
    <script src="<?= $this->Url->webroot('js/main.js') ?>"></script>

</body>
</html>