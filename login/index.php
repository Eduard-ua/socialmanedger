<?php 
	require '../lib/db.php';

	$data = $_POST;
	if ( isset($data['do_login']) )
	{
		$user = R::findOne('users', 'login = ?', array($data['login']));
		if ( $user )
		{
			//логин существует
			if ( password_verify($data['password'], $user->password) )
			{
				//если пароль совпадает, то нужно авторизовать пользователя
				$_SESSION['logged_user'] = $user;
				MessageSend(3, 'Вы успешно авторизованы!', '/');
			}else
			{
				MessageSend(1, 'Неверно введен пароль!', '/login');
			}

		}else
		{
			MessageSend(1, 'Пользователь с таким логином не найден!', '/login');
		}
		
		if ( ! empty($errors) )
		{
			//выводим ошибки авторизации
			MessageSend(1, array_shift($errors), '/login');
		}

	}

?>

<head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link rel="stylesheet" type="text/css" href="../css/style.css?v=3">
 	<title>SMM | Вход</title>
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
 	a {
 		color: gray;text-decoration: none;
 		transition: 2s;
 	}
 	a:hover {
 		color: #f38181;
 		transition: 2s;
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
<div class="section">
    <div class="container">
    	<?php echo MessageShow(); ?>

        <div class="section__header">
            <div class="section__iimg"><img src="../images/cabinet2.png" alt="" class="section__img"></div>
            <div class="section__suptitle">Вход</div>
        </div>

        <div class="cabinet">
            <div class="cabinet__danniy">
            	<form action="/login/index.php" method="POST">
                <input class="cabinet__input" type="text" name="login" placeholder="Имя" required>
                <input class="cabinet__input" type="password" name="password" placeholder="Пароль" required>
                <button type="submit" name="do_login">Войти</button>
                <p style="color: white;text-align: center;text-decoration: none;font-weight: 500">Нет аккаунта ?<a href="/registration"> Зарегистрироваться</a></p>
            </form>
            </div>
        </div>
        
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(function(){
    $(".alert").delay(5000).slideUp(300);
});
</script>