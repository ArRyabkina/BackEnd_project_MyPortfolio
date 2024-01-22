<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
	//$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_POST['student_id'] . '"');
	$res_u = $query_user->fetch_assoc();

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

</head>
<body class="bg-light">

<!--Челки-->

	<div class="topmenu bg-info">Portfolio of student</div>
	<div class="topmenu_under"></div>
	

   <!--Главная часть-->

   	<!--Имя-->

   		<div class="col-12 mt-3">
			<?php
				echo '<img src="' . $res_u['u_img'] . '" class="w-100">'; 
			?>
			<?php  
				echo '<p>' . $res_u['u_name'] . '</p>';
			?>
			<?php 
				echo '<p>' . $res_u['u_surname'] . '</p>';
			 ?>
			 <?php 
				echo '<p>' . $res_u['u_patronymic'] . '</p>';
			 ?>
			<form action="guest.php">
				<button class="btn btn-warning w-100">
					Вернуться
				</button>
			</form>
		</div>

		<div class="col-10 mx-auto s mt-4 bg-white border p-3">

			<!--Карусель-->

			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
			    <ol class="carousel-indicators">
			    	<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			    	<!--Подключение к портфолио ученика-->
					<!--Добавление тех черточек над каруселью-->

			    <?php 
			    	$query2 = mysqli_query($connect, 
					"SELECT * FROM portfolio_letters WHERE let_user_id = '" . $_POST['student_id'] . "'");
					for($i=0;$i<$query->num_rows; $i++){
						$res = $query2->fetch_assoc();
						echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $res['id_letter'] . '"></li>';
			     ?>
			  <?php } ?>
			    </ol>

			    <!--Повторное подключение к портфолио для обнуляции номера элемента-->
			    <!--Уже сами картинки-->

			    <div class="carousel-inner">
			    <?php 
			    	$query = mysqli_query($connect, 
					"SELECT * FROM portfolio_letters WHERE let_user_id = '" . $_POST['student_id'] . "'");
					for($i=0;$i<$query->num_rows; $i++){
					$res = $query->fetch_assoc();
			     ?>
				    <div <?php 
							if($i==0){
								echo 'class="carousel-item active"';
							}else{
								echo 'class="carousel-item"';
							}
						?>
						>
				        <img <?php echo 'src="'  . $res['let_img'] . '"'; ?> class="d-block w-100">
				    </div>
			      <?php 
			      	}
			       ?>
			    </div>

			    <!-- Button trigger modal -->

			    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
				    <span class="text-secondary carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
				    <span class="text-secondary carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				</a>
			</div>

		</div>

		<div class="bottommenu_under"></div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
		let topmenu_div = document.querySelector('.topmenu_under');
		let topmenu = document.querySelector('.topmenu');
		topmenu_div.style.height = topmenu.getBoundingClientRect().height + 'px';

		let bottommenu_div = document.querySelector('.bottommenu_under');
		bottommenu_div.style.height = topmenu.getBoundingClientRect().height + 'px';
	</script>

</body>
</html>