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
    <title>MyPort4lio</title>
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
                    <a class="nav-link active" <?php echo 'href="portfolio.php?id=' . $_GET['id'] . '"' ; ?>>
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
        <div class="col-10 mx-auto s mt-4 p-3">
            <form action="p_insert.php" method="GET">
                <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                <button class="btn btn-color text-light form-control" type="submit">Добавить</button>
            </form>
        </div>
        <!--Карусель-->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="..." alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="..." alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!--Таблица с портфолио-->
        <div class="col-10 mx-auto mt-4 p-3">
            <?php 
                $query_let = mysqli_query($connect, 
                "SELECT * FROM portfolio_letters WHERE let_user_id = '" . $_GET['id'] . "'");
                if($query_let->num_rows<=0){
                ?>
                    <div class="alert alert-success mt-3 w-75 mx-auto" role="alert">
                      У вас нет достижений :(
                    </div>
                    <script>
                      $('.alert').alert()
                    </script>
            <?php
            }else{
            ?>
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
                            <th scope="col">Этап</th>
                            <th scope="col">Место</th>
                            <th scope="col">Изменить</th>
                            <th scope="col">Удалить</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!--Отдельный столбик-->
                          <?php 
                            $query_let = mysqli_query($connect, 
                                "SELECT * FROM portfolio_letters 
                                INNER JOIN portfolio_type_winner ON portfolio_type_winner.id_type_winner = portfolio_letters.let_type_id 
                                INNER JOIN portfolio_olymps ON portfolio_letters.let_olymp_id = portfolio_olymps.id_olymp 
                                INNER JOIN portfolio_stages_olymps ON portfolio_stages_olymps.stagesOlym_olymp_id = id_olymp
                                INNER JOIN portfolio_stages_name ON portfolio_stages_name.id_stages_name = portfolio_stages_olymps.stagesOlym_stage_name_id
                                WHERE let_user_id = '" . $_GET['id'] . "' ORDER BY portfolio_letters.id_letter
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
                                <?php echo $res_let['stages_name_name']; ?>
                              </td>
                              <td>
                                <?php echo $res_let['type_winner_name']; ?>
                              </td>
                              <td>
                                <form method="POST" <?php echo 'action="p_update.php?id=' . $_GET['id'] . '"' ; ?>>
                                    <button type="submit" class="btn btn-primary w-100">Изменить</button>
                                    <input type="hidden" name="id_letter" <?php echo 'value="' . $res_let['id_letter']  . '"'; ?>>
                                </form>
                              </td>
                              <td>
                                <form method="POST" <?php echo 'action="p_delete.php?id=' . $_GET['id'] . '"' ; ?>>
                                    <button type="submit" class="btn btn-primary w-100">Удалить</button>
                                    <input type="hidden" name="id_letter" <?php echo 'value="' . $res_let['id_letter']  . '"'; ?>>
                                </form>
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
                <?php 
                }
                 ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        
    </script>
</body>
</html>
