<?php 

header('Content-type: text/html; charset=UTF-8');

$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
move_uploaded_file($_FILES['let_img']['tmp_name'], 'images/' . $_FILES['let_img']['name']);
$query = mysqli_query($connect, 
    "INSERT INTO portfolio_letters (let_user_id, let_img, let_olymp_id, let_type_id, let_stage_name_id) 
    VALUES (
		'" . $_GET['id'] . "', 
		'images/" . $_FILES['let_img']['name'] . "', 
		'" . $_POST['let_olymp_id'] . "',
		'" . $_POST['let_type_id'] . "',
		'" . $_POST['let_stage_olymp_id'] . "'
		)
	");
	?>
<form <?php echo 'action="portfolio.php?id=' . $_GET['id'] . '"'; ?> method="POST">
</form>
<script type="text/javascript">
    var form = document.forms[0];
    form.submit();

</script>
