<?php

use App\Core\App;
use App\Core\Auth;
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

		.hljs-deletion,
		.hljs-number,
		.hljs-quote,
		.hljs-selector-class,
		.hljs-selector-id,
		.hljs-string,
		.hljs-template-tag,
		.hljs-type {
			color: #0c8819 !important;
		}

		.hljs-tag .hljs-attr,
		.hljs-tag .hljs-name {
			color: #929292;
		}

		.hljs-punctuation,
		.hljs-tag {
			color: #888;
		}

		.hljs-attribute,
		.hljs-doctag,
		.hljs-keyword,
		.hljs-meta .hljs-keyword,
		.hljs-name,
		.hljs-selector-tag {
			font-weight: inherit;
			color: #1f7199;
		}

		.hljs-section,
		.hljs-title {
			color: #ca473f;
			font-weight: 400;
		}

		.hljs-link,
		.hljs-operator,
		.hljs-regexp,
		.hljs-selector-attr,
		.hljs-selector-pseudo,
		.hljs-symbol,
		.hljs-template-variable,
		.hljs-variable {
			color: #3f97b9;
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