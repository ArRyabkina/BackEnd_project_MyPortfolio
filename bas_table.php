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
                    <a class="nav-link active"<?php echo 'href="prof_e.php?id=' . $_GET['id'] . '"' ; ?>>
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

        <!--Главная часть-->
        <!--Кнопка добавить портфолио-->
        <div class="mt-4 p-3 col-12">
            <form <?php 'action="bas_table?id=' . $_GET['id'] . '.php"'; ?> method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="mx-auto">Поиск ученика</label>
                    <input type="text" class="form-control mb-2" placeholder="Иванов" name="u_surname">
                    <input type="text" class="form-control mb-2" placeholder="Иван" name="u_name">
                    <input type="text" class="form-control mb-2" placeholder="Иванович" name="u_patronymic">
                    <small id="emailHelp" class="form-text text-muted">Введите фио любого пользователя</small>
                </div>
                <button type="submit" class="btn btn-primary btn-search">Поиск</button>
            </form>
            <hr>
            <?php 
            $query = mysqli_query($connect, "SELECT * FROM portfolio_users WHERE (u_name LIKE '%" . $_POST['u_name'] . "%' OR u_surname LIKE '%" . $_POST['u_surname'] . "%' OR u_patronymic LIKE '%" . $_POST['u_patronymic'] . "%') AND u_type = 'student' ORDER BY u_class");
             ?>
            <div class="w-100 over-auto">
                <table class="table overA w-100">
                    <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Класс</th>
                          <th scope="col">Фамилия</th>
                          <th scope="col">Имя</th>
                          <th scope="col">Отчество</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        for($i = 0; $i < $query->num_rows; $i++){
                            $res = $query->fetch_assoc();
                         ?>
                            <tr>
                              <th scope="row"><?php echo $i+1; ?></th>
                              <td><?php echo $res['u_class']; ?></td>
                              <td><?php echo $res['u_surname']; ?></td>
                              <td><?php echo $res['u_name']; ?></td>
                              <td><?php echo $res['u_patronymic']; ?></td>
                            </tr>
                        <?php 
                        }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">

    </script>

</body>

</html>
