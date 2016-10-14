<?php
   //Incluir a classe excelwriter
   include("excelwriter.inc.php");

   //Você pode colocar aqui o nome do arquivo que você deseja salvar.
    $excel=new ExcelWriter("RelatorioSGP.xls");

    if($excel==false){
        echo $excel->error;
   }

   //Escreve o nome dos campos de uma tabela
   $myArr=array('STATUS','CODIGO','NOME','EMPRESA','AREA','VERSAO','DATA DE VENCIMENTO','LINK DO PROCESSO');
   $excel->writeLine($myArr);

   //Seleciona os campos de uma tabela
	include 'conn.php';
	if($conn)
	{
	mysql_select_db("rkqvvexb_cip", $conn);
	}
   $consulta = "SELECT *  FROM id_processos";
   $resultado = mysql_query($consulta);
   if($resultado==true){
      while($linha = mysql_fetch_array($resultado)){ 
         $myArr=array($linha['status_servico'],$linha['codigo_processo'],$linha['nome_processo'],$linha['empresa_processo'],$linha['area_processo'],$linha['VERSAO'],$linha['vencimento_processo'],$linha['bizagi_process_link'],$linha['dt_publicacao'],$linha['dt_aprovacao'],$linha['dt_criacao'],$linha['dt_criacao'],$linha['id_owner'],$linha['analista_processo'],$linha['obs_servico']);

         $excel->writeLine($myArr);
      }
   }


    $excel->close();
    echo "O arquivo foi gerado com sucesso. <a href=\"RelatorioSGP.xls\">RelatorioSGP.xls</a>";

?>
