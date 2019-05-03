
		<form action="busca.php" method="get" target="_blank">
			<fieldset>
				<legend>Dados para gerar o gráfico:</legend>
				<fieldset>
					<legend>Ponto de coleta:</legend>
					<input type="radio" name="PontoID" value="Ponto 02" checked>Ponto 02<br>
					<input type="radio" name="PontoID" value="Ponto 03">Ponto 03<br>
					<input type="radio" name="PontoID" value="Ponto 04">Ponto 04<br>
					<input type="radio" name="PontoID" value="Ponto 05">Ponto 05<br>
				</fieldset>
				<fieldset>
					<legend>Variável:</legend>
					<input type="radio" name="variavel" value="agua" checked>Água (C<sup>o</sup>)<br>
					<input type="radio" name="variavel" value="ar">Ar (C<sup>o</sup>)<br>
					<input type="radio" name="variavel" value="ecoli">E.coli NMP*/100ml<br>
				</fieldset>
				<button >Enviar</button>
			</fieldset>
		</form>
