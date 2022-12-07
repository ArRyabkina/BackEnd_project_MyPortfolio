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
                    <a class="nav-link active" <?php echo 'href="point_s.php?id=' . $_GET['id'] . '"' ; ?>>
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
        <div class="text-center p-3">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">ВУЗ</th>
                      <th scope="col">Баллы</th>
                    </tr>
                </thead>
                <tbody>
                    
                
            <?php 
            $query_univ = mysqli_query($connect, 
                "SELECT * FROM portfolio_university
            ");
            ?>
            <?php
            for($j=0;$j<$query_univ->num_rows; $j++){
                $res_univ = $query_univ->fetch_assoc();
            ?>
                <?php
                $point = 0;
                $query_let = mysqli_query($connect, 'SELECT * FROM portfolio_letters WHERE let_user_id = "' . $_GET['id'] . '"');
                for($i=0; $i<$query_let->num_rows; $i++){
                    $res_let = $query_let->fetch_assoc();
                    $query_point = mysqli_query($connect, 'SELECT * FROM portfolio_points WHERE point_university_id = "' . $res_univ['id_university'] . '" AND point_olymp_id = "' . $res_let['let_olymp_id'] . '" AND point_type_winner_id = "' . $res_let['let_type_id'] . '"');
                    $res_point = $query_point->fetch_assoc();
                    if($res_point['id_point']!=NULL){
                        $point = $point + $res_point['point_points'];
                    }
                }
                 ?>
                <tr>
                  <th scope="row"><?php echo $j; ?></th>
                  <td><?php echo $res_univ['university_name']; ?></td>
                  <td><?php echo $point; ?></td>
                </tr>
                <?php   
                }
                 ?>
              </tbody>
            </table>
            <?php 
            if($query_univ->num_rows == 0){
            ?>
                <div class="alert alert-success mt-3 w-75 mx-auto" role="alert">
                    Вы пока не можете получить баллы за достижения
                </div>
                <script>
                    $('.alert').alert()
                </script>
            <?php
            }
             ?>
        </div>

	 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>


</body>
</html>