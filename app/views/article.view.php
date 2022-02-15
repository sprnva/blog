<?php

use App\Core\Auth;
use App\Core\Request;
use App\Core\App;
use App\Core\Parsedown;

$pd = new Parsedown();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='<?= public_url('/favicon.ico') ?>' type='image/ico' />
    <title>
        <?= ucfirst($pageTitle) . " | " . App::get('config')['app']['name'] ?>
    </title>

    <link rel="stylesheet" href="<?= public_url('/assets/sprnva/css/bootstrap.min.css') ?>">

    <style>
        @font-face {
            font-family: Nunito;
            src: url("<?= public_url('/assets/sprnva/fonts/Nunito-Regular.ttf') ?>");
        }

        body {
            font-weight: 300;
            font-family: Nunito;
            color: #26425f;
            background: #eef1f4;
        }

        .bg-light {
            background-color: #ffffff !important;
        }

        .card {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            margin-bottom: 1rem;
            border-radius: .5rem !important;
        }
    </style>

    <script src="<?= public_url('/assets/sprnva/js/jquery-3.6.0.min.js') ?>"></script>
    <script src="<?= public_url('/assets/sprnva/js/popper.min.js') ?>"></script>
    <script src="<?= public_url('/assets/sprnva/js/bootstrap.min.js') ?>"></script>

    <?php
    // this will auto include filepond css/js when adding filepond in public/assets
    if (file_exists('public/assets/filepond')) {
        require_once 'public/assets/filepond/filepond.php';
    }
    ?>

    <script>
        const base_url = "<?= App::get('base_url') ?>";
    </script>
</head>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: -webkit-sticky;position: sticky;top: 0;z-index: 100;border-bottom: 1px solid #eee;box-shadow: 0 2px 5px 0 rgb(0 0 0 / 10%);">
        <div class="container col-sm-12 col-md-8">
            <a class="navbar-brand" href="<?= route('/') ?>">
                <img src="<?= public_url('/storage/images/sprnva-logo.png') ?>" alt="sprnva-logo" style="width: 40px; height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= route('/home') ?>" style="font-size: 18px;font-weight: 500;"><?= ucfirst($pageTitle); ?></a>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= route('/home') ?>" style="font-size: 18px;font-weight: 500;">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= route('/releases') ?>" style="font-size: 18px;font-weight: 500;">Releases</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="overflow: auto;">

        <div class="row justify-content-center">


            <div class="col-sm-12 col-md-8">
                <a href="<?= route('', $blog['id']) ?>" style="color: inherit;text-decoration: none;">
                    <div class="card mt-4" style="background-color: #fff; border: 0px; border-radius: 8px; box-shadow: 0 4px 5px 0 rgba(0,0,0,0.2);">
                        <div class="card-body">
                            <div class="col-md-12 d-flex flex-column align-items-start justify-content-center">

                                <img src="public/storage/images/sprnva-logo.png" style="height: 200px;width: 100%;object-fit: cover;">

                                <h4 class="mt-3 mb-4 text-dark"><?= $blog['title'] ?></h4>

                                <?= $pd->text(html_entity_decode($blog['content'])); ?>
                            </div>
                            <div class="col-md-12 d-flex flex-row align-items-center justify-content-between">
                                <div>
                                    <img src="public/storage/images/sprnva-logo.png" style="height:50px;width: 50px;object-fit: cover;">
                                    <small>jagwarthegreat</small>
                                </div>
                                <div>
                                    <p class="text-muted">Feb, 10 2022</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


        </div>


        <?php require 'layouts/footer.php'; ?>