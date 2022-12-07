<?php 
  $connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
  //$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
  $query = mysqli_query($connect, 
    "SELECT * FROM portfolio_letters INNER JOIN portfolio_type_winner ON portfolio_type_winner.id_type_winner = portfolio_letters.let_type_id INNER JOIN portfolio_olymps ON portfolio_letters.let_olymp_id = portfolio_olymps.id_olymp WHERE let_user_id = '" . $_GET['id'] . "'
  ");
  $res = $query->fetch_assoc();
  $query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
  $res_u = $query_user->fetch_assoc();

 ?>
<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
                    <a class="nav-link" <?php echo 'href="search_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="search_s_sub">
                            Посм-ть других
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link active" <?php echo 'href="send_s.php?id=' . $_GET['id'] . '"' ; ?>>
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
    <!--Main-->

    <div class="main">

        <!--Форма отправки-->

        <div class="col-8 mx-auto bg-white mt-3 p-3">

          <form <?php echo 'action="send_s1.php?id=' . $_GET['id'] . '"' ; ?> method="POST">

            <!--Имейл-->

            <div class="form-group row mt-2">
              <div class="col-sm-12">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Имейл получателя" name="email" required="">
              </div>
            </div>
    
            <!--Кнопка и айди пользователя-->

            <button type="submit" class="btn btn-primary mx-auto">Отправить</button>
            
            <!--Выбор портфолио-->
            
            <fieldset class="form-group w-100 mx-auto">
                
                <!--Название-->

                <legend class="col-form-label pt-0 text-center">Выберите достижения</legend>
              
                <!--Тело-->
                <div class="form-group w-100 mx-auto over-auto">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">*</th>
                        <th scope="col">#</th>
                        <th scope="col">Фото</th>
                        <th scope="col">Олимпиада</th>
                        <th scope="col">Место</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!--Отдельный столбик-->
                      <?php 
                        for($i=0;$i<$query->num_rows; $i++){?>
                      <tr>
                        <div class="form-check">
                          <th scope="row"><?php echo '<input class="form-check-input mx-auto" type="checkbox" name="letter_id" id="defaultCheck1" value="' . $res['id'] . '">'; ?></th>
                          <th>
                            <?php echo $i+1; ?>
                          </th>
                          <td>
                            <img <?php echo 'src="' . $res['let_img'] . '"'; ?> alt="" class="w-75 mx-auto rounded">
                          </td>
                          <td>
                            <?php echo $res['olymp_name']; ?>
                          </td>
                          
                          <td>
                            <?php echo $res['type_winner_name']; ?>
                          </td>
                        </div>
                        
                      </tr>
                    <?php 
                      $res = $query->fetch_assoc();
                    } 
                    ?>
                    </tbody>
                  </table>
                </div>

              </fieldset>
            
          </form>
          <?php 
          if($_POST['send_succ']=='true'){
           ?>
            <div class="alert alert-success mt-3" role="alert">
              Вы успешно отправили письмо!
            </div>
            <script>
              $('.alert').alert()
            </script>
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