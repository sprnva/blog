<?php

use App\Core\App;
use App\Core\Auth;
use App\Core\Storage;
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

		.table td,
		.table th {
			padding: 0.45rem;
		}

		.table th {
			background-color: #eaecf0;
		}

		.table tr,
		.table th,
		.table td {
			border: 1px solid #a2a9b1;
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
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #eee;">
		<div class="container">
			<a class="navbar-brand" href="<?= route('/') ?>">
				<img src="<?= public_url('/storage/images/sprnva-logo.png') ?>" alt="sprnva-logo" style="width: 40px; height: 40px;">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?= route('/home') ?>">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= route('/article') ?>">Blog</a>
					</li>
				</ul>

				<ul class="navbar-nav flex-row ml-md-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<img src="<?= Storage::getAvatar(Auth::user('id')); ?>" alt="sprnva-logo" style="width: 30px; height: 30px;object-fit: cover;border-radius: 50%;">
							<?= Auth::user('fullname') ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?= route('/profile') ?>">Profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= route('/logout') ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

							<form id="logout-form" action="<?= route('/logout') ?>" method="POST" style="display:none;">
								<?= csrf() ?>
							</form>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 5px 0 rgb(0 0 0 / 10%);">
		<div class="container">
			<div class="navbar-nav">
				<div class="nav-item">
					<div class="nav-link active" style="font-size: 18px;font-weight: 500;"><?= ucfirst($pageTitle); ?></div>
				</div>
			</div>
		</div>
	</nav>
	<div class="container mt-5">