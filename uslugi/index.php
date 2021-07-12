<?php require('../lib/db.php'); ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../css/style20.css">
            <script src="https://vk.com/js/api/openapi.js?169" type="text/javascript"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <style>
            @media (max-width: 768px){
.uslugi__item {
    flex-flow: column;
    width: 100%;
}
}
         </style>
        </head>
            <title>SMM | Услуги</title>
        <body>
<?php require "../header/_header.html"; ?> 
<?php require "../socialmenu/socialmenu.html"; ?> 

<div class="intro1">
<div class="container">
        <div class="section">
            <div class="container">

                <div class="section__header">
                    <div class="section__title">Список услуг</div>
                    <div class="section__suptitle"></div>
                </div>

            <?php 
      foreach($config['social'] as $key => $row) { ?>
      <div class="uslugi">
         <div class="uslugi__item">
            <img src="<?php echo $row['imgone']; ?>" alt="" class="uslugi__img">
            <div class="uslugi__title"><?php echo $row['name']; ?></div>

            
            <div class="uslugi__btn">
               <?php foreach($row['aray'] as $rey => $rm) { ?>
               <a href="<?php echo '/'.$row['name']   ; ?>" class="uslugi__btn__link"><?php echo 'Купить '.$rm['name']; ?></a>
               <?php } ?>
            </div>
         
         </div>
      </div>
   <?php } ?>

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