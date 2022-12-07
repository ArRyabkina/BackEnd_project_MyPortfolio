<?php 
	header('Content-type: text/html; charset=UTF-8');
 ?>
 <form action="reg.php" method="POST">
	<input type="hidden" name="send_succ" value="true" id="form_succ">
	<input type="hidden" name="u_type" value=<?php echo '"' . $_POST['u_type'] . '"'; ?>>
</form>
<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
	$query = mysqli_query($connect, 
		"SELECT * FROM portfolio_users
		WHERE u_login = '" . $_POST['u_login'] . "'
		");

	$res = $query->fetch_assoc();
	if($_POST['u_type']=='student'){
		$type_img = 'images/student.png';
	}else{
		$type_img = 'images/educator.jpg';
	}

	if($res==NULL){
		$query = mysqli_query($connect, 
		"INSERT INTO 
			portfolio_users (u_name, u_surname, u_patronymic, u_password, u_type, u_class, u_login, u_img) 
		VALUES 
			(
			'" . $_POST['u_name'] . "', 
			'" . $_POST['u_surname'] . "', 
			'" . $_POST['u_patronymic'] . "', 
			'" . $_POST['u_password'] . "',
			'" . $_POST['u_type'] . "', 
			'" . $_POST['u_class'] . "',
			'" . $_POST['u_login'] . "',
			'" . $type_img . "'
			)"
		);
		$query_user = mysqli_query($connect,
		"
		SELECT * FROM portfolio_users
		WHERE u_login = '" . $_POST['u_login'] . "'
		");
		$res_user = $query_user->fetch_assoc();
		?>



		<form action="portfolio.php" method="GET">
			<input type="hidden" name="id" <?php echo 'value="' . $res_user['id_user'] . '"' ?>>
		</form>
		<form action="prof_e.php" method="GET">
			<input type="hidden" name="id" <?php echo 'value="' . $res_user['id_user'] . '"' ?>>
		</form>
		<script type="text/javascript">
			var form = document.forms[0];
			var forms = document.forms[1];
			var forme = document.forms[2];
			var succ = document.getElementById('form_succ');
			succ.value='true';
			form.submit();
			<?php 
				if($_POST['u_type']=='educator'){
					echo 'forme.submit()';
				}else{
					echo 'forms.submit()';
				}
			 ?>
		</script>
	<?php 
	}else{
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

