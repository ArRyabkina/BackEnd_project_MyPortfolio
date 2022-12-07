<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
	$res_u = $query_user->fetch_assoc();
    $query_pup = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_POST['pup_id'] . '"');
    $res_pup = $query_pup->fetch_assoc();
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

    <!--Main-->

    <div class="main">

        <!--Челки-->

        <div class="topmenu">Портфолио</div>
        <div class="topmenu_under"></div>
        <i class="fas fa-bars menu_btn fa-2x"></i>

        <!--Главная часть-->

        <div class="border p-3 col-12">
            <form <?php echo 'action="prof_e.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
                <button class="btn btn-primary w-100">Назад</button>
            </form>
        </div>

        <div class="border p-3">
            <div class="row">
                <div class="col-6">
                    <img <?php echo 'src="' . $res_pup['u_img'] . '"'; ?> class="realtive w-75 mx-auto">
                </div>
                <div class="col-6">
                    <h6>Фамилия: <?php echo $res_pup['u_surname'];?></h6>
                    <h6>Имя: <?php echo $res_pup['u_name'];?></h6>
                    <h6>Отчество: <?php echo $res_pup['u_patronymic'];?></h6>
                    <h6>Класс: <?php echo $res_pup['u_class'];?></h6>
                </div>
            </div>
        </div>
        <div class="col-10 mx-auto s mt-4 bg-white border p-3">
            <fieldset class="form-group w-100">
                <!--Название-->
                <legend class="col-form-label pt-0 text-center">Достижения</legend>
                <!--Тело-->
                <div class="form-group w-100 mx-auto over-auto">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Олимпиада</th>
                        <th scope="col">Место</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!--Отдельный столбик-->
                      <?php 
                        $query_let = mysqli_query($connect, 
                            "SELECT * FROM portfolio_letters INNER JOIN portfolio_type_winner ON portfolio_type_winner.id_type_winner = portfolio_letters.let_type_id INNER JOIN portfolio_olymps ON portfolio_letters.let_olymp_id = portfolio_olymps.id_olymp WHERE let_user_id = '" . $_POST['pup_id'] . "' ORDER BY portfolio_letters.id_letter
                          ");
                        for($i=0;$i<$query_let->num_rows; $i++){
                            $res_let = $query_let->fetch_assoc();   
                        ?>
                      <tr>
                        <div class="form-check">
                          <th>
                            <?php echo $i+1; ?>
                          </th>
                          <td>
                            <img <?php echo 'src="' . $res_let['let_img'] . '"'; ?> alt="" class="w-75 mx-auto rounded">
                          </td>
                          <td>
                            <?php echo $res_let['olymp_name']; ?>
                          </td>
                          <td>
                            <?php echo $res_let['type_winner_name']; ?>
                          </td>
                        </div>
                        
                      </tr>
                    <?php 
                    } 
                    ?>
                    </tbody>
                  </table>
                </div>
              </fieldset>
        </div>
        <div class="border p-3 col-12">
            <!--Карусель-->
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <!--Подключение к портфолио ученика-->
                    <!--Добавление тех черточек над каруселью-->
                    <?php 
			    	$query2 = mysqli_query($connect, 
					"SELECT * FROM portfolio_letters WHERE user_id = '" . $_POST['pup_id'] . "'");
					for($i=0;$i<$query->num_rows; $i++){
						$res = $query2->fetch_assoc();
						echo '<li data-target="#carouselExampleCaptions" data-slide-to="' . $res['id_user'] . '"></li>';
			     ?>
                    <?php } ?>
                </ol>
                <!--Повторное подключение к портфолио для обнуляции номера элемента-->
                <!--Уже сами картинки-->
                <div class="carousel-inner">
                    <?php 
			    	$query_let = mysqli_query($connect, 
					"SELECT * FROM portfolio_letters WHERE let_user_id = '" . $_POST['pup_id'] . "'");
                    if($query_let->num_rows<=0){
                    ?>
                        <div class="alert alert-success my-3 w-75 mx-auto" role="alert">
                          Нет достижений :(
                        </div>
                        <script>
                          $('.alert').alert()
                        </script>
                    <?php
                    }
					for($i=0;$i<$query_let->num_rows; $i++){
					$res_let = $query_let->fetch_assoc();
			     ?>
                    <div <?php if($i==0){ echo 'class="carousel-item active"' ; }else{ echo 'class="carousel-item"' ; } ?>
                        >
                        <img <?php echo 'src="' . $res_let['let_img'] . '"' ; ?> class="d-block w-100">
                    </div>
                    <?php 
			      	}
			       ?>
                </div>
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
    </div>

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
        let topmenu_div = document.querySelector('.topmenu_under');
        topmenu_div.style.height = topmenu.getBoundingClientRect().height + 'px';

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
