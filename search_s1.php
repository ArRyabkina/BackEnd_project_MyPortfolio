<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
	$query_stud = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id = "' . $_POST['student_id'] . '"');
	$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id = "' . $_GET['user_id'] . '"');
	$res_u = $query_stud->fetch_assoc();
	$res_u1 = $query_user->fetch_assoc();

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
<body>

   <!--Меню-->
    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
          My Port4lio 
            <?php 
              $query_user = mysqli_query($connect, 
                "SELECT * FROM portfolio_users
                    WHERE id_user = '" . $_GET['id'] . "'
              ");
              $res_user = $query_user->fetch_assoc();
              echo '<span class="mx-4">' . $res_user['u_name'] . ' ' . $res_user['u_surname'] . ' ' . $res_user['u_class'] . '</span>';
            ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" <?php echo 'href="prof.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="port_s_sub">
                            Кабинет
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="olymp_cal_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="olymp_s_sub">
                            Олимпиады расписание
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="portfolio.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="port_s_sub">
                            Портфолио
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="point_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="point_s_sub">
                            Примерные баллы
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link active" <?php echo 'href="search_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="search_s_sub">
                            Посм-ть других
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="index.php">
                        <p class="send_s_sub">
                            Выйти
                        </p>
                    </a>
                </li>
            </ul>
      </div>
    </nav>

    <!--Main-->

    <div class="main">

        <!--Главная часть-->

   	<!--Имя-->

   		<div class="col-12 mt-3">
			<?php
				echo '<img src="' . $res_u['img'] . '" class="w-100">'; 
			?>
			<?php  
				echo '<p>' . $res_u['name'] . '</p>';
			?>
			<?php 
				echo '<p>' . $res_u['surname'] . '</p>';
			 ?>
			 <?php 
				echo '<p>' . $res_u['patronymic'] . '</p>';
			 ?>
			<form action="search_s.php" method="GET">
				<input type="hidden" name="id" value=<?php echo '"' . $_POST['user_id'] . '"'; ?>>
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
					"SELECT * FROM portfolio_letters WHERE user_id = '" . $_POST['student_id'] . "'");
					for($i=0;$i<$query->num_rows; $i++){
						$res = $query2->fetch_assoc();
						echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $res['id'] . '"></li>';
			     ?>
			  <?php } ?>
			    </ol>

			    <!--Повторное подключение к портфолио для обнуляции номера элемента-->
			    <!--Уже сами картинки-->

			    <div class="carousel-inner">
			    <?php 
			    	$query = mysqli_query($connect, 
					"SELECT * FROM portfolio_letters WHERE user_id = '" . $_POST['student_id'] . "'");
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
				        <img <?php echo 'src="'  . $res['img'] . '"'; ?> class="d-block w-100">
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
		

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </script>


</body>
</html>