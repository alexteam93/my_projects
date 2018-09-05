<?php 
	require "includes/db.php";
	$data = $_POST;
	if( isset($data['do_signup']) ) {

		if( trim($data['login']) == '') {

			$errors[] = 'Введите логин!';
		}

		if( trim($data['email']) == '') {

			$errors[] = 'Введите Email!';
		}

		if( $data['login'] == '') {

			$errors[] = 'Введите пароль!';
		}


		if( $data['password_2'] != $data['password']) {

			$errors[] = 'Повторный пароль введен неверно!';
		}

		if( R::count('users', "login = ?", array($data['login'])) > 0 ) {

			$errors[] = 'Пользователь с таким логином уже зарегестрирован!';
		}

		if( R::count('users', "email = ?", array($data['email'])) > 0 ) {

			$errors[] = 'Пользователь с таким Email уже зарегестрирован!';
		}


		if ( empty($errors) ) {
			
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->bday = $data['bday'];
			$user->sex = $data['sex'];
			$user->tel = $data['tel'];
			$user->city = $data['s_city'];
			$user->country = $data['s_country'];
			R::store($user);
			$_SESSION['logged_user'] = $user;
			header('Location: /profile.php');

		 } 
		 // else {
			// echo '<div class="form_button" style="color: red; ">'.array_shift($errors).'</div>';
			// 	}
		}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
	<script src="/select_city.js" type="text/javascript"></script>
	<link rel="stylesheet" href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.3/themes/flick/jquery-ui.css" />
	<link rel="stylesheet" href="mystyle.css" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	
</head>
<body>
	<div class="container">
	<h2>Регистрация</h2>
	<div class="form_box">
	<form action="/signup.php" method="POST" class="form">
				<?php 

				if(!empty($errors)) {

			echo '<div class="form_button" style="color: red;">'.array_shift($errors).'</div>';

		}
				 ?>
			<div class="block">
				<!-- вводим логин -->
				<label for="login">
				Логин:
				</label>
				<input type="text" name="login" required autocomplete="name" placeholder = "Login" value="<?php echo @$data['login'] ?>" id = "login">
			</div>

			<div class="block">
				<!-- вводим почту -->
				<label for="email">
				Email:
				</label>
				<input type="email" name="email" autocomplete="email" required placeholder = "example@gmail.com" value="<?php echo @$data['email'] ?>" id = "email" class="input">
			</div>

			<div class="block">
				<!-- вводим пароль -->
				<label for="password">
				Пароль:
				</label>
				<input type="password" name="password" required placeholder = "password" value="<?php echo @$data['password'] ?>" id = "password">
			</div>

			<div class="block">
				<!-- повторно вводим пароль -->
				<label for="password_2">
				Пароль еще раз:
				</label>
				<input type="password" name="password_2" required placeholder = "password" value="<?php echo @$data['password_2'] ?>" id="password_2">
			</div>

			<div class="block">
				<!-- Вводим дату рождения -->
				<label for="bday" >
				Дата рождения:
				</label>
				<input type="date" name="bday" id = "bday" required value="<?php echo @$data['bday']?>" 
				max="<?php echo $date = date('Y-m-d') ?>" min="1900-01-01"> 
			</div>

			<div class="block">
				<!-- Выбераем пол -->
				<label for="sex" >Пол:</label>
				<select name="sex" id="sex" value="<?php echo @$data['sex'] ?>">
				  <option>Мужской</option>
				  <option>Женский</option>
				</select>
			</div>


			<div class="block">
				<!-- Номер телефона -->
				 <label for="tel">Номер телефона:</label> 
				  <input type="tel" name="tel" autocomplete="tel" placeholder="+380123456789" required maxlength="13" id="tel" value="<?php echo @$data['tel'] ?>">
			</div>
			<div class="block">
				<!-- Город -->
				<label for="s_city">Город (например: Kiev):</label> 
				<input  placeholder = "Начните вводить название" type="text" required name="s_city" id="s_city" value="<?php echo @$data['s_city'] ?>">

			</div>

				<!-- Страна выбирается автоматически -->
			<div class="block">
				<label for="s_country">Страна:</label>
				<input placeholder = "Автоматически" name="s_country" id="s_country" readonly="readonly" value="<?php echo @$data['s_country'] ?>">
			</div>
			<div class="form_button">
			<button name="do_signup" type="submit" class="button">Зарегистрироваться</button>
			
			</div>
			<div class="form_button"><a href="/index.php">Войти</a></div>
		</form>	
	</div>

	</div>
</body>
</html>