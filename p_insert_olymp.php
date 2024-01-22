<?php 
$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
$query_stagesName = mysqli_query($connect, 
	"SELECT * FROM portfolio_stages_name INNER JOIN portfolio_stages_olymps ON portfolio_stages_name.id_stages_name = portfolio_stages_olymps.stagesOlym_stage_name_id WHERE stagesOlym_olymp_id = '" . $_POST['let_olymp_id'] . "'
");
?>
<div class="input-group-prepend">
	<label class="input-group-text" for="inputGroupSelect01">Этап</label>
</div>
<select class="custom-select" name="let_stage_olymp_id" required>        
	<?php
	for($i=0;$i<$query_stagesName->num_rows;$i++){
		$res_stagesName = $query_stagesName->fetch_assoc();
		echo '<option value="' . $res_stagesName['id_stages_name'] . '">' . $res_stagesName['stages_name_name'] . '</option>';
	}
	 ?>
</select>