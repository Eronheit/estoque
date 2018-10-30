<?php 
	require 'conexao.php';
	$ferramenta = $_GET['ferramenta'];
		if(isset($_POST['devolver'])){
			echo"booommmm";
			$condicao = $_POST['condicao'];
			$sqlA = "UPDATE ferramenta SET status_saida='".$condicao."' WHERE nome = '".$ferramenta."'";
			$queryA = mysqli_query($con, $sqlA);
			if ($queryA > 0) {
				echo "<script>alert('Atualizado com sucess!')</script>";
				header("location:index.php");
			}
			else{
				echo '<script>naoooo</script>';
			}
		}

		$sql = "DELETE FROM alocacao WHERE idalocacao = ".$_GET['idalocacao'];
		$query = mysqli_query($con, $sql);
		
		$situacao = 0;
		$ferramenta = $_GET['ferramenta'];
		$sqlF = "UPDATE ferramenta SET situacao='".$situacao."' WHERE nome = '".$ferramenta."'";
		$queryF = mysqli_query($con, $sqlF);

		// if(isset($_POST['devolver'])){
		// 	echo '<script>'.$ferramenta.'</script>';
		// 	$ferramenta = $_GET['ferramenta'];
		// 	$condicao = $_POST['condicao'];
		// 	$sqlA = "UPDATE ferramenta SET status_saida='".$condicao."' WHERE nome = '".$ferramenta."'";
		// 	$queryA = mysqli_query($con, $sqlA);
		// 	if ($queryA > 0) {
		// 		echo "<script>alert('Atualizado com sucess!')</script>";
		// 		header("location:index.php");
		// 	}
		// 	else{
		// 		echo '<script>naoooo</script>';
		// 	}
		// }

		if ($query > 0 && $queryF > 0) {
			echo "<script>alert('Devolvido com sucesso!')</script>";
			header("location:index.php");
		}
		else{
			echo "Não deu!";
		}
	
?>