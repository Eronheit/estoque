<?php 
	require 'conexao.php';
	$condicao = $_POST['condicao'];
	$sql = "DELETE FROM alocacao WHERE idalocacao = ".$_GET['idalocacao'];
	$query = mysqli_query($con, $sql);
	
	$situacao = 0;
	$ferramenta = $_GET['ferramenta'];
	$sqlF = "UPDATE ferramenta SET situacao='".$situacao."', status_saida='".$condicao."' WHERE nome = '".$ferramenta."'";
	$queryF = mysqli_query($con, $sqlF);

	if ($query > 0 && $queryF > 0) {
		echo "<script>alert('Devolvido com sucesso!')</script>";
		header("location:index.php");
	}
	else{
		echo "Não deu!";
	}
?>