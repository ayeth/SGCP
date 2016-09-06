<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';
	
	$rs = mysql_query("select count(*) from id_processos");
	$row = mysql_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("SELECT *, DATE_FORMAT(vencimento_processo,'%d/%m/%Y') AS vencimento_processo, DATE_FORMAT(dt_criacao,'%d/%m/%Y') AS dt_criacao, DATE_FORMAT(dt_publicacao,'%d/%m/%Y') AS dt_publicacao, DATE_FORMAT(dt_aprovacao,'%d/%m/%Y') AS dt_aprovacao FROM id_processos limit $offset,$rows");
	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);

?>