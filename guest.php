<?php
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
    //$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body class="pt-4 bg-light">
	<div class="col-10 mx-auto s mt-4 bg-white border p-3">
		<form action="guest.php" method="POST">
		  <div class="form-group">
		    <label for="exampleInputEmail1" class="mx-auto">Поиск ученика</label>
		    <input type="text" class="form-control mb-2" placeholder="Иванов" name="surname">
		    <input type="text" class="form-control mb-2" placeholder="Иван" name="name">
		    <input type="text" class="form-control mb-2" placeholder="Иванович" name="patronymic">
		    <input type="hidden" class="form-control" value="1" name="search">
		    <small id="emailHelp" class="form-text text-muted">Введите фио любого пользователя</small>
		  </div>
		  <button type="submit" class="btn btn-primary">Поиск</button>
		</form>
	</div>
	<div class="col-10 mx-auto s mt-4 bg-white border p-3">
		<div class="row">

			<?php
				if($_POST['search']==1){
					$query = mysqli_query($connect, "SELECT * FROM portfolio_users WHERE (u_name LIKE '%" . $_POST['u_name'] . "%' OR u_surname LIKE '%" . $_POST['u_surname'] . "%' OR u_patronymic LIKE '%" . $_POST['u_patronymic'] . "%') AND u_type = 'student'");
					echo '<p class="mx-auto">Результаты поиска</p>';
				} else {
					$query = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE u_type = "student" ORDER BY u_surname');
					echo '<p class="mx-auto">Все пользователи</p>';
				}

				for($i = 0; $i < $query->num_rows; $i++){
					$res = $query->fetch_assoc();
					?>
					<div class="col-12 mt-3">
						<?php
						echo '<img src="' . $res['u_img'] . '" class="w-100">'; ?>
						<?php  
							echo '<p>' . $res['u_surname'] . '</p>';
						?>
						<?php 
							echo '<p>' . $res['u_name'] . '</p>';
						 ?>
						 <?php 
							echo '<p>' . $res['u_patronymic'] . '</p>';
						 ?>
						<form action="portfolio_g.php" method="POST">
							<input type="hidden" name="student_id" <?php echo "value='" . $res['id_user'] . "'" ?>>
							<button class="btn btn-warning w-100">
								Выбрать
							</button>
						</form>
						<hr width="80%" class="mx-auto" size="0.25" color="grey">
					</div>
			<?php 
				}
			 ?>
		</div>
	</div>
	
</body>
</html>