<?php

$conn = @mysql_connect('IP','LOGIN','SENHA');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('NOME_DB', $conn);

?>
