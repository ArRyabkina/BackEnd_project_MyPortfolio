<?php
$creationstart=strtok(microtime()," ")+strtok(" ");

$dbhost='127.0.0.1';
$dbname='portfolio_users';
$dbuser="speslyjk2002";
$dbpass='CyJ-vWh-Zmv-mqH';

$mailto='"' . $_POST['email'] . '"';
$subject="Backup DB";
$from_name="Your trustworthy website";
$from_mail="noreply@yourwebsite.com";

mysql_connect($dbhost, $dbuser, $dbpass, 'speslyjk2002');
mysql_select_db($dbname);

$tablesblocklist=array(
    "tablename1"=>,
    "tablename2"=>1,
    "tablename3"=>1,
);
$tables = array();
$result = mysql_query("SHOW TABLES");
while($row = mysql_fetch_row($result))
	$tables[] = $row[0];
foreach($tables as $table) {
	if (!isset($tablesblocklist[$table])) {
		$result = mysql_query("SELECT * FROM $table");
		$return.= "DROP TABLE IF EXISTS $table;";
		$row2 = mysql_fetch_row(mysql_query("SHOW CREATE TABLE $table"));
		$return.= "\n\n".$row2[1].";\n\n";
		while($row = mysql_fetch_row($result)) {
		$return.= "INSERT INTO $table VALUES(";
		$fields=array();
		foreach ($row as $field)
		$fields[]="'".mysql_real_escape_string($field)."'";
		$return.= implode(",",$fields).");\n";
	}
		$return.="\n\n\n";
	}
}
$filename='db-backup-'.date("Y-m-d H.m.i").'.sql.bz2';

$content=chunk_split(base64_encode(bzcompress($return,9)));
$uid=md5(uniqid(time()));
$header=
"From: ".$from_name." <".$from_mail.">\r\n".
"Reply-To: ".$replyto."\r\n".
"MIME-Version: 1.0\r\n".
"Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n".
"This is a multi-part message in MIME format.\r\n".
"--".$uid."\r\n".
"Content-type:text/plain; charset=iso-8859-1\r\n".
"Content-Transfer-Encoding: 7bit\r\n\r\n".
$message."\r\n\r\n".
"--".$uid."\r\n".
"Content-Type: application/octet-stream; name=\"".$filename."\"\r\n".
"Content-Transfer-Encoding: base64\r\n".
"Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n".
$content."\r\n\r\n".
"--".$uid."--";
mail($mailto,$subject,"",$header);
?>

<form <?php echo 'action="send_s.php?id=' . $_GET['id'] . '"' ; ?> method="POST">
	<input type="hidden" name="send_succ" value="true">
 </form>

<script type="text/javascript">
	var form = document.forms[0];
	//form.submit();
</script>