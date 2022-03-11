<?php

use App\Core\Auth;
use App\Core\Request;
use App\Core\App;
use App\Core\Parsedown;

$pd = new Parsedown();

if (!empty($blog['users'][0])) {
    $user = $blog['users'][0];
} else {
    $user = $blog['users'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='<?= public_url('/favicon.ico') ?>' type='image/ico' />
    <title> <?= ucfirst($pageTitle) . " | " . App::get('config')['app']['name'] ?> </title>

    <meta name="twitter:image:src" content="https://user-images.githubusercontent.com/37282871/155911888-75dbd031-e837-4606-94f3-d9f85b5eabaf.png" />
    <meta name="twitter:site" content="@jagwarthegreat" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?= $blog['title'] ?>" />
    <meta name="twitter:description" content="The Sprnva Blog. Read some of the latest articles about sprnva framework." />

    <meta property="og:image" content="https://user-images.githubusercontent.com/37282871/155911888-75dbd031-e837-4606-94f3-d9f85b5eabaf.png" />
    <meta property="og:image:alt" content="The Sprnva Framework. Contribute to sprnva/framework development by creating an account on GitHub." />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="600" />
    <meta property="og:site_name" content="blog.sprnva.com" />
    <meta property="og:type" content="object" />
    <meta property="og:title" content="<?= $blog['title'] ?>" />
    <meta property="og:url" content="<?= $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:description" content="The Sprnva Blog. Read some of the latest articles about sprnva framework." />

    <link rel="stylesheet" href="<?= public_url('/assets/sprnva/css/bootstrap.min.css') ?>">

    <style>
        @font-face {
            font-family: Nunito;
            src: url("<?= public_url('/assets/sprnva/fonts/Nunito-Regular.ttf') ?>");
        }

        body {
            font-weight: 300;
            font-family: Nunito;
            color: #343a40 !important;
            background: #f7f7f7;
        }

        .bg-light {
            background-color: #ffffff !important;
        }

        .card {
            box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
            margin-bottom: 1rem;
            border-radius: .5rem !important;
        }

        p img {
            vertical-align: middle;
            border-style: none;
            width: 100% !important;
        }

        pre {
            padding: 15px;
            width: 100%;
            border-radius: 6px;
            background: #2c2c2c !important;
        }

        .hljs {
            background: none !important;
            color: #fff !important;
            text-shadow: none !important;
            font-size: 1.1em !important;
            overflow: hidden;
        }

        .hljs-comment,
        .hljs-quote {
            font-weight: 500;
            color: rgb(156 163 175);
        }

        .hljs-attr,
        .hljs-deletion,
        .hljs-function.hljs-keyword,
        .hljs-literal,
        .hljs-section,
        .hljs-selector-tag {
            font-weight: 500;
            color: rgb(139 92 246);
        }

        .hljs-bullet,
        .hljs-link,
        .hljs-meta,
        .hljs-operator,
        .hljs-selector-id,
        .hljs-symbol,
        .hljs-title,
        .hljs-variable {
            font-weight: 500;
            color: rgb(129 140 248);
        }

        .hljs-addition,
        .hljs-attribute,
        .hljs-meta-string,
        .hljs-regexp,
        .hljs-string {
            font-weight: 500;
            color: rgb(96 165 250);
        }

        .hljs-doctag,
        .hljs-formula,
        .hljs-keyword,
        .hljs-name {
            font-weight: 500;
            color: rgb(248 113 113);
        }

        .hljs-built_in,
        .hljs-class .hljs-title,
        .hljs-template-tag,
        .hljs-template-variable {
            font-weight: 500;
            color: rgb(249 115 22);
        }

        .hljs-number,
        .hljs-selector-attr,
        .hljs-selector-class,
        .hljs-selector-pseudo,
        .hljs-string.hljs-subst,
        .hljs-type {
            font-weight: 500;
            color: rgb(52 211 153);
        }

        .hljs-doctag,
        .hljs-formula,
        .hljs-keyword,
        .hljs-name {
            font-weight: 500;
            color: rgb(248 113 113);
        }

        .hljs-attr,
        .hljs-deletion,
        .hljs-function.hljs-keyword,
        .hljs-literal,
        .hljs-section,
        .hljs-selector-tag {
            color: rgb(139 92 246);
        }
    </style>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H1CN5TK0SN"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-H1CN5TK0SN');
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js" integrity="sha512-IaaKO80nPNs5j+VLxd42eK/7sYuXQmr+fyywCNA0e+C6gtQnuCXNtORe9xR4LqGPz5U9VpH+ff41wKs/ZmC3iA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index: 100;border-bottom: 1px solid #eee;box-shadow: 0 2px 5px 0 rgb(0 0 0 / 10%);">
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
                        <a class="nav-link active" href="<?= route('/') ?>" style="font-size: 18px;font-weight: 500;"><?= ucfirst($pageTitle); ?></a>
                    </li>
                </ul>

                <ul class="navbar-nav flex-row ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= route('/') ?>" style="font-size: 18px;font-weight: 500;">Home</a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= route('/releases') ?>" style="font-size: 18px;font-weight: 500;">Releases</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="overflow: auto;">

        <div class="row justify-content-center mb-4">
            <div class="col-sm-12 col-md-8">
                <div class="card mt-4" style="background-color: #fff; border: 0px; border-radius: 8px; box-shadow: 0 4px 5px 0 rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <div class="col-md-12 d-flex flex-column align-items-start justify-content-center">

                            <h3 class="mt-3 text-dark"><?= $blog['title'] ?></h3>
                            <small class="text-muted mb-4"><?= date('M d, Y', strtotime($blog['created_at'])) ?></small>

                            <?= (!empty($blog['content'])) ? $pd->text(html_entity_decode(html_entity_decode($blog['content']))) : ''; ?>
                        </div>
                        <div class="col-md-12 d-flex flex-row align-items-center justify-content-start mt-4 mb-4">
                            <div>
                                <img src="<?= (!empty($user['avatar'])) ? public_url($user['avatar']) : public_url('/storage/images/default.png'); ?>" style="height:100px;width: 100px;object-fit: cover;border-radius: 50%;">

                            </div>
                            <div>
                                <div class="col-md-12 d-flex flex-column">
                                    <span>BY <?= $user['fullname'] ?></span>
                                    <span><?= $user['job_desc'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require 'layouts/footer.php'; ?>