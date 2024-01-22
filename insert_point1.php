<?php 

header('Content-type: text/html; charset=UTF-8');

$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
$query_winner = mysqli_query($connect, 
	"SELECT * FROM portfolio_type_winner
");
for($i=0;$i<$query_winner->num_rows; $i++){
	$res = $query_winner->fetch_assoc();
	if($_POST['point_type_winner_id' . $i] == $res['id_type_winner']){
		$query = mysqli_query($connect, 
	    	"INSERT INTO portfolio_points (point_points, point_olymp_id, point_university_id, point_type_winner_id) 
	    	VALUES (
	    		'" . $_POST['point_points' . $i] . "',
				'" . $_POST['point_olymp_id'] . "',
				'" . $_POST['point_university_id'] . "', 
				'" . $_POST['point_type_winner_id' . $i] . "'
				)
		");
	}
}
	?>
<form <?php echo 'action="insert_point.php?id=' . $_GET['id'] . '"'; ?> method="POST">
	<input type="hidden" name="insert_point_succ" value="true">
</form>
<script type="text/javascript">
    var form = document.forms[0];
    form.submit();

</script>