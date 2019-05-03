<?php
include("header.php");
	if( $_GET["PontoID"] || $_GET["variavel"] ) {
		//echo $_GET['PontoID'], "<br />";
		//echo $_GET['variavel'];
	   
		$site = curl_init(); //inicia sessão curl

		//configura opções
		curl_setopt($site, CURLOPT_URL,"https://balneabilidade.ima.sc.gov.br/relatorio/historico"); //pagina para raspagem
		curl_setopt($site, CURLOPT_POST, 1); //modo POST
		curl_setopt($site, CURLOPT_POSTFIELDS,"municipioID=22&localID=36&ano=2018"); //parametros POST
		curl_setopt($site, CURLOPT_RETURNTRANSFER, true); //retorna pagina em string

		$pagina = curl_exec($site); //executa a sessão
		curl_close($site); //fecha a sessão curl

		$html = new DOMDocument(); //Instancia objeto DOM
		$html->loadHTML($pagina); // Carrega pagina como documento HTML
		$html->preserveWhiteSpace = false; // removendo os espaços em branco
		$tabelas = $html->getElementsByTagName('table'); //seleciona somente tabelas
		
		$t = $tabelas->length; //verifica tamanho do array
		$p = ''; //variavel do indice da tabela do ponto
		for ($i = 0; $i < $t; $i++) {
			$labels = $tabelas->item($i)->getElementsByTagName('label');
			foreach ($labels as $label){
					echo $i,'<br>';
					echo $label->nodeValue,'<hr>';
			
			$labels = '';
			};
			
		}

   }
include("footer.php");
?>