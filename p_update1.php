<?php 
	$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'CyJ-vWh-Zmv-mqH', 'speslyjk2002');
    //$connect = mysqli_connect('127.0.0.1', 'root', '', 'ann_pn_17');
	if($_FILES['let_img']['name']!=null){

		move_uploaded_file($_FILES['let_img']['tmp_name'], 'images/' . $_FILES['let_img']['name']);

		$query = mysqli_query($connect, "
			UPDATE portfolio_letters
			SET let_olymp_id=". $_POST['let_olymp_id'] . ", let_type_id=" . $_POST['let_type_id'] . ", let_img='images/" . $_FILES['let_img']['name'] . "', let_stage_name_id='" . $_POST['let_stage_name_id'] . "'
			WHERE id_letter=" . $_POST['id_letter'] . "
			"); 

	} else {
		$query = mysqli_query($connect, "
			UPDATE portfolio_letters
			SET let_olymp_id=". $_POST['let_olymp_id'] . ", let_type_id=" . $_POST['let_type_id'] . ", let_stage_name_id='" . $_POST['let_stage_name_id'] . "'
			WHERE id_letter=" . $_POST['id_letter'] . "
			"); 
		

	}
?>

<form <?php echo 'action="portfolio.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
 </form>
<script type="text/javascript">
	var form = document.forms[0];
	form.submit();
</script>