<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
	$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
	$res_u = $query_user->fetch_assoc();

 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyPORT4LIO</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <!--Menu-->
    <?php 
    if($res_u['u_type']=='educator'){
     ?>
    <div class="menu">
        <div class="menu1 mx-auto bg-light ">
            <div class="port_fio col-12">
                <span class="text-monospace">
                    <?php 
                echo $res_u['u_surname'] . " " . $res_u['u_name'];
               ?></span>
                <p class="text-monospace">Класс:
                    <?php echo $res_u['u_class']; ?>
                </p>
            </div>

        </div>
        <hr width="70%" size="1px" color="black" class="mt-4 mx-auto">
       <div class="bottommenu2 card mx-auto">
            <ul class="list-group list-group-flush">
                <li>
                    <a <?php echo 'href="prof_e.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="port_s_sub">
                            Личная страница
                        </p>
                    </a>
                </li>
                <li>
                    <p class="text-success">
                        Добавить..
                    </p>
                </li>
                <li>
                    <a <?php echo 'href="educator.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="olymp_s_sub">
                            Олимпиады
                        </p>
                    </a>
                </li>
                <li>
                    <a <?php echo 'href="insert_point.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="point_s_sub">
                            Баллы
                        </p>
                    </a>
                </li>
                <li>
                    <a <?php echo 'href="new_university.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="send_s_sub">
                            ВУЗы
                        </p>
                    </a>
                </li>
                
                <li>
                    <a href="index.php">
                        <p class="send_s_sub">
                            Выйти
                        </p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
    <?php 
    }else{
     ?>

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
                <li class="nav-item active">
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
                    <a class="nav-link" <?php echo 'href="search_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="search_s_sub">
                            Посм-ть других
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="send_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="send_s_sub">
                            Отправить портфолио
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

    <?php 
    }
     ?>

    <!--Main-->

    <div class="main">

        <!--Главная часть-->


        <!--Кнопка добавить портфолио-->

        <div class="col-10 mx-auto s mt-4 bg-light border p-3">
            
            <h3 class="text-black-50 text-center">
				Изменение профиля
			</h3>
			<form <?php echo 'action="prof_change_func.php?id=' . $_GET['id'] . '"'; ?> method="POST" enctype="multipart/form-data">
				<div class="input-group mb-3">
					<div class="custom-file">
						<label class="custom-file-label" for="inputGroupFile01">Фотка</label>
					    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="u_img" >
					</div>
				</div>
				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Фамилия</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_surname"  <?php echo 'value="' . $res_u['u_surname'] . '"'; ?>>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Имя</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_name"  <?php echo 'value="' . $res_u['u_name'] . '"'; ?>>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Отчество</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_patronymic" <?php echo 'value="' . $res_u['u_patronymic'] . '"'; ?>>
				</div>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <label class="input-group-text" for="inputGroupSelect01">Класс</label>
				  </div>
				  <select class="custom-select" id="inputGroupSelect01" name="u_class">
				  	<?php 
                        //Нахождение всех университетов
                        $query_olymp = mysqli_query($connect, 
                            "SELECT * FROM portfolio_classes
                        ");
                        for($i=0;$i<$query_olymp->num_rows; $i++){
                            $res_cl = $query_olymp->fetch_assoc();
                            if($res_cl['class_name']==$res_u['u_class']){
                                echo '<option selected value="' . $res_cl['class_name'] . '">' . $res_cl['class_name'] . '</option>';
                            }else {
                                echo '<option  value="' . $res_cl['class_name'] . '">' . $res_cl['class_name'] . '</option>';
                            }
                        }
                         ?>
				  </select>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Логин</span>
			  		</div>
			  		<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_login"  <?php echo 'value="' . $res_u['u_login'] . '"'; ?>>
				</div>

				<div class="input-group mb-3">
			  		<div class="input-group-prepend">
			    		<span class="input-group-text" id="inputGroup-sizing-default">Пароль</span>
			  		</div>
			  		<input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="u_password"  <?php echo 'value="' . $res_u['u_password'] . '"'; ?>>
				</div>
				<button class="btn btn-primary form-control" type="submit">Изменить</button>
			</form>

        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>

</body>

</html>
