<?php

$id = intval($_REQUEST['id']);
$servico_processo = htmlspecialchars($_REQUEST['servico_processo']);
$status_servico = htmlspecialchars($_REQUEST['status_servico']);
$codigo_processo = htmlspecialchars($_REQUEST['codigo_processo']);
$nome_processo = htmlspecialchars($_REQUEST['nome_processo']);
$empresa_processo = htmlspecialchars($_REQUEST['empresa_processo']);
$area_processo = htmlspecialchars($_REQUEST['area_processo']);
$vencimento_processo = htmlspecialchars($_REQUEST['vencimento_processo']);
$versao_processo = htmlspecialchars($_REQUEST['versao_processo']);
$dt_criacao = htmlspecialchars($_REQUEST['dt_criacao']);
$dt_publicacao = htmlspecialchars($_REQUEST['dt_publicacao']);
$dt_aprovacao = htmlspecialchars($_REQUEST['dt_aprovacao']);
$bizagi_process_link = addslashes($_REQUEST['bizagi_process_link']);
$id_owner = htmlspecialchars($_REQUEST['id_owner']);
$obs_servico = htmlspecialchars($_REQUEST['obs_servico']);

include 'conn.php';

$sql = "UPDATE id_processos
SET
servico_processo = '$servico_processo',
status_servico = '$status_servico',
codigo_processo = '$codigo_processo',
nome_processo = '$nome_processo',
empresa_processo = '$empresa_processo',
area_processo = '$area_processo',
vencimento_processo = STR_TO_DATE('$vencimento_processo','%d/%m/%Y'),
versao_processo = '$versao_processo',
dt_criacao = STR_TO_DATE('$dt_criacao','%d/%m/%Y'),
dt_publicacao = STR_TO_DATE('$dt_publicacao','%d/%m/%Y'),
dt_aprovacao = STR_TO_DATE('$dt_aprovacao','%d/%m/%Y'),
bizagi_process_link = '$bizagi_process_link',
id_owner = '$id_owner',
obs_servico = '$obs_servico'
WHERE
id=$id";
$result = @mysql_query($sql);
if ($result){
	echo "<script>alert('Processo atualizado com sucesso.');</script>";
	echo json_encode(array(
	'id' => $id,
	'servico_processo' => $servico_processo,
	'status_servico' => $status_servico,
	'codigo_processo' => $codigo_processo,
	'nome_processo' => $nome_processo,
	'empresa_processo' => $empresa_processo,
	'area_processo' => $area_processo,
	'vencimento_processo' => $vencimento_processo,
	'versao_processo' => $versao_processo,
	'dt_criacao' => $dt_criacao,
	'dt_publicacao' => $dt_publicacao,
	'dt_aprovacao' => $dt_aprovacao,
	'bizagi_process_link' => $bizagi_process_link,
	'id_owner' => $id_owner,
	'obs_servico' => $obs_servico
	));
	
} else {
	echo json_encode(array('errorMsg'=>'Algum erro ocorreu, contate o administrador do sistema.'));
}
?>
