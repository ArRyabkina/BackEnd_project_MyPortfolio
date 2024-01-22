<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
	$query = mysqli_query($connect, "DELETE FROM portfolio_olymps WHERE id_olymp='" . $_POST['olymp_id'] . "'"); 
	
?>
<form action="educator.php" method="GET">
 	<input type="hidden" name="id" value=<?php echo '"' . $_GET['id'] . '"'; ?>>
</form>
<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>