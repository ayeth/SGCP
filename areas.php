<?php
	include 'conn.php';
	mysql_set_charset('utf8');
	$rs = mysql_query("select nome_area from area_sgp where nome_emp = $empresa_processo ORDER BY nome_area ASC");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result = $items;

	echo json_encode($result);
?>
