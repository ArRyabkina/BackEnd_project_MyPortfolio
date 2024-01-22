<?php 
    $connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
    //$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
    $query = mysqli_query($connect, 'SELECT id, img FROM portfolio_letters WHERE user_id = "' . $_GET['id'] . '"'); 
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
                    <a class="nav-link" <?php echo 'href="educator.php?id=' . $_GET['id'] . '"' ; ?>>
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
                    <a class="nav-link active" <?php echo 'href="new_university.php?id=' . $_GET['id'] . '"' ; ?>>
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

		<div class="col-10 mx-auto mt-2 bg-white p-3">
            <form <?php echo 'action="new_university1.php?id=' . $_GET['id'] . '"' ; ?> method="POST">

                <div class="input-group my-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Название</span>
                  </div>
                  <textarea name="university_name" class="form-control" aria-label="With textarea"></textarea>
                </div>

                <div class="input-group my-2">
                  <textarea plcaeholder="Некоторая инфомрация о ВУЗе" name="university_info" class="form-control" aria-label="With textarea"></textarea>
                </div>

                <div class="input-group my-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text">сылка</span>
                  </div>
                  <input class="form-control" name="university_href">
                </div>
                
                <button class="btn w-100 btn-primary" type="submit">Добавить</button>
            </form>

            <?php 
            if($_POST['insert_olymp_succ']=='true'){
            ?>
                <div class="alert alert-success mt-3" role="alert">
                  Вы успешно добавили ВУЗ!
                </div>
                <script>
                  $('.alert').alert()
                </script>
          <?php
          }
          ?>

		</div>

	</div>
	
	<div class="topmenu_under"></div>

    <script src="js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">

    </script>

</body>
</html>