<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	//$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query_let = mysqli_query($connect, 
		"SELECT * FROM portfolio_letters WHERE id_letter = '" . $_POST['id_letter'] . "'
	");
	$res_let = $query_let->fetch_assoc();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
              echo '<span class="mx-4">' . $res_user['u_name'] . ' ' . $res_user['u_surname'] . ' ' .  $res_user['u_patronymic'] . ' ' . $res_user['u_class'] . '</span>';
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
                    <a class="nav-link" <?php echo 'href="search_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="search_s_sub">
                            Посм-ть других
                        </p>
                    </a>
                </li>
                <li>
                    <a class="nav-link" <?php echo 'href="send_s.php?id=' . $_GET['id'] . '"' ; ?>>
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
	<form <?php echo 'action="p_update1.php?id=' . $_GET['id'] . '"' ; ?> method="POST" enctype="multipart/form-data">
		
		<div class="col-10 mx-auto s mt-4 bg-white border p-3">
			<?php
				echo '<input type="hidden" name="id_letter" value="' . $_POST['id_letter'] . '">';
			 ?>
			<div class="input-group mb-3">
				<div class="custom-file">
					<label class="custom-file-label" for="inputGroupFile01">Скан грамоты</label>
				    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="let_img">
				</div>
			</div>
			<div class="input-group mb-3">
				<select class="custom-select" id="inputGroupSelect02" name="let_type_id">
					<?php 
						$query_type_winner = mysqli_query($connect, 
							"SELECT * FROM portfolio_type_winner
						");
					 ?>
				    <?php 
						for($j=0;$j<$query_type_winner->num_rows; $j++){
							$res_type_winner = $query_type_winner->fetch_assoc();
							if($res_type_winner['id_type_winner']==$res_let['let_type_id']){
								echo '<option selected value="' . $res_type_winner['id_type_winner'] . '">' . $res_type_winner['type_winner_name'] . '</option>';
							}else {
								echo '<option value="' . $res_type_winner['id_type_winner'] . '">' . $res_type_winner['type_winner_name'] . '</option>';
							}
						}
					 ?>
				</select>
				<div class="input-group-append">
				    <label class="input-group-text" for="inputGroupSelect02">Степень</label>
				</div>
			</div>			
			<?php 
				$query = mysqli_query($connect, 
					"SELECT * FROM portfolio_olymps
				");
			 ?>
			<div class="input-group mb-3">
				<select class="custom-select let_olymp_id" id="inputGroupSelect02" name="let_olymp_id" required aria-describedby="inputGroup-sizing-lg">
				<?php
				$query_olymp = mysqli_query($connect, 
					"SELECT * FROM portfolio_olymps
				"); 
				for($i=0;$i<$query_olymp->num_rows; $i++){
					$res_olymp = $query_olymp->fetch_assoc();
					if($res_olymp['id_olymp']==$res_let['let_olymp_id']){
						echo '<option selected value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
					}else {
						echo '<option value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
					}
				}
				 ?>
				</select>
				<div class="input-group-append">
				    <label class="input-group-text" class="overA w-25" for="inputGroupSelect02">Олимпиада</label>
				</div>
			</div>
			<div class="input-group mb-3" id="stagesOlym">
	            
	        </div>
	        <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){
					setInterval(function(){
						let name = $('select.let_olymp_id').val();
						$.post('p_insert_olymp.php', {let_olymp_id: name}, function(data){
						$("div#stagesOlym").html(data)
					});
					}, 3000);
				})
			</script>
		</div>
		<div class="col-10 mx-auto s mt-4 bg-white border p-3">
			<button class="btn btn-success  form-control">
				Обновить
			</button>
		</div>
	</form>	
</body>
</html>