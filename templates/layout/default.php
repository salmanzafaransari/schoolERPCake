<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= $this->Url->webroot('img/') ?>favicon.png">
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')) ?>

    <?= $this->fetch('meta') ?>
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/normalize.css') ?>">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/main.css') ?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/bootstrap.min.css') ?>">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/all.min.css') ?>">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('font/flaticon.css') ?>">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/fullcalendar.min.css') ?>">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/animate.min.css') ?>">
    <?= $this->fetch('stylescss') ?>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= $this->Url->webroot('css/style.css') ?>">
    <script src="<?= $this->Url->webroot('js/modernizr-3.6.0.min.js') ?>"></script>
</head>

<body>
<div id="wrapper" class="wrapper bg-ash">
    <?php echo $this->element('topbar'); ?>
    <div class="dashboard-page-one">
        <?php echo $this->element('sidebar'); ?>
        <div class="dashboard-content-one">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <?php echo $this->element('footer'); ?>
        </div>
    </div>
</div>
    
    <script src="<?= $this->Url->webroot('js/jquery-3.3.1.min.js') ?>"></script>
    <!-- Plugins js -->
    <script src="<?= $this->Url->webroot('js/plugins.js') ?>"></script>
    <!-- Popper js -->
    <script src="<?= $this->Url->webroot('js/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?= $this->Url->webroot('js/bootstrap.min.js') ?>"></script>
    <?= $this->fetch('scripts') ?>
    <!-- Counterup Js -->
    <script src="<?= $this->Url->webroot('js/jquery.counterup.min.js') ?>"></script>
    <!-- Moment Js -->
    <script src="<?= $this->Url->webroot('js/moment.min.js') ?>"></script>
    <!-- Waypoints Js -->
    <script src="<?= $this->Url->webroot('js/jquery.waypoints.min.js') ?>"></script>
    <!-- Scroll Up Js -->
    <script src="<?= $this->Url->webroot('js/jquery.scrollUp.min.js') ?>"></script>
    <!-- Full Calender Js -->
    <script src="<?= $this->Url->webroot('js/fullcalendar.min.js') ?>"></script>
    <!-- Chart Js -->
    <script src="<?= $this->Url->webroot('js/Chart.min.js') ?>"></script>
    <!-- Custom Js -->
    <script src="<?= $this->Url->webroot('js/main.js') ?>"></script>
</body>
</html>
