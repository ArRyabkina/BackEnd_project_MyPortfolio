<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	$query = mysqli_query($connect, 

		"INSERT INTO portfolio_olymps (olymp_name, olymp_subject_id, olymp_level, olymp_href, olymp_introduction, olymp_date) 
		VALUES (
		'" . $_POST['name'] . "', 
		'" . $_POST['subject'] . "', 
		'" . $_POST['level'] . "',
		'" . $_POST['href'] . "',
		'" . $_POST['introduction'] . "', 
		'" . $_POST['date'] . "'
		)"
	);
	$query_num = mysqli_query($connect, "SELECT * FROM portfolio_olymps");
	for($i=0;$i<$query_num->num_rows; $i++){
        $res1 = $query_num->fetch_assoc();
    }
    $num = $res1['id_olymp'];
	$query_stage = mysqli_query($connect, 

		"INSERT INTO portfolio_stages_olymps (stagesOlym_stage_name_id, stagesOlym_olymp_id, stagesOlym_date) 
		VALUES (
		'" . $_POST['stages'] . "', 
		'" . $num . "',
		'" . $_POST['date'] . "'
		)"
		);
	?>
<form action="educator.php" method="GET">
 	<input type="hidden" name="id" value=<?php echo '"' . $_POST['id'] . '"' ?>>
 </form>
<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>