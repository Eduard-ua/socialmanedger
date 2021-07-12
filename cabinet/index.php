<?php 
define('TKM', true);
require('../lib/db.php');
if(isset($_SESSION['logged_user'])) {
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../css/style20.css">
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
    @media(max-width: 768px) {
        .cabinet {
            display: inline-grid;
        }
        .cabinet__item {
            margin-bottom: 30px;
            margin-left: 80px;
        }
    }
</style>
 </head>
  	<title>SMM | Личный кабинет</title>
<body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 
<div class="section">
    <div class="container">

        <div class="section__header">
            <div class="section__iimg"><img src="../images/cabinet1.png" alt="" class="section__img"></div>
            <div class="section__suptitle">Личный кабинет</div>
            <a href="/logout" style="color: #fff;font-size:25px;font-weight:700;text-decoration: none;">Выйти</a>
        </div>

        <div class="cabinet">

            <a href="/cabinet/edit" class="cabinet__item">
                <div class="cabinet__header">Личные данные</div>
                    <div class="cabinet__suptitle"></div>
                <img src="../images/cabinet2.png" alt="" class="cabinet__img">
            </a>

            <a href="/cabinet/zakazi" class="cabinet__item">
                <div class="cabinet__header">История заказов</div>
                    <div class="cabinet__suptitle"></div>
                <img src="../images/cabinet3.png" alt="" class="cabinet__img">
            </a>

            <a href="/cabinet/support" class="cabinet__item">
                <div class="cabinet__header">Техподдержка</div>
                    <div class="cabinet__suptitle"></div>
                <img src="../images/cabinet4.png" alt="" class="cabinet__img">
            </a>

            <a href="/cabinet/balance" class="cabinet__item">
                <div class="cabinet__header">Баланс акканта</div>
                    <div class="cabinet__suptitle"></div>
                <img src="../images/cabinet5.png" alt="" class="cabinet__img">
            </a>

        </div>   

    </div>
</div>
<?php require "../footer/_footer.html"; ?> 
<script>
$(function(){
    $(".alert").delay(5000).slideUp(300);
});
</script>
<script src="../lib/script3.min.js" type="text/javascript"></script>
 
</body>
<?php } else {
    MessageSend(3, 'Войдите в аккаунт или зарегистрируйтесь, чтобы пользоваться личным кабинетом!', '/login');
} ?>