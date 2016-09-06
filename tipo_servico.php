<?php

	
	include 'conn.php';
	mysql_set_charset('utf8');
	$rs = mysql_query("select servico_processo from tipo_servico");
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result = $items;
	
	

	echo json_encode($result);

?>