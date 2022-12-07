<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="pt-4 bg-light text-center">
	<h3 class="text-black-50 mb-5 mt-5">
		Регистрация
	</h3>
	<form action="reg.php" method="POST">
		<input type="hidden" name="u_type" value="student">
		<button class="btn btn-secondary form-control col-8 mb-4">
			Ученик
		</button>
	</form>
	<form action="reg.php" method="POST">
		<input type="hidden" name="u_type" value="educator">
		<button class="btn btn-secondary form-control col-8 mb-4">
			Воспитатель
		</button>
	</form>
	<a href="guest.php">
		<button class="btn btn-secondary form-control col-8 mb-4">
			Гость
		</button>
	</a>
	<div class="col-8 mx-auto text-center s mt-2 bg-white border">
		<p class="mt-4">
			Есть аккаунт? <a href="login.php">Вход</a>
		</p>
	</div>
</body>
</html>