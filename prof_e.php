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
        <div class="my-2 p-3">
            <form <?php echo 'action="bas_table.php?id=' . $_GET['id'] . '"'; ?> method="POST">
                <button class="btn btn-primary form-control" type="submit">Перейти на базу данных</button>
            </form>
        </div> 
        <div class="p-3">
            <div class="border p-3">
                <div class="row">
                    <div class="col-6">
                        <h5>Логин: <?php echo $res_u['u_login'];?></h5>
                        <h5>Пароль: <?php echo $res_u['u_password'];?></h5>
                    </div>
                    <div class="col-6">
                        <img <?php echo 'src="' . $res_u['u_img'] . '"'; ?> class="realtive w-75 mx-auto img_ava">
                    </div>
                    <div class="col-12">
                        <h6>Фамилия: <?php echo $res_u['u_surname'];?></h6>
                        <h6>Имя: <?php echo $res_u['u_name'];?></h6>
                        <h6>Отчество: <?php echo $res_u['u_patronymic'];?></h6>
                        <h6>Класс: <?php
                            $query_ucl = mysqli_query($connect, 'SELECT * FROM portfolio_educatorclasses INNER JOIN portfolio_classes ON portfolio_educatorclasses.edcl_cl_id = portfolio_classes.id_class WHERE edcl_user_id = "' . $_GET['id'] . '"');
                            for($i=0;$i<$query_ucl->num_rows; $i++){
                                $res_cl = $query_ucl->fetch_assoc();
                                echo $res_cl['class_name'];
                                if($i+1!=$query_ucl->num_rows){
                                    echo ', ';
                                }
                            }
                        ?></h6>
                    </div>
                    
                </div>
                
                <form class="text-right" <?php echo 'action="prof_change.php?id=' . $_GET['id'] . '"'; ?> method="GET">
                    <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"'; ?>>
                    <button class="btn btn-primary text-light mr-1 shadow-sm btn-block mt-3">Изменить</button>
                </form> 
            </div>
            <?php 
            if($_POST['class_e']==NULL){
             ?>
            <div class=" mt-2"> 
                <h5 class="text-center mt-3">Портфолио учеников</h5>
                <form class="form-inline my-2 my-lg-0" <?php echo 'action="prof_e.php?id=' . $_GET['id'] . '"';?> method="POST">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Класс</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="class_e">
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
                        <div class="input-group-append">
                            <button class="btn btn-primary form-control" type="submit">Показать</button>
                        </div>
                    </div>
                    
                </form> 
            </div>
            <?php 
            }else{
             ?>

            <h5 class="text-center mt-3">Портфолио учеников</h5>
            <form class="form-inline my-2 my-lg-0" <?php echo 'action="prof_e.php?id=' . $_GET['id'] . '"';?> method="POST">
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Класс</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="class_e">
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
                    <div class="input-group-append">
                        <button class="btn btn-primary form-control" type="submit">Показать</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Поиск</label>
                    </div>
                    <input type="search" class="form-control" placeholder="Введите" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Найти</button>
                    </div>
                </div>
            </form>
            <?php 
            $query_pup = mysqli_query($connect, 
                "SELECT * FROM portfolio_users
                WHERE u_class = '" . $_POST['class_e'] . "' AND u_type = 'student'
                ORDER BY u_surname AND u_name"); 
            for($j=0;$j<$query_pup->num_rows; $j++){
                $res_pup = $query_pup->fetch_assoc();
             ?>

                <div class="card w-100 mx-auto my-3" style="width: 18rem;">
                    <div class="card-body">
                        <h6>Фамилия: <?php echo $res_pup['u_surname'];?></h6>
                        <h6>Имя: <?php echo $res_pup['u_name'];?></h6>
                        <h6>Отчество: <?php echo $res_pup['u_patronymic'];?></h6>
                        <h6>Класс: <?php echo $res_pup['u_class'];?></h6>
                        <form class="my-2" <?php echo 'action="prof_pup_portfolio.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
                            <input type="hidden" name="pup_id" value=<?php echo '"' . $res_pup['id_user'] . '"'; ?>>
                            <button class="btn btn-error">Посмотреть</button>
                        </form>
                    </div>
                </div>
            <?php 
            }
            ?>
            <?php 
            }
             ?>
        </div>
    </div>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        let imgAva = document.querySelector('.img_ava');
        if(window.innerWidth>window.innerHeight+100){
            imgAva.classList.remove('w-75');
            imgAva.classList.add('w-25');
        }
    </script>
</body>
</html>
