<?php 
    $connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
    header('Content-type: text/html; charset=UTF-8');
	$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
	$res = $query_user->fetch_assoc();

	

	mail ('"' . $_POST['email'] . '"', 
		"Отправка достижений ученика (" . $res['u_surname'] . " " . $res['u_name'] . " " . $res['u_patronymic'] . ")", " "
	);
	echo $_POST['letter_id'];
 ?>

<form <?php echo 'action="send_s.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
	<input type="hidden" name="send_succ" value="true">
 </form>

<script type="text/javascript">
	var form = document.forms[0];
	//form.submit();
</script>