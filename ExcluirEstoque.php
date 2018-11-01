<?php 
	// require 'conexao.php'; 
			// $condicao = $_GET['condicao'];
			// echo $condicao;
	
		if(isset($_GET['devolver'])){
			$condicao = $_GET['condicao'];
			echo $condicao;
		}
		// 	$condicao = $_POST['condicao'];
		// 	echo $condicao;
		// 	// if($condicao != "Funcionando"){

		// 	// 	echo '<script>alert("Ferramenta não Devolvida!")</script>';
		// 	// 	// header("location:index.php?id=devolver");
				
		// 	// }else{
		// 	// 	$ferramenta = $_GET['ferramenta'];
		// 	// 	$id = $_GET['idalocacao'];
				
		// 	// 	$sql = "DELETE FROM alocacao WHERE idalocacao = ".$id."";
		// 	// 	$query = mysqli_query($con, $sql);
				
		// 	// 	$situacao = 0;
		// 	// 	$con = "Funcionando";
		// 	// 	$sqlF = "UPDATE ferramenta SET situacao='".$situacao."', status_saida='".$con."' WHERE nome = '".$ferramenta."'";
		// 	// 	$queryF = mysqli_query($con, $sqlF);

		// 	// 	if ($query > 0 && $queryF) {
		// 	// 		echo "<script>alert('Atualizado com sucesso!')</script>";
		// 	// 		header("location:index.php?id=devolver");
		// 	// 	}
		// 	// 	else{
		// 	// 		echo '<script>alert("Ferramenta não pode ser devolvida Defeituosa!")</script>';
		// 	// 		// header("location:index.php?id=devolver");
		// 	// 	}
		// 	// }
		// }else{
		// 	echo '<script>alert("Nao deu")</script>';
		// 	// header("location:index.php?id=devolver");
		// }

		

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

		// if ($query > 0 && $queryF > 0) {
		// 	echo "<script>alert('Devolvido com sucesso!')</script>";
		// 	header("location:index.php");
		// }
		// else{
		// 	echo "Não deu!";
		// }
	
?>