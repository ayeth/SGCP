<?php
   mysql_set_charset('utf8');
   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("RelatorioSGP.xls");

    if($excel==false){
        echo $excel->error;
   }

   //Escreve o nome dos campos de uma tabela
   $myArr=array('STATUS','CÓDIGO','NOME','EMPRESA','ÁREA','VERSÃO','DATA DE VENCIMENTO','LINK DO PROCESSO','DATA DE PUBLICAÇÃO','DATA DE APROVAÇÃO','DATA DE CRIAÇÃO','DONO DO PROCESSO','OBSERVAÇÕES');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	include 'conn.php';
	if($conn)
	{
	mysql_select_db("rkqvvexb_cip", $conn);
	}
   $consulta = "SELECT *, DATE_FORMAT(vencimento_processo,'%d/%m/%Y') AS vencimento_processo, DATE_FORMAT(dt_criacao,'%d/%m/%Y') AS dt_criacao, DATE_FORMAT(dt_publicacao,'%d/%m/%Y') AS dt_publicacao, DATE_FORMAT(dt_aprovacao,'%d/%m/%Y') AS dt_aprovacao FROM id_processos";
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){ 
         $myArr=array($linha['status_servico'],$linha['codigo_processo'],$linha['nome_processo'],$linha['empresa_processo'],$linha['area_processo'],$linha['versao_processo'],$linha['vencimento_processo'],$linha['bizagi_process_link'],$linha['dt_publicacao'],$linha['dt_aprovacao'],$linha['dt_criacao'],$linha['id_owner'],$linha['obs_servico']);

         $excel->writeLine($myArr);
      }
   }


    $excel->close();
    echo "O arquivo foi gerado com sucesso. <a href=\"RelatorioSGP.xls\">Clique Aqui!</a>";

?>
