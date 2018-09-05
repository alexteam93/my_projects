
<?php 
	require "includes/db.php";
	if( isset($_SESSION['logged_user']) ) : header('Location: /profile.php'); exit(); endif; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>главная</title>
	<link rel="stylesheet" href="mystyle.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
	<div class="container">

	<a href="/login.php">Авторизоваться</a><br>
	<a href="/signup.php">Регистрация</a>

</div>
</body>
</html>