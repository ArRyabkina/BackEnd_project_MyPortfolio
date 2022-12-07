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
    <title>MyPORT4LIO</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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


        <!--Кнопка добавить портфолио-->

        <div class="mt-4 p-3">
            
            <div class="p-3">
                <div class="row">
                    <div class="col-6 ml-auto">
                        <h5>Логин: <?php echo $res_u['u_login'];?></h5>
                        <h5>Пароль: <?php echo $res_u['u_password'];?></h5>
                        <h6>Фамилия: <?php echo $res_u['u_surname'];?></h6>
                        <h6>Имя: <?php echo $res_u['u_name'];?></h6>
                        <h6>Отчество: <?php echo $res_u['u_patronymic'];?></h6>
                        <h6>Класс: <?php echo $res_u['u_class'];?></h6>
                        <form <?php echo 'action="prof_change.php?id=' . $_GET['id'] . '"'; ?> method="GET">
                            <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"'; ?>>
                            <button class="btn btn-primary text-light mx-auto shadow-sm mt-3">Изменить</button>
                        </form> 
                    </div>
                    <div class="col-6 mr-auto">
                        <img <?php echo 'src="' . $res_u['u_img'] . '"'; ?> class="realtive w-75 ml-auto rounded-pill">
                    </div>
                    
                </div>
                
                
            </div>
            <div class=" mt-2"> 
                <h5 class="text-center mt-3">Мои олмимпиады:</h5>
                <form class="form-inline my-2 my-lg-0" <?php echo 'action="prof.php?id=' . $_GET['id'] . '"';?> method="POST">
                    <div class="input-group mb-3 mx-auto">
                      <input type="search" class="form-control" placeholder="Введите" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Найти</button>
                      </div>
                    </div>
                </form> 
            </div>
            <div style="display: flex; flex-wrap: wrap;">
            <?php 
            $query_olymp = mysqli_query($connect, 
                "SELECT * FROM portfolio_olymps 
                INNER JOIN portfolio_olymp_note ON portfolio_olymps.id_olymp = portfolio_olymp_note.olnote_olymp_id 
                WHERE olnote_user_id = '" . $_GET['id'] . "' AND 
                    (olymp_name LIKE '%" . $_POST['search'] . "%' 
                    OR olymp_date LIKE '%" . $_POST['search'] . "%' 
                    OR olymp_level LIKE '%" . $_POST['search'] . "%' 
                    OR olymp_href LIKE '%" . $_POST['search'] . "%')
                ORDER BY olymp_date"); 
            for($j=0;$j<$query_olymp->num_rows; $j++){
                $res_olymp = $query_olymp->fetch_assoc();
             ?>
                <div class="card my-3" style="width: 250px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $res_olymp['olymp_name']; ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php echo $res_olymp['olymp_date']; ?>
                        </h6>
                        <h6 class="card-subtitle mb-2 text-muted">Уровень:
                            <?php echo $res_olymp['olymp_level']; ?>
                        </h6>
                        <p class="card-text introduction">
                            <?php echo $res_olymp['olymp_introduction']; ?>
                        </p>
                        <a class="card-link btn btn-primary w-100" <?php echo 'href="' . $res_olymp['olymp_href'] . '"' ; ?>>Участвовать</a>
                    </div>
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
        let introd = document.querySelectorAll('.introduction');
        for(let index of introd){
            if (index.getBoundingClientRect().height > window.innerHeight*0.4) {
                index.style.height = window.innerHeight*0.4 + 'px';
                index.style.overflow = 'auto';
            }

        }
    </script>

</body>

</html>
