<?php 
    $connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
    $query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
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

        <div class="col-10 mx-auto s mt-4 bg-white border p-3">
            <form action="search_s.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="mx-auto">Поиск ученика</label>
                    <input type="text" class="form-control mb-2" placeholder="Иванов" name="u_surname">
                    <input type="text" class="form-control mb-2" placeholder="Иван" name="u_name">
                    <input type="text" class="form-control mb-2" placeholder="Иванович" name="u_patronymic">

                    <input type="hidden" class="form-control" value="1" name="search">
                    <input type="hidden" <?php echo 'value="' . $_GET['id'] . '"'; ?> name="id">
                    <small id="emailHelp" class="form-text text-muted">Введите фио любого пользователя</small>
                </div>
                <button type="submit" class="btn btn-primary btn-search">Поиск</button>
            </form>
        </div>
        <div class="col-12 mt-4 bg-white p-3">
            <h5 style="text-align: center;">
                Пользователи
            </h5>
            <div class="row">
                <?php
				if($_POST['search']==1){
					$query = mysqli_query($connect, "SELECT * FROM portfolio_users WHERE (u_name LIKE '%" . $_POST['u_name'] . "%' OR u_surname LIKE '%" . $_POST['u_surname'] . "%' OR u_patronymic LIKE '%" . $_POST['u_patronymic'] . "%') AND u_type = 'student'");
				} else {
					$query = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE u_type = "student" ORDER BY u_surname');
				}
				for($i = 0; $i < $query->num_rows-1; $i++){
					$res = $query->fetch_assoc();
					if($res['id_user']==$_GET['id']){
						$res = $query->fetch_assoc();
					}
					?>
                <div class="col-4 mt-3">
                    <?php
						echo '<img src="' . $res['u_img'] . '" class="w-75 mx-auto">'; ?>
                    <?php  
							echo '<p>' . $res['u_surname'] . '</p>';
						?>
                    <?php 
							echo '<p>' . $res['u_name'] . '</p>';
						 ?>
                    <?php 
							echo '<p>' . $res['u_patronymic'] . '</p>';
						 ?>
                    <form <?php echo 'action="search_s1.php?id=' . $_GET['id'] . '"' ; ?> method="GET">
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

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
        let form = document.querySelector('.user_id_form');
        let btnS = document.querySelector('.btn-search');
        btnS.onclick=function(){
            form.submit()
        }
    </script>

</body>

</html>
