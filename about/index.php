<?php require('../lib/db.php'); ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../css/style20.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .section__text {
        width: 80%;
    }
</style>
 </head>
  	<title>SMM | О нас</title>
<body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 
<div class="section">
    <div class="container" >

        <div class="section__header">
            <div class="section__iimg"><img src="../images/about7.png" alt="" class="section__img"></div>
            <div class="section__suptitle">О нас</div>
        </div>

        <div class="section__header">
            <div class="section__text">
                <?php echo $config['main']['text']; ?>
            </div>
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