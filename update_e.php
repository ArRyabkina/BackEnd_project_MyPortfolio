<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	//$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query = mysqli_query($connect, 
		"SELECT * FROM portfolio_olymps WHERE id_olymp = " . $_POST['olymp_id'] . "
	");
	$res = $query->fetch_assoc();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<form action="update_e1.php" method="POST">
		<div class="col-10 mx-auto s mt-4 bg-white border p-3">
			<?php
				echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
			 ?>
			 <?php
				echo '<input type="hidden" name="id_olymp" value="' . $_POST['olymp_id'] . '">';
			 ?>
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			    	<span class="input-group-text" id="basic-addon1">Дата</span>
			    </div>
			    <input type="date" class="form-control" aria-label="00.00.00" aria-describedby="basic-addon1" name="date" value=<?php echo '"' . $res['olymp_date'] . '"'; ?>>
			</div>
			<div class="input-group mb-3">
				<select class="custom-select" id="inputGroupSelect02" name="subject">
					<?php 
						$query2 = mysqli_query($connect, 
							"SELECT * FROM portfolio_subjects
						");
					 ?>
				    <?php 
						for($j=0;$j<$query2->num_rows; $j++){
							$res2 = $query2->fetch_assoc();
							if($res2['id_subject']==$res['olymp_subject_id']){
								echo '<option selected value="' . $res2['id_subject'] . '">' . $res2['subject_name'] . '</option>';
							}else {
								echo '<option value="' . $res2['id_subject'] . '">' . $res2['subject_name'] . '</option>';
							}
						}
					 ?>
				</select>
				<div class="input-group-append h-50">
				    <label class="input-group-text" for="inputGroupSelect02">Предмет</label>
				</div>
			</div>	
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			    	<span class="input-group-text" id="basic-addon1">Название</span>
			    </div>
			    <textarea class="form-control" aria-label="Краткая информация" name="name"><?php echo $res['olymp_name']; ?></textarea>
			</div>
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			    	<label class="input-group-text" for="inputGroupSelect01">Уровень</label>
			    </div>
			    <select class="custom-select" id="inputGroupSelect01" name="level" required>
			    	<?php 
			    	for($i=1;$i<4;$i++){
			    		if($i==$res['olymp_level']){
							echo '<option selected value="' . $i . '">' . $i . '</option>';
						}else {
							echo '<option value="' . $i . '">' . $i . '</option>';
						}
			    	}
			    	 ?>
			    </select>
			</div>
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			    	<span class="input-group-text" id="basic-addon1">#</span>
			    </div>
			    <input type="text" class="form-control" placeholder="Сылка" aria-label="Сылка" aria-describedby="basic-addon1" name="href" value=<?php echo '"' . $res['olymp_href'] . '"'; ?>>
			</div>
			<div class="input-group">
			    <div class="input-group-prepend">
			    	<span class="input-group-text">Инфа</span>
			    </div>
			    <textarea class="form-control" aria-label="Краткая информация" name="introduction"><?php echo $res['olymp_introduction']; ?></textarea>
			</div>
		</div>
		<div class="col-10 mx-auto s mt-4 bg-white border p-3">
			<button class="btn btn-primary  form-control">
				Изменить
			</button>
		</div>
	</form>	
</body>
</html>