<?php
header('Content-type: application/json'); //cabeçalho JSON
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
		
foreach ($tabelas as $key => $value) {
	if ($key % 2 != 0){ //somente tabelas impares - Cabecalhos de ponto de coleta
		$labels = $value->getElementsByTagName('label'); //encontra os rótulos
		$pdc = explode(': ', $labels[2]->nodeValue); // seleciona label Ponto de coleta
		$tabela = $tabelas->item($key+1)->getElementsByTagName('tbody'); //seleciona corpo da tabela
		$linhas = $tabela->item(0)->getElementsByTagName('tr'); //seleciona linha
		foreach ($linhas as $linha => $valorlinha) {
			$celulas = $valorlinha->getElementsByTagName('td');//seleciona célula
			$i=0;
			foreach ($celulas as $celula => $valorcelula) {
				if (($celula == 0)||($celula == 5)||($celula == 6)||($celula == 7)){//somente colunas data, água, ar e E-coli
					$dado = explode(' Cº', $valorcelula->nodeValue);//limpa o dado
					$matriz[$pdc[1]][$linha][$i] = $dado[0];
					$i++;
				}
			}
		}
	}
}
echo json_encode($matriz); //Gerando JSON
?>