<?php 

header('Content-type: text/html; charset=UTF-8');

$connect = mysqli_connect('127.0.0.1', 'speslyjk2002', 'vn4h8rRT3A', 'speslyjk2002');

$query = mysqli_query($connect, 
	"INSERT INTO portfolio_university (university_info, university_href, university_name) 
	VALUES (
	    '" . $_POST['university_info'] . "',
		'" . $_POST['university_href'] . "',
		'" . $_POST['university_name'] . "'
		)
");
	?>
<form <?php echo 'action="new_university.php?id=' . $_GET['id'] . '"'; ?> method="POST">
	<input type="hidden" name="insert_olymp_succ" value="true">
</form>
<script type="text/javascript">
    var form = document.forms[0];
    form.submit();

</script>