<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	//$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
    $query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
    $res_u = $query_user->fetch_assoc();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="bg-light">
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
                <li>
                    <a class="nav-link"<?php echo 'href="prof_e.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="port_s_sub">
                            Кабинет
                        </p>
                    </a>
                </li>
                <li>
                    <p class="text-secondary">
                        Добавить..
                    </p>
                </li>
                <li>
                    <a class="nav-link active" <?php echo 'href="educator.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="olymp_s_sub">
                            Олимпиады
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="insert_point.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="point_s_sub">
                            Баллы
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="new_university.php?id=' . $_GET['id'] . '"' ; ?>>
                        <p class="send_s_sub">
                            ВУЗы
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
		<form action="insert_e1.php" method="POST" enctype="multipart/form-data">
			
			<div class="col-10 mx-auto s mt-4 bg-white border p-3">
				<?php
					echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
				 ?>

				<div class="input-group mb-3">
				    <div class="input-group-prepend">
				    	<span class="input-group-text" id="basic-addon1">Дата</span>
				    </div>
				    <input type="date" class="form-control" aria-describedby="basic-addon1" name="date" required>
				</div>


				<div class="input-group mb-3">
					<select class="custom-select" id="inputGroupSelect02" name="subject" required>
						<?php 
							
							$query2 = mysqli_query($connect, 
								"SELECT * FROM portfolio_subjects
							");
						 ?>
					    <option selected>Выберите...</option>
					    <?php 
							for($j=0;$j<$query2->num_rows; $j++){
								$res2 = $query2->fetch_assoc();
								echo '<option value="' . $res2['id_subject'] . '">' . $res2['subject_name'] . '</option>';
							}
						 ?>
					</select>
					<div class="input-group-append h-50">
					    <label class="input-group-text" for="inputGroupSelect02">Предмет</label>
					</div>
				</div>	


				<div class="input-group mb-3">
				    <div class="input-group-prepend">
				    	<span class="input-group-text" id="basic-addon1">Название</span>
				    </div>
				    <textarea class="form-control" aria-label="Краткая информация" name="name" required=""></textarea>
				</div>


				<div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Уровень</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="level" required>
                        <?php 
                        for($i=1;$i<4;$i++){
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                         ?>
                    </select>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Этап</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="stages" required>
                        <?php 
                        $query_stagesName = mysqli_query($connect, 
                            "SELECT * FROM portfolio_stages_name
                        "); 
                        for($i=1;$i<$query_stagesName->num_rows;$i++){
                            $res_stagesName = $query_stagesName->fetch_assoc();
                            echo '<option value="' . $res_stagesName['id_stages_name'] . '">' . $res_stagesName['stages_name_name'] . '</option>';
                        }
                         ?>
                    </select>
                </div>

				<div class="input-group mb-3">
				    <div class="input-group-prepend">
				    	<span class="input-group-text" id="basic-addon1">#</span>
				    </div>
				    <input type="text" class="form-control" placeholder="Сылка" aria-label="Сылка" aria-describedby="basic-addon1" name="href" required>
				</div>


				<div class="input-group">
				    <div class="input-group-prepend">
				    	<span class="input-group-text">Инфа</span>
				    </div>
				    <textarea class="form-control" aria-label="Краткая информация" name="introduction" required></textarea>
				</div>



			</div>


			<div class="col-10 mx-auto s mt-4 bg-white border p-3">
				<button class="btn btn-success  form-control">
					Добавить
				</button>
			</div>
		</form>	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
        let menu = document.querySelector('.menu');
        let topmenu = document.querySelector('.topmenu');
        let menuBtn = document.querySelector('.menu_btn');
        let main = document.querySelector('.main');

        //движение меню
        menu.onclick = function() {
            menu.style.left = '-70%';
        }
        menuBtn.onclick = function() {
            menu.style.left = 0;
        }

        //челка
        let topmenu_div = document.querySelectorAll('.topmenu_under');
        for(let index of topmenu_div){
            index.style.height = topmenu.getBoundingClientRect().height + 'px';
        }

        //высота main
        if (main.getBoundingClientRect().height < window.innerHeight) {
            main.style.height = window.innerHeight + 'px';
        }

        //высота menu
        if (menu.getBoundingClientRect().height < window.innerHeight) {
            menu.style.height = window.innerHeight + 'px';
        } else {
            menu.style.overflow = 'auto';
        }

    </script>
</body>
</html>