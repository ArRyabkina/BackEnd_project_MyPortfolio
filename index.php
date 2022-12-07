<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Autorisation</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="pt-4 bg-light">
	<div class="col-10 mx-auto border bg-white mt-3 p-3">
		<form action="login_prov.php" method="POST">
			<h3 class="text-black-50 text-center">
				Вход
			</h3>

			<input type="hidden" <?php echo 'value="' . $_POST['u_type'] . '"'; ?> name="type">

			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<span class="input-group-text" id="inputGroup-sizing-default">Логин</span>
	  			</div>
	  			<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_login" required>
			</div>

			<div class="input-group mb-3">
	  			<div class="input-group-prepend">
	    			<span class="input-group-text" id="inputGroup-sizing-default">Пароль</span>
	  			</div>
	  			<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_password" required>
			</div>
			<button class="btn btn-primary" type="submit">Войти</button>
		</form>
		<?php 
			
			if($_POST['send_succ']=='false'){
				echo '<p class="text-danger my-4">';
				echo 'НЕ СУЩЕСТВУЕТ ТАКОГО ПОЛЬЗОВАТЕЛЯ ИЛИ ПАРОЛЯ';
				echo "</p>";
				echo '<span>';
				echo 'Нет аккаунта? ';
				echo '</span>';
				echo '<span><a href="reg.php">';
				echo 'Зарегистрироваться';
				echo '</span></a>';
			}
		
		 ?>
	</div>
</body>
</html>