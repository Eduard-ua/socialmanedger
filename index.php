<?php define('TKM', true);
require('lib/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="yandex-verification" content="e7eaa90a1e9c0173" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style20.css">
	<link rel="stylesheet" href="css/newStyle.css" />
	<script src="https://vk.com/js/api/openapi.js?169" type="text/javascript"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-CHTVS1ZYKV"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-CHTVS1ZYKV');
	</script>

	<style>
		.alert-success {
			color: #155724;
			background-color: #d4edda;
			border-color: #c3e6cb;
			margin-left: auto;
			margin-right: auto;
			width: 40%;
		}

		.alert-warning {
			color: #856404;
			background-color: #fff3cd;
			border-color: #ffeeba margin-left: auto;
			margin-right: auto;
			width: 40%;
		}

		.alert-danger {
			color: #721c24;
			background-color: #f8d7da;
			border-color: #f5c6cb margin-left: auto;
			margin-right: auto;
			width: 40%;
		}

		.alert {
			position: relative;
			padding: .75rem 1.25rem;
			border: 1px solid transparent;
			border-radius: .25rem;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 25px;
			margin-top: auto;
		}

		@media (max-width: 768px) {
			.uslugi__item {
				flex-flow: column;
				width: 100%;
			}
		}
	</style>
</head>
<title>Socialmanager - лидер в продвижении и раскрутки в соц.сетях</title>

<body>
	<?php require "header/_header.html"; ?>
	<?php require "socialmenu/socialmenu.html"; ?>
	<div class="intro">
		<div class="container">
			<?php echo MessageShow(); ?>
		</div>
	</div>
	<section class="intro">
		<div class="container">
			<div class="intro__inner">
				<div class="intro__body">
					<h1 class="intro-title"><span>ты блогер?</span> </h1>
					<p class="intro-text" style="color: white;">Тогда мы поможем тебе продвинуться! <br> Заказывай наши услуги по низким ценам. Гарантируем успех!</p>
					<div class="intro__buttons"> <a class="button btn-intro btn-orange" href="/uslugi">Продвинуть</a></div>
				</div>
				<div class="intro__img">
					<picture>
						<source srcset="images/hea.png" type="image/webp"><img src="images/hea.png" alt="Girl">
					</picture>
				</div>
			</div>
		</div>
		<video loop="" muted="" autoplay="" poster="video/intro_bg.jpg" class="fullscreen-bg__video">
			<source src="video/intro_bg_light.mp4" type="video/mp4">
		</video>
	</section>
	<section class="section">
		<div class="container">

			<div class="section__header">
				<div class="section__title">Smm manager</div>
				<div class="section__suptitle">Почему выбирают нас?</div>
			</div>

			<div class="about">
				<div class="about__item">
					<img src="../images/about1.png" alt="" class="about__img">
					<div class="about__title">Качество и цена</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>

				<div class="about__item">
					<img src="../images/about2.png" alt="" class="about__img">
					<div class="about__title">Надежность</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>

				<div class="about__item">
					<img src="../images/about3.png" alt="" class="about__img">
					<div class="about__title">Техподдержка 24/7</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>
			</div>


			<div class="about">
				<div class="about__item">
					<img src="../images/about4.png" alt="" class="about__img">
					<div class="about__title">Опыт работы</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>

				<div class="about__item">
					<img src="../images/about5.png" alt="" class="about__img">
					<div class="about__title">Гарантия</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>

				<div class="about__item">
					<img src="../images/about6.png" alt="" class="about__img">
					<div class="about__title">Продвижение</div>
					<div class="about__text">Будьте уверены, у нас самые лучшие цены на самые качественные услуги</div>
				</div>
			</div>



		</div>
	</section>
	<div class="section">
		<div class="container">

			<div class="section__header">
				<div class="section__title">Популярные услуги SMM</div>
				<div class="section__suptitle"></div>
			</div>

			<?php
			$ar = array_slice($config['social'], 0, 3);
			foreach ($ar as $key => $row) { ?>
				<div class="uslugi">
					<div class="uslugi__item">
						<img src="<?php echo $row['imgone']; ?>" alt="" class="uslugi__img">
						<div class="uslugi__title"><?php echo $row['name']; ?></div>


						<div class="uslugi__btn">
							<?php foreach ($row['aray'] as $rey => $rm) { ?>
								<a href="<?php echo '/' . $row['name']; ?>" class="uslugi__btn__link"><?php echo 'Купить ' . $rm['name']; ?></a>
							<?php } ?>
						</div>

					</div>
				</div>
			<?php } ?>




		</div>
	</div>
	<?php require "footer/_footer.html"; ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(function() {
			$(".alert").delay(5000).slideUp(300);
		});
	</script>

	<script src="lib/script3.min.js" type="text/javascript"></script>

	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
		})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(81238918, "init", {
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true,
			webvisor: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/81238918" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->



</body>

</html>