<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	$query = mysqli_query($connect, 

		"INSERT INTO portfolio_olymp_note (olnote_user_id, olnote_olymp_id) 

		VALUES (
		'" . $_GET['id'] . "', 
		'" . $_POST['olnote_olymp_id'] . "'
		)"
	);
?>
<form <?php echo 'action="olymp_cal_s.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
 </form>

<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>