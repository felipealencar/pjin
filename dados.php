<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Compras Governamentais</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
</head>
<body>
	<?php 
		function soNumero($str) {
	    	return preg_replace("/[^0-9]/", "", $str);
		}

		$codigo=$_GET['orgao'];
		$codigo = soNumero($codigo);
		
		//$json_str=file_get_contents("http://compras.dados.gov.br/licitacoes/doc/orgao/".$codigo.".json");
		
		// O Curl irá fazer uma requisição para a API do Vimeo
		// e irá receber o JSON com as informações do vídeo.
		$curl = curl_init("http://compras.dados.gov.br/licitacoes/doc/orgao/".$codigo.".json");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$json = curl_exec($curl);
		curl_close($curl);

		// Faremos o PHP interpretar e reconhecer o JSON que
		// recebemos da API do Vimeo.
		$encoded = json_decode($json);

		// As informações pode ser recuperadas da seguinte forma.
		// Resultado do echo: Forest aerials 5D 1080p KAHRS / 395 segundos
		if($encoded->{'ativo'}==1)
		{
			$ativo="Sim";
		}
		else
		{
			$ativo="Não";
		}

		?>
		<a href="index.php"><button class="btn btn-danger">Voltar</button></a>
		<div class="container">
			<div class="row">
				<h1>Órgão <?php echo $encoded->{'codigo'} .": ". $encoded->{'nome'} ?></h1>
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<td><b>Código</b></td>
							<td><b>Nome do Órgão</b></td>
							<td><b>Ativo</b></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $encoded->{'codigo'} ?></td>
							<td><?php echo $encoded->{'nome'} ?></td>
							<td><?php echo $ativo ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
