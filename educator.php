<?php 
date_default_timezone_set('Asia/Yakutsk');
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

        <div class="p-3">
            <a <?php echo 'href="insert_e.php?id=' . $_GET['id'] . '"' ; ?>>
                <button class="btn w-100 btn-primary" type="submit">Добавить</button>
            </a>
            <!--Searching-->
            <form class="form-inline" <?php echo 'action="educator.php?id=' . $_GET['id'] . '"';?> method="POST">
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Поисковик</label>
                    </div>
                    <input type="search" class="form-control" placeholder="Введите" aria-label="Recipient's username" aria-describedby="button-addon2" name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Найти</button>
                    </div>
                </div>
            </form> 
            <!--эти три фильтра-->
            <div class="my-2 mx-auto">
                <span class="badge badge-dark filter-all px-3 pt-1"><h6>Все</h6></span>
                <span class="badge badge-light filter-fut px-3 pt-1"><h6>Предстоящие</h6></span>
                <span class="badge badge-light filter-past px-3 pt-1"><h6>Прошлые</h6></span>
            </div>
            <div style="display: flex; flex-wrap: wrap;">
    		    <?php 
                if($_POST['search']!=NULL){
                    $query_olymp = mysqli_query($connect, 
                        "SELECT * FROM portfolio_olymps
                        INNER JOIN portfolio_subjects 
                        ON portfolio_olymps.olymp_subject_id = portfolio_subjects.id_subject 
                        WHERE olymp_name LIKE '%" . $_POST['search'] . "%' 
                        OR olymp_introduction LIKE '%" . $_POST['search'] . "%' 
                        OR subject_name LIKE '%" . $_POST['search'] . "%' 
                        OR olymp_level LIKE '%" . $_POST['search'] . "%'
                        ORDER BY olymp_date DESC
                    "); 
                }else {
                    $query_olymp = mysqli_query($connect, 
                        "SELECT * FROM portfolio_olymps
                        INNER JOIN portfolio_subjects 
                        ON portfolio_olymps.olymp_subject_id = portfolio_subjects.id_subject
                        INNER JOIN portfolio_stages_olymps
                        ON portfolio_olymps.id_olymp = portfolio_stages_olymps.stagesOlym_olymp_id
                        INNER JOIN portfolio_stages_name
                        ON portfolio_stages_olymps.stagesOlym_stage_name_id = portfolio_stages_name.id_stages_name
                        ORDER BY olymp_date DESC
                    "); 
                }
                for($j=0;$j<$query_olymp->num_rows; $j++){
                    $res_olymp = $query_olymp->fetch_assoc();
                 ?>
    
    		        <div <?php if(date('Y-m-d')>$res_olymp['stagesOlym_date']){
                                          echo 'class="card my-3 clFil-past card-w ml-2" style="width: 250px;"';
                                       }else {
                                          echo 'class="card my-3 clFil-fut card-w ml-2" style="width: 250px;"';
                                       }
                                        ?> style="width: 18rem;">
    		            <div class="card-body">
    		                <h5 class="card-title">
    		                    <?php echo $res_olymp['olymp_name']; ?>
    		                </h5>
    		                <h6 class="card-subtitle mb-2 text-muted">
    		                    <?php echo $res_olymp['stagesOlym_date']; ?>
    		                </h6>
    		                <h6 class="card-subtitle mb-2 text-muted">Уровень:
    		                    <?php echo $res_olymp['olymp_level']; ?>
    		                </h6>
                            <h6 class="card-subtitle mb-2 text-muted">Предмет:
                                <?php echo $res_olymp['subject_name']; ?>
                            </h6>
                            <h6 class="card-subtitle mb-2 text-muted">Этап:
                                <?php echo $res_olymp['stages_name_name']; ?>
                            </h6>
                            <hr>
    		                <p class="card-text introduction">
    		                    <?php echo $res_olymp['olymp_introduction']; ?>
    		                </p>
                            <hr>
    		                <a class="card-link" <?php echo 'href="' . $res_olymp['olymp_href'] . '"' ; ?>>На сайт</a>
    		                <div class="flex mt-2">
    							<form class="" <?php echo 'action="delete_e.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
    								<input type="hidden" name="olymp_id" value=<?php echo '"' . $res_olymp['id_olymp'] . '"'; ?>>
    								<button class="btn btn-error">Удалить</button>
    							</form>
    							<form class="ml-2" <?php echo 'action="update_e.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
    								<input type="hidden" name="olymp_id" value=<?php echo '"' . $res_olymp['id_olymp'] . '"'; ?>>
    								<button class="btn btn-success">Обновить</button>
    							</form>
    						</div>
    		            </div>
    		        </div>
                <?php 
                }
                ?>
            </div>
        </div>
        <div class="topmenu_under"></div>
	
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
        //filter
        let filA = document.querySelector('.filter-all');
        let filF = document.querySelector('.filter-fut');
        let filP = document.querySelector('.filter-past');
        
        let clfilF = document.querySelectorAll('.clFil-fut');
        let clfilP = document.querySelectorAll('.clFil-past');

        let cardW = document.querySelectorAll('.card-w');
        
        filA.onclick = function(){
            filA.classList.add('badge-dark');
            filA.classList.remove('badge-light');
            filF.classList.remove('badge-dark');
            filP.classList.remove('badge-dark');
            filF.classList.add('badge-light');
            filP.classList.add('badge-light');
            for(let index of clfilF){
                index.style.display = 'block';
            }
            for(let index of clfilP){
                index.style.display = 'block';
            }
        }
        filF.onclick = function(){
            filF.classList.add('badge-dark');
            filF.classList.remove('badge-light');
            filA.classList.remove('badge-dark');
            filP.classList.remove('badge-dark');
            filA.classList.add('badge-light');
            filP.classList.add('badge-light');
            for(let index of clfilF){
                index.style.display = 'block';
            }
            for(let index of clfilP){
                index.style.display = 'none';
            }
        }
        filP.onclick = function(){
            filP.classList.add('badge-dark');
            filP.classList.remove('badge-light');
            filF.classList.remove('badge-dark');
            filA.classList.remove('badge-dark');
            filF.classList.add('badge-light');
            filA.classList.add('badge-light');
            for(let index of clfilF){
                index.style.display = 'none';
            }
            for(let index of clfilP){
                index.style.display = 'block';
            }
        }
        let introd = document.querySelectorAll('.introduction');
        for(let index of introd){
            if (index.getBoundingClientRect().height > window.innerHeight*0.4) {
                index.style.height = window.innerHeight*0.4 + 'px';
                index.style.overflow = 'auto';
            }

        }
        
        for(let index of cardW){
            if(window.innerWidth > window.innerHeight){
                index.style.width = window.innerWidth/3 - 40 + 'px';
            }else {
                index.classList.add('w-100');
            }
        }
    </script>

</body>
</html>