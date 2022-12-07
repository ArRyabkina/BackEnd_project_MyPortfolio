<?php 
	header('Content-type: text/html; charset=UTF-8');
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	$query = mysqli_query($connect, 
		"
		SELECT * FROM portfolio_users
		WHERE u_login = '" . $_POST['u_login'] . "'
		");

	$res = $query->fetch_assoc();
?>
<form action="index.php" method="POST">
	<input type="hidden" name="send_succ" value="true" id="form_succ">
</form>
<form action="portfolio.php" method="GET">
	<input type="hidden" name="id" <?php echo 'value="' . $res['id_user'] . '"' ?>>
</form>
<form action="prof_e.php" method="GET">
	<input type="hidden" name="id" <?php echo 'value="' . $res['id_user'] . '"' ?>>
</form>
<?php
	if($res!=NULL){
		?>
		<script type="text/javascript">
			var form = document.forms[0];
			var forms = document.forms[1];
			var forme = document.forms[2];
			var succ = document.getElementById('form_succ');
			succ.value='true';
			form.submit();
			<?php 
				if($res['u_type']=='educator'){
					echo 'forme.submit()';
				}else{
					echo 'forms.submit()';
				}
			 ?>
		</script>
		<?php 
	} else {
		?>
		<script type="text/javascript">
			var form = document.forms[0];
			var succ = document.getElementById('form_succ');
			succ.value='false';
			form.submit();
		</script>
		<?php 
	}
 ?>