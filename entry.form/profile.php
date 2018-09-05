<?php 
	require "includes/db.php";
	$user_login = ($_SESSION['logged_user']->login);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Мой профиль</title>
	<link rel="stylesheet" href="mystyle.css" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
	<div class="container">
	<h2>Мой профиль</h2>
	<div class="form_box">
	<div class="form">
	<?php 
		$query = R::find('users', 'login LIKE ?', [$user_login]); 
			foreach ($query as $row){
				echo '<div class="profile_block"><div class="block">Имя: </div><strong> '.$row['login'] . '</strong></div>';
				echo '<div class="profile_block"><div class="block">Email: </div><strong> '.$row['email']. '</strong></div>';
				echo '<div class="profile_block"><div class="block">Дата рождения: </div><strong>' . $row['bday'] . '</strong></div>';
				echo '<div class="profile_block"><div class="block">Пол: </div><strong>' . $row['sex'] . '</strong></div>';
				echo '<div class="profile_block"><div class="block">Телефон: </div><strong>' . $row['tel'] . '</strong></div>';
				echo '<div class="profile_block"><div class="block">Город: </div><strong>' . $row['city'] . '</strong></div>';
				echo '<div class="profile_block"><div class="block">Страна: </div><strong>' . $row['country'] . '</strong></div>';
				}
	 ?>
	 <div class="form_button">
	 <a href="/logout.php">Выйти</a>
	 </div>
	 </div>
	 </div>
	</div>
</body>
</html>

