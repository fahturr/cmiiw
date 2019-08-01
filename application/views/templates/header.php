<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title><?= $judul ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets'); ?>/img/logo/logo_mw.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/animate-3.7.0.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/owl-carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <header class="header-area" style="position:fixed">
        <div class="container">
            <div class="row">
                <div class="col-lg-1">
                    <div class="logo-area">
                        <a href="<?= base_url('auth') ?>"><img src="<?= base_url('assets'); ?>/img/logo/logo_mw.png" alt="logo" width="70" height="60"></a>
                    </div>
                </div>
                <div class="col-lg-11">
                    <div class="main-menu">
                        <ul>
                            <li class="active"><a href="<?= base_url('home'); ?>">home</a></li>
                            <li><a href="<?= base_url('menu'); ?>">Menu</a></li>
                            <li><a href=""><?= $nama_user ?></a>
                                <ul class="sub-menu mt-4">
                                    <li><a href="<?= base_url('home/profile') ?>">Profile</a></li>
                                    <li><a href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                                </ul>
                                <img src="<?= base_url('assets/img/users/') . $gambar ?>" class="mr-3" width="30">
                            </li>
                            <li>
                                <a href="<?= base_url('home/troley') ?>" class="btn">
                                    <img src="<?= base_url('assets') ?>/img/troley.png" width="40">
                                    <span class="badge badge-light">
                                        9
                                    </span>
                                    <span class="sr-only">unread messages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->