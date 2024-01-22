<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Новое достижение</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
                    <a class="nav-link" <?php echo 'href="search_s.php?id=' . $_GET['id'] . '"' ; ?>>
                        <input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"' ; ?>>
                        <p class="search_s_sub">
                            Посм-ть других
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
        <!--Главная часть-->
	<form <?php echo 'action="p_insert1.php?id=' . $_GET['id'] . '"'; ?> method="POST" class="" enctype="multipart/form-data">
		
		<div class="col-10 mx-auto s mt-4 bg-white border p-3">

			<div class="input-group mb-3">
				<div class="custom-file">
					<label class="custom-file-label" for="inputGroupFile01">Грамота</label>
				    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="let_img" required="">
				</div>
			</div>
			<div class="input-group mb-3">
				<select class="custom-select" id="inputGroupSelect02" name="let_type_id" required>
					<?php 
					$query_typeWinner = mysqli_query($connect, 
						"SELECT * FROM portfolio_type_winner
					");
					 ?>
				    <?php 
					for($j=0;$j<$query_typeWinner->num_rows; $j++){
						$res_typeWinner = $query_typeWinner->fetch_assoc();
						if($j==0){
							echo '<option selected value="' . $res_typeWinner['id_type_winner'] . '">' . $res_typeWinner['type_winner_name'] . '</option>';
						}else {
							echo '<option value="' . $res_typeWinner['id_type_winner'] . '">' . $res_typeWinner['type_winner_name'] . '</option>';
						}
						
					}
					 ?>
				</select>
				<div class="input-group-append">
				    <label class="input-group-text" for="inputGroupSelect02">Степень</label>
				</div>
			</div>		
			<div class="input-group mb-3">
				<select class="custom-select let_olymp_id" id="inputGroupSelect02" name="let_olymp_id" required aria-describedby="inputGroup-sizing-lg">
				<?php
				$query_olymp = mysqli_query($connect, 
					"SELECT * FROM portfolio_olymps
				"); 
				for($i=0;$i<$query_olymp->num_rows; $i++){
					$res_olymp = $query_olymp->fetch_assoc();
					if($i==0){
						echo '<option selected value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
					}else {
						echo '<option value="' . $res_olymp['id_olymp'] . '">' . $res_olymp['olymp_name'] . '</option>';
					}
				}
				 ?>
				</select>
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
					/*$("div#stagesOlym").on('click', function(){
						alert(1);
					})
					
					/*setInterval(function(){
						$("div#stagesOlym").load('p_insert_olymp.php')
					}, 1000);*/
					/*$("div#stagesOlym").on('click', function(){
						alert(1);
					})*/
				})
			</script>
		</div>

		<div class="col-10 mx-auto s mt-4 bg-white border p-3">
			<button class="btn btn-success  form-control">
				Добавить
			</button>
		</div>
	</form>	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
	
</body>
</html>