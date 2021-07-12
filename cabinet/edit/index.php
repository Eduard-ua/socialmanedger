<?php require('../../lib/db.php'); 
$data = $_POST;
 if(isset($_SESSION['logged_user'])) { 
    if(isset($_POST['do_edit'])) {
        $a = $link->query("SELECT count(*) FROM `users` WHERE `login` = '".$_POST['name']."'");
        $b = $a->fetch();
        $c = $link->query("SELECT count(*) FROM `users` WHERE `email` = '".$_POST['email']."'");
        $d = $c->fetch();
        if($b['count(*)'] >= 1 OR $d['count(*)'] >= 1) {
            MessageSend(1, 'Такой логин уже занят', '/cabinet/edit');
        } elseif(password_verify($_POST['password'], $_SESSION['logged_user']->password)) {
        if($_POST['passwordnew'] != ' ' && $_POST['passwordnew'] != '' && $_POST['passwordnew'] != null) {
            $link->query("UPDATE `users` SET `login` = '".$data['name']."', `email` = '".$data['email']."', `password` = '".password_hash($_POST['passwordnew'], PASSWORD_DEFAULT)."', `familiya` = '".$data['familiya']."'");
            $_SESSION['logged_user']->login = $data['name'];
            $_SESSION['logged_user']->email = $data['email'];
            $_SESSION['logged_user']->password = password_hash($_POST['passwordnew'], PASSWORD_DEFAULT);
            $_SESSION['logged_user']->familiya = $data['familiya'];
            MessageSend(3, 'Данные успешно изменены!', '/cabinet/edit');
        } else {
        $link->query("UPDATE `users` SET `login` = '".$data['name']."', `email` = '".$data['email']."', `familiya` = '".$data['familiya']."'");
        $_SESSION['logged_user']->login = $data['name'];
        $_SESSION['logged_user']->email = $data['email'];
        $_SESSION['logged_user']->familiya = $data['familiya'];
        MessageSend(3, 'Данные успешно изменены!', '/cabinet/edit');
    }
} else {
    MessageSend(1, 'Неверно введён старый пароль!', '/cabinet/edit');
}
    }

    ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../../css/style20.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        color:#856404;background-color:#fff3cd;border-color:#ffeeba
        margin-left: auto;
    margin-right: auto;
    width: 40%;
    }
    .alert-danger {
        color:#721c24;background-color:#f8d7da;border-color:#f5c6cb
        margin-left: auto;
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
    button {
        width: 100%;
        height: 40px;
        border-radius: 15px;
        border: none;
        margin-top: 10px;
        background: gray;
        transition: 2s;
    }
    button:hover {
        background: #f38181;
        transition: 2s;
    }
    .cabinet__input {
        padding: 15px 15px;
    }
</style>
 </head>
  	<title>SMM | Личные данные</title>
<body>

<header class="header">
	<div class="header__content _container">
		<div class="header__logo">
			<a href="https://socialmanedger.ru"><picture><source srcset="../../images/menu/quattrologo.webp" type="image/webp"><img class="header__logo" src="../../images/menu/quattrologo.png" alt="логотип"></picture></a>
		</div>
		<div class="header__menu menu-header">
			<div class="icon-menu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav class="menu-header__body">
				<ul class="menu-header__ul">
					<li class="menu-header__li"><a href="https://socialmanedger.ru"><span><picture><source srcset="../../images/menu/hom.webp" type="image/webp"><img class="menu-header__img" src="../../images/menu/hom.png" alt=""></picture></span><p>Главная</p></a></li>
					<li class="menu-header__li"><a href="/uslugi"><span><picture><source srcset="../../images/menu/i.webp" type="image/webp"><img class="menu-header__img" src="../../images/menu/i.png" alt=""></picture></span>Услуги</a></li>
					<li class="menu-header__li"><a href="/cabinet/support"><span><picture><source srcset="../../images/menu/tech.webp" type="image/webp"><img class="menu-header__img" src="../../images/menu/tech.png" alt=""></picture></span>Техподдержка</a></li>
					<li class="menu-header__li"><a href="/reviews"><span><picture><source srcset="../../images/menu/contact.webp" type="image/webp"><img class="menu-header__img" src="../../images/menu/contact.png" alt=""></picture></span>Отзывы</a></li>
					<li class="menu-header__li"><a href="/about"><span><picture><source srcset="../../images/menu/info.webp" type="image/webp"><img class="menu-header__img" src="../../images/menu/info.png" alt=""></picture></span>О нас</a></li>
				</ul>
			</nav>
		</div>
		<div class="header__action menu-action">
		    <?php if(isset($_SESSION['logged_user'])) {
 						$a = $link->query("SELECT * FROM `users` WHERE `login` = '".$_SESSION['logged_user']->login."'");
 						$b = $a->fetch(); ?>
 						<div class="registrations"><a class="reg" href="/cabinet"><?php echo $_SESSION['logged_user']->login; ?> </a> <a class="login" style="display: flex;"><p style="display: flex; margin-right: 5px"><?php echo $b['balance']; ?></p><p>Р</p></a></div>
 					<?php } else { ?>
 					<ul class="menu-action__ul">
        				<li class="menu-action__img"><span class="menu-action__span"></span></li> 
        				<li class="menu-action__li"><a href="/login"><span>Вход</span></a></li> 
        				<li class="menu-action__li"><a class="menu-action__reg" href="/registration"><p>Регистрация</p></a></li> 
        			</ul>
                 <?php } ?>
		</div>
	</div>
</header>
<div class="wrapper">
		<div class="pagemenu _container">
			<div class="pagemenu__content content-pagemenu">
				<div class="content-pagemenu__action">
					<div class="icon-menu-page">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<p>Каталог услуг</p>
				</div>
				<div class="content-pagemenu__menu">
					<div class="content-pagemenu__block">
						<div class="content-pagemenu__img">
							<a href="/instagram"><img src="../../images/pageMenu/uslugi1.png" alt=""></a>
						</div>
						
						<div class="content-pagemenu__list">
							<ul class="content-pagemenu__ul">
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">Подпискаа услугиАвто накруткаусл угиАвтонакрутка</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">Подписка на услуги - Автонакрутка</a></li>
							</ul>
						</div>
					</div>
					<div class="content-pagemenu__block">
						<div class="content-pagemenu__img">
							<a href="#"><img src="../../images/pageMenu/uslugi2.png" alt=""></a>
						</div>
						<div class="content-pagemenu__list">
							<ul class="content-pagemenu__ul">
								<li class="content-pagemenu__link"><a href="#">a12312wd</a></li>
							</ul>
						</div>
					</div>
					<div class="content-pagemenu__block">
						<div class="content-pagemenu__img">
							<a href="#"><img src="../../images/pageMenu/uslugi3.png" alt=""></a>
						</div>
						<div class="content-pagemenu__list">
							<ul class="content-pagemenu__ul">
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
							</ul>
						</div>
					</div>
					<div class="content-pagemenu__block">
						<div class="content-pagemenu__img">
							<a href="#"><img src="../../images/pageMenu/uslugi4.png" alt=""></a>
						</div>
						<div class="content-pagemenu__list">
							<ul class="content-pagemenu__ul">
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
							</ul>
						</div>
					</div>
					<div class="content-pagemenu__block">
						<div class="content-pagemenu__img">
							<a href="#"><img src="../../images/pageMenu/uslugi5.png" alt=""></a>
						</div>
						<div class="content-pagemenu__list">
							<ul class="content-pagemenu__ul">
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
								<li class="content-pagemenu__link"><a href="#">awdawdwad</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<div class="section">
    <div class="container">
        <?php echo MessageShow(); ?>

        <div class="section__header">
            <div class="section__iimg"><img src="../../images/cabinet2.png" alt="" class="section__img"></div>
            <div class="section__suptitle">Личные данные</div>
        </div>

        <div class="cabinet">
            <div class="cabinet__danniy">
                <form method="POST" action="/cabinet/edit/index.php">
                <input class="cabinet__input" type="text" name="name" value="<?php echo $_SESSION['logged_user']->login; ?>">
                <input class="cabinet__input" type="text" name="familiya" placeholder="Фамилия" value="<?php echo $_SESSION['logged_user']->familiya; ?>">
                <input class="cabinet__input" type="email" name="email" value="<?php echo $_SESSION['logged_user']->email; ?>">
                <input class="cabinet__input" type="password" name="password" placeholder="Ваш пароль">
                <input class="cabinet__input" type="password" name="passwordnew" placeholder="Впишите сюда новый если хотите изменить старый">
                <button type="submit" name="do_edit">Сохранить</button>
            </form>
            </div>
        </div>
        
    </div>
</div>
<footer class="footer">
	<div class="footer__container _container">
		<div class="footer__top">
			<div class="footer__logo"><a href="https://socialmanedger.ru"><img class="footer__logo" src="../../images/menu/quattrologotransparentnontext.png" alt="логотип"></a></div>
			<div class="footer__menu menu-footer">
				<nav class="menu-footer__body">
					<ul class="menu-footer__top">
						<li class="menu-footer__li"><a href="/SocialNewsInfo"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>Новости/обновления</a></li>
						<li class="menu-footer__li"><a href="/cabinet/"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>Личный Кабинет</a></li>
						<li class="menu-footer__li"><a href="/cabinet/zakazi"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>История заказов</a></li>
					</ul>
					<ul class="menu-footer__buttom">
						<li class="menu-footer__li"><a href="#"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>Оферта</a></li>
						<li class="menu-footer__li"><a href="#"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>Партнёрская программа</a></li>
						<li class="menu-footer__li"><a href="/reviews"><span><img class="menu-header__img" src="../../images/menu/i.png" alt=""></span>Отзывы о нас</a></li>
					</ul>
				</nav>
			</div>
			<div class="footer__pay pay-footer">
				<div class="pay-footer__text">Способы оплаты</div>
				<div class="pay-footer__row">
					<div class="pay-footer__column">
						<a href="#"><img src="../../images/menu/web1.png" rel="nofollow" alt=""></a>
					</div>
					<div class="pay-footer__column">
						<a href="#"><img src="../../images/menu/web2.png" alt="www.megastock.ru"></a>
					</div>
				</div>
				<div class="pay-footer__row">
					<div class="pay-footer__column column-footer">
						<img src="../../images/menu/visa.png" rel="nofollow" alt="">
					</div>
					<div class="pay-footer__column column-footer">
						<img src="../../images/menu/yandex.png" rel="nofollow" alt="">
					</div>
				</div>
				<div class="pay-footer__row">
					<div class="pay-footer__column column-footer">
						<img src="../../images/menu/mastercard.png" rel="nofollow" alt="">
					</div>
					<div class="pay-footer__column column-footer">
						<img src="../../images/menu/sberbank.png" rel="nofollow" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="footer__copy">
			<p>CopyRight © 2021 SocialManedger. Все права защищены.</p>
		</div>
	</div>
</footer>

<script>
$(function(){
    $(".alert").delay(5000).slideUp(300);
});
</script>
<script src="../../lib/script3.min.js" type="text/javascript"></script>

</body>
<?php } else {
    MessageSend(1, 'Вы не вошли в свой аккаунт!', '/login');
}?>