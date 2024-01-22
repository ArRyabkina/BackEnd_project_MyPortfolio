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
			<h3 class="text-black-50 text-center">
				Регистрация
			</h3>
			<p class="text-secondary">
				Пожалуйста, введите имя в имен. падеже, в полной форме
			</p>
			<form action="reg_prov.php" method="POST">
				<input type="hidden" name="u_type" value=<?php echo '"' . $_POST['u_type'] . '"'; ?>>
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Фамилия</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_surname" required>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Имя</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_name" required>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Отчество</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_patronymic" required>
				</div>
				<?php 
				if($_POST['u_type']=='student'){
				 ?>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Класс</label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="u_class" required>
				    <option selected>Choose...</option>
				    <option value="5">5</option>
				    <option value="6">6</option>
				    <option value="7">7</option>
				    <option value="8">8</option>
				    <option value="9">9</option>
				    <option value="10-1">10-1</option>
				    <option value="10-2">10-2</option>
				    <option value="10-3">10-3</option>
				    <option value="10-4">10-4</option>
				    <option value="10-5">10-5</option>
				    <option value="10-6">10-6</option>
				    <option value="11-1">11-1</option>
				    <option value="11-2">11-2</option>
				    <option value="11-3">11-3</option>
				    <option value="11-4">11-4</option>
				    <option value="11-5">11-5</option>
				    <option value="11-6">11-6</option>
				  </select>
				</div>
				<?php 
				}else{
				?>
					<p class="input-group-text" for="inputGroupSelect01">Класс</p>
				<?php
					$query_olymp = mysqli_query($connect, 
                    	"SELECT * FROM portfolio_classes
                    ");
                    for($i=0;$i<$query_olymp->num_rows; $i++){
                        $res_cl = $query_olymp->fetch_assoc();
				 ?>
					
						<div class="input-group mb-3">
							<div class="input-group-prepend">
							    <div class="input-group-text">
							      <input type="checkbox" aria-label="Checkbox for following text input" <?php echo 'name="class_id_' . $res_cl['id_class'] . '" value="' . $res_cl['class_name'] . '"'; ?>>
							    </div>
							</div>
							<input type="text" class="form-control" aria-label="Text input with checkbox" <?php echo 'value="' . $res_cl['class_name'] . '"'; ?>>
						</div>
						

				<?php 
                    }
				}
				 ?>

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
				
				<button class="btn btn-primary form-control" type="submit">Регистрация</button>
			</form>
			<?php 
				
				if($_POST['send_succ']=='false'){
					echo '<p class="text-danger my-3">';
					echo 'Логин ЗАНЯТ';
					echo '</p>';
					echo '<span>';
					echo 'Есть аккаунт? ';
					echo '</span>';
					echo '<span><a href="index.php">';
					echo 'Войдите';
					echo '</span></a>';

				}
			 ?>
		</div>
		
	
</body>
</html>
