<?php 
	require "includes/db.php";
	if( isset($_SESSION['logged_user']) ) : header('Location: /profile.php'); exit(); endif; 

	$data = $_POST;
	if( isset( $data['do_login']) ) {

		$errors = array();
		$user = R::findOne('users', 'login = ?', array($data['login']));

		if( $user ) {

			if( password_verify($data['password'], $user->password)) {

				$_SESSION['logged_user'] = $user;
				header('Location: /profile.php');

			} else {

				$errors[] = 'Неверно введен пароль!';

			}

		} else {

			$errors[] = 'Пользователь с таким логином не найден!';

		}

		

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
	<div class="container">
	<h2>Авторизация</h2>
	<div class="form_box">
	<form action="/index.php" method="POST" class="form">
		 <?php 
				if(!empty($errors)) {

			echo '<div class="form_button" style="color: red;">'.array_shift($errors).'</div>';

		}
		 ?> 
		<div class="block">
			<label>Ваш логин:</label>
			<input type="text" name="login" value="<?php echo @$data['login'] ?>">
		</div>

		<div class="block">
			<label>Ваш пароль:	</label>
			<input type="password" name="password" value="<?php echo @$data['password'] ?>">
		</div>
		
		<div class="form_button">
		<button name="do_login" type="submit" class="button">Войти</button>
		
		</div>
		<div class="form_button"><a href="/signup.php">Зарегистрироваться</a></div>
	</form>
	</div>
	
	</div>
</body>
</html>