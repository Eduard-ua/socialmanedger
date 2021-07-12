<?php require('../../../lib/db.php');?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://socialmanedger.ru/css/style20.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      p {
    		margin: 10px 0px;
    		line-height: 20px;
    	}
        .products, .info {
            color: #fff;
        }
        .card-products__text a {
            color: #fff;
        }
        .card-products__top {
            display: inline-block;
            padding: 0 15px;
        }
        .order__title {
             margin: 30px 15px 15px;
             line-height: 24px;
        }
        .order-products-label {
            min-width: 185px;
        }
    </style>
 </head>
    <title>SMM | Накрутка лайков</title>
<body>
<?php require "../../../header/_header.html"; ?> 
<?php require "../../../socialmenu/socialmenu.html"; ?> 
<div class="order _container">
		<div class="order__title">Instagram - Лайки (гарантия)</div>
		<div class="order__content content-order">
			<div class="content-order__left">
				<div class="products-content__card card-products order-products">
					<div class="card-products__top">
						<div class="card-products__bg">
							<div class="card-products__title">Подписчики</div>
							<div class="card-products__img"><picture><source srcset="https://socialmanedger.ru/images/pageMenu/uslugi1.webp" type="image/webp"><img src="https://socialmanedger.ru/images/pageMenu/uslugi1.png" alt=""></picture></div>
							<div class="card-products__label order-products-label"><strong></strong></div>
						</div>
					</div>
					<div class="card-products__down">
						<div class="card-products__price">Цена за 100 штук - 14 ₽</div>
					</div>
				</div>
			</div>
			<form action="#">
				<div class="content-order__right">
					<div class="content-order__label"><h2>Заказ:</h2></div>
					<div class="content-order__inputs inputs-content">
						<div class="inputs-content__block tochka">
							<input placeholder="Ссылка на фото" autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="" class="input ">
						</div>
						<div class="inputs-content__block tochka">
							<input placeholder="Количество" autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="" class="input">
						</div>
					</div>
					<div class="content-order__cost"><span>Стоимость:</span> 0 ₽</div>
					<div class="content-order__button" style="max-width:250px"><button type="submit" class="card-products__button" onclick="addToCart('782')";>Заказать</button></div>
					<div class="content-order__text">Поля обязательные для заполнения</div>
				</div>
			</form>
		</div>
		<div class="order__info info-order">
			<div class="info-order__block">
				<div class="info-order__img"><picture><source srcset="https://socialmanedger.ru/images/order/globe.webp" type="image/webp"><img src="https://socialmanedger.ru/images/order/globe.png" alt=""></picture></div>
				<div class="info-order__info">
					<div class="info-order__label">ГЕО</div>
					<div class="info-order__text">Россия и весь мир</div>
				</div>
			</div>
			<div class="info-order__block">
				<div class="info-order__img"><picture><source srcset="https://socialmanedger.ru/images/order/speed.webp" type="image/webp"><img src="https://socialmanedger.ru/images/order/speed.png" alt=""></picture></div>
				<div class="info-order__info">
					<div class="info-order__label">Скорость выполнения</div>
					<div class="info-order__text">2-10 тыс. в сутки</div>
				</div>
			</div>
			<div class="info-order__block">
				<div class="info-order__img"><picture><source srcset="https://socialmanedger.ru/images/order/start.webp" type="image/webp"><img src="https://socialmanedger.ru/images/order/start.png" alt=""></picture></div>
				<div class="info-order__info">
					<div class="info-order__label">Скорость старта</div>
					<div class="info-order__text">5-10 мин.</div>
				</div>
			</div>
			<div class="info-order__block">
				<div class="info-order__img"><picture><source srcset="https://socialmanedger.ru/images/order/garant.webp" type="image/webp"><img src="https://socialmanedger.ru/images/order/garant.png" alt=""></picture></div>
				<div class="info-order__info">
					<div class="info-order__label">Гарантия</div>
					<div class="info-order__text">30 дней</div>
				</div>
			</div>
		</div>
	</div>	
<?php require "../../../footer/_footer.html"; ?>
<script src="../../../lib/script3.min.js" type="text/javascript"></script>
<script>
$(function(){
    $(".alert").delay(5000).slideUp(300);
});
</script>


</body>
