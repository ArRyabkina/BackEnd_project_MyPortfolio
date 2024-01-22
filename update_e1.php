<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
	//$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	$query = mysqli_query($connect, "
		UPDATE portfolio_olymps
		SET 
		olymp_name = '" . $_POST['name'] . "', 
		olymp_date = '" . $_POST['date'] . "', 
		olymp_subject_id = '" . $_POST['subject'] . "', 
		olymp_level = '" . $_POST['level'] . "',
		olymp_href = '" . $_POST['href'] . "',
		olymp_introduction = '" . $_POST['introduction'] . "'
		WHERE id_olymp = '" . $_POST['id_olymp'] . "'
		"); 
?>

<form action="educator.php" method="GET">
 	<input type="hidden" name="id" value=<?php echo '"' . $_POST['id'] . '"' ?>>
 </form>
<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>