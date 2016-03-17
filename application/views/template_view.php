<?php

define('MAIN_URI', ($_SERVER['REQUEST_URI'] == '/' ? '/index.php' : $_SERVER['REQUEST_URI']));
// грузим правила для ЧПУ
$patterns_keys = array(
    '#^/(user/?)(new/?)?$#i',
    '#^/(user/?)(settings/?)?$#i',
    '#^/(user/?)(settings/?)?((general|avatar|security|social)/?)$#i'
);
$patterns_values = array(
    'module=account&id=$2',
    'module=account&action=new',
    'module=account&action=settings',
    'module=account&action=settings&do=$4'        //модулю можно передавать дополнительные параметры
);
$res = preg_replace($patterns_keys, $patterns_values, MAIN_URI);
// разбираем url и преопреeделяем суперглобальный массив _REQUEST
parse_str($res, $_REQUEST);
$module = $_REQUEST['module'];
$page = $res;
?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <title>Limea.ru</title>

    <meta name='yandex-verification' content='718fe45c8c6cb47d'/>
    <meta name="google-site-verification" content="O-dNiUQcd389lXWtXWm3G6mtwg69cVPRUE8AaNQNnGo"/>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css"/>
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-tour.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-tour.min.css">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap-tour-standalone.min.css">

    <!--<link rel="stylesheet" type="text/css" href="/css/style.css" />-->
    <link rel="stylesheet" type="text/css" href="/css/mystyle.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/socialsider-v1.0.css" media="all"/>


    <link rel="stylesheet" type="text/css" href="/css/socialsider-v1.0.css" media="all"/>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-1.12.1.js"></script>
    <script src="/js/Chart.js"></script>

    <!--<script src="/js/angular.js"></script>-->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.1/angular.min.js"></script>


    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.js"></script>
    <script src="/bootstrap/js/bootstrap-tour.js"></script>
    <script src="/bootstrap/js/bootstrap-tour.min.js"></script>
    <script src="/bootstrap/js/bootstrap-tour-standalone.min.js"></script>


</head>
<body ng-app>
<?php require_once 'application/views/extra/nav.php'; ?>
<?php echo $pade;
if ($page == "/index.php") require_once 'application/views/extra/carusel.php'; ?>
<!-- Begin page content -->
<div class="container">
    <div class="main-container">
        <?php include 'application/views/' . $content_view; ?>
    </div>
</div>

<?php require_once 'application/views/extra/socialsider.php'; ?>
<?php require_once('application/views/extra/footer.php'); ?>
<?php include_once('lib/analyticstracking.php'); ?>
<?php include_once('lib/metrikatracking.php'); ?>
<?php include_once('lib/googletagmanager.php'); ?>
<?php include_once('lib/jivosite.php'); ?>
</body>
</html>