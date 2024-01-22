<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');	$query = mysqli_query($connect, "DELETE FROM portfolio_letters WHERE id_letter='" . $_POST['id_letter'] . "'"); 
?>
<form <?php echo 'action="portfolio.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
 </form>
<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>