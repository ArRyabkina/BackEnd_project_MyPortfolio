<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
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
                    <a class="nav-link active" <?php echo 'href="insert_point.php?id=' . $_GET['id'] . '"' ; ?>>
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


		<div class="col-10 mx-auto mt-2 bg-white p-3">
            <?php 
            if($_POST['point_subject_id']==NULL){
             ?>
            
            <form <?php echo 'action="insert_point.php?id=' . $_GET['id'] . '"' ; ?> method="POST">

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">ВУЗ</label>
                    </div>
                    <select class="custom-select" name="point_university_id" required="">
                        <?php 
                        //Нахождение всех университетов
                        $query_univ = mysqli_query($connect, 
                            "SELECT * FROM portfolio_university
                        ");
                        for($i=0;$i<$query_univ->num_rows; $i++){
                            $res_univ = $query_univ->fetch_assoc();
                            if($i==0){
                                echo '<option selected value="' . $res_univ['id_university'] . '">' . $res_univ['university_name'] . '</option>';
                            }else {
                                echo '<option value="' . $res_univ['id_university'] . '">' . $res_univ['university_name'] . '</option>';
                            }
                        }
                         ?>
                    </select>                   
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Предмет</label>
                    </div>
                    <select class="custom-select" name="point_subject_id" required="">
                        <?php 
                        //Нахождение всех университетов
                        $query_sub = mysqli_query($connect, 
                            "SELECT * FROM portfolio_subjects
                        ");
                        for($i=0;$i<$query_sub->num_rows; $i++){
                            $res_sub = $query_sub->fetch_assoc();
                            if($i==0){
                                echo '<option selected value="' . $res_sub['id_subject'] . '">' . $res_sub['subject_name'] . '</option>';
                            }else {
                                echo '<option value="' . $res_sub['id_subject'] . '">' . $res_sub['subject_name'] . '</option>';
                            }
                        }
                         ?>
                    </select>                   
                </div>

                <button class="btn btn-secondary" type="submit">Далее</button>
            </form>
            <?php 
            }else { 
            ?>
            <form <?php echo 'action="insert_point1.php?id=' . $_GET['id'] . '"' ; ?> method="POST">

                <input type="hidden" class="form-control" <?php echo 'value="' . $_POST['point_university_id'] . '"'; ?> name="point_university_id">
                
                <?php 
                $query_univ = mysqli_query($connect, 
                    "SELECT * FROM portfolio_university WHERE id_university = '" . $_POST['point_university_id'] . "'
                ");
                $res_univ = $query_univ->fetch_assoc();
                $query_sub = mysqli_query($connect, 
                    "SELECT * FROM portfolio_subjects WHERE id_subject = '" . $_POST['point_subject_id'] . "'
                ");
                $res_sub = $query_sub->fetch_assoc();
                 ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">ВУЗ</label>
                    </div>
                    <input type="text" class="form-control" <?php echo 'value="' . $res_univ['university_name'] . '"'; ?> readonly>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Предмет</label>
                    </div>
                    <input type="text" class="form-control" name="point_subject_id" <?php echo 'value="' . $res_sub['subject_name'] . '"'; ?> readonly>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Олимп</label>
                    </div>
                    <select class="custom-select" name="point_olymp_id" required="">
                        <?php 
                        //Нахождение всех университетов
                        $query_olymp = mysqli_query($connect, 
                            "SELECT * FROM portfolio_olymps INNER JOIN portfolio_subjects ON portfolio_olymps.olymp_subject_id = portfolio_subjects.id_subject WHERE olymp_subject_id = '" . $_POST['point_subject_id'] . "'
                        ");
                        for($i=0;$i<$query_olymp->num_rows; $i++){
                            $res_olymp = $query_olymp->fetch_assoc();
                            if($i==0){
                                echo '<option selected value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
                            }else {
                                echo '<option  value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
                            }
                        }
                         ?>
                    </select>
                   
                </div>

                 <?php 
                    //Нахождени всех типов льгот
                    $query_winner = mysqli_query($connect, 
                        "SELECT * FROM portfolio_type_winner
                    ");
                    for($i=0;$i<$query_winner->num_rows; $i++){
                        $res_winner = $query_winner->fetch_assoc();
                        echo '<div class="input-group my-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input" name="point_type_winner_id' . $i . '" value="' . $res_winner['id_type_winner'] . '" class="checkBox">
                            </div>
                        </div>
                        <textarea type="number" class="form-control" aria-label="Text input with checkbox" placeholder="Баллы" name="point_points' . $i . '" ></textarea>
                        <div class="input-group-append w-25" style="overflow: auto;">
                            <span class="input-group-text">' . $res_winner['type_winner_name'] . '</span>
                        </div>
                    </div>';
                    }
                     ?>
                    
                
                <button class="btn w-100 btn-primary" type="submit">Добавить</button>
            </form>
        <?php } ?>
		</div>

        <?php 
            if($_POST['insert_point_succ']=='true'){
            ?>
                <div class="alert alert-success mt-3 w-75 mx-auto" role="alert">
                  Вы успешно добавили баллы!
                </div>
                <script>
                  $('.alert').alert()
                </script>
          <?php
          }
          ?>

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