<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Compras Governamentais</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container">
		<h1>Busca de Orgãos</h1>
		<div class="row">
			<form action="dados.php" method="GET" class="form-inline">
				<select class="form-control" name="orgao" id="">
					<?php  
						$arquivo=file_get_contents("orgaos.txt");
						$separa=explode("\n", $arquivo); // divide o txt em linhas
						$qtd_linhas=count($separa);
						foreach ($separa as $a)
						{
							$separa1=explode(" ", $a);
							$codigo=$separa1[0];

							$orgao=substr($a,strlen($codigo));
							//echo $codigo." - ".$orgao."<br>";
							//echo $a."<br>";
							echo "<option value='".$codigo."'>".$orgao."</option>";
						}
					?>
				</select>
				<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Buscar</button>
			</form>
		</div>	
	</div>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
