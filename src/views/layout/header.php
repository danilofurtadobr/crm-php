<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">
    <title>SCC</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <i class="icofont-molecule mr-2"></i>
            <span class="font-weight-light">S</span>
            <span class="font-weight-bold ml-1">CC</span>
            <i class="icofont-network ml-2"></i>
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">

                <span class="ml-3">
                    <?php if ($_SESSION['user']): ?>
                        <?= $_SESSION['user']->name ?>
                    <?php endif; ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="/logout">
                            <i class="icofont-logout mr-2"></i>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <?php require VIEW_PATH . 'layout/left.php'?>
