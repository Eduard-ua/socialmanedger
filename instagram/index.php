<?php require("../lib/db.php");
if(isset($_POST['do_ok'])) {
    $a = $link->query("SELECT * FROM `users` WHERE `login` = '".$_SESSION['logged_user']->login."'");
    $b = $a->fetch();
    $c = $_POST['cost'] * $_POST['number'] / $_POST['kolvo'];
    if($b['balance'] <= 0 OR $b['balance'] < $c) {
        MessageSend(1, 'Недостаточно денег на балансе', '/INSTAGRAM');
    } else {
        $link->query("INSERT INTO `history`(`login`, `email`, `url`, `number`, `status`, `usluga`, `cost`) VALUES ('".$_SESSION['logged_user']->login."', '".$_SESSION['logged_user']->email."', '".$_POST['url']."', '".$_POST['number']."', 'В ожидании', '".$_POST['usluga']."', '".$c."')");
        $link->query("UPDATE `users` SET `balance` = `balance` - '".$c."'");
        MessageSend(3, 'Услуга успешно заказана, в ближайшее время с вами свяжутся, статус услуги можете наблюдать в личном кабинете!', '/INSTAGRAM');
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
.modal {
    position: fixed; /* фиксированное положение */
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0,0,0,0.5); /* цвет фона */
    z-index: 1050;
    opacity: 0; /* по умолчанию модальное окно прозрачно */
    -webkit-transition: opacity 200ms ease-in; 
    -moz-transition: opacity 200ms ease-in;
    transition: opacity 200ms ease-in; /* анимация перехода */
    pointer-events: none; /* элемент невидим для событий мыши */
    margin: 0;
    padding: 0;
}
/* при отображении модального окно */
.modal:target {
    opacity: 1; /* делаем окно видимым */
      pointer-events: auto; /* элемент видим для событий мыши */
    overflow-y: auto; /* добавляем прокрутку по y, когда элемент не помещается на страницу */
}
/* ширина модального окна и его отступы от экрана */
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
}
@media (min-width: 576px) {
  .modal-dialog {
      max-width: 500px;
      margin: 30px auto; /* для отображения модального окна по центру */
  }
}
/* свойства для блока, содержащего контент модального окна */ 
.modal-content {
    position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    background-color: #333;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: .3rem;
    outline: 0;
}
@media (min-width: 768px) {
  .modal-content {
      -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
      box-shadow: 0 5px 15px rgba(0,0,0,.5);
  }
}
/* свойства для заголовка модального окна */
.modal-header {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 15px;
    border-bottom: 1px solid #eceeef;
}
.modal-title {
    margin-top: 0;
    margin-bottom: 0;
    line-height: 1.5;
    font-size: 1.25rem;
    font-weight: 500;
}
/* свойства для кнопки "Закрыть" */
.close {
    float: right;
    font-family: sans-serif;
    font-size: 24px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
    text-decoration: none;
}
/* свойства для кнопки "Закрыть" при нахождении её в фокусе или наведении */
.close:focus, .close:hover {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    opacity: .75;
}
/* свойства для блока, содержащего основное содержимое окна */
.modal-body {
  position: relative;
    -webkit-box-flex: 1;
    -webkit-flex: 1 1 auto;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 15px;
    overflow: auto;
}
</style>
 </head>
    <title>SMM | INSTAGRAM</title>
 <body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 
<div class="section">
    <div class="container">
    <?php echo MessageShow(); ?>

        <div class="section__header">
            <div class="section__iimg"><img src="../images/icon1.png" alt="" class="section__img"></div>
            <div class="section__suptitle">INSTAGRAM</div>
        </div>

        <?php foreach($config['social'][1]["aray"] as $key => $row) { ?>
            <div class="uslugi__icon">
                <div class="uslugi__info">
                        <div class="uslugi__item">
                            <div class="uslugi__price"><?php echo $row["cost"]; ?>Р</div>
                        <a href="#open<?php echo $row["name"]; ?>" class="uslugi__btn__link">Купить <?php echo $row["name"]; ?></a>
                            <div class="uslugi__text">Купить <?php echo $row["name"]; ?> вы можете за <?php echo $row["cost"]; ?> рублей(<?php echo $row["costfor"]; ?> шт.). Вы получите качественные услуги по самой демократичной цене на рынке</div>
                        </div>
                    </div>
             </div> 
             <div id="open<?php echo $row["name"]; ?>" class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title"><?php echo $row["name"]; ?></h3>
                    <a href="#close" title="Закрыть" class="close">×</a>
                  </div>
                  <div class="modal-body">    
                    <div class="section">
                        <div class="container">

                            <div class="section__header">
                                <div class="section__iimg"><img src="../images/about3.png" alt="" class="section__img"></div>
                                <div class="section__suptitle">Заказать услугу</div>
                            </div>

                            <div class="cabinet">
                                <div class="cabinet__danniy">
                                <?php if(isset($_SESSION['logged_user'])) {?>
                                    <form action="/INSTAGRAM/index.php" method="POST">
                                    <center><p style="color: white;font-size:25px;font-weight:700;">Стоимость: <span id="summ">0</span> Р</p></center>
                                    <input class="cabinet__input" type="url" name="url" placeholder="Ссылка">
                                    <input class="cabinet__input" type="number" id="number" onkeyup="this.value = this.value.replace(/[^\d]/g,'');" oninput="funct();" name="number" placeholder="Количество">
                                    <input type="hidden" id="cost" name="cost" value="<?php echo $row["cost"]; ?>">
                                    <input type="hidden" id="usluga" name="usluga" value="<?php echo $row["nametwo"]; ?>">
                                    <input type="hidden" id="kolvo" name="kolvo" value="<?php echo $row["costfor"]; ?>">
                                    <button type="submit" name="do_ok">Заказать</button>
                                </form>
                                <?php } else { ?>
        <center><p style="color: white;text-decoration: none;">Чтобы заказать услугу, <a href="/registration" style="color: gray;text-decoration: none;">Зарегистрируйтесь</a> или <a style="color: gray;text-decoration: none;" href="/login">Войдите</a>!</p></center>
        <?php } ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

    </div>
</div>
<?php require "../footer/_footer.html"; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function(){
    $(".alert").delay(5000).slideUp(300);
});
</script>
<script src="../lib/script3.min.js" type="text/javascript"></script>
<script>
    function funct() {
       var a = document.getElementById("number").value;
        var b = document.getElementById("cost").value;
        var c = document.getElementById("kolvo").value;

        var c = a * b / c;
        document.getElementById("summ").textContent=c;

    }
    </script>



</body>