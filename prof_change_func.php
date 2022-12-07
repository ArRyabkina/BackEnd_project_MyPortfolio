<?php 
$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');
$query_user = mysqli_query($connect, 'SELECT * FROM portfolio_users WHERE id_user = "' . $_GET['id'] . '"');
$res_u = $query_user->fetch_assoc();
if($_FILES['u_img']['name']!=NULL){
	move_uploaded_file($_FILES['u_img']['tmp_name'], 'images/' . $_FILES['u_img']['name']);
	$query = mysqli_query($connect, 
    	"UPDATE portfolio_users 
    	SET u_name = '" . $_POST['u_name'] . "', u_surname = '" . $_POST['u_surname'] . "', u_patronymic = '" . $_POST['u_patronymic'] . "', u_img = 'images/" . $_FILES['u_img']['name'] . "', u_login = '" . $_POST['u_login'] . "', u_password = '" . $_POST['u_password'] . "', u_class = '" . $_POST['u_class'] . "'
    	WHERE id_user = '" . $_GET['id'] . "'
    ");
} else {
	$query = mysqli_query($connect, 
    	"UPDATE portfolio_users 
    	SET u_name = '" . $_POST['u_name'] . "', u_surname = '" . $_POST['u_surname'] . "', u_patronymic = '" . $_POST['u_patronymic'] . "', u_login = '" . $_POST['u_login'] . "', u_password = '" . $_POST['u_password'] . "', u_class = '" . $_POST['u_class'] . "'
    	WHERE id_user = '" . $_GET['id'] . "'
    ");
}
?>
<form 
<?php
if($res_u['u_type']=='educator'){
	echo 'action="prof_e.php?id=' . $_GET['id'] . '"'; 
}else {
	echo 'action="prof.php?id=' . $_GET['id'] . '"'; 
} 
?> 
method="POST">
</form>

<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>