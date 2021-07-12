<?php require('../lib/db.php');
if(isset($_POST['do_data'])) {
    $v = $link->query("SELECT count(*) FROM `otzyvi` WHERE `login` = '".$_POST['login']."'");
    $n = $v->fetch();
    if($_POST['rate'] > 10) {
        MessageSend(1, 'Нельзя ставить оценку больше 10', '/reviews');
    } elseif(strlen($_POST['text'] > 100)) {
        MessageSend(1, 'Нельзя вводить более 100 символов', '/reviews');
    } elseif($n['count(*)'] >= 1) {
        MessageSend(1, 'Вы уже оставляли отзыв!', '/reviews');
    } else {
    $link->query("INSERT INTO `otzyvi`(`login`, `email`, `city`, `rate`, `text`) VALUES('".$_POST['login']."', '".$_POST['email']."', '".$_POST['city']."', '".$_POST['rate']."', '".$_POST['text']."')");
}
} 
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../css/style20.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .blocks {
        width: 90%;
        height: 100%;
        margin: 30px;
        padding: 20px;
        border-radius: 15px;
        border: 1px solid #000;
        background: gray;
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
</style>
 </head>
  	<title>SMM | Отзывы</title>
<body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 
<div class="section">
    <div class="container">
        <?php echo MessageShow(); ?>
        <div class="section__header">
            <div class="section__iimg"><img src="../../images/reviews.png" alt="" class="section__img"></div>
            <div class="section__suptitle">Отзывы</div>
        </div>

        <?php $a = $link->query("SELECT * FROM `otzyvi` ORDER BY `id` DESC");
        while($row = $a->fetch()) {
        ?>
        <div class="blocks">
            <div class="h"><span class="log">Имя: <?php echo $row['login']; ?></span>
                <p>Город: <?php echo $row['city']; ?></p><p>Оценка: <?php echo $row['rate']; ?>/10</p></div>
            <hr/>
            <p class="message"><?php echo $row['text']; ?></p>
        </div>
    <?php } ?>
    
    </div>
</div>
<div class="section">
    <div class="container">
        <hr/>
        <?php if(isset($_SESSION['logged_user'])) { ?>
            <center><h1>Оставить отзыв</h1></center>
        <div class="cabinet">
            <div class="cabinet__danniy">
                <form action="/reviews/index.php" method="POST">
                <input class="cabinet__input" type="text" name="login" placeholder="Имя" required>
                <input class="cabinet__input" type="text" name="city" placeholder="Город" required>
                <input class="cabinet__input" type="email" name="email" placeholder="Email" required>
                <input class="cabinet__input" type="text" name="text" placeholder="Комментарий, не более 100 символов" required>
                <input class="cabinet__input" type="text" name="rate" onkeyup="this.value = this.value.replace(/[^\d]/g,'');"  placeholder="Оценка, от 1 до 10" required>
                <button type="submit" name="do_data">Оставить отзыв</button>
            </form>
            </div>
        </div>
    <?php } else { ?>
        <center><p style="color: white;text-decoration: none;">Чтобы оставлять отзывы, <a href="/registration" style="color: gray;text-decoration: none;">Зарегистрируйтесь</a> или <a style="color: gray;text-decoration: none;" href="/login">Войдите</a>!</p></center>
        <?php } ?>
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