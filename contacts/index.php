<?php require('../lib/db.php'); ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style20.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    @media(max-width: 768px) {
        .contacts {
            display: inline;
        }
        .contacts__inner {
                margin: 0 auto;
    padding: 30px 20px;
    width: 300px;
    background-color: none;
    border: none;
    border-radius: 50px;
    text-decoration: none;
    transition: all .2s linear;
        }
        img {
            margin-bottom: 50px;
        }
    }
</style>
 </head>
    <title>SMM | Контакты</title>
<body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 
<div class="section">
    <div class="container" style="margin-top: 150px;">

        <div class="section__header">
            <div class="section__iimg"><img src="../images/contacts.png" alt="" class="section__img"></div>
            <div class="section__suptitle">Контакты</div>
        </div>

        <div class="contacts">
            <a href="tel:<?php echo $config['main']['telephone']; ?>" class="contacts__inner">
                <div class="contacts__title">Номер</div>
                <img src="../images/contacts1.png" alt="" class="contacts__img">
            </a>

             <a href="mailto:support@socialmanedger.ru" class="contacts__inner">
                <div class="contacts__title">Gmail</div>
                <img src="../images/contacts2.png" alt="" class="contacts__img">
            </a>

             <a href=" https://t.me/SociallSUPPORT" class="contacts__inner">
                <div class="contacts__title">Телеграм</div>
                <img src="../images/contacts3.png" alt="" class="contacts__img">
            </a>

            <a href="<?php echo $config['main']['vk']; ?>" class="contacts__inner">
                <div class="contacts__title">Вк</div>
                <img src="../images/contacts4.png" alt="" class="contacts__img">
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