<?php 

include_once 'conexao_bd.php'; //include para requerir no arquivo php, a conexão do banco de dados.

$msg = false; //variavel para guardar o valor que será passado, na condição.

if(isset($_FILES['arquivo'])){ // esta condição, verifica se a varivel 'arquivo' existe.

	$extensao = strtolower(substr($_FILES['arquivo']['name'],-4)); // 'substr' uso para pegar os 4 ultimos caracteres da string. Já 'strtolower' uso para transformar esses caracteres em minusculos.
	$newName = md5(time()).$extensao;
	$dir = "../Uploads/";

	move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$newName); 
	//essa condição ira mover o arquivo para pasta destinada
	$sql_code = "INSERT INTO up(arquivo) VALUES('$extensao')";
		// $pdo->exec("INSERT INTO up(arquivo) VALUES('$extensao');");

		if($mysqli->query($sql_code))
			$msg = "arquivo salvo";
		else
			$msg = "deu ruim...";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Upload de Arquivos</title>
	</head>
<body>
<?php if($msg != false) echo "<p> $msg </p>"; ?>
	<form action="index.php" method="POST" enctype="multipart/form-data"> <!-- o enctype é um elemento para armazenar arquivos-->
		<input type="file" name="arquivo" required>
		<br>
		<input type="submit" name="Joga-lá">
		

	</form>

</body>
</html>